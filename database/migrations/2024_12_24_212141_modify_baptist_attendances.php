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
        //
        Schema::table('baptist_attendances', function (Blueprint $table) {
            //
            $table->string('certificate_url')->nullable(); // Path sertifikat (jika tersedia)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('baptist_attendances', function (Blueprint $table) {
            //
            $table->dropColumn('certificate_url');
        });
    }
};
