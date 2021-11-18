<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotaOrganisasiNuTable extends Migration
{
    public function up()
    {
        Schema::create('anggota_organisasi_nu', function (Blueprint $table) {

            $table->id();
            $table->bigInteger('anggota_id')->unsigned()->nullable();
            $table->string('struktur_organisasi');
            $table->string('jabatan');
            $table->date('masa_jabat_awal')->nullable();
            $table->date('masa_jabat_akhir')->nullable();

            $table->foreign('anggota_id')->references('id')->on('anggota');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('anggota_organisasi_nu');
    }
}