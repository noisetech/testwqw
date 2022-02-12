<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('mata_pelajaran_id');
            $table->integer('tingkat');
            $table->unsignedBigInteger('kelas_id');
            $table->unsignedBigInteger('guru_id');
            $table->unsignedBigInteger('hari_id');
            $table->unsignedBigInteger('semester_id');
            $table->time('jam_mulai');
            $table->time('jam_selsai');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('mata_pelajaran_id')->references('id')->on('mata_pelajaran')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('kelas_id')->references('id')->on('kelas')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('guru_id')->references('id')->on('guru')
            ->onUpdate('cascade')
            ->onDelete('cascade');


            $table->foreign('hari_id')->references('id')->on('hari')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('semester_id')->references('id')->on('semester')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwal');
    }
}
