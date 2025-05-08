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
        Schema::create('rekapitulasi_transaksis', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('tanggal');
            $table->string('nomor_rumah');
            $table->string('kategori');
            $table->decimal('dana_masuk', 15, 2)->nullable();
            $table->decimal('dana_keluar', 15, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rekapitulasi_transaksis', function (Blueprint $table) {
            $table->dropColumn('nomor_rumah');
            $table->dropColumn('saldo_akhir');
        });

        Schema::dropIfExists('rekapitulasi_transaksis');
    }
};
