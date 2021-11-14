<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotaPendidikanTable extends Migration
{
    public function up()
    {
        Schema::create('anggota_pendidikan', function (Blueprint $table) {

		$table->integer('id',);
		$table->string('pendidikan_terakhir');
		$table->string('jurusan');
		$table->string('pondok_id');
		$table->string('pendidikan_pesantren');
		$table->primary('id');
		$table->foreign('pondok_id')->references('id')->on('pondok');
        });
    }

    public function down()
    {
        Schema::dropIfExists('anggota_pendidikan');
    }
}