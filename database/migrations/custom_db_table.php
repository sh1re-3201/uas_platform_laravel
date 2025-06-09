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
        Schema::create('Users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('role');
            $table->dateTime('tanggal_lahir')->nullable(true);
            $table->string('pendidikan_terakhir')->nullable(true);
            $table->string('pengalaman_kerja')->nullable(true);
            $table->string('skills')->nullable(true);
        });

        Schema::create('Job_Types', function (Blueprint $table) {
        $table->id();
        $table->string('type_name'); // e.g., Full-time, Part-time
        $table->timestamps();
        });
        
        Schema::create('Job_Listings', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('description');
        $table->unsignedBigInteger('job_type_id');
        $table->foreign('job_type_id')->references('id')->on('job_types')->onDelete('cascade');
        $table->timestamps();
        });

        Schema::create('Applications', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id');
        $table->unsignedBigInteger('job_id');
        $table->text('cover_letter')->nullable();
        $table->timestamps();

        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('job_id')->references('id')->on('job_listings')->onDelete('cascade');
        });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Applicants');
        Schema::dropIfExists('Users');
        Schema::dropIfExists('Job_Listings');
        Schema::dropIfExists('Applications');
        Schema::dropIfExists('Job_Types');

    }
};
