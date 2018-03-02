<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('MsArtist', function (Blueprint $table) {
            $table->increments('artist_id');
            $table->integer('user_id')->unsigned();
           
            $table->string('artist_name');
            /*$table->string('artist_bio')->nullable();*/
            $table->string('artist_picture')->nullable();
            $table->integer('status')->unsigned();
            $table->date('join_date');

            //Foreign Key
            $table->foreign('user_id')->references('user_id')->on('MsUser')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Msartist');
    }
}
