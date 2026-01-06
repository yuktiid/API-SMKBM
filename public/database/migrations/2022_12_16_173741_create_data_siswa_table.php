<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_siswa', function (Blueprint $table) {
            $table->id();
            $table->string('email',255)->nullable();
            $table->string('nama_lengkap', 255)->nullable(false);
            $table->char('jenis_kelamin', 1)->nullable(false);
            $table->string('jurusan', 255)->nullable(false);
            $table->string('tempat_lahir', 255)->nullable(false);
            $table->date('tanggal_lahir')->nullable(false);
            $table->string('agama', 10)->nullable(false);
            $table->string('alamat', 255)->nullable(false);
            $table->integer('rt')->nullable(false);
            $table->integer('rw')->nullable(false);
            $table->string('kota_kab', 255)->nullable(false);
            $table->integer('kode_pos')->nullable(false);
            $table->integer('no_telp')->nullable(false);
            $table->integer('anak_ke')->nullable(false);
            $table->integer('jmbl_s_kandung')->nullable(false);
            $table->integer('jmbl_s_tiri')->nullable(false);
            $table->string('bahasa', 50)->nullable(false);
            $table->string('asal_sekolah', 100)->nullable(false);
            $table->date('tgl_sttb')->nullable(false);
            $table->string('no_sttb', 255)->nullable(false);
            $table->string('lama_belajar', 10)->nullable(false);
            $table->integer('nisn')->nullable(false);
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
        Schema::dropIfExists('data_siswa');
    }
};
