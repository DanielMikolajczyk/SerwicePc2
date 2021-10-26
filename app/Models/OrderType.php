<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderType extends Model
{
    use HasFactory;

    protected $table = 'order_types';

    protected $fillable = [
      'name', 'description'
    ];

    public $timestamps = false;

    public function orders()
    {
      return $this->hasMany(Order::class);
    }

    public function diagnoses()
    {
      return $this->hasMany(Diagnose::class);
    }

    public function getNameAttribute($value)
    {
      return ucwords($value);
    }
}
