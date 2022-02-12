<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasilPembelajaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil_pembelajaran', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('jadwal_siswa_id');
            $table->integer('tugas');
            $table->integer('uts');
            $table->integer('uas');
            $table->integer('rata');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('jadwal_siswa_id')->references('id')->on('jadwal_siswa')
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
        Schema::dropIfExists('hasil_pembelajaran');
    }
}
