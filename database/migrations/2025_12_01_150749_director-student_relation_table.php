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
        Schema::create('relations', function (Blueprint $table) {
            $table->unsignedBigInteger('directorID');
            $table->unsignedBigInteger('studentID');
            $table->foreign('directorID')->references('id')->on('doctors');
            $table->foreign('studentID')->references('id')->on('doctors');
            $table->string('relationtype');
            $table->unique(['directorID', 'studentID']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('relations');
    }
};
