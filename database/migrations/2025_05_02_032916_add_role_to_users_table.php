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
        // Pastikan tabel 'users' ada sebelum menambahkan kolom
        if (Schema::hasTable('users')) {
            Schema::table('users', function (Blueprint $table) {
                // Tambahkan kolom 'role' jika belum ada
                if (!Schema::hasColumn('users', 'role')) {
                    $table->string('role')->default('bukan_pengurus')->after('remember_token');
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Pastikan tabel 'users' ada sebelum mencoba menghapus kolom
        if (Schema::hasTable('users')) {
            Schema::table('users', function (Blueprint $table) {
                // Hapus kolom 'role' jika ada
                if (Schema::hasColumn('users', 'role')) {
                    $table->dropColumn('role');
                }
            });
        }
    }
};