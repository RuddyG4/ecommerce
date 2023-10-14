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
        Schema::create('whishlists', function (Blueprint $table) {
            $table->foreignId('customer_id')->constrained();
            $table->foreignId('product_id')->constrained();
            $table->timestamp('created_at');
            $table->primary(['customer_id', 'product_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('whishlists');
    }
};
