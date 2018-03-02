<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class slider_ads extends Model
{
    //Role
    protected $table = 'mssliderads';
    protected $primaryKey='slider_ads_id';
    protected $fillable = ['slider_ads_picture','user_id','created_at','updated_at'];

    public function user(){
    	return $this->belongsTo('App\Models\User','user_id');
    } 

}  
