<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientType extends Model
{
    use HasFactory;

    protected $fillable = [
      'name', 'description'
    ];

    public $timestamps = false;

    public function clients()
    {
      return $this->hasMany(Client::class);
    }

    public function getNameAttribute($value)
    {
      return ucfirst($value);
    }
}
