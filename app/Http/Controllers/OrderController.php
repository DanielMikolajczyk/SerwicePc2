<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateOrderRequest;
use App\Http\Requests\ValidateOrderWithClientRequest;
use App\Models\ClientType;
use App\Models\Order;
use App\Models\OrderType;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Services\OrderService;
use App\Services\ClientService;

class OrderController extends Controller
{
  protected $orderService;

  public function __construct(OrderService $orderService)
  {
    $this->authorizeResource(Order::class, 'order');
    $this->orderService   = $orderService;
  }

  public function index(): View
  {
    return view('web/order/index', [
      'orders' => Order::all()->sortBy('deadline')
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create(): View
  {
    return view('web/order/create', [
      'orderTypes' => OrderType::all(),
      'clientTypes' => ClientType::all()
    ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(ValidateOrderWithClientRequest $request, ClientService $clientService): RedirectResponse
  {
    $client = $clientService->create($request->validated()['client']);
    $order = $this->orderService
      ->create($request->validated()['order'] + ['client_id' => $client->id]);

    return redirect()->route('order.index');
  }

  /**
   * Display the specified resource.
   */
  public function show(Order $order): View
  {
    return view('web/order/show', [
      'order' => $order
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Order $order): View
  {
    return view('web/order/edit', [
      'order'       => $order,
      'orderTypes'  => OrderType::all(),
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateOrderRequest $request, Order $order): RedirectResponse
  {
    $this->orderService->update($order->id, $request->validated());

    return redirect()->route('order.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Order $order)
  {
    $this->orderService->destroy($order->id);

    return redirect()->route('order.index');
  }
}
