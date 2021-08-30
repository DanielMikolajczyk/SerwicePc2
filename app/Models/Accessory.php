<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accessory extends Model
{
  use HasFactory;

  protected $fillable = [
    'name', 'order_id', 'image_url', 'description',
  ];

  public function order()
  {
    return $this->belongsTo(Order::class);
  }
}
