<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {

            $table->id('order_id'); // PK

            $table->date('order_date');

            $table->decimal('total_amount', 10, 2);

            $table->string('status')->default('pending');

            $table->unsignedBigInteger('customer_id'); // FK -> users

            $table->timestamps();

            $table->foreign('customer_id')
                  ->references('user_id')
                  ->on('users')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};