<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSliderAds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('MsSliderAds', function (Blueprint $table) {
            $table->increments('slider_ads_id');
            $table->string('slider_ads_picture');
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
        Schema::drop('MsSliderAds');
    }
}
