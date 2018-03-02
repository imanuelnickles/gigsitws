<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //
    protected $table = 'mscity';
    protected $primaryKey = 'city_id';
/*
    public function city()
    {
        return $this->morphMany('user_location', 'area');
    }
*/
    
    
}
