<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class song extends Model
{
    //
    public $timestamps = false;
    protected $table = 'mssong';
    protected $primaryKey='song_id';

    protected $fillable = [
         'song_price_id','album_id','song_title','song_file'
    ];

    public function album(){
    	return $this->belongsTo('App\Models\Album');
    } 

    public function activity(){
        return $this->hasMany('App\Models\User_music_activity');
    } 

}
