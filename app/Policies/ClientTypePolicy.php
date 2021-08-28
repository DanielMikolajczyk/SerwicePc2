<?php

namespace App\Policies;

use App\Models\ClientType;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClientTypePolicy
{
  use HandlesAuthorization;

  /**
   * Determine whether the user is admin.
   * If so do not check for permissions.
   */
  public function before(User $user)
  {
    return $user->isAdmin();
  }

  /**
   * Determine whether the user can view any models.
   */
  public function viewAny(User $user): bool
  {
    return $user->checkPermission('view client type');
  }

  /**
   * Determine whether the user can view the model.
   */
  public function view(User $user): bool
  {
    return $user->checkPermission('view client type');
  }

  /**
   * Determine whether the user can create models.
   */
  public function create(User $user): bool
  {
    return $user->checkPermission('create client type');
  }

  /**
   * Determine whether the user can update the model.
   *
   */
  public function update(User $user): bool
  {
    return $user->checkPermission('create client type');
  }

  /**
   * Determine whether the user can delete the model.
   */
  public function delete(User $user): bool
  {
    return $user->checkPermission('delete client type');
  }

  /**
   * Determine whether the user can restore the model.
   *
   * @param  \App\Models\User  $user
   * @param  \App\Models\ClientType  $clientType
   * @return \Illuminate\Auth\Access\Response|bool
   */
  public function restore(User $user, ClientType $clientType)
  {
    //
  }

  /**
   * Determine whether the user can permanently delete the model.
   *
   * @param  \App\Models\User  $user
   * @param  \App\Models\ClientType  $clientType
   * @return \Illuminate\Auth\Access\Response|bool
   */
  public function forceDelete(User $user, ClientType $clientType)
  {
    //
  }
}
