<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use App\Models\Escort;
use App\Models\Advertising;

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

    public function escorts()
    {
      $escorts = Escort::where('status', 1)->get();
      return response()->json(['escorts' => $escorts]);
    }
    public function advertisinglinks()
    {
      $advertisinglinks = Advertising::where('escort_id')->get();
      dd($advertisinglinks);
      return response()->json(['advertisingLinks' => $advertisinglinks]);
    }
    public function advertisingescorts()
    {
      $advertisingescorts = Advertising::where('link')->get();
      return response()->json(['advertisingEscorts' => $advertisingescorts]);
    }
}
