<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePKPTable extends Migration
{
    public function up()
    {
        Schema::create('PKP', function (Blueprint $table) {

            $table->id()->autoIncrement();
            $table->string('angkatan_pkp');
            $table->string('lokasi_kegiatan')->nullable();
            $table->datetime('waktu_kegiatan')->nullable();
            $table->timestamps();
            $table->softDeletes();
            
            $table->primary('id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('PKP');
    }
}