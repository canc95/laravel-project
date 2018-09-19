<?php

namespace App\Http\Controllers;

use App\Models\Escort;
use App\Models\Multimedia;
use Storage;
use Image;
use Input;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Carbon\Carbon;


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
        $escort->user_id      = User::orderBy('id', 'desc')->first()->id;
        $escort->plan_id      = '2';
        $escort->country_id   = $request->country_id;
        $escort->first_name   = $request->first_name;
        $escort->last_name    = $request->last_name;
        $escort->age          = $request->$birthday->diffInYears(Carbon::now());
        $escort->passport     = $request->passport;
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
        $escort->save();
        $escort          = Escort::orderBy('id', 'desc')->first();
        $id              = $escort->id;

        if ($request->hasFile('photos_extras')) {
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

    public function show($id)
    {
        $escort = Escort::find($id);
        $escort->load('multimedias');
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
      $escort->age          = $request->$birthday->diffInYears(Carbon::now());
      $escort->passport     = $request->passport;
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
}
