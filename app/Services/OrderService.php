<?php

namespace App\Services;

use App\Models\Order;
use File;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Image;

class OrderService
{
  public function create(array $data): Order
  {
    $data['code'] = $this->generateOrderCode();
    if(isset($data['image'])){
      $imageDirectory = $this->saveImage(Order::getNextId(), $data['image']);
    }
    return Order::create($data + [
      'status_id'     => 1,
      'paid'          => 0,
      'image_url'     => $imageDirectory ?? null
    ]);
  }

  public function update(int $id, array $data): void
  {
    $order = Order::findOrFail($id);
    $order->update($data);

    if(array_key_exists('diagnoses',$data)){
      $order->diagnoses()->sync($data['diagnoses']);
    }
    
    if(array_key_exists('decisions',$data)){
      $order->diagnoses->map(function($value){
        return $value->pivot->update(['decision' => 0]);
      });
      
      $order->diagnoses()->updateExistingPivot($data['decisions'],['decision' => 1]);
    }
  }

  public function destroy(int $id): void
  {
    Order::destroy($id);
  }
    
  /*
  * Generate new order code.
  */
  public function generateOrderCode(): int
  {
    return Order::all()->sortByDesc('id')->first()->id;
  }

  /*
  * Delete all orders, associated with given client id.
  */
  public function deleteClientOrders(int $id): void
  {
    Order::where('client_id', $id)->delete();
  }
  
  /*
  * Delete all orders, associated with given order type id.
  */
  public function deleteTypeOrders(int $id): void
  {
    Order::where('type_id', $id)->delete();
  }

  /*
  * Delete all orders, associated with given order status id.
  */
  public function deleteStatusOrders(int $id): void
  {
    Order::where('status_id', $id)->delete();
  }
  
  /*
  * Store uploaded image to the database
  */
  public function saveImage(int $nextId, array $images): string
  {
    $imageDirectory = public_path().'/storage/images/orders/'.$nextId;
    if(!File::exists($imageDirectory)){
      File::makeDirectory($imageDirectory, 0777, true);
    }
    foreach($images as $image){
      $imagePath = $imageDirectory.'/'.time().'-'.$image->getClientOriginalName();
      Image::make($image)->save($imagePath);
    }
    return 'storage/images/orders/'.$nextId;
  }

  /*
  * Filter results to display on index page
  */
  public function filterIndexPage(Request $request): LengthAwarePaginator
  {
    //If there is no filters return default view
    if(empty($request->validated())){
      return Order::orderBy('deadline','desc')->paginate(25);
    }
    
    $orders = Order::when($request->query('code'), function($query,$value){
      return $query->where('code',$value);
    })->when($request->query('deadline'), function($query,$value){
      return $query->where('deadline',$value);
    })->when($request->query('status'), function($query,$value){
      return $query->where('status_id',$value);
    })->when($request->query('type'), function($query,$value){
      return $query->where('type_id',$value);
    })->when($request->query('client_name'), function($query,$value){
      //Split input for first and last name
      //Then query the relationship
      $fullName = explode(' ',$value);
      return $query->whereHas('client',function(Builder $query) use ($fullName){
        return $query->where('first_name',$fullName[0])->where('last_name',$fullName[1]);
      });
    })->orderBy('deadline','desc')
      ->paginate(25);

    return $orders;
  }
}
