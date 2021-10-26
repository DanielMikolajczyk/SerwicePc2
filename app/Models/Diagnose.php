<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Diagnose extends Model
{
  use HasFactory;

  protected $fillable = [
    'name', 'description','price', 'type_id'
  ];

  public function orders()
  {
    return $this->belongsToMany(Order::class)->withPivot('decision');
  }
  
  public function type()
  {
    return $this->belongsTo(OrderType::class, 'type_id');
  }
  
  public function getPriceAttribute($value)
  {
    return number_format((float) $value / 100, 2, '.', '');
  }

  public function setPriceAttribute($value)
  {
    $value = Str::replace(',','.',$value);
    $this->attributes['price'] = $value * 100;
  }
}
