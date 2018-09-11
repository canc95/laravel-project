<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = [
      'name',
      'description',
      'description',
      'price'
    ];

    public function escorts()
    {
      return $this->hasMany('App\Models\Escort');
    }
}
