<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlaylistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TrPlaylist', function (Blueprint $table) {
            $table->increments('playlist_id');
            /*$table->integer('playlist_type_id')->unsigned();*/
            $table->string('playlist_name');
            $table->integer('playlist_content')->unsigned();
            $table->integer('listener_id')->unsigned();
           
            
            //Foreign Key
            //$table->foreign('playlist_type_id')->references('playlist_type_id')->on('MsPlaylistType')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('listener_id')->references('listener_id')->on('MsListener')->onDelete('cascade')->onUpdate('cascade');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('TrPlaylist');
    }
}
