<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('ip_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ip', 100);
            $table->string('city', 100)->default('Unknown');
            $table->string('region', 100)->default('Unknown');
            $table->string('country', 100)->default('Unknown');
            $table->string('location', 100)->default('Unknown');
            $table->string('device', 100)->nullable();
            $table->string('platform', 100)->nullable();
            $table->string('browser', 100)->nullable();
            $table->text('user_agent')->nullable();
            $table->timestamp('createdate')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ip_logs');
    }
};
