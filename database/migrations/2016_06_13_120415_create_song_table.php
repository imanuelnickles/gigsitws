<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('MsSong', function (Blueprint $table) {
            $table->increments('song_id');
            //$table->integer('song_price_id')->unsigned();
            $table->integer('album_id')->unsigned();
            $table->string('song_title');
            //$table->time('song_duration');
            $table->string('song_file');
           

        
            //Foreign Key
            //$table->foreign('song_price_id')->references('song_price_id')->on('MsSongPrice')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('album_id')->references('album_id')->on('MsAlbum')->onDelete('cascade')->onUpdate('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('MsSong');
    }
}
