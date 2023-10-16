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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name', 40);
            $table->string('description', 150);
            $table->boolean('state')->default('0');
            $table->decimal('weight', 5, 2)->default(0.00);

            $table->foreignId('brand_id')->constrained();
            $table->foreignId('product_type_id')->references('id')->on('product_types');
            $table->unsignedSmallInteger('vendor_id')->nullable();
            $table->foreign('vendor_id')->references('id')->on('vendors');
            $table->foreignId('category_id')->nullable()->references('id')->on('categories');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
