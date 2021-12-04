<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('nama_lengkap');
            $table->string('jenis_kelamin');
            $table->text('avatar');
            $table->date('tanggal_lahir')->nullable();
            $table->text('alamat')->nullable();
            $table->text('kabupaten')->nullable();
            $table->text('kecamatan')->nullable();
            $table->text('kelurahan')->nullable();
            $table->string('nomor_hp', 50)->nullable();
            $table->string('nomor_ktp', 50)->nullable();
            $table->rememberToken();
            $table->string('admin_username')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin');
    }
}
