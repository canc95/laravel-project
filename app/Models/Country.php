<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable =[
      'continent_name', 'country_name'
    ];

    public function states()
    {
      return $this->hasMany('App\Models\State');
    }
}
