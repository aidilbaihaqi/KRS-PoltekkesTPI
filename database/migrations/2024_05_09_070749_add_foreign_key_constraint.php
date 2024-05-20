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
        Schema::table('mahasiswas', function (Blueprint $table) {
            $table->foreign('kode_kelas')
            ->references('kode_kelas')
            ->on('kelas')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
        Schema::table('mahasiswas', function (Blueprint $table) {
            $table->foreign('kode_jurusan')
            ->references('kode_jurusan')
            ->on('jurusans')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
        Schema::table('k_r_s', function (Blueprint $table) {
            $table->foreign('nim')
            ->references('nim')
            ->on('mahasiswas')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
        Schema::table('k_r_s', function (Blueprint $table) {
            $table->foreign('kode_mk')
            ->references('kode_mk')
            ->on('mata_kuliahs')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
