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
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('qty')->default(0);
            $table->foreignId('cart_id')->references('id')->on('shopping_carts');
            $table->foreignId('product_id')->constrained();
            $table->dropPrimary('cart_items_id_primary');
            $table->primary(['id', 'cart_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
