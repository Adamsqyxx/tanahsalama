<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('chats', function (Blueprint $table) {
            $table->id();

            $table->string('kode_chat', 30)->unique();

            $table->string('nama_customer');

            $table->string('no_hp', 20);

            $table->enum('status', [
                'OPEN',
                'WAITING',
                'ANSWERED',
                'CLOSED'
            ])->default('OPEN');

            $table->dateTime('last_message_at')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('chats');
    }
};