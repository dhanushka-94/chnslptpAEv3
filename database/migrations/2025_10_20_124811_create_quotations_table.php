<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->string('quotation_number')->unique();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('session_id')->nullable();
            
            // Customer Information
            $table->string('customer_name');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('customer_email')->nullable();
            $table->string('customer_phone');
            $table->text('customer_address')->nullable();
            $table->string('customer_city')->nullable();
            $table->string('customer_state')->nullable();
            $table->string('customer_postal_code')->nullable();
            $table->string('customer_country')->default('Sri Lanka');
            
            // Quotation Details
            $table->decimal('subtotal', 10, 2);
            $table->decimal('original_subtotal', 10, 2)->default(0);
            $table->decimal('total_discount', 10, 2)->default(0);
            $table->decimal('shipping_cost', 10, 2)->default(0);
            $table->decimal('tax_amount', 10, 2)->default(0);
            $table->decimal('total_amount', 10, 2);
            
            // Status and Dates
            $table->enum('status', ['pending', 'sent', 'accepted', 'rejected', 'expired'])->default('pending');
            $table->date('valid_until');
            $table->timestamp('sent_at')->nullable();
            $table->timestamp('viewed_at')->nullable();
            $table->timestamp('responded_at')->nullable();
            
            // Additional Information
            $table->text('notes')->nullable();
            $table->text('admin_notes')->nullable();
            $table->json('items_data'); // Store cart items as JSON
            
            // Admin tracking
            $table->unsignedBigInteger('created_by_admin_id')->nullable();
            $table->timestamp('admin_viewed_at')->nullable();
            $table->unsignedBigInteger('viewed_by_admin_id')->nullable();
            
            $table->timestamps();
            
            // Indexes
            $table->index(['status', 'created_at']);
            $table->index(['valid_until']);
            $table->index(['customer_email']);
            $table->index(['customer_phone']);
            
            // Foreign keys
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('created_by_admin_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('viewed_by_admin_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotations');
    }
};
