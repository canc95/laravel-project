<?php

namespace App\Http\Controllers;

use App\Models\Escort;
use Storage;
use Illuminate\Http\File;
use Illuminate\Http\Request;

class EscortController extends Controller
{

    public function index()
    {
        $escorts   = Escort::orderBy('id', 'asc')->paginate(9);
        return view ('escort.index', compact('escorts'));
    }

    public function create()
    {
        return view ('escort.create');
    }

    public function store(Request $request)
    {
        $escort               = new Escort();
        $escort->first_name   = $request->first_name;
        $escort->last_name    = $request->last_name;
        $escort->age          = $request->age;
        $escort->birthday     = $request->birthday;
        $escort->gender       = $request->gender;
        $escort->country      = $request->country;
        $escort->state        = $request->state;
        $escort->nationality  = $request->nationality;
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

        if ($request->hasFile('photo_1')) {
          $photo_1           = 'photo-' . $request->last_name.  '-'. $request->age. '-'. $request->nationality .'-' .$request->first_name. '1.' . $request->file('photo_1')->getClientOriginalExtension();

          Storage::putFileAs('/public/escorts/photos', new File($request->file('photo_1')), $photo_1);

          $escort->photo_1     = $photo_1;
        }
        if ($request->hasFile('photo_2')) {
          $photo_2           = 'photo-' . $request->last_name. '-'. $request->age. '-'. $request->nationality .'-' .$request->first_name. '2.' . $request->file('photo_2')->getClientOriginalExtension();

          Storage::putFileAs('/public/escorts/photos', new File($request->file('photo_2')), $photo_2);

          $escort->photo_2     = $photo_2;
        }
        if ($request->hasFile('photo_3')) {
          $photo_3           = 'photo-' . $request->last_name. '-'. $request->age. '-'. $request->nationality .'-' .$request->first_name. '3.' . $request->file('photo_3')->getClientOriginalExtension();

          Storage::putFileAs('/public/escorts/photos', new File($request->file('photo_3')), $photo_3);

          $escort->photo_3     = $photo_3;
        }
        if ($request->hasFile('photo_4')) {
          $photo_4           = 'photo-' . $request->last_name. '-'. $request->age. '-'. $request->nationality .'-' .$request->first_name. '4.' . $request->file('photo_4')->getClientOriginalExtension();

          Storage::putFileAs('/public/escorts/photos', new File($request->file('photo_4')), $photo_4);

          $escort->photo_4     = $photo_4;
        }
        if ($request->hasFile('photo_5')) {
          $photo_5           = 'photo-' . $request->last_name. '-'. $request->age. '-'. $request->nationality .'-' .$request->first_name. '5.' . $request->file('photo_5')->getClientOriginalExtension();

          Storage::putFileAs('/public/escorts/photos', new File($request->file('photo_5')), $photo_5);

          $escort->photo_5     = $photo_5;
        }

        $escort->save();

        return redirect()
          ->route('escort.index');
    }

    public function show($id)
    {
        $escort = Escort::find($id);
        return view ('escort.show', compact('escort'));
    }

    public function edit($id)
    {
        $escort = Escort::find($id);
        return view ('escort.edit', compact('escort'));
    }

    public function update(Request $request, $id)
    {
      $escort               = Escort::find($id);
      $escort->first_name   = $request->first_name;
      $escort->last_name    = $request->last_name;
      $escort->age          = $request->age;
      $escort->birthday     = $request->birthday;
      $escort->country      = $request->country;
      $escort->state        = $request->state;
      $escort->gender       = $request->gender;
      $escort->nationality  = $request->nationality;
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

    
      if ($request->hasFile('photo_1')) {
        $photo_1           = 'photo-' . $request->last_name.  '-'. $request->age. '-'. $request->nationality .'-' .$request->first_name. '1.' . $request->file('photo_1')->getClientOriginalExtension();

        Storage::putFileAs('/public/escorts/photos', new File($request->file('photo_1')), $photo_1);

        $escort->photo_1     = $photo_1;
      }
      if ($request->hasFile('photo_2')) {
        $photo_2           = 'photo-' . $request->last_name. '-'. $request->age. '-'. $request->nationality .'-' .$request->first_name. '2.' . $request->file('photo_2')->getClientOriginalExtension();

        Storage::putFileAs('/public/escorts/photos', new File($request->file('photo_2')), $photo_2);

        $escort->photo_2     = $photo_2;
      }
      if ($request->hasFile('photo_3')) {
        $photo_3           = 'photo-' . $request->last_name. '-'. $request->age. '-'. $request->nationality .'-' .$request->first_name. '3.' . $request->file('photo_3')->getClientOriginalExtension();

        Storage::putFileAs('/public/escorts/photos', new File($request->file('photo_3')), $photo_3);

        $escort->photo_3     = $photo_3;
      }
      if ($request->hasFile('photo_4')) {
        $photo_4           = 'photo-' . $request->last_name. '-'. $request->age. '-'. $request->nationality .'-' .$request->first_name. '4.' . $request->file('photo_4')->getClientOriginalExtension();

        Storage::putFileAs('/public/escorts/photos', new File($request->file('photo_4')), $photo_4);

        $escort->photo_4     = $photo_4;
      }
      if ($request->hasFile('photo_5')) {
        $photo_5           = 'photo-' . $request->last_name. '-'. $request->age. '-'. $request->nationality .'-' .$request->first_name. '5.' . $request->file('photo_5')->getClientOriginalExtension();

        Storage::putFileAs('/public/escorts/photos', new File($request->file('photo_5')), $photo_5);

        $escort->photo_5     = $photo_5;
      }

      $escort->save();

      return redirect()
        ->route('escort.index');
    }

    public function destroy(Escort $escort)
    {
        $escort = Escort::find($id);
        $escort->delete();

        return view('escort.index');
    }

    public function dashboard ()
    {
      $escorts = Escort::get();
      return view ('escort.dashboard', compact('escorts'));
    }
}
