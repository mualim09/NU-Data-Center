<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotaOrganisasiLainTable extends Migration
{
    public function up()
    {
        Schema::create('anggota_organisasi_lain', function (Blueprint $table) {

            $table->id();
            $table->bigInteger('anggota_id')->unsigned()->nullable();
            $table->string('nama_organisasi');
            $table->string('jabatan');
            $table->date('masa_jabat_awal')->nullable();
            $table->date('masa_jabat_akhir')->nullable();
            $table->foreign('anggota_id')->references('id')->on('anggota')->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('anggota_organisasi_lain');
    }
}