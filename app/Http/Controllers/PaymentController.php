<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    /**
     * Process card payment
     */
    public function processCardPayment(Request $request, Order $order)
    {
        $request->validate([
            'card_number' => 'required|string|size:16',
            'expiry_month' => 'required|string|size:2',
            'expiry_year' => 'required|string|size:2',
            'cvv' => 'required|string|size:3',
            'card_holder_name' => 'required|string|max:255',
        ]);

        try {
            $paymentSuccess = $this->simulateCardPayment($request->all());
            
            if ($paymentSuccess) {
                $order->update([
                    'payment_status' => 'paid',
                    'payment_reference' => 'CARD_' . uniqid(),
                ]);

                return response()->json([
                    'success' => true,
                    'redirect_url' => route('checkout.success', $order->order_number)
                ]);
            }

            return response()->json([
                'success' => false,
                'message' => 'Payment failed. Please check your card details and try again.'
            ], 422);
        } catch (\Exception $e) {
            Log::error('Card payment error: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Payment processing error. Please try again.'
            ], 500);
        }
    }

    /**
     * Simulate card payment (for demo purposes)
     */
    private function simulateCardPayment(array $cardData)
    {
        $cardNumber = $cardData['card_number'];
        
        if (in_array($cardNumber, ['4111111111111111', '5555555555554444'])) {
            return true;
        } elseif ($cardNumber === '4000000000000002') {
            return false;
        }

        return rand(1, 10) <= 8;
    }

    /**
     * Process mobile payment
     */
    public function processMobilePayment(Request $request, Order $order)
    {
        $request->validate([
            'mobile_number' => 'required|string|regex:/^[0-9]{10}$/',
            'provider' => 'required|in:dialog,mobitel',
        ]);

        try {
            $paymentSuccess = $this->simulateMobilePayment($request->all());
            
            if ($paymentSuccess) {
                $order->update([
                    'payment_status' => 'paid',
                    'payment_reference' => strtoupper($request->provider) . '_' . uniqid(),
                ]);

                return response()->json([
                    'success' => true,
                    'redirect_url' => route('checkout.success', $order->order_number)
                ]);
            }

            return response()->json([
                'success' => false,
                'message' => 'Mobile payment failed. Please check your mobile wallet balance and try again.'
            ], 422);
        } catch (\Exception $e) {
            Log::error('Mobile payment error: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Payment processing error. Please try again.'
            ], 500);
        }
    }

    /**
     * Simulate mobile payment (for demo purposes)
     */
    private function simulateMobilePayment(array $paymentData)
    {
        return rand(1, 10) <= 9;
    }

    /**
     * Check payment status
     */
    public function checkPaymentStatus(Order $order)
    {
        return response()->json([
            'order_number' => $order->order_number,
            'payment_status' => $order->payment_status,
            'payment_reference' => $order->payment_reference,
            'total_amount' => $order->total_amount,
        ]);
    }

    // Removed payment gateways — stubs return 404 if hit somehow
    public function initiateWebXPayPayment() { abort(404); }
    public function testWebXPay() { abort(404); }
    public function handleWebXPayReturn() { abort(404); }
    public function handleWebXPayCancel() { abort(404); }
    public function handleWebXPayNotify() { abort(404); }
    public function checkWebXPayPaymentStatus() { abort(404); }
    public function initiateKokoPayPayment() { abort(404); }
    public function handleKokoPayReturn() { abort(404); }
    public function handleKokoPayCancel() { abort(404); }
    public function handleKokoPayNotify() { abort(404); }
    public function checkKokoPayPaymentStatus() { abort(404); }
    public function testKokoPay() { abort(404); }
}
