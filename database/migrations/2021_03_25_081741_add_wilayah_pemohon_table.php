<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddWilayahPemohonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pemohon', function (Blueprint $table) {
            $table->unsignedBigInteger('kd_prov')->nullable()->after('alamat');
            $table->unsignedBigInteger('kd_kab')->nullable()->after('kd_prov');
            $table->unsignedBigInteger('kd_kec')->nullable()->after('kd_kab');
            $table->unsignedBigInteger('kd_kel')->nullable()->after('kd_kec');

            $table->foreign('kd_prov')->references('kd_prov')->on('provinsi');
            $table->foreign('kd_kab')->references('kd_kab')->on('kabupaten');
            $table->foreign('kd_kel')->references('kd_kel')->on('kelurahan');
            $table->foreign('kd_kec')->references('kd_kec')->on('kecamatan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pemohon', function (Blueprint $table) {
            //
        });
    }
}
