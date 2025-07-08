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
            $table->id(); // Standar Laravel untuk primary key auto-increment
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade'); // Relasi ke tabel users

            $table->integer('quota')->default(5); // jumlah quota

            $table->timestamps(); // Membuat kolom created_at dan updated_at
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
