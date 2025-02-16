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
        Schema::create('self_activity_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_id')->constrained('members')->onDelete('cascade'); // Relasi ke tabel members
            $table->decimal('total_amount', 10, 2); // Jumlah pembayaran
            $table->string('payment_proof')->nullable(); // URL atau path file bukti pembayaran
            $table->enum('payment_status', ['Belum Diunggah', 'Diproses', 'Berhasil', 'Ditolak'])->default('Belum Diunggah'); // Status pembayaran
            $table->foreignId('verified_by')->nullable()->constrained('users')->onDelete('set null'); // Admin yang memverifikasi
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('self_activity_payments');
    }
};
