<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('nisn')->nullable();
            $table->string('nama_depan')->nullable();
            $table->string('nama_belakang')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->enum('jk', ['L', 'P'])->nullable();
            $table->enum('gol_darah', ['O', 'A', 'B', 'AB'])->nullable();
            $table->string('alamat')->nullable();
            $table->string('angkatan')->nullable();
            $table->date('tgl_masuk')->nullable();
            $table->string('nama_sekolah_asal')->nullable();
            $table->string('alamat_sekolah_asal')->nullable();
            $table->string('anak_ke')->nullable();
            $table->string('status_anak')->nullable();
            $table->string('foto')->nullable();
            $table->enum('status', ['bersekolah', 'berhenti'])->nullable();
            $table->string('nama_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->string('pekerjaan_ibu')->nullable();
            $table->string('alamat_orang_tua')->nullable();
            $table->string('no_telpon_orang_tua')->nullable();
            $table->string('nama_wali')->nullable();
            $table->string('alamat_wali')->nullable();
            $table->string('pekerjaan_wali')->nullable();
            $table->string('no_telpon_wali')->nullable();
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
        Schema::dropIfExists('siswa');
    }
}
