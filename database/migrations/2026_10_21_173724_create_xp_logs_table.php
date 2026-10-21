<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('xp_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('source'); // Contoh: 'materi', 'kuis', 'ujian'
            $table->integer('amount'); // Jumlah XP yang didapat (misal: 20, 120, 500)
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('xp_logs');
    }
};