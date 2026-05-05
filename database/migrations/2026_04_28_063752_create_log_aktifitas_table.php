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
        Schema::create('log_aktifitas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                  ->references('id')
                  ->on('user')
                  ->onDelete('cascade');
            $table->unsignedBigInteger('peminjaman_id');
            $table->foreign('peminjaman_id')
                  ->references('id')
                  ->on('peminjaman')
                  ->onDelete('cascade');
            $table->unsignedBigInteger('pengembalian_id');
            $table->foreign('pengembalian_id')
                  ->references('id')
                  ->on('pengembalian')
                  ->onDelete('cascade');
            $table->string('aktifitas');
            $table->dateTime('waktu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_aktifitas');
    }
};
