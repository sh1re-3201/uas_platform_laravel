<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->json('qualifications')->nullable()->change();
            $table->json('requirements')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->json('qualifications')->nullable(false)->change();
            $table->json('requirements')->nullable(false)->change();
        });
    }
};
