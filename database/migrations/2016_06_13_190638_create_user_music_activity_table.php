<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserMusicActivityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TrListenerActivity', function (Blueprint $table) {
            $table->increments('listener_activity_id');
            $table->integer('listener_id')->unsigned();
            $table->integer('song_id')->unsigned();
            $table->date('listen_date');

            //Foreign Key
            $table->foreign('listener_id')->references('listener_id')->on('MsListener')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('TrListenerActivity');
    }
}
