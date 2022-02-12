<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKepalaSekolahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kepala_sekolah', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_lengkap')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->integer('user_id');
            $table->string('tahun_mulai_masa_jabatan')->nullable();
            $table->string('tahun_selsai_masa_jabatan')->nullable();
            $table->longText('alamat')->nullable();
            $table->string('no_telpon')->nullable();
            $table->string('foto')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kepala_sekolah');
    }
}
