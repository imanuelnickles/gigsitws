<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailPlaylist extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TrDetailPlaylist', function (Blueprint $table) {
            //
            $table->increments('playlist_detail_id');
            $table->integer('playlist_id')->unsigned();
            $table->integer('song_id')->unsigned();

            //Foreign Key
            $table->foreign('playlist_id')->references('playlist_id')->on('TrPlaylist')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('song_id')->references('song_id')->on('MsSong')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('TrDetailPlaylist');
    }
}
