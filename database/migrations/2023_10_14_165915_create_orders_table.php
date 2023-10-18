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
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone', 20)->nullable();
            $table->timestamp('order_date');
            $table->decimal('total', 8, 2)->default(0.00);
            $table->string('shipping_address1', 60);
            $table->string('shipping_address2', 60)->nullable();
            $table->string('order_instructions')->default("");
            $table->string('guest_email', 60)->nullable();

            $table->foreignId('customer_id')->nullable()->constrained();
            $table->foreignId('branch_id')->constrained();
            $table->foreignId('shipping_method_id')->constrained();
            $table->unsignedSmallInteger('city_id');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreignId('discount_id')->nullable()->constrained();
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
