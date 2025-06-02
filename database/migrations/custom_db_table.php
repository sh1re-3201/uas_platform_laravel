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
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
        });

        Schema::create('job_types', function (Blueprint $table) {
        $table->id();
        $table->string('type_name'); // e.g., Full-time, Part-time
        $table->timestamps();
        });
        
        Schema::create('job_listings', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('description');
        $table->unsignedBigInteger('job_type_id');
        $table->foreign('job_type_id')->references('id')->on('job_types')->onDelete('cascade');
        $table->timestamps();
        });

        Schema::create('applications', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id');
        $table->unsignedBigInteger('job_id');
        $table->text('cover_letter')->nullable();
        $table->timestamps();

        $table->foreign('user_id')->references('id')->on('applicants')->onDelete('cascade');
        $table->foreign('job_id')->references('id')->on('job_listings')->onDelete('cascade');
        });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicants');
        Schema::dropIfExists('job_listings');
        Schema::dropIfExists('applications');
        Schema::dropIfExists('job_types');

    }
};
