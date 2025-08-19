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
        Schema::create('meal_inputs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->enum('meal_type', ['breakfast', 'lunch', 'dinner', 'snack', 'morning_snack', 'afternoon_snack' ]);
            $table->foreignId('food_id')->nullable()->constrained('foods')->onDelete('set null');
            $table->string('manual_name')->nullable();
            $table->float('carbs')->nullable();
            $table->float('sugar')->nullable();
            $table->float('calories')->nullable();
            $table->dateTime('time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meal_inputs');
    }
};
