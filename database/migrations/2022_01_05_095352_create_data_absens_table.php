<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataAbsensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_absens', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('jadwal_siswa_id')->unsigned();
            $table->string('alfa')->nullable();
            $table->string('sakit')->nullable();
            $table->string('izin')->nullable();
            $table->string('terlambat')->nullable();
            $table->date('tanggal_absen')->nullable();
            $table->timestamps();

            $table->foreign('jadwal_siswa_id')->references('id')->on('jadwal_siswas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_absens');
    }
}
