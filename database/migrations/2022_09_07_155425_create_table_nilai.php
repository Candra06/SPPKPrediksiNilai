<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableNilai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_siswa')->unsigned();
            $table->integer('id_mengajar')->unsigned();
            $table->integer('nilai');
            $table->enum('periode', ['1', '2','3','4']);
            $table->timestamps();
            $table->foreign('id_siswa')->references('id')->on('siswa');
            $table->foreign('id_mengajar')->references('id')->on('mengajar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_nilai');
    }
}
