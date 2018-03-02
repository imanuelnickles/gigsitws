<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class playlist extends Model
{
    //
    public $timestamps = false;
    protected $table = 'trplaylist';
    protected $primaryKey = 'playlist_id';
    protected $fillable = ['playlist_name','playlist_content','listener_id'];

    public function playlistDetail()
    {
         return $this->hasMany('App\Models\Playlist_detail');
    }
}
