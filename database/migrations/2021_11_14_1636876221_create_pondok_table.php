<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePondokTable extends Migration
{
    public function up()
    {
        Schema::create('pondok', function (Blueprint $table) {

            $table->id()->autoIncrement();
            $table->string('nama')->nullable();
            $table->text('alamat')->nullable();
            $table->text('alamat_maps')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pondok');
    }
}