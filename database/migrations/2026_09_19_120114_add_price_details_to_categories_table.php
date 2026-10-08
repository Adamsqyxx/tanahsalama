<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->string('luas')->nullable()->after('nama_kategori');

            $table->decimal('booking_fee', 15, 2)
                ->default(0)
                ->after('deskripsi');

            $table->decimal('harga_cash', 15, 2)
                ->default(0)
                ->after('booking_fee');

            $table->decimal('cicilan_12', 15, 2)
                ->default(0)
                ->after('harga_cash');

            $table->decimal('cicilan_24', 15, 2)
                ->default(0)
                ->after('cicilan_12');

            $table->decimal('cicilan_36', 15, 2)
                ->default(0)
                ->after('cicilan_24');
        });
    }

    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn([
                'luas',
                'booking_fee',
                'harga_cash',
                'cicilan_12',
                'cicilan_24',
                'cicilan_36',
            ]);
        });
    }
};