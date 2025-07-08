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
            $table->foreignId('id_user')->nullable()->constrained('users')->onDelete('set null');
            $table->string('ip', 45)->nullable();
            $table->string('url');
            $table->string('prediction');
            $table->float('confidence');
            $table->string('domain')->nullable();
            $table->float('phishing_probability')->nullable();
            $table->json('nameservers')->nullable();
            $table->json('features')->nullable();
            $table->longText('extracted_content')->nullable();
            $table->float('adjusted_confidence')->nullable();
            $table->string('final_prediction')->nullable();
            $table->string('final_confidence')->nullable();
            $table->boolean('trusted_domain')->nullable();
            $table->longText('llm_analysis')->nullable();
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
