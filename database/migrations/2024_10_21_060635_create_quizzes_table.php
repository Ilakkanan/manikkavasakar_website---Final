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
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();// Primary Key
            $table->foreignId('staff_id')->constrained()->onDelete('cascade'); // Foreign Key referencing staff.id
            $table->string('title'); // Quiz title
            $table->text('description')->nullable(); // Description (nullable)
            $table->string('grade'); // Grade level for the quiz
            $table->integer('max_attempts')->default(3); // Maximum attempts (default 3)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quizzes');
    }
};
