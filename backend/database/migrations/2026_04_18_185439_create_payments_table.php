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
    Schema::create('payments', function (Blueprint $table) {

        $table->id('payment_id');

        $table->unsignedBigInteger('order_id');

        $table->decimal('amount', 10, 2);

        $table->date('payment_date');

        $table->string('payment_method'); // online

        $table->string('payment_status'); // pending, paid, failed

        $table->timestamps();

        // Foreign key
        $table->foreign('order_id')
              ->references('order_id')
              ->on('orders')
              ->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
