<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckResultTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('check_result', function (Blueprint $table) {
            $table->id('no'); // primary key
            $table->string('url');

            $table->string('prediction')->nullable();
            $table->float('confidence')->default(0);
            $table->float('phishing_probability')->default(0);

            $table->json('nameservers')->nullable();
            $table->json('features')->nullable();
            $table->longText('extracted_content')->nullable();

            $table->string('create_user')->nullable();
            $table->string('create_ip')->nullable();
            $table->timestamp('create_date')->useCurrent();

            $table->string('result')->nullable();

            $table->timestamps(); // created_at & updated_at otomatis
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('check_result');
    }
}
