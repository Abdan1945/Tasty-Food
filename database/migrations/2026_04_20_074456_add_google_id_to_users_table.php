<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Kita tambahkan kolom google_id setelah kolom password
            // nullable() artinya boleh kosong (untuk user yang daftar manual)
            $table->string('google_id')->nullable()->after('password');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Ini untuk menghapus kolom jika migrasi di-rollback
            $table->dropColumn('google_id');
        });
    }
};