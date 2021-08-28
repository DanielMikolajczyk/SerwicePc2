<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Client;
use App\Models\ClientType;
use App\Services\ClientService;
use App\Services\OrderService;
use Illuminate\Http\Request;

class ClientController extends Controller
{

  protected $clientService;

  public function __construct(ClientService $clientService)
  {
    $this->authorizeResource(Client::class, 'client');
    $this->clientService = $clientService;
  }

  public function index(): View
  {
    return view('web/client/index', [
      'clients' => Client::all()
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create(): View
  {
    return view('web/client/create', [
      'clientTypes' => ClientType::all()
    ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreClientRequest $request): RedirectResponse
  {
    $client = $this->clientService->create($request->validated());

    return redirect()->route('client.index');
  }

  /**
   * Display the specified resource.
   */
  public function show(Client $client): View
  {
    return view('web/client/show',[
      'client'      => $client
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Client $client): View
  {
    return view('web/client/edit',[
      'client'      => $client,
      'clientTypes' => ClientType::all()
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateClientRequest $request, Client $client): RedirectResponse
  {
    $this->clientService->update($client->id,$request->validated());

    return redirect()->route('client.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Client $client, OrderService $orderService): RedirectResponse
  {
    $orderService->deleteClientOrders($client->id);
    $this->clientService->delete($client->id);

    return redirect()->route('client.index');
  }
}
