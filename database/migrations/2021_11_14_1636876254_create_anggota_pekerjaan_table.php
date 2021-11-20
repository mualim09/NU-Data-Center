<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotaPekerjaanTable extends Migration
{
    public function up()
    {
        Schema::create('anggota_pekerjaan', function (Blueprint $table) {

            $table->id();
            $table->string('jenis_profesi')->nullable();
            $table->text('alamat_kantor')->nullable();
            $table->string('penghasilan_perbulan')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('anggota_pekerjaan');
    }
}