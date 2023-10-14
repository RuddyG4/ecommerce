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
        Schema::create('order_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->smallInteger('qty');
            $table->decimal('tax_amount', 12, 2)->default(0.00);
            $table->decimal('unit_price', 12, 2);
            $table->decimal('sub_total', 12, 2)->default(0.00);
            $table->decimal('total', 12, 2)->default(0.00);

            $table->foreignId('order_id')->constrained()->cascadeOnDelete();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->dropPrimary('order_items_id_primary');
            $table->primary(['id', 'order_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
