<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListenerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('MsListener', function (Blueprint $table) {
            //
            $table->increments('listener_id');
            $table->integer('user_id')->unsigned();
            $table->string('gender');
            $table->string('listener_picture')->nullable();
            $table->date('listener_bod');

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
        Schema::drop('MsListener');
        
       
    }
}
