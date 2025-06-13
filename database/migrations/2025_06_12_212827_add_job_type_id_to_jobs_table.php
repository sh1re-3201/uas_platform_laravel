<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tambahkan kolom job_type_id ke tabel jobs
     */
    public function up(): void
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->unsignedBigInteger('job_type_id')->nullable()->after('id');
            $table->foreign('job_type_id')->references('id')->on('job_types')->onDelete('set null');
        });
    }

    /**
     * Hapus kolom job_type_id dari tabel jobs
     */
    public function down(): void
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->dropForeign(['job_type_id']);
            $table->dropColumn('job_type_id');
        });
    }
};
