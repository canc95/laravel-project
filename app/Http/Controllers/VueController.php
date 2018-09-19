<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;

class VueController extends Controller
{
    public function countries()
    {
      $countries = Country::get();
      return response()->json(['countries' => $countries]);
    }

    public function states()
    {
      $states = State::get();
      return response()->json(['states' => $states]);
    }
}
