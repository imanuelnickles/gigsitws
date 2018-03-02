<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('MsAlbum', function (Blueprint $table) {
            $table->increments('album_id');
            $table->integer('artist_id')->unsigned();
            $table->string('album_title');
            //$table->time('album_duration');
            $table->string('album_picture');
            $table->integer('album_content')->unsigned();
            $table->string('genre');
            $table->date('release_date');
            $table->integer('status')->unsigned();

        
            //Foreign Key
            $table->foreign('artist_id')->references('artist_id')->on('MsArtist')->onDelete('cascade')->onUpdate('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('MsAlbum');
    }
}
