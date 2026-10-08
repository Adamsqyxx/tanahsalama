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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();

            // Petak makam yang dipesan
            $table->foreignId('plot_id')
                  ->constrained('plots')
                  ->cascadeOnDelete();

            // Kode booking untuk pelanggan
            $table->string('kode_booking', 30)->unique();

            // Data pemesan
            $table->string('nama_pemesan');
            $table->string('no_hp', 20);
            $table->string('email')->nullable();

            // Status booking
            $table->enum('status', [
                'BOOKED',
                'CONFIRMED',
                'EXPIRED',
                'CANCELLED'
            ])->default('BOOKED');

            // Waktu booking dan batas pembayaran
            $table->dateTime('booked_at');
            $table->dateTime('expires_at');

            // Diisi ketika pembayaran sudah dikonfirmasi
            $table->dateTime('confirmed_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
