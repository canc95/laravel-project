<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Escort;
use App\User;


class PublicController extends Controller
{
  public function block()
  {
    return view ('block');
  }
}
