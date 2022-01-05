<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwals', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('guru_id')->unsigned();
            $table->bigInteger('pelajaran_id')->unsigned();
            $table->string('hari')->nullable();
            $table->string('waktu')->nullable();
            $table->timestamps();

            $table->foreign('guru_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('pelajaran_id')->references('id')->on('mata_pelajarans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwals');
    }
}
