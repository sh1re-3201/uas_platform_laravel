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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->json('qualifications'); // Menyimpan array kualifikasi
            $table->json('requirements');   // Menyimpan array persyaratan
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->integer('salary_min')->nullable();
            $table->integer('salary_max')->nullable();
            $table->string('location')->nullable();
            $table->string('employment_type')->default('full-time'); // full-time, part-time, contract
            $table->date('deadline')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};