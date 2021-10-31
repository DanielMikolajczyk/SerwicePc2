<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilterAccessoryRequest;
use App\Http\Requests\UpdateAccessoryRequest;
use App\Models\Accessory;
use App\Services\AccessoryService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AccessoryController extends Controller
{
  protected $accessoryService;

  public function __construct(AccessoryService $accessoryService)
  {
    $this->accessoryService = $accessoryService;
  }

  /**
   * Display a listing of the resource.
   */
  public function index(FilterAccessoryRequest $request): View
  {
    $accessories = $this->accessoryService->filterIndexPage($request);

    return view('web/accessory/index',[
      'accessories' => $accessories
    ]);
  }

  /**
   * Display the specified resource.
   */
  public function show(Accessory $accessory): View
  {
    return view('web/accessory/show',[
      'accessory' => $accessory
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Accessory $accessory): View
  {
    return view('web/accessory/edit',[
      'accessory' => $accessory
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateAccessoryRequest $request, Accessory $accessory): RedirectResponse
  {
    $this->accessoryService->update($accessory->id, $request->validated());

    return redirect()->route('accessory.edit',$accessory->id)->with('toast_success','Pomyślnie edytowano akcesorium');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Accessory $accessory): RedirectResponse
  {
    $this->accessoryService->delete($accessory->id);

    return redirect()->route('accessory.index')->with('toast_success','Pomyślnie usunięto akcesorium');
  }
}
