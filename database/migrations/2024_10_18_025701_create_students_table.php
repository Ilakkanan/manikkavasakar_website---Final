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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key referencing the users table
            $table->string('index_no')->unique();
            $table->string('student_fullname');
            $table->text('permanent_address');
            $table->text('residential_address');
            $table->date('date_of_birth');
            $table->string('gs_no');
            $table->string('gs_division');
            $table->string('religion');
            $table->string('grade');
            $table->float('height')->nullable();
            $table->float('weight')->nullable();
            $table->float('BMI')->nullable();
            $table->string('birth_certificate_no')->nullable();
            $table->string('birth_certificate_image')->nullable();
            $table->string('father_fullname');
            $table->string('father_NIC');
            $table->string('father_phone_no');
            $table->string('father_work');
            $table->string('mother_fullname');
            $table->string('mother_NIC');
            $table->string('mother_phone_no');
            $table->string('mother_work');
            $table->float('yearly_income_family')->nullable();
            $table->year('passout_year')->nullable();
            $table->string('student_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
