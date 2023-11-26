<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbBarang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_barang', function (Blueprint $table) {
            $table->string('kode_barang', 35)->primary();
            $table->string('nama_barang', 35);
            $table->string('merek', 20);
            $table->integer('stok_barang');
            $table->string('id_user', 35);
            // $table->timestamps();
        });

        Schema::table('tb_barang', function (Blueprint $table){
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
        Schema::dropIfExists('tb_barang');
    }
}
