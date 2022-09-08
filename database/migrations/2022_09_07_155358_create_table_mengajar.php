<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableMengajar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mengajar', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_kelas')->unsigned();
            $table->integer('id_mapel')->unsigned();
            $table->integer('id_pengajar')->unsigned();
            $table->enum('status', ['Aktif', 'Nonaktif']);
            $table->timestamps();
            $table->foreign('id_kelas')->references('id')->on('kelas');
            $table->foreign('id_mapel')->references('id')->on('mapel');
            $table->foreign('id_pengajar')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_mengajar');
    }
}
