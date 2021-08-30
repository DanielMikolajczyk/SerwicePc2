<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Permission;
use App\Models\Role;
use App\Services\RoleService;

class RoleController extends Controller
{
  protected $roleService;

  public function __construct(RoleService $roleService)
  {
    $this->authorizeResource(Role::class, 'role');
    $this->roleService = $roleService;
  }

  public function index(): View
  {
    return view('web/role/index', [
      'roles' => Role::all()
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create(): View
  {
    return view('web/role/create', [
      'permissions' => Permission::all()
    ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreRoleRequest $request): RedirectResponse
  {
    $role = $this->roleService->create($request->validated());
    $this->roleService->syncPermissions($role->id,$request->validated());

    return redirect()->route('role.index');
  }

  /**
   * Display the specified resource.
   */
  public function show(Role $role): View
  {
    return view('web/role/show',[
      'role'      => $role
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Role $role): View
  {
    return view('web/role/edit',[
      'role'        => $role,
      'permissions' => Permission::all()
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateRoleRequest $request, Role $role): RedirectResponse
  {
    $this->roleService->update($role->id,$request->validated());
    $this->roleService->syncPermissions($role->id,$request->validated());

    return redirect()->route('role.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Role $role): RedirectResponse
  {
    $this->roleService->destroy($role->id);

    return redirect()->route('role.index');
  }
}
