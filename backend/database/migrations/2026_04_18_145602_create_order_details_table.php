<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('order_details', function (Blueprint $table) {

            $table->id('order_detail_id'); // PK

            $table->unsignedBigInteger('order_id'); // FK → orders
            $table->unsignedBigInteger('plant_id');  // FK → plants

            $table->integer('quantity');
            $table->decimal('price', 10, 2);

            $table->timestamps();

            // FK constraints
            $table->foreign('order_id')
                  ->references('order_id')
                  ->on('orders')
                  ->onDelete('cascade');

            $table->foreign('plant_id')
                  ->references('plant_id')
                  ->on('plants')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};