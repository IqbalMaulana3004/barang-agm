<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbPegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pegawai', function (Blueprint $table) {
            $table->string('kode_pegawai');
            $table->string('nama_pegawai');
            $table->string('jabatan');
            $table->string('departemen');
            $table->date('tanggal_gabung');
            $table->string('alamat');
            $table->string('jenis_kelamin');
            $table->string('no_telfn');
            $table->string('id_pengguna');
           
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_pegawai');
    }
}
