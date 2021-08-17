<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
      'client_id', 'status_id','type_id',
      'serial_number', 'part_number', 'code',
      'manufacturer', 'model', 'paid',
      'deadline', 'issue_description', 'visual_description'
    ];

    public function client()
    {
      return $this->belongsTo(Client::class);
    }

    public function status()
    {
      return $this->belongsTo(OrderStatus::class,'status_id');
    }

    public function type()
    {
      return $this->belongsTo(OrderType::class);
    }

    
}
