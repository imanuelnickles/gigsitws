<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class album extends Model
{
    //
    public $timestamps = false;
    protected $table = 'msalbum';
    protected $primaryKey = 'album_id';
    protected $fillable = [
         'artist_id','album_title','album_picture','album_content','genre','release_date','status'
    ];

    public function songId(){
    	 return $this->hasMany('App\Models\Song');
    }

    public function artist(){
        return $this->belongsTo('App\Models\Artist');
    }
    
}
