<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientTypeRequest;
use App\Http\Requests\UpdateClientTypeRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\ClientType;
use App\Services\ClientService;
use Illuminate\Http\Request;
use App\Services\ClientTypeService;
use App\Services\OrderService;

class ClientTypeController extends Controller
{
  protected $clientTypeService;

  public function __construct(ClientTypeService $clientTypeService)
  {
    $this->authorizeResource(ClientType::class, 'clientType');
    $this->clientTypeService = $clientTypeService;
  }

  public function index(): View
  {
    return view('web/clientType/index', [
      'clientTypes' => ClientType::all()
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create(): View
  {
    return view('web/clientType/create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreClientTypeRequest $request): RedirectResponse
  {
    $clientType = $this->clientTypeService->create($request->validated());

    return redirect()->route('clienttype.index');
  }

  /**
   * Display the specified resource.
   */
  public function show(ClientType $clientType): View
  {
    return view('web/clientType/show', [
      'clientType'     => $clientType
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(ClientType $clientType): View
  {
    return view('web/clientType/edit', [
      'clientType' => $clientType
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(ClientType $clientType, UpdateClientTypeRequest $request): RedirectResponse
  {
    $this->clientTypeService->update($clientType->id, $request->validated());

    return redirect()->route('clienttype.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(ClientType $clientType,
   ClientService $clientService,
   OrderService $orderService): RedirectResponse
  {
    $clientType->clients->map(function ($client) use ($orderService){
      $orderService->deleteClientOrders($client->id);
    });
    $clientService->deleteTypeClient($clientType->id);
    $this->clientTypeService->destroy($clientType->id);

    return redirect()->route('clienttype.index');
  }

}
