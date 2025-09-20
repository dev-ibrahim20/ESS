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
            Schema::create('students', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('father_name')->nullable();
                $table->string('mother_name')->nullable();
                $table->string('phone', 20)->nullable();
                $table->string('address')->nullable();
                $table->date('birthday')->nullable();
                $table->enum('gender', ['male', 'female'])->nullable();
                $table->string('religion')->nullable();
                $table->enum('blood_group', ['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-'])->nullable();
                $table->string('photo_path')->nullable();
                $table->foreignId('classroom_id')->constrained()->onDelete('cascade'); // الطالب في فصل
                $table->string('roll_number')->unique(); // رقم الجلوس
                $table->timestamps();
            });
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
