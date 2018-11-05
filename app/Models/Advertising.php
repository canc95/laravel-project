<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advertising extends Model
{
  protected $fillable =[
    'link', 'duration', 'price'
  ];
}
