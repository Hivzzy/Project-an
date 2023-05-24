<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar_gaji', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama_karyawan', 100);
            $table->string('jabatan', 50);
            $table->integer('hari_kerja');
            $table->integer('gaji_perhari');
            $table->integer('gaji_kotor');
            $table->integer('tambahan')->nullable();
            $table->integer('kasbon')->nullable();
            $table->integer('gaji_bersih');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daftar_gaji');
    }
};
