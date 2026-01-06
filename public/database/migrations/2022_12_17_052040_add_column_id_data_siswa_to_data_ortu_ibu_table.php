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
        Schema::table('data_ortu_ibu', function (Blueprint $table) {
            $table->unsignedBigInteger('id_data_siswa')->after('id')->required();
            $table->foreign('id_data_siswa')->references('id')->on('data_siswa')->onDelete('cascade');
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('data_ortu_ibu', function (Blueprint $table) {
            $table->dropForeign(['id_data_siswa']);
            $table->dropColumn('id_data_siswa');
            //
        });
    }
};
