<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  use HasFactory;

  protected $fillable = [
    'client_id', 'status_id', 'type_id',
    'serial_number', 'part_number', 'code',
    'manufacturer', 'model', 'paid',
    'deadline', 'issue_description', 'visual_description',
    'image_url', 'comment'
  ];

  public function accessories()
  {
    return $this->hasMany(Accessory::class);
  }

  public function client()
  {
    return $this->belongsTo(Client::class);
  }
  
  public function diagnoses()
  {
    return $this->belongsToMany(Diagnose::class)->withPivot('decision');
  }

  public function status()
  {
    return $this->belongsTo(OrderStatus::class, 'status_id');
  }

  public function type()
  {
    return $this->belongsTo(OrderType::class);
  }

  public function getCreatedAtAttribute($value)
  {
    return Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('Y-m-d');
  }

  /*
  * Get id of the next row in the database.
  */
  public static function getNextId(): int
  {
    return Order::orderBy('id','desc')->first()->id + 1;
  }

  /*
  * Get ids of the diagnoses, linked to specific order 
  * if parameter is 1, filter with decision = 1 
  */
  public function getDiagnosesIds(int $decision = 0)
  {
    return $this->diagnoses->when($decision == 1, function($query){
      return $query->reject(function($value){
        return !$value->pivot->decision;
      });
    })->pluck('id')->toArray(); 
  }
  
}
