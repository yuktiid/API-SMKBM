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
        Schema::create('data_ortu', function (Blueprint $table) {
            $table->id();
            $table->string('nama_ayah',100)->nullable(false);
            $table->string('tempat_lahir',100)->nullable(false);
            $table->date('tgl_lahir')->nullable(false);
            $table->string('hidup_mati',10)->nullable(false);
            $table->string('wni_wna',5)->nullable(false);
            $table->string('agama',10)->nullable(false);
            $table->string('alamat',255)->nullable(false);
            $table->integer('rt')->nullable(false);
            $table->integer('rw')->nullable(false);
            $table->string('kota_kab',255)->nullable(false);
            $table->integer('kode_pos')->nullable(false);
            $table->integer('no_telp')->nullable(false);
            $table->string('pend_terakhir',20)->nullable(false);
            $table->string('pekerjaan',50)->nullable(false);
            $table->integer('penghasilan')->nullable(false);
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
        Schema::dropIfExists('data_ortu');
    }
};