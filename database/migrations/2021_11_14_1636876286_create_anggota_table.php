<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotaTable extends Migration
{
    public function up()
    {
        Schema::create('anggota', function (Blueprint $table) {

			$table->id();
			$table->string('no_kartanu',50);
			$table->string('no_ktp',50);
			$table->string('nama');
			$table->string('jenis_kelamin',20);
			$table->string('tempat_lahir');
			$table->date('tanggal_lahir');
			$table->string('no_telepon',20);
			$table->string('email',100)->nullable();
			$table->text('foto_diri');
			$table->text('scan_ktp');
			$table->text('scan_kartanu');
			$table->text('alamat')->nullable();
			$table->string('kelurahan');
			$table->string('kecamatan');
			$table->string('kabupaten');
			$table->string('alamat_maps')->nullable();
			$table->string('status_menikah');
			$table->integer('jumlah_anggota_keluarga')->nullable();
			$table->bigInteger('anggota_pendidikan_id')->unsigned()->nullable();
			$table->bigInteger('anggota_pekerjaan_id')->unsigned()->nullable();
			$table->string('aktifitas_nu');
			$table->string('jabatan_nu');
			$table->string('asuransi_kesehatan')->nullable();
			$table->bigInteger('pkp_id')->unsigned()->nullable();
			$table->foreign('pkp_id')->references('id')->on('pkp')->nullOnDelete();
			$table->foreign('anggota_pendidikan_id')->references('id')->on('anggota_pendidikan')->onDelete('set null');
			$table->foreign('anggota_pekerjaan_id')->references('id')->on('anggota_pekerjaan')->onDelete('set null');
			$table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('anggota');
    }
}