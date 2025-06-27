<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryReportTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('history_report', function (Blueprint $table) {
            $table->id('no'); // Primary key auto increment

            $table->unsignedBigInteger('id_user'); // ID user (bisa foreign key ke tabel users)

            $table->timestamp('create_at')->useCurrent(); // Waktu pembuatan riwayat

            $table->text('query')->nullable(); // Query atau isi pencarian/laporan

            // Jika ada relasi ke tabel users, aktifkan ini:
            // $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_report');
    }
}
