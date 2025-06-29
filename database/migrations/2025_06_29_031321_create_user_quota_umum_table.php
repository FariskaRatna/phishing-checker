<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('user_quota_umum', function (Blueprint $table) {
            $table->bigIncrements('no');
            $table->string('ip', 100);
            $table->integer('quota')->default(5);
            $table->timestamp('timestamp')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_quota_umum');
    }
};
