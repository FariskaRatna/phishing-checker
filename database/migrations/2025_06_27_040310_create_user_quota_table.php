<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserQuotaTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_quota', function (Blueprint $table) {
            $table->id('no'); // primary key auto increment
            $table->unsignedBigInteger('id_user'); // id dari tabel user

            $table->integer('quota')->default(5); // jumlah quota

            $table->timestamp('create_at')->useCurrent(); // waktu pembuatan

            // Jika id_user mengacu ke tabel users:
            // $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_quota');
    }
}
