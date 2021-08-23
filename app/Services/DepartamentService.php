<?php

namespace App\Services;

use App\Models\Departament;

class DepartamentService
{
  public function create(array $data): Departament
  {
    return Departament::create($data);
  }

  public function update(int $id, array $data): void
  {
    Departament::findOrFail($id)->update($data);
  }

  public function destroy(int $id): void
  {
    Departament::findOrFail($id)->delete();
  }
}