<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
      'name'
    ];

    public function users()
    {
      return $this->hasMany(User::class);
    }

    public function permissions()
    {
      return $this->belongsToMany(Permission::class);
    }

    /*
    * Return ids of the Permissions associated with given Role
    */
    public function getPermissionsIdsAttribute(): array
    {
      return $this->permissions->pluck('id')->toArray();
    }
}
