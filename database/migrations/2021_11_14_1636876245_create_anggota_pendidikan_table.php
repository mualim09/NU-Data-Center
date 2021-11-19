<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotaPendidikanTable extends Migration
{
    public function up()
    {
        Schema::create('anggota_pendidikan', function (Blueprint $table) {

            $table->id();
            $table->string('pendidikan_terakhir');
            $table->string('jurusan');
            $table->bigInteger('pondok_id')->unsigned()->nullable();
            $table->string('pendidikan_pesantren');
            $table->foreign('pondok_id')->references('id')->on('pondok')->onDelete('set null');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('anggota_pendidikan');
    }
}