<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class user_music_activity extends Model
{
    //
    public $timestamps = false;
    protected $table = 'trlisteneractivity';
    protected $primaryKey = 'listener_activity_id';
    protected $fillable = ['listener_id','song_id','listen_date'];

    public function listener()
    {
        return $this->belongsTo('App\models\Listener');
    }
}
