<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
  public function index()
  {
      $countries = Country::orderBy('country_name', 'ASC')->paginate(10);
      return view('dashboard.country.index', compact('countries'));
  }//index view


  public function store(Request $request)
  {
      $country                   = new Country();
      $country->continent_name   = $request->continent_name;
      $country->country_name     = $request->country_name;
      $country->save();

      return redirect()
        ->route('dashboard.country.index');
  }

  public function update(Request $request, $id)
  {
      $country                   = Country::find($id);
      $country->continent_name   = $request->continent_name;
      $country->country_name     = $request->country_name;
      $country->save();
      return redirect()
        ->route('dashboard.country.index');
  }

  public function delete($id)
  {
      $country = Country::find($id);
      $country->delete();
      return redirect()
        ->route('dashboard.country.index');
  }
}
