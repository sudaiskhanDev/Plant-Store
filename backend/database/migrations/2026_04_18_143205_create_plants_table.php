<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('plants', function (Blueprint $table) {
            $table->id('plant_id'); // PK

            $table->string('name');

            $table->unsignedBigInteger('category_id'); // FK

            $table->decimal('price', 10, 2);
            $table->integer('stock_quantity');

            $table->text('description')->nullable();

            $table->timestamps();

            // Foreign key relation
            $table->foreign('category_id')
                  ->references('category_id')
                  ->on('categories')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('plants');
    }
};