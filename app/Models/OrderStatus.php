<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    use HasFactory;

    protected $table = 'order_statuses';

    protected $fillable = [
      'name', 'description', 'stage_number'
    ];

    public $timestamps = false;

    public function orders()
    {
      return $this->hasMany(Order::class);
    }

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }
}
