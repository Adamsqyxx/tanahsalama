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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();

            // Booking yang dibayar
            $table->foreignId('booking_id')
                  ->constrained('bookings')
                  ->cascadeOnDelete();

            // Metode pembayaran
            $table->string('metode_pembayaran');

            // Jumlah yang dibayarkan
            $table->decimal('jumlah', 15, 2);

            // Tanggal pembayaran dari customer
            $table->dateTime('tanggal_pembayaran');

            // Bukti transfer / pembayaran
            $table->string('bukti_pembayaran')->nullable();

            // Status pembayaran
            $table->enum('status', [
                'PENDING',
                'SUBMITTED',
                'VERIFIED',
                'REJECTED'
            ])->default('PENDING');

            // Catatan dari admin
            $table->text('catatan_admin')->nullable();

            // Waktu pembayaran diverifikasi
            $table->dateTime('verified_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};