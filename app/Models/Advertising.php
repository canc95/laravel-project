<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advertising extends Model
{
  protected $fillable =[
    'name', 'link', 'escort_id',
  ];
}
