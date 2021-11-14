<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePondokTable extends Migration
{
    public function up()
    {
        Schema::create('pondok', function (Blueprint $table) {

		$table->integer('id',);
		$table->string('nama');
		$table->text('alamat');
		$table->text('alamat_maps');
		$table->primary('id');

        });
    }

    public function down()
    {
        Schema::dropIfExists('pondok');
    }
}