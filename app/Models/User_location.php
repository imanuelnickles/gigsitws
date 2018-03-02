<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class user_location extends Model
{
	public $timestamps = false;
    //User Location
    protected $table = 'truserlocation';
    protected $primaryKey = 'user_location_id';

    protected $fillable = ['listener_id','province_id','city_id'];

    public function userid()
    {
        return $this->belongsTo('MsListener','listener_id');
    }
    public function city()
    {
        return $this->belongsTo('city','city_id');
    }
    public function province()
    {
        return $this->belongsTo('province','province_id');
    }
}
