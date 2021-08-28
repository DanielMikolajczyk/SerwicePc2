<?php

namespace App\Services;

use App\Models\Permission;
use Illuminate\Support\Str;

class PermissionService
{
  public function create(array $data): Permission
  {
    $slug = $this->createSlug($data['name']);
    return Permission::create($data + $slug);
  }

  public function update(int $id, array $data): void
  {
    Permission::findOrFail($id)->update($data);
  }

  public function destroy(int $id): void
  {
    Permission::findOrFail($id)->delete();
  }

  public function createSlug(string $name): array
  {
    return ['slug' => Str::slug($name)];
  }
}