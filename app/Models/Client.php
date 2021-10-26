<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
  use HasFactory;
  
  protected $fillable = [
    'first_name', 'middle_name', 'last_name',
    'phone_number', 'email', 'address',
    'description', 'type_id', 'image_url'
  ];

  public function orders()
  {
    return $this->hasMany(Order::class);
  }

  public function type()
  {
    return $this->belongsTo(ClientType::class);
  }

  public function getFullNameAttribute()
  {
    return "{$this->first_name} {$this->last_name}";
  }

  public static function getNextId(): int
  {
    return Client::orderBy('id','desc')->first()->id + 1;
  }
}
