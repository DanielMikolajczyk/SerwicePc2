<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilterDiagnoseRequest;
use App\Http\Requests\StoreDiagnoseRequest;
use App\Http\Requests\UpdateDiagnoseRequest;
use App\Models\Diagnose;
use App\Models\OrderType;
use App\Services\DiagnoseService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class DiagnoseController extends Controller
{
  protected $diagnoseService;

  public function __construct(DiagnoseService $diagnoseService)
  {
    $this->diagnoseService = $diagnoseService;
  }

  public function index(FilterDiagnoseRequest $request): View
  {
    $diagnoses = $this->diagnoseService->filterIndexPage($request);

    return view('web/diagnose/index', [
      'diagnoses'   => $diagnoses,
      'orderTypes'  => OrderType::all()
    ]);
  }

  public function create():View
  {
    return view('web/diagnose/create', [
      'orderTypes' => OrderType::all()
    ]);
  }

  public function store(StoreDiagnoseRequest $request): RedirectResponse
  {
    $this->diagnoseService->create($request->validated());
    return redirect()->route('diagnose.index');
  }

  public function show(Diagnose $diagnose): View
  {
    return view('web/diagnose/show',[
      'diagnose'  => $diagnose
    ]);
  }

  public function edit(Diagnose $diagnose): View
  {
    return view('web/diagnose/edit',[
      'orderTypes'=> OrderType::all(),
      'diagnose'  => $diagnose
    ]);
  }

  public function update(UpdateDiagnoseRequest $request, Diagnose $diagnose): RedirectResponse
  {
    $this->diagnoseService->update($request->validated(),$diagnose->id);
    return redirect()->route('diagnose.index');
  }

  public function destroy(Diagnose $diagnose): RedirectResponse
  {
    $this->diagnoseService->destroy($diagnose->id);
    return redirect()->route('diagnose.index');
  }
}
