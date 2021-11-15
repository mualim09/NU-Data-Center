<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWilayahTable extends Migration
{
    public function up()
    {
        Schema::create('wilayah', function (Blueprint $table) {

            $table->id();
            $table->string('kabupaten');
            $table->string('kecamatan');
            $table->string('kelurahan');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('wilayah');
    }
}