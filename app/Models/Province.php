<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    
    protected $table = 'msprovince';
    protected $primaryKey = 'province_id';

  /*  public function province()
    {
        return $this->morphMany('user_location', 'area');
    }*/
}
