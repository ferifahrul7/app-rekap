<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImbTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imb', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('tanggal');
            $table->unsignedBigInteger('pemohon_id');
            $table->string('no_imb');
            $table->string('bangunan');
            $table->unsignedBigInteger('lok_prov');
            $table->unsignedBigInteger('lok_kab');
            $table->unsignedBigInteger('lok_kec');
            $table->unsignedBigInteger('lok_kel');
            $table->string('kondisi_bangunan');
            $table->string('tingkat_bangunan');
            $table->text('ukuran_bangunan');
            $table->string('no_shm');
            $table->string('pemilik_tanah');
            $table->unsignedBigInteger('shm_prov');
            $table->unsignedBigInteger('shm_kab');
            $table->unsignedBigInteger('shm_kec');
            $table->unsignedBigInteger('shm_kel');
            $table->date('tanggal_ditetapkan');

            $table->foreign('lok_prov')->references('kd_prov')->on('provinsi');
            $table->foreign('lok_kab')->references('kd_kab')->on('kabupaten');    
            $table->foreign('lok_kec')->references('kd_kec')->on('kecamatan');    
            $table->foreign('lok_kel')->references('kd_kel')->on('kelurahan');
            
            $table->foreign('shm_prov')->references('kd_prov')->on('provinsi');
            $table->foreign('shm_kab')->references('kd_kab')->on('kabupaten');    
            $table->foreign('shm_kec')->references('kd_kec')->on('kecamatan');    
            $table->foreign('shm_kel')->references('kd_kel')->on('kelurahan');

            $table->foreign('pemohon_id')->references('id')->on('pemohon');
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
        Schema::dropIfExists('imb');
    }
}
