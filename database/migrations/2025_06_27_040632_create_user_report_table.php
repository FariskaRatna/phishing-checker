<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserReportTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_report', function (Blueprint $table) {
            $table->id('no'); // Primary key auto increment

            $table->string('user'); // Nama user atau identifier
            $table->unsignedBigInteger('id_user'); // ID user (bisa foreign key ke tabel users)

            $table->string('token')->unique(); // Token unik untuk report atau autentikasi

            $table->timestamp('create_at')->useCurrent(); // Waktu pembuatan data

            $table->boolean('sts_active')->default(1); // Status aktif (1 aktif, 0 tidak aktif)

            // Jika ada relasi ke tabel users, bisa aktifkan ini:
            // $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_report');
    }
}
