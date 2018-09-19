<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Models\Country;
use Illuminate\Http\Request;

class StateController extends Controller
{
  public function index()
  {
      $states = State::orderBy('country_id', 'ASC')->paginate(10);
      $countries = Country::all();
      return view('dashboard.state.index', compact('states', 'countries'));
  }//index view


  public function store(Request $request)
  {
      $state               = new State();
      $state->country_id   = $request->country_id;
      $state->name         = $request->name;
      $state->save();

      return redirect()
        ->route('dashboard.state.index');
  }

  public function update(Request $request, $id)
  {
      $state               = State::find($id);
      $state->country_id   = $request->country_id;
      $state->name         = $request->name;
      $state->save();
      return redirect()
        ->route('dashboard.state.index');
  }

  public function delete($id)
  {
      $state = State::find($id);
      $state->delete();
      return redirect()
        ->route('dashboard.state.index');
  }
}
