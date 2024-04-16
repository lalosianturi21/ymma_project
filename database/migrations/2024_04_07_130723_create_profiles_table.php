<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile', function (Blueprint $table) {
            $table->id();
            $table->string('heading', 255);
            $table->string('sub_heading', 255);
            $table->string('nama', 255);
            $table->text('description1');
            $table->text('description2');
            $table->string('program1', 255);
            $table->string('program2', 255);
            $table->string('program3', 255);
            $table->string('program4', 255);
            $table->string('program5', 255);
            $table->string('program6', 255);
            $table->string('link_yt', 255);
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
        Schema::dropIfExists('profiles');
    }
}
