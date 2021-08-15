<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    use HasFactory;

    protected $fillable = [
      'status', 'description'
    ];

    public $timestamps = false;

    public function orders()
    {
      return $this->hasMany(Order::class);
    }

    public function getStatusAttribute($value)
    {
        return ucfirst($value);
    }
}
