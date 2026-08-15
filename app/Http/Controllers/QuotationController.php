<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\SmaProduct;
use App\Models\Quotation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class QuotationController extends Controller
{
    /**
     * Generate quotation, then show HTML preview (download from preview).
     */
    public function generateQuotation(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:20',
            'terms' => 'required|accepted',
        ]);

        $cartItems = Cart::where('session_id', session()->getId())
            ->orWhere(function ($query) {
                if (Auth::check()) {
                    $query->where('user_id', Auth::id());
                }
            })
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        $subtotal = 0;
        $originalSubtotal = 0;
        $totalDiscount = 0;
        $cartProducts = [];

        foreach ($cartItems as $item) {
            $product = SmaProduct::find($item->product_id);
            if ($product) {
                $lineTotal = $item->quantity * $product->final_price;
                $originalLineTotal = $item->quantity * $product->price;
                $lineDiscount = $originalLineTotal - $lineTotal;

                $subtotal += $lineTotal;
                $originalSubtotal += $originalLineTotal;
                $totalDiscount += $lineDiscount;

                $cartProducts[] = [
                    'cart_item' => [
                        'quantity' => $item->quantity,
                        'product_id' => $item->product_id,
                    ],
                    'product' => [
                        'id' => $product->id,
                        'name' => $product->name,
                        'code' => $product->code,
                        'price' => (float) $product->price,
                        'promo_price' => (float) ($product->promo_price ?? 0),
                        'final_price' => (float) $product->final_price,
                        'description' => null,
                    ],
                    'line_total' => $lineTotal,
                    'original_line_total' => $originalLineTotal,
                    'line_discount' => $lineDiscount,
                ];
            }
        }

        $shippingCost = 0;
        $taxAmount = 0;
        $total = $subtotal + $shippingCost + $taxAmount;
        $quotationNumber = 'QUO-' . date('Y') . '-' . strtoupper(substr(uniqid(), -8));

        $quotation = Quotation::create([
            'quotation_number' => $quotationNumber,
            'user_id' => Auth::id(),
            'session_id' => session()->getId(),
            'customer_name' => $request->first_name . ' ' . $request->last_name,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'customer_email' => $request->customer_email ?? null,
            'customer_phone' => $request->customer_phone,
            'customer_address' => $request->billing_address_line_1 ?? null,
            'customer_city' => $request->billing_city ?? null,
            'customer_state' => $request->billing_state ?? null,
            'customer_postal_code' => $request->billing_postal_code ?? null,
            'customer_country' => $request->billing_country ?? 'United Arab Emirates',
            'subtotal' => $subtotal,
            'original_subtotal' => $originalSubtotal,
            'total_discount' => $totalDiscount,
            'shipping_cost' => $shippingCost,
            'tax_amount' => $taxAmount,
            'total_amount' => $total,
            'valid_until' => now()->addDays(7),
            'notes' => $request->notes ?? null,
            'items_data' => $cartProducts,
        ]);

        return redirect()->route('quotation.preview', $quotation);
    }

    /**
     * HTML A4 preview before download.
     */
    public function preview(Quotation $quotation)
    {
        $this->authorizeQuotationAccess($quotation);

        return view('quotations.preview', [
            'quotation' => $quotation,
            'document' => $this->documentData($quotation),
        ]);
    }

    /**
     * Download A4 PDF.
     */
    public function download(Quotation $quotation)
    {
        $this->authorizeQuotationAccess($quotation);

        $pdf = Pdf::loadView('quotations.pdf', $this->documentData($quotation, true));
        $pdf->setPaper('a4', 'portrait');
        $pdf->setOption('isHtml5ParserEnabled', true);
        $pdf->setOption('isRemoteEnabled', true);
        $pdf->setOption('defaultFont', 'DejaVu Sans');
        $pdf->setOption('dpi', 96);
        $pdf->setOption('isFontSubsettingEnabled', true);
        $pdf->setOption('chroot', public_path());

        return $pdf->download('CLT-Quotation-' . $quotation->quotation_number . '.pdf');
    }

    public static function documentData(Quotation $quotation, bool $forPdf = false): array
    {
        $logoFs = public_path('chance-laptops-logo.png');
        if (! is_file($logoFs)) {
            $logoFs = public_path('images/chance-laptops-logo.png');
        }

        return [
            'quotation_number' => $quotation->quotation_number,
            'date' => $quotation->created_at->format('d M Y'),
            'valid_until' => optional($quotation->valid_until)->format('d M Y'),
            'customer' => [
                'name' => $quotation->customer_name,
                'email' => $quotation->customer_email,
                'phone' => $quotation->customer_phone,
            ],
            'items' => self::normalizeItems($quotation->items_data ?? []),
            'subtotal' => (float) $quotation->subtotal,
            'original_subtotal' => (float) $quotation->original_subtotal,
            'total_discount' => (float) $quotation->total_discount,
            'shipping_cost' => (float) $quotation->shipping_cost,
            'tax_amount' => (float) $quotation->tax_amount,
            'total' => (float) $quotation->total_amount,
            'notes' => $quotation->notes ?? '',
            'whatsapp_display' => config('products.whatsapp_display', '+971 58 181 1579'),
            'whatsapp_number' => config('products.whatsapp_number', '971581811579'),
            'email' => 'info@chancelaptops.ae',
            'logo_src' => $forPdf && is_file($logoFs)
                ? 'file:///' . str_replace('\\', '/', $logoFs)
                : asset('chance-laptops-logo.png'),
            'for_pdf' => $forPdf,
        ];
    }

    public static function normalizeItems(array $items): array
    {
        $normalized = [];

        foreach ($items as $item) {
            $product = $item['product'] ?? null;
            $cartItem = $item['cart_item'] ?? null;

            if (is_object($product)) {
                $name = $product->name ?? 'Product';
                $code = $product->code ?? null;
                $unitPrice = (float) ($product->price ?? 0);
            } else {
                $name = $product['name'] ?? 'Product';
                $code = $product['code'] ?? null;
                $unitPrice = (float) ($product['price'] ?? 0);
            }

            if (is_object($cartItem)) {
                $qty = (int) ($cartItem->quantity ?? 1);
            } else {
                $qty = (int) ($cartItem['quantity'] ?? 1);
            }

            $normalized[] = [
                'name' => $name,
                'code' => $code,
                'quantity' => $qty,
                'unit_price' => $unitPrice,
                'line_total' => (float) ($item['line_total'] ?? ($unitPrice * $qty)),
                'line_discount' => (float) ($item['line_discount'] ?? 0),
                'original_line_total' => (float) ($item['original_line_total'] ?? ($unitPrice * $qty)),
            ];
        }

        return $normalized;
    }

    protected function authorizeQuotationAccess(Quotation $quotation): void
    {
        $allowed = $quotation->session_id === session()->getId()
            || (Auth::check() && (int) $quotation->user_id === (int) Auth::id());

        if (! $allowed) {
            abort(403, 'You do not have access to this quotation.');
        }
    }
}
