<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Alert;

class TestController extends Controller
{
  public $sidebarActive = 'Akcesoria';

  public function test()
  {
    
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
