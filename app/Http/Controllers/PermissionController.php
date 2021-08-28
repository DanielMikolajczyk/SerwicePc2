<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Permission;
use App\Services\PermissionService;

class PermissionController extends Controller
{
  protected $permissionService;

  public function __construct(PermissionService $permissionService)
  {
    $this->permissionService = $permissionService;
  }

  public function index(): View
  {
    return view('web/permission/index', [
      'permissions' => Permission::all()
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create(): View
  {
    return view('web/permission/create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StorePermissionRequest $request): RedirectResponse
  {
    $permission = $this->permissionService->create($request->validated());

    return redirect()->route('permission.index');
  }

  /**
   * Display the specified resource.
   */
  public function show(Permission $permission): View
  {
    return view('web/permission/show', [
      'permission'      => $permission
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Permission $permission): View
  {
    return view('web/permission/edit', [
      'permission'      => $permission,
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdatePermissionRequest $request, Permission $permission): RedirectResponse
  {
    $this->permissionService->update($permission->id,$request->validated());

    return redirect()->route('permission.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Permission $permission): RedirectResponse
  {
    $this->permissionService->destroy($permission->id);

    return redirect()->route('permission.index');
  }
}
