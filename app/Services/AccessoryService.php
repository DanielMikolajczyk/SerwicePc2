<?php

namespace App\Services;

use App\Models\Accessory;
use File;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Image;

class AccessoryService
{
  public function create(int $orderId, array $accessories): void
  {
    foreach($accessories as $number=>$accessory){
      if(isset($accessory['image'])){
        $imageDirectory = $this->saveImage($orderId, $number ,$accessory['image']);
      }

      Accessory::create($accessory + [
        'order_id'  => $orderId,
        'image_url' => $imageDirectory ?? null
      ]);
    }
  }

  public function update(int $id, array $data): void
  {
    Accessory::findOrFail($id)->update($data);
  }

  public function delete(int $id): void
  {
    Accessory::findOrFail($id)->delete();
  }

  public function saveImage(int $orderId, int $accessoryNumber, array $images): string
  {
    $imageDirectory = public_path().'/storage/images/orders/'.$orderId.'/accessory'.$accessoryNumber;
    if(!File::exists($imageDirectory)){
      File::makeDirectory($imageDirectory, 0777, true);

      foreach($images as $image){
        $imagePath = $imageDirectory.'/'.time().'-'.$image->getClientOriginalName();
        Image::make($image)->save($imagePath);
      }
    }
    return 'storage/images/orders/'.$orderId.'/accessory'.$accessoryNumber;
  }

  /*
  * Filter results to display on index page
  */
  public function filterIndexPage(Request $request): LengthAwarePaginator
  {
    //If there is no filters return default view
    if(empty($request->validated())){
      return Accessory::orderBy('created_at','desc')->paginate(25);
    }

    $accessories = Accessory::when($request->query('name'), function ($query,$value){
      return $query->where('name',$value);
    })->when($request->query('order'), function ($query,$value){
      return $query->where('order_id',$value);
    })->when($request->query('client_name'), function($query,$value){
      //Access the client specified to the filtering accessories through the order relationship
      return $query->whereHas('order',function($query)use($value){
        return $query->whereHas('client',function($query)use($value){
          //Split the client_name to first and last name
          $fullName = explode(' ', $value);
          return $query->where('first_name',$fullName[0])->where('last_name',$fullName[1]);
        });
      });
    })->orderBy('created_at','desc')
      ->paginate(25);

    return $accessories;
  }
}