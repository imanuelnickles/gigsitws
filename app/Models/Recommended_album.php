<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class recommended_album extends Model
{
    //Role
    public $timestamps = false;
    protected $table = 'msrecommendedalbum';
    protected $primaryKey='recommended_album_id';
	protected $fillable = [
         'album_id'
    ];
    public function album(){
    	return $this->belongsTo('App\Models\Album');
    } 
    
}
