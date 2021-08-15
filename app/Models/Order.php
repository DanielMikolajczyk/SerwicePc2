<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
      'client_id', 'status_id','order_type_id',
      'serial_number', 'part_number', 'code',
      'manufacturer', 'model', 'paid',
      'deadline'
    ];

    public function client()
    {
      return $this->belongsTo(Client::class);
    }

    public function orderStatus()
    {
      return $this->belongsTo(OrderStatus::class,'status_id');
    }

    public function orderType()
    {
      return $this->belongsTo(OrderType::class);
    }

    
}
