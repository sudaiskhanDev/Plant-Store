<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('maintenances', function (Blueprint $table) {

            $table->id('maintenance_id');

            $table->unsignedBigInteger('plant_id');

            $table->enum('task_type', ['watering', 'pruning', 'fertilization']);

            $table->date('scheduled_date');

            $table->enum('status', ['pending', 'in_progress', 'completed'])->default('pending');

            $table->timestamps();

            $table->foreign('plant_id')
                ->references('plant_id')
                ->on('plants')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('maintenances');
    }
};