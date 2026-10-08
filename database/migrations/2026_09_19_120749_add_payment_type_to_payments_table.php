<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('payments', function (Blueprint $table) {

            $table->string('jenis_pembayaran')
                ->nullable()
                ->after('metode_pembayaran');

            $table->unsignedTinyInteger('tenor')
                ->nullable()
                ->after('jenis_pembayaran');

        });
    }

    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {

            $table->dropColumn([
                'jenis_pembayaran',
                'tenor',
            ]);

        });
    }
};