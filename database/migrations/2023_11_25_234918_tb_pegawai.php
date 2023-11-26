<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbPegawai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pegawai', function (Blueprint $table) {
            $table->string('kode_pegawai', 35)->primary();
            $table->string('nama_pegawai', 50);
            $table->string('jabatan', 25);
            $table->string('departemen', 25);
            $table->string('alamat', 100);
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('no_telfn', 15);
            $table->string('id_user', 35);
           
            // $table->timestamps();
        });

        Schema::table('tb_pegawai', function (Blueprint $table){
            $table->foreign('id_user')->references('id_user')->on('users');
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
