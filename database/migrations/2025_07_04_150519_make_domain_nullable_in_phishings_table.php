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
        Schema::table('phishings', function (Blueprint $table) {
            $table->string('domain')->nullable()->change();
            $table->float('phishing_probability')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('phishings', function (Blueprint $table) {
            $table->string('domain')->nullable(false)->change();
            $table->float('phishing_probability')->nullable(false)->change();
        });
    }
};
