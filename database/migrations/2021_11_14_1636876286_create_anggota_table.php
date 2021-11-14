<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotaTable extends Migration
{
    public function up()
    {
        Schema::create('anggota', function (Blueprint $table) {

		$table->integer('id',);
		$table->string('no_kartanu',50);
		$table->string('no_ktp',50);
		$table->string('nama');
		$table->string('jenis_kelamin',20);
		$table->string('tempat_lahir');
		$table->datetime('tanggal_lahir');
		$table->string('no_telepon',20);
		$table->string('email',100);
		$table->text('foto_diri');
		$table->text('scan_ktp');
		$table->text('scan_kartanu');
		$table->text('alamat');
		$table->string('kelurahan');
		$table->string('kecamatan');
		$table->string('kabupaten');
		$table->string('alamat_maps');
		$table->string('status_menikah');
		$table->integer('jumlah_anggota_keluarga',);
		$table->integer('anggota_pendidikan_id',);
		$table->integer('anggota_pekerjaan_id',);
		$table->string('aktifitas_nu');
		$table->string('jabatan_nu');
		$table->string('asuransi_kesehatan');
		$table->integer('pkp_id',);
		$table->primary('id');
		$table->foreign('pkp_id')->references('id')->on('PKP');
        });
    }

    public function down()
    {
        Schema::dropIfExists('anggota');
    }
}