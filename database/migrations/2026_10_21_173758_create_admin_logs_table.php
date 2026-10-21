<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('admin_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id')->constrained('users')->onDelete('cascade');
            $table->string('action'); // Contoh: 'APPROVE_COURSE', 'REVOKE_CERTIFICATE'
            $table->string('target')->nullable(); // Contoh: 'Fisika Kuantum Lanjut', 'NBL-A7K2M'
            $table->text('description')->nullable(); // Detail tambahan
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('admin_logs');
    }
};