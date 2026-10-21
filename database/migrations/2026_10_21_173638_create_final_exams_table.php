<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('final_exams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained('courses')->onDelete('cascade');
            $table->string('title')->default('Ujian Akhir Komprehensif');
            $table->text('description')->nullable();
            $table->text('rules')->nullable();
            $table->integer('duration'); // Dalam menit
            $table->integer('passing_grade')->default(75);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('final_exams');
    }
};