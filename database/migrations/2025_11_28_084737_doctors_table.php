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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname1');
            $table->string('surname2')->nullable();
            $table->string('thesistitle')->nullable();
            $table->date('defensedate')->nullable();
            $table->string('unknownexactdate')->nullable();
            $table->string('faculty')->nullable();
            $table->string('city')->nullable();
            $table->string('university')->nullable();
            $table->date('birthdate')->nullable();
            $table->date('deathdate')->nullable();
            $table->integer('teseoid')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
