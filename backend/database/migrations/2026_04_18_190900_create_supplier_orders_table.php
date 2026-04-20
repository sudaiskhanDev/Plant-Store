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
    Schema::create('supplier_orders', function (Blueprint $table) {

        $table->id('supplier_order_id');

        $table->unsignedBigInteger('supplier_id');
        $table->unsignedBigInteger('plant_id');

        $table->integer('quantity');

        $table->string('delivery_status'); 
        // e.g: pending, delivered, cancelled

        $table->timestamps();

        // FOREIGN KEYS
        $table->foreign('supplier_id')
              ->references('supplier_id')
              ->on('suppliers')
              ->onDelete('cascade');

        $table->foreign('plant_id')
              ->references('plant_id')
              ->on('plants')
              ->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supplier_orders');
    }
};
