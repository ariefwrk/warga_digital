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
        Schema::table('rekapitulasi_transaksis', function (Blueprint $table) {
            $table->string('deskripsi_lain')->nullable()->after('nomor_rumah');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rekapitulasi_transaksis', function (Blueprint $table) {
            $table->dropColumn('deskripsi_lain');
        });
    }
};