<?php

namespace App\Http\Controllers;

use App\Models\Escort;
use App\Models\Role;
use App\User;
use App\Models\State;
use App\Models\Plan;
use App\Models\Multimedia;
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

        $sorters = [
            'age',
        ];

        $ranges = [
            'height',
        ];

        $filters = [
            'gender', 'eye_color',
        ];

        $escorts = Escort::get();

        if(count($request->all()) > 0) {
            foreach ($filters as $filter) {
                if (array_has($request->all(), $filter)) {
                    $escorts = $escorts->where($filter, $request[$filter]);
                }
            }
            foreach ($sorters as $sorter) {
                if (array_has($request->all(), $sorter)) {
                    $escorts = $request[$sorter] == 'DESC' ? $escorts->sortByDesc($sorter) : $escorts->sortBy($sorter);
                }
            }
            foreach ($ranges as $range) {
                if (array_has($request->all(), $range)) {
                    $values = explode(',', $request[$range]);
                    $min = $values[0];
                    $max = $values[1];
                    $escorts = $escorts->where($range, '>=', $min);
                    $escorts = $escorts->where($range, '<=', $max);
                }
            }
            $escorts = $this->custom_paginate($escorts, 10);
        } else {
            $escorts = Escort::paginate(10);
        }

        return view ('escort.index', compact('escorts'));
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
          $photo_1           = 'photo-' . $request->last_name.  '-'. $request->age. '-'. $request->nationality .'-' .$request->first_name. '1.' . $request->file('photo_1')->getClientOriginalExtension();

          Storage::putFileAs('/public/escorts/photos', new File($request->file('photo_1')), $photo_1);

          $escort->photo_1     = $photo_1;
        }
        $escort->save();
        $escort          = Escort::orderBy('id', 'desc')->first();
        $id              = $escort->id;

        if ($request->hasFile('photos_extras')) {

          $photos = $request->file('photos_extras');

          foreach ($photos as $file) {

            $name = $file ->getClientOriginalName();
            $name = strtolower(str_replace(' ', '', $name));
            $path = $file->hashName();
            $photo = Image::make($file);

            Storage::put("/public/images/{$path}", (string) $photo->encode());

            $multimedia = new Multimedia;
            $multimedia->name      = $name;
            $multimedia->path      = $path;
            $multimedia->escort_id = $id;
            $multimedia->save();
          }
        }

        $user_role = Auth::user()->id;
        $user      = User::find($user_role);
        $user->syncRoles('escort');
        // $user->assignRole('escort');
        $escort->save();

        return redirect()
          ->route('escort.show', $id);
    }

    public function show($id)
    {
        $escort = Escort::find($id);
        $state  = State::get();
        $escort->load('multimedias');
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
        $photo_1           = 'photo-' . $request->last_name.  '-'. $request->age. '-'. $request->nationality .'-' .$request->first_name. '1.' . $request->file('photo_1')->getClientOriginalExtension();

        Storage::putFileAs('/public/escorts/photos', new File($request->file('photo_1')), $photo_1);

        $escort->photo_1     = $photo_1;
      }

      if ($request->hasFile('photos_extras')) {

        $photos = $request->file('photos_extras');

        foreach ($photos as $file) {

          $name = $file ->getClientOriginalName();
          $name = strtolower(str_replace(' ', '', $name));
          $path = $file->hashName();
          $photo = Image::make($file);

          Storage::put("/public/images/{$path}", (string) $photo->encode());

          $multimedia = new Multimedia;
          $multimedia->name      = $name;
          $multimedia->path      = $path;
          $multimedia->escort_id = $id;
          $multimedia->save();
        }
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
}
