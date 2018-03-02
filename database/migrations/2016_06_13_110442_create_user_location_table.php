<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserLocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TrUserLocation', function (Blueprint $table) {
            $table->increments('user_location_id');
            $table->integer('listener_id')->unsigned();
            $table->integer('province_id')->unsigned();
            $table->integer('city_id')->unsigned();
            

            //Foreign Key
            $table->foreign('listener_id')->references('listener_id')->on('MsListener')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('province_id')->references('province_id')->on('MsProvince')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('city_id')->references('city_id')->on('MsCity')->onDelete('cascade')->onUpdate('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('TrUserLocation');
    }
}
