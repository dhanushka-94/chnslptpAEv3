<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Order;
use App\Models\Transaction;

class MigrateOrdersToTransactions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:orders-to-transactions {--force : Force migration even if transactions exist}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate existing paid orders to transactions table';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting migration of paid orders to transactions table...');

        // Get all paid orders that don't have corresponding transactions
        $query = Order::where('payment_status', 'paid')
            ->whereNotNull('payment_method')
            ->whereNotNull('payment_reference');

        if (!$this->option('force')) {
            $query->whereNotExists(function($q) {
                $q->select('id')
                  ->from('transactions')
                  ->whereColumn('order_id', 'orders.id');
            });
        }

        $orders = $query->get();

        if ($orders->isEmpty()) {
            $this->info('No orders found that need migration to transactions.');
            return 0;
        }

        $this->info("Found {$orders->count()} paid orders to migrate.");

        $bar = $this->output->createProgressBar($orders->count());
        $bar->start();

        $migrated = 0;
        $skipped = 0;

        foreach ($orders as $order) {
            try {
                // Check if transaction already exists (in case of force flag)
                $existingTransaction = Transaction::where('order_id', $order->id)->first();
                
                if ($existingTransaction && !$this->option('force')) {
                    $skipped++;
                    $bar->advance();
                    continue;
                }

                // Delete existing transaction if force flag is used
                if ($existingTransaction && $this->option('force')) {
                    $existingTransaction->delete();
                }

                // Create transaction record
                Transaction::create([
                    'transaction_id' => 'TXN-' . strtoupper(substr($order->payment_reference ?: uniqid(), 0, 16)),
                    'order_id' => $order->id,
                    'payment_method' => $order->payment_method,
                    'status' => 'completed',
                    'amount' => $order->total_amount,
                    'currency' => 'LKR',
                    'gateway_transaction_id' => $order->payment_reference,
                    'gateway_reference' => $order->payment_reference,
                    'customer_name' => $order->customer_name,
                    'customer_email' => $order->customer_email,
                    'customer_phone' => $order->customer_phone,
                    'description' => "Migrated payment for order {$order->order_number}",
                    'initiated_at' => $order->created_at,
                    'completed_at' => $order->updated_at,
                    'metadata' => [
                        'migrated' => true,
                        'migration_date' => now()->toISOString(),
                        'order_status' => $order->status,
                    ],
                ]);

                $migrated++;
            } catch (\Exception $e) {
                $this->error("Failed to migrate order {$order->order_number}: " . $e->getMessage());
            }

            $bar->advance();
        }

        $bar->finish();
        $this->newLine(2);

        $this->info("Migration completed!");
        $this->info("✅ Migrated: {$migrated} orders");
        
        if ($skipped > 0) {
            $this->info("⏭️  Skipped: {$skipped} orders (already have transactions)");
        }

        $this->info("\nYou can now view the transactions in the admin panel at /admin/transactions");

        return 0;
    }
}