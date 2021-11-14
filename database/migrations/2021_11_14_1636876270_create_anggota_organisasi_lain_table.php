<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotaOrganisasiLainTable extends Migration
{
    public function up()
    {
        Schema::create('anggota_organisasi_lain', function (Blueprint $table) {

		$table->integer('id',);
		$table->integer('anggota_id',);
		$table->string('nama_organisasi');
		$table->string('jabatan');
		$table->date('masa_jabat_awal');
		$table->date('masa_jabat_akhir');
		$table->primary('id');
		$table->foreign('id')->references('id')->on('anggota');
        });
    }

    public function down()
    {
        Schema::dropIfExists('anggota_organisasi_lain');
    }
}