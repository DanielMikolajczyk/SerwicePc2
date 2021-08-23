<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientType extends Model
{
  use HasFactory;

  protected $table = 'client_types';

  protected $fillable = [
    'name', 'description'
  ];

  public $timestamps = false;

  public function clients()
  {
    return $this->hasMany(Client::class, 'type_id');
  }

  public function getTypeAttribute($value)
  {
    return ucfirst($value);
  }
}
