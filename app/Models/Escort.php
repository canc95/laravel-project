<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Escort extends Model implements HasMedia
{
  use HasMediaTrait;
    protected $fillable = [
      'first_name',
      'last_name',
      'age',
      'birthday',
      'gender',
      'country',
      'state',
      'nationality',
      'height',
      'eye_color',
      'hair_color',
      'weight',
      'breast',
      'waist',
      'hip',
      'service',
      'phone',
      'description',
      'status'
    ];

  public function user()
  {
    return $this->belongsTo('App\User');
  }
  public function plan()
  {
    return $this->belongsTo('App\Models\Plan');
  }
}
