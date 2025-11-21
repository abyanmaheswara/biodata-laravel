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
        Schema::create('personal_data', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title');
            $table->string('email');
            $table->string('phone');
            $table->text('address');
            $table->string('birth_date');
            $table->string('nationality');
            $table->string('linkedin');
            $table->string('github');
            $table->text('summary');
            // Kita pakai JSON column untuk menyimpan data array
            $table->json('skills');
            $table->json('experience');
            $table->json('education');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_data');
    }
};