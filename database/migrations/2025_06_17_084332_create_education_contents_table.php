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
        Schema::create('education_contents', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->enum('type', ['poster', 'video', 'berita']);
            $table->text('content')->nullable();
            $table->string('url')->nullable();
            $table->string('category')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education_contents');
    }
};
