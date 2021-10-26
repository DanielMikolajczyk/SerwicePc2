<?php

namespace App\Services;

use App\Models\Client;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Image;
use Arr;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class ClientService
{
  public function create(array $data): Client
  {
    if(isset($data['image'])){
      $imagePath = $this->saveImage(Client::getNextId(), $data['image']);
      $data = Arr::except($data,['image']);
    }
   return Client::firstOrCreate($data + [
     'image_url'  => $imagePath ?? null
   ]);
  }

  public function update(int $id, array $data): Client
  {
    Client::findOrFail($id)->update($data);
    return Client::findOrFail($id);
  }

  public function delete(int $id): void
  {
    Client::findOrFail($id)->delete();
  }

  public function deleteTypeClient(int $id): void
  {
    Client::where('type_id',$id)->delete();
  }

  public function saveImage(int $nextId, UploadedFile $image)
  {
    $imageDirectory = public_path().'/storage/images/clients/'.$nextId;
    if(!File::exists($imageDirectory)){
      File::makeDirectory($imageDirectory,0777,true);
    }
    $uniqueFileName = '/'.time().'-'.$image->getClientOriginalName();
    $imagePath = $imageDirectory . $uniqueFileName;
    Image::make($image)->resize(260,260)->save($imagePath);
    return 'storage/images/clients/'. $nextId . $uniqueFileName;
  }


  /*
  * Filter results to display on index page
  */
  public function filterIndexPage(Request $request): LengthAwarePaginator
  {
    if(empty($request->validated())){
      return Client::orderBy('created_at','desc')->paginate(25);
    }

    $clients = Client::when($request->query('phone'),function($query,$value){
      return $query->where('phone_number',$value);
    })->when($request->query('client_name'),function($query,$value){
      //Split client_name to first and last name
      $fullName = explode(' ',$value);
      return $query->where('first_name',$fullName[0])->where('last_name',$fullName[1]);
    })->orderBy('created_at','desc')
      ->paginate(25);

    return $clients;
  }
}