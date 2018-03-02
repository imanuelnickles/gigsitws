<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecommendedAlbum extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('MsRecommendedAlbum', function (Blueprint $table) {
            $table->increments('recommended_album_id');
            $table->integer('album_id')->unsigned()->unique();
            

            //Foreign Key
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
        Schema::drop('MsRecommendedAlbum');
    }
}
