<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program', function (Blueprint $table) {
            $table->id();
            $table->string('heading', 255);
            $table->string('sub_heading', 255);
            $table->string('title1', 255);
            $table->string('title2', 255);
            $table->string('title3', 255);
            $table->string('subtitle1', 255);
            $table->string('subtitle2', 255);
            $table->string('subtitle3', 255);
            $table->string('icon_program1', 50);
            $table->string('icon_program2', 50);
            $table->string('icon_program3', 50);
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
        Schema::dropIfExists('program');
    }
}
