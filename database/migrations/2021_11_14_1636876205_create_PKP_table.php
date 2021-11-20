<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePkpTable extends Migration
{
    public function up()
    {
        Schema::create('pkp', function (Blueprint $table) {

            $table->id()->autoIncrement();
            $table->string('angkatan_pkp')->nullable();
            $table->string('lokasi_kegiatan')->nullable();
            $table->datetime('waktu_kegiatan')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pkp');
    }
}