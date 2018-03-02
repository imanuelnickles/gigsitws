<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    //
      public $timestamps = false;
    protected $table = 'msartist';
    protected $primaryKey='artist_id';

    protected $fillable = [
        'user_id','artist_name', 'artist_bio','artist_picture','status','join_date'
    ];

    public function album(){
    	 return $this->hasMany('App\Models\Album');
    }

    public function userid()
    {
        return $this->belongsTo('User','user_id');
    }
    
}
