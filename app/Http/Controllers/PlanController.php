<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Auth;
use Illuminate\Http\Request;

class PlanController extends Controller
{
  public function index()
  {
      $plans = Plan::orderBy('price', 'ASC')->paginate(6);
      return view('dashboard.plan.index', compact('plans'));
  }//index view


  public function store(Request $request)
  {
      $plan               = new Plan();
      $plan->name         = $request->name;
      $plan->description  = $request->description;
      $plan->duration     = $request->duration;
      $plan->price        = $request->price;
      $plan->last_updated = Auth::user()->id;
      $plan->save();

      return redirect()
        ->route('dashboard.plan.index');
  }

  public function update(Request $request, $id)
  {
      $plan               = Plan::find($id);
      $plan->name         = $request->name;
      $plan->description  = $request->description;
      $plan->duration     = $request->duration;
      $plan->price        = $request->price;
      $plan->last_updated = Auth::user()->id;
      $plan->save();
      return redirect()
        ->route('dashboard.plan.index');
  }

  public function delete($id)
  {
      $plan = Plan::find($id);
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
