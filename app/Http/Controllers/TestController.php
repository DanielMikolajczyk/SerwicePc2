<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;


class TestController extends Controller
{
  public function test()
  {
    Storage::disk('local')->put('example.txt', 'Contents');
    return view('tes/test');
  }

  public function testPost(Request $request)
  {
    //weź z requesta
    $originalImage= $request->photo;
    //stwórz instancje
    $thumbnailImage = Image::make($originalImage);
    //stwórz ścieżkę do public path storage
    $storagePath = public_path().'/storage/';
    //resize
    $thumbnailImage->resize(150,150);
    //zapisz w storage z unikalną nazwą
    $thumbnailImage->save($storagePath.time().$originalImage->getClientOriginalName());
  }
}
