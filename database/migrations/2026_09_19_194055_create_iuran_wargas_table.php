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
        Schema::create('iuran_wargas', function (Blueprint $table) {
            $table->id();
        // Foreign Key yang berelasi ke tabel penduduks
        $table->foreignId('penduduk_id')->constrained('penduduks')->onDelete('cascade');
        $table->string('bulan'); // Contoh: Juni 2026
        $table->decimal('jumlah', 12, 2); // Jumlah nominal pembayaran
        $table->date('tanggal_pembayaran');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iuran_wargas');
    }
};
