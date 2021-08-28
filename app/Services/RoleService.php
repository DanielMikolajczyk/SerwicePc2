<?php

namespace App\Services;

use App\Models\Role;

class RoleService
{
  public function create(array $data): Role
  {
    return Role::create($data);
  }

  public function update(int $id, array $data): void
  {
    Role::findOrFail($id)->update($data);
  }

  public function destroy(int $id): void
  {
    $role = Role::findOrFail($id);
    $role->permissions()->detach(); 
    $role->delete();
  }

  public function syncPermissions(int $id, array $data): void
  {
    Role::findOrFail($id)->permissions()->sync(array_values($data['permission']));
  }
}