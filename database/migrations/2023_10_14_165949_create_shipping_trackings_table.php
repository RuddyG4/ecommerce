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
        Schema::create('shipping_trackings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tracking_name', 40);
            $table->string('description_name');
            $table->timestamp('description_datetime');

            $table->foreignId('order_id')->constrained();
            $table->dropPrimary('shipping_trackings_id_primary');
            $table->primary(['id', 'order_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping_trackings');
    }
};
