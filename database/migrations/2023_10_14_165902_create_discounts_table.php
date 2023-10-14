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
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->string('discount_name', 30);
            $table->string('discount_description');
            $table->boolean('discount_type')->default('0'); // 0 = fixed, 1 = percentage
            $table->decimal('value', 5, 2);
            $table->unsignedSmallInteger('allowed_uses')->default(0.00);
            $table->timestamp('start_date');
            $table->timestamp('end_date')->nullable();
            $table->boolean('is_active')->default(0); // 0 = active, 1 = inactive
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discounts');
    }
};
