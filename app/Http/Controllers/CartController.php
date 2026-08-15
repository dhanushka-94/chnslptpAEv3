<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\SmaProduct;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = $this->getCartItems();
        $cartTotal = $cartItems->sum(function($item) {
            return $item->product->final_price * $item->quantity;
        });
        
        return view('cart.index', compact('cartItems', 'cartTotal'));
    }

    public function add(Request $request)
    {
        try {
            \Log::info('Cart add request:', $request->all());
            
            $request->validate([
                'product_id' => 'required|integer|min:1',
                'quantity' => 'required|integer|min:1'
            ]);

            $product = SmaProduct::with('status')->find($request->product_id);
            \Log::info('Product found:', ['product' => $product ? $product->id : 'null']);
            
            if (!$product) {
                return response()->json([
                    'success' => false,
                    'message' => 'Product not found'
                ], 404);
            }
        } catch (\Exception $e) {
            \Log::error('Cart add error:', ['error' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            return response()->json([
                'success' => false,
                'message' => 'An error occurred: ' . $e->getMessage()
            ], 500);
        }

        if (!$product->can_add_to_cart) {
            return response()->json([
                'success' => false,
                'message' => $product->cart_restriction_reason ?: 'This product cannot be added to cart'
            ]);
        }

        // Check available stock
        if ($product->stock_quantity < $request->quantity) {
            return response()->json([
                'success' => false,
                'message' => 'Insufficient stock available'
            ]);
        }

        $sessionId = Session::getId();
        
        // Check if item already in cart
        $existingItem = Cart::where('session_id', $sessionId)
                           ->where('product_id', $request->product_id)
                           ->first();

        if ($existingItem) {
            // Update quantity
            $newQuantity = $existingItem->quantity + $request->quantity;
            
            if ($product->stock_quantity < $newQuantity) {
                return response()->json([
                    'success' => false,
                    'message' => 'Cannot add more items. Stock limit reached.'
                ]);
            }
            
            $existingItem->update([
                'quantity' => $newQuantity,
                'price' => $product->final_price
            ]);
        } else {
            // Add new item
            Cart::create([
                'session_id' => $sessionId,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
                'price' => $product->final_price
            ]);
        }

        // Calculate cart total for response
        $cartItems = Cart::where('session_id', session()->getId())->get();
        $cartTotal = 0;
        foreach ($cartItems as $item) {
            $product = SmaProduct::find($item->product_id);
            if ($product) {
                $cartTotal += $item->quantity * $product->final_price;
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Product added to cart successfully!',
            'cart_total' => number_format($cartTotal, 2)
        ]);
    }

    public function update(Request $request, Cart $cart)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $product = $cart->product;
        
        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found'
            ], 404);
        }

        if ($product->stock_quantity < $request->quantity) {
            return response()->json([
                'success' => false,
                'message' => 'Insufficient stock available'
            ]);
        }

        $cart->update([
            'quantity' => $request->quantity,
            'price' => $product->final_price
        ]);

        $itemTotal = $cart->total_price;
        
        // Calculate comprehensive cart totals
        $cartTotals = $this->getComprehensiveCartTotals();

        return response()->json([
            'success' => true,
            'item_total' => number_format($itemTotal, 2),
            'cart_total' => number_format($cartTotals['cart_total'], 2),
            'original_subtotal' => number_format($cartTotals['original_subtotal'], 2),
            'total_discount' => number_format($cartTotals['total_discount'], 2),
            'has_discount' => $cartTotals['total_discount'] > 0
        ]);
    }

    public function remove(Cart $cart)
    {
        $cart->delete();

        // Calculate comprehensive cart totals
        $cartTotals = $this->getComprehensiveCartTotals();

        return response()->json([
            'success' => true,
            'message' => 'Item removed from cart',
            'cart_total' => number_format($cartTotals['cart_total'], 2),
            'original_subtotal' => number_format($cartTotals['original_subtotal'], 2),
            'total_discount' => number_format($cartTotals['total_discount'], 2),
            'has_discount' => $cartTotals['total_discount'] > 0
        ]);
    }

    public function clear()
    {
        $sessionId = Session::getId();
        Cart::where('session_id', $sessionId)
             ->orWhere(function($query) {
                 if (Auth::check()) {
                     $query->where('user_id', Auth::id());
                 }
             })
             ->delete();

        return response()->json([
            'success' => true,
            'message' => 'Cart cleared successfully',
            'cart_total' => '0.00',
            'cart_count' => 0
        ]);
    }
    


    private function getCartItems()
    {
        $sessionId = Session::getId();
        return Cart::where('session_id', $sessionId)
                  ->with('product')
                  ->get();
    }

    private function getCartTotal()
    {
        $cartItems = $this->getCartItems();
        return $cartItems->sum(function($item) {
            return $item->product->final_price * $item->quantity;
        });
    }

    private function getComprehensiveCartTotals()
    {
        $cartItems = $this->getCartItems();
        
        $cartTotal = 0;
        $originalSubtotal = 0;
        $totalDiscount = 0;
        
        foreach ($cartItems as $item) {
            $product = $item->product;
            $quantity = $item->quantity;
            
            // Calculate totals
            $cartTotal += $product->final_price * $quantity;
            $originalSubtotal += $product->price * $quantity;
            $totalDiscount += ($product->price - $product->final_price) * $quantity;
        }
        
        return [
            'cart_total' => $cartTotal,
            'original_subtotal' => $originalSubtotal,
            'total_discount' => $totalDiscount
        ];
    }

    /**
     * Get cart summary for AJAX requests
     */
    public function summary()
    {
        try {
            $sessionId = session()->getId();
            $userId = Auth::id();

            // Get cart items
            $cartItems = Cart::where(function($query) use ($sessionId, $userId) {
                $query->where('session_id', $sessionId);
                if ($userId) {
                    $query->orWhere('user_id', $userId);
                }
            })->with('product')->get();

            $items = [];
            $total = 0;
            $originalTotal = 0;
            $count = 0;

            foreach ($cartItems as $item) {
                if ($item->product) {
                    $lineTotal = $item->quantity * $item->product->final_price;
                    $originalLineTotal = $item->quantity * $item->product->price;
                    
                    $total += $lineTotal;
                    $originalTotal += $originalLineTotal;
                    $count += $item->quantity;
                    
                    $items[] = [
                        'id' => $item->id,
                        'name' => $item->product->name,
                        'quantity' => $item->quantity,
                        'unit_price' => $item->product->final_price,
                        'original_unit_price' => $item->product->price,
                        'total' => $lineTotal,
                        'original_total' => $originalLineTotal
                    ];
                }
            }

            return response()->json([
                'success' => true,
                'items' => $items,
                'total' => $total,
                'original_total' => $originalTotal,
                'total_discount' => $originalTotal - $total,
                'count' => $count
            ]);
        } catch (\Exception $e) {
            \Log::error('Cart summary error: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'error' => 'Failed to load cart summary',
                'items' => [],
                'total' => 0,
                'count' => 0
            ]);
        }
    }

    /**
     * Get cart count for AJAX requests
     */
    public function count()
    {
        $cartItems = $this->getCartItems();
        $count = $cartItems->sum('quantity');

        return response()->json([
            'success' => true,
            'count' => $count
        ]);
    }
}