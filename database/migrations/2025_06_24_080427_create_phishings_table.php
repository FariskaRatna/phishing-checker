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
        Schema::create('phishings', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->string('prediction');
            $table->float('confidence');
            $table->float('phishing_probability');
            $table->json('nameservers')->nullable();
            $table->json('features')->nullable();
            $table->longText('extracted_content')->nullable();
            // $table->longText('forms')->nullable();
            // $table->longText('heads')->nullable();
            // $table->longText('titles')->nullable();
            // $table->longText('scripts')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phishings');
    }
};
