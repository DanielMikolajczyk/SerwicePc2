<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDepartamentRequest;
use App\Http\Requests\UpdateDepartamentRequest;
use App\Models\Departament;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Services\DepartamentService;

class DepartamentController extends Controller
{
  
  protected $departamentService;

  public function __construct(DepartamentService $departamentService)
  {
    $this->authorizeResource(Departament::class, 'departament');    
    $this->departamentService = $departamentService;
  }

  public function index(): View
  {
    return view('web/departament/index', [
      'departaments' => Departament::all()
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create(): View
  {
    return view('web/departament/create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreDepartamentRequest $request): RedirectResponse
  {
    $departament = $this->departamentService->create($request->validated());

    return redirect()->route('departament.index');
  }

  /**
   * Display the specified resource.
   */
  public function show(Departament $departament): View
  {
    return view('web/departament/show', [
      'departament'     => $departament
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Departament $departament): View
  {
    return view('web/departament/edit', [
      'departament' => $departament
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Departament $departament, UpdateDepartamentRequest $request): RedirectResponse
  {
    $this->departamentService->update($departament->id, $request->validated());

    return redirect()->route('departament.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Departament $departament): RedirectResponse
  {
    $this->departamentService->destroy($departament->id);

    return redirect()->route('departament.index');
  }

}
