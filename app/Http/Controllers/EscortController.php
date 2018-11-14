<?php

namespace App\Http\Controllers;

use App\Models\Escort;
use App\Models\Role;
use App\User;
use App\Models\State;
use App\Models\Plan;
use App\Models\Multimedia;
use App\Models\Advertising;
use Storage;
use Image;
use Auth;
use Input;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class EscortController extends Controller
{

    public function index(Request $request)
    {
        $escorts = Escort::get();
        $advertisings = Advertising::get();
        return view ('escort.index', compact('escorts', 'advertisings'));
    }

    public function create($id)
    {
        $plan = Plan::find($id);
        return view ('escort.create', compact('plan'));
    }

    public function store(Request $request, $id)
    {
        $plan                 = Plan::find($id);
        $escort               = new Escort();
        $escort->user_id      = Auth::user()->id;
        $escort->plan_id      = $request->plan_id;
        $escort->state_id     = $request->state_id;
        $escort->first_name   = $request->first_name;
        $escort->last_name    = $request->last_name;
        $birthday             = new Carbon ($request->birthday);
        $escort->age          = $request->$birthday == null ? $birthday->diffInYears(Carbon::now()):$request->age;
        $escort->passport     = $request->passport;
        $escort->birthday     = $request->birthday;
        $escort->gender       = $request->gender;
        $escort->country      = $request->country;
        $escort->nationality  = $request->nationality;
        $escort->etnia        = $request->etnia;
        $escort->height       = $request->height;
        $escort->eye_color    = $request->eye_color;
        $escort->hair_color   = $request->hair_color;
        $escort->weight       = $request->weight;
        $escort->breast       = $request->breast;
        $escort->waist        = $request->waist;
        $escort->hip          = $request->hip;
        $escort->service      = $request->service;
        $escort->phone        = $request->phone;
        $escort->description  = $request->description;
        $escort->status       = $request->status;
        $escort->last_updated = Auth::user()->id;

        if ($request->hasFile('photo_1')) {
          $photo_1           = 'photo-' . $request->last_name.  '-'. $request->passport. '-'. $request->nationality .'-' .$request->first_name. '1.' . $request->file('photo_1')->getClientOriginalExtension();

          Storage::putFileAs('/public/escorts/photos', new File($request->file('photo_1')), $photo_1);

          $escort->photo_1     = $photo_1;
        }
        if ($request->hasFile('photo_2')) {
          $photo_2           = 'photo-' . $request->last_name.  '-'. $request->passport. '-'. $request->nationality .'-' .$request->first_name. '2.' . $request->file('photo_2')->getClientOriginalExtension();

          Storage::putFileAs('/public/escorts/photos', new File($request->file('photo_2')), $photo_2);

          $escort->photo_2     = $photo_2;
        }
        if ($request->hasFile('photo_3')) {
          $photo_3           = 'photo-' . $request->last_name.  '-'. $request->passport. '-'. $request->nationality .'-' .$request->first_name. '3.' . $request->file('photo_3')->getClientOriginalExtension();

          Storage::putFileAs('/public/escorts/photos', new File($request->file('photo_3')), $photo_3);

          $escort->photo_3     = $photo_3;
        }
        if ($request->hasFile('photo_4')) {
          $photo_4           = 'photo-' . $request->last_name.  '-'. $request->passport. '-'. $request->nationality .'-' .$request->first_name. '4.' . $request->file('photo_4')->getClientOriginalExtension();

          Storage::putFileAs('/public/escorts/photos', new File($request->file('photo_4')), $photo_4);

          $escort->photo_4     = $photo_4;
        }
        if ($request->hasFile('photo_5')) {
          $photo_5           = 'photo-' . $request->last_name.  '-'. $request->passport. '-'. $request->nationality .'-' .$request->first_name. '5.' . $request->file('photo_5')->getClientOriginalExtension();

          Storage::putFileAs('/public/escorts/photos', new File($request->file('photo_5')), $photo_5);

          $escort->photo_5     = $photo_5;
        }

        $user_role = Auth::user()->id;
        $user      = User::find($user_role);
        $user->syncRoles('escorta');
        $escort->save();

        $escort_id = Escort::orderBy('id', 'desc')->first();

        return redirect()
          ->route('escort.show', $escort_id);
    }

    public function show($id)
    {
        $escort = Escort::find($id);
        $state  = State::get();
        // $escort->load('multimedias');
        return view ('escort.show', compact('escort', 'state'));
    }

    public function edit($id)
    {
        $escort = Escort::find($id);
        $this->authorize('pass', $escort);
        return view ('escort.edit', compact('escort'));
    }

    public function update(Request $request, $id)
    {
      $escort               = Escort::find($id);
      $escort->state_id     = $request->state_id;
      $escort->first_name   = $request->first_name;
      $escort->last_name    = $request->last_name;
      $birthday             = new Carbon ($request->birthday);
      $escort->age          = $request->$birthday == null ? $birthday->diffInYears(Carbon::now()):$request->age;
      $escort->passport     = $request->passport;
      $escort->birthday     = $request->birthday;
      $escort->country      = $request->country;
      $escort->gender       = $request->gender;
      $escort->nationality  = $request->nationality;
      $escort->etnia        = $request->etnia;
      $escort->height       = $request->height;
      $escort->eye_color    = $request->eye_color;
      $escort->hair_color   = $request->hair_color;
      $escort->weight       = $request->weight;
      $escort->breast       = $request->breast;
      $escort->waist        = $request->waist;
      $escort->hip          = $request->hip;
      $escort->service      = $request->service;
      $escort->phone        = $request->phone;
      $escort->description  = $request->description;
      $escort->status       = $request->status;
      $escort->last_updated = Auth::user()->id;

      if ($request->hasFile('photo_1')) {
        $photo_1           = 'photo-' . $request->last_name.  '-'. $request->passport. '-'. $request->nationality .'-' .$request->first_name. '1.' . $request->file('photo_1')->getClientOriginalExtension();

        Storage::putFileAs('/public/escorts/photos', new File($request->file('photo_1')), $photo_1);

        $escort->photo_1     = $photo_1;
      }
      if ($request->hasFile('photo_2')) {
        $photo_2           = 'photo-' . $request->last_name.  '-'. $request->passport. '-'. $request->nationality .'-' .$request->first_name. '2.' . $request->file('photo_2')->getClientOriginalExtension();

        Storage::putFileAs('/public/escorts/photos', new File($request->file('photo_2')), $photo_2);

        $escort->photo_2     = $photo_2;
      }
      if ($request->hasFile('photo_3')) {
        $photo_3           = 'photo-' . $request->last_name.  '-'. $request->passport. '-'. $request->nationality .'-' .$request->first_name. '3.' . $request->file('photo_3')->getClientOriginalExtension();

        Storage::putFileAs('/public/escorts/photos', new File($request->file('photo_3')), $photo_3);

        $escort->photo_3     = $photo_3;
      }
      if ($request->hasFile('photo_4')) {
        $photo_4           = 'photo-' . $request->last_name.  '-'. $request->passport. '-'. $request->nationality .'-' .$request->first_name. '4.' . $request->file('photo_4')->getClientOriginalExtension();

        Storage::putFileAs('/public/escorts/photos', new File($request->file('photo_4')), $photo_4);

        $escort->photo_4     = $photo_4;
      }
      if ($request->hasFile('photo_5')) {
        $photo_5           = 'photo-' . $request->last_name.  '-'. $request->passport. '-'. $request->nationality .'-' .$request->first_name. '5.' . $request->file('photo_5')->getClientOriginalExtension();

        Storage::putFileAs('/public/escorts/photos', new File($request->file('photo_5')), $photo_5);

        $escort->photo_5     = $photo_5;
      }

      $escort->save();

      return redirect()
        ->route('escort.show', $id);
    }

    public function destroy(Escort $escort)
    {
        $escort = Escort::find($id);
        $escort->status = '0';

        return view('dashboard.escort.dashboard');
    }

    public function admin_update(Request $request, $id)
    {
      $escort          = Escort::find($id);
      $escort->status = $request->status;
      $escort->save();

      return redirect()
        ->route('dashboard.escort.dashboard');
    }

    public function dashboard ()
    {
      $escorts = Escort::orderBy('id', 'ASC')->paginate(7);
      return view ('dashboard.escort.dashboard', compact('escorts'));
    }

    private function custom_paginate($items, $perPage = 15, $page = null, $options = [])
    {
    	$page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
    	$items = $items instanceof Collection ? $items : Collection::make($items);
    	return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    public function my_escorts($id)
    {
      $id = Auth::user()->id;
      $escorts = Escort::where('user_id', $id)->get();
      return view('Escort.my_escorts', compact('escorts'));
    }
}
