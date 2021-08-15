<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderType extends Model
{
    use HasFactory;

    protected $fillable = [
      'type', 'description'
    ];

    public $timestamps = false;

    public function orders()
    {
      return $this->hasMany(Order::class);
    }

    public function getTypeAttribute($value)
    {
      return ucwords($value);
    }
}
