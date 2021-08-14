<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
  use HasFactory;
  
  protected $fillable = [
    'first_nmae', 'middle_name', 'last_name',
    'phone_number', 'email', 'address',
    'description', 'client_type_id'
  ];

  public function orders()
  {
    return $this->hasMany(Order::class);
  }

  public function clientType()
  {
    return $this->belongsTo(ClientType::class);
  }
}
