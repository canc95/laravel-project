<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use Image;
use Auth;
use Input;
use Illuminate\Http\File;
use App\Models\Advertising;

class AdvertisingController extends Controller
{
  public function index()
  {
    $advertisings = Advertising::orderBy('id', 'desc')->paginate(6);
    return view('dashboard.advertising.index', compact('advertisings'));
  }
  public function create()
  {
    return view('dashboard.advertising.create');
  }
  public function store(Request $request)
  {
    $advertising           = new Advertising();
    $advertising->link     = $request->link;
    $advertising->duration = $request->duration;
    $advertising->price    = $request->price;

    if ($request->hasFile('photo')) {
      $photo           = 'photo-' . $request->link. '-1.' . $request->file('photo')->getClientOriginalExtension();

      Storage::putFileAs('/public/advertisings/photos', new File($request->file('photo')), $photo);

      $advertising->photo   = $photo;
    }
    $advertising->save();
    return redirect()
      ->route('escort.index');
  }
  public function edit($id)
  {
    $advertising = Advertising::find($id);
    return view('dashboard.advertising.edit', compact('advertising'));
  }
  public function update(Request $request, $id)
  {
    $advertising           = Advertising::find($id);
    $advertising->link     = $request->link;
    $advertising->duration = $request->duration;
    $advertising->price    = $request->price;

    if ($request->hasFile('photo')) {
      $photo           = 'photo-' . $request->link. '-1.' . $request->file('photo')->getClientOriginalExtension();

      Storage::putFileAs('/public/advertisings/photos', new File($request->file('photo')), $photo);

      $advertising->photo   = $photo;
    }
    $advertising->save();
    return redirect()
      ->route('escort.index')
  }
  public function buy()
  {

  }
}
