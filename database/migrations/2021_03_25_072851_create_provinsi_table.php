<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvinsiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provinsi', function (Blueprint $table) {
            $table->unsignedBigInteger('kd_prov')->primary();
            $table->string('nama_prov');
            $table->timestamps();
        });

        Schema::create('kabupaten', function (Blueprint $table) {
            $table->unsignedBigInteger('kd_kab')->primary();
            $table->string('nama_kab');
            $table->unsignedBigInteger('kd_prov');
            $table->foreign('kd_prov')->references('kd_prov')->on('provinsi');
            $table->timestamps();
        });

        
        Schema::create('kecamatan', function (Blueprint $table) {
            $table->unsignedBigInteger('kd_kec')->primary();
            $table->string('nama_kec');
            $table->unsignedBigInteger('kd_kab');
            $table->foreign('kd_kab')->references('kd_kab')->on('kabupaten');
            $table->timestamps();
        });

        Schema::create('kelurahan', function (Blueprint $table) {
            $table->unsignedBigInteger('kd_kel')->primary();
            $table->string('nama_kel');
            $table->unsignedBigInteger('kd_kec');
            $table->foreign('kd_kec')->references('kd_kec')->on('kecamatan');
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
        Schema::dropIfExists('provinsi');
    }
}
