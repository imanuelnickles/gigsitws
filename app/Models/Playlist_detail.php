<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class playlist_detail extends Model
{
    //
    public $timestamps = false;
    protected $table = 'trdetailplaylist';
    protected $primaryKey = 'playlist_detail_id';
    protected $fillable = ['playlist_detail_id','playlist_id','song_id'];

    public function song()
    {
        return $this->belongsTo('App\Models\Song');
    }

    
}
