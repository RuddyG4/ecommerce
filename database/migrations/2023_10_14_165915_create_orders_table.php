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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->timestamp('order_date');
            $table->string('shipping_address1');
            $table->string('shipping_address2')->nullable();
            $table->string('order_instructions');
            $table->string('guest_email', 60)->nullable();

            $table->foreignId('customer_id')->constrained();
            $table->foreignId('branch_id')->constrained();
            $table->foreignId('shipping_method_id')->constrained();
            $table->foreignId('city_id')->references('id')->on('cities');
            $table->foreignId('discount_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
