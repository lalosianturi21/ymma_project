<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataTahunansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_tahunan', function (Blueprint $table) {
            $table->id();
            $table->integer('tahun');
            $table->string('icon1', 50);
            $table->string('icon2', 50);
            $table->string('icon3', 50);
            $table->string('nama_data1', 255);
            $table->string('nama_data2', 255);
            $table->string('nama_data3', 255);
            $table->integer('total_data1');
            $table->integer('total_data2');
            $table->integer('total_data3');
            $table->string('slug');
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
        Schema::dropIfExists('data_tahunan');
    }
}
