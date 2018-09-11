<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Multimedia;
use App\Models\Escort;
use Storage;
use Image;
use Input;

class MultimediaController extends Controller
{
    public function upload (Request $request, $id)
    {
      $photos = $request->file('photos_extras');

      foreach ($photos as $file) {

        $name = $file ->getClientOriginalName();
        $name = strtolower(str_replace(' ', '', $name));
        $path = $file->hashName();
        $photo = Image::make($file);

        Storage::put("/public/images/{path}", (string) $photo->encode());

        $multimedia = new Multimedia;
        $multimedia->name      = $name;
        $multimedia->path      = $path;
        $multimedia->escort_id =
        $multimedia->save();
      }

      return redirect ()
        ->route('Escort.show');
    }
}
