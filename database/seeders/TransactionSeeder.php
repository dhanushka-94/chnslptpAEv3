<?php

namespace Database\Seeders;

use App\Models\Transaction;
use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeder.
     */
    public function run(): void
    {
        // Get some existing orders
        $orders = Order::take(10)->get();
        
        if ($orders->isEmpty()) {
            $this->command->info('No orders found. Please create some orders first.');
            return;
        }

        $paymentMethods = ['bank_transfer'];
        $statuses = ['pending', 'processing', 'completed', 'failed', 'cancelled', 'refunded'];
        
        foreach ($orders as $index => $order) {
            $paymentMethod = $paymentMethods[array_rand($paymentMethods)];
            $status = $statuses[array_rand($statuses)];
            $amount = $order->total ?? rand(5000, 50000);
            
            $transactionFee = 0;

            $transaction = Transaction::create([
                'transaction_id' => 'TXN_' . strtoupper(Str::random(10)),
                'order_id' => $order->id,
                'payment_method' => $paymentMethod,
                'status' => $status,
                'amount' => $amount,
                'currency' => 'AED',
                'gateway_transaction_id' => $status !== 'pending' ? 'GTW_' . strtoupper(Str::random(12)) : null,
                'gateway_reference' => $status !== 'pending' ? 'REF_' . strtoupper(Str::random(8)) : null,
                'customer_name' => $order->billing_first_name . ' ' . $order->billing_last_name,
                'customer_email' => $order->customer_email,
                'customer_phone' => $order->customer_phone,
                'transaction_fee' => $transactionFee,
                'description' => 'CHANCE LAPTOPS Order #' . $order->order_number,
                'failure_reason' => $status === 'failed' ? $this->getRandomFailureReason() : null,
                'initiated_at' => now()->subMinutes(rand(1, 1440)),
                'completed_at' => $status === 'completed' ? now()->subMinutes(rand(0, 720)) : null,
                'failed_at' => $status === 'failed' ? now()->subMinutes(rand(0, 120)) : null,
                'metadata' => $this->getMetadata($paymentMethod, $status),
                'ip_address' => $this->getRandomIpAddress(),
                'user_agent' => $this->getRandomUserAgent(),
            ]);

            if ($status !== 'pending') {
                $transaction->update([
                    'gateway_response' => $this->getGatewayResponse($paymentMethod, $status),
                ]);
            }
        }
        
        $this->command->info('Created ' . count($orders) . ' sample transactions.');
    }

    private function getRandomFailureReason(): string
    {
        $reasons = [
            'Insufficient funds in customer account',
            'Card declined by issuing bank',
            'Network timeout during payment processing',
            'Invalid card details provided',
            'Payment gateway maintenance',
            'Customer cancelled the transaction',
            'Daily transaction limit exceeded',
            'Suspected fraudulent activity',
        ];
        
        return $reasons[array_rand($reasons)];
    }

    private function getMetadata(string $paymentMethod, string $status): array
    {
        $metadata = [
            'payment_method' => $paymentMethod,
            'processed_by' => 'system',
            'environment' => config('app.env'),
        ];

        if ($status === 'refunded') {
            $metadata['refund_reason'] = 'Customer requested refund';
            $metadata['refunded_by'] = 'Admin User';
            $metadata['refunded_at'] = now()->subDays(rand(1, 30))->toDateTimeString();
        }

        return $metadata;
    }

    private function getGatewayResponse(string $paymentMethod, string $status): array
    {
        $baseResponse = [
            'gateway' => $paymentMethod,
            'timestamp' => now()->toISOString(),
            'version' => '1.0',
        ];

        if ($paymentMethod === 'bank_transfer') {
            return array_merge($baseResponse, [
                'verification_status' => $status === 'completed' ? 'VERIFIED' : ($status === 'failed' ? 'REJECTED' : 'PENDING'),
                'bank_reference' => 'BNK_' . strtoupper(Str::random(10)),
                'verified_by' => $status === 'completed' ? 'bank_api' : null,
            ]);
        }

        return $baseResponse;
    }

    private function getRandomIpAddress(): string
    {
        return rand(1, 255) . '.' . rand(1, 255) . '.' . rand(1, 255) . '.' . rand(1, 255);
    }

    private function getRandomUserAgent(): string
    {
        $userAgents = [
            'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36',
            'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36',
            'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:89.0) Gecko/20100101 Firefox/89.0',
            'Mozilla/5.0 (iPhone; CPU iPhone OS 14_6 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/14.0 Mobile/15E148 Safari/604.1',
            'Mozilla/5.0 (Android 11; Mobile; rv:68.0) Gecko/68.0 Firefox/88.0',
        ];
        
        return $userAgents[array_rand($userAgents)];
    }
}
