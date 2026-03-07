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
        Schema::create('student_statistics', function (Blueprint $table) {
            $table->id();
            $table->string('academic_year'); // e.g., '2023/2024'
            $table->string('grade_level'); // e.g., 'Kelas 10', 'Kelas 11'
            $table->integer('male_count')->default(0);
            $table->integer('female_count')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_statistics');
    }
};
