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
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained('courses')->onDelete('cascade');
            $table->string('title');
            $table->enum('type', ['materi', 'kuis', 'ujian']); // Sesuai silabus builder
            $table->integer('order'); 
            $table->integer('xp_reward')->default(20); // Default materi 20, kuis 120, ujian 500
            $table->string('duration')->nullable(); // Contoh: "45 mnt"
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modules');
    }
};
