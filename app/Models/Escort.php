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
      'passport',
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
  public function multimedias ()
  {
    return $this->hasMany('App\Models\Multimedia');
  }
  public function plan()
  {
    return $this->belongsTo('App\Models\Plan');
  }
  public function state()
  {
    return $this->belongsTo('App\Models\Country');
  }
}
