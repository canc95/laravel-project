<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
  public function index()
  {
      $plans = Country::get()->paginate(6);
      return view('dashboard.plan.index', compact('plans'));
  }//index view


  public function store(Request $request)
  {
      $plan               = new Country();
      $plan->name         = $request->name;
      $plan->description  = $request->description;
      $plan->duration     = $request->duration;
      $plan->price        = $request->price;
      $plan->save();

      return redirect()
        ->route('dashboard.plan.index');
  }

  public function update(Request $request, $id)
  {
      $plan               = Country::find($id);
      $plan->name         = $request->name;
      $plan->description  = $request->description;
      $plan->duration     = $request->duration;
      $plan->price        = $request->price;
      $plan->save();
      return redirect()
        ->route('dashboard.plan.index');
  }

  public function destroy($id)
  {
      $plan = Country::find($id);
      $plan->delete();
      return redirect()
        ->route('dashboard.plan.index');
  }

  public function pickplan()
  {
    $plans = Plan::get();
    return view ('dashboard.plan.pickplan', compact('plans'));
  }
}
