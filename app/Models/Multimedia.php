<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Multimedia extends Model
{
    protected $fillable =[
      'name', 'path', 'escort_id',
    ];

    public function escort()
    {
      return $this->belongsTo('App\Models\Escort');
    }
}
