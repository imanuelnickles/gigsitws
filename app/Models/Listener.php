<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\User_location;

class listener extends Model
{
    //
    public $timestamps = false;
    protected $table = 'mslistener';
    protected $primaryKey = 'listener_id';
    protected $fillable = ['user_id','gender','listener_picture','listener_bod'];

      public function userid()
    {
        return $this->belongsTo('User','user_id');
    }
  	
  	public function location()
    {
        return $this->belongsTo('User_location','listener_id');
    }
    
}
