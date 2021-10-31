<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilterOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Requests\ValidateOrderWithClientRequest;
use App\Models\ClientType;
use App\Models\Diagnose;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\OrderType;
use App\Services\AccessoryService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Services\OrderService;
use App\Services\ClientService;
use Alert;

class OrderController extends Controller
{
  protected $orderService;

  public function __construct(OrderService $orderService)
  {
    $this->authorizeResource(Order::class, 'order');
    $this->orderService = $orderService;
  }

  public function index(FilterOrderRequest $request): View
  {
    $orders = $this->orderService->filterIndexPage($request);
    
    return view('web/order/index', [
      'orders'        => $orders,
      'orderStatuses' => OrderStatus::all(),
      'orderTypes'    => OrderType::all()
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create(): View
  {
    return view('web/order/create', [
      'orderTypes' => OrderType::all(),
      'clientTypes' => ClientType::all(),
    ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(ValidateOrderWithClientRequest $request,
   ClientService $clientService,
   AccessoryService $accessoryService
   ): RedirectResponse
  {
    $client = $clientService->create($request->validated()['client']);
    $order = $this->orderService
      ->create($request->validated()['order'] + ['client_id' => $client->id]);
    if(isset($request->validated()['accessory'])){
      $accessoryService->create($order->id, $request->validated()['accessory']);
    }
    
    return redirect()->route('order.index')->with('toast_success','Pomyślnie utworzono zamówienie');
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
      'order'        => $order,
      'diagnoses'    => Diagnose::where('type_id', $order->type_id)->get(),
      'orderTypes'   => OrderType::all(),
      'orderStatuses'=> OrderStatus::all(),
    ]);
  }

  /**
   * Show the form for editing every single detail of specified resource.
   */
  public function correct(Order $order): View
  {
    return view('web/order/correct', [
      'order'        => $order,
      'diagnoses'    => Diagnose::where('type_id', $order->type_id)->get(),
      'orderTypes'   => OrderType::all(),
      'orderStatuses'=> OrderStatus::all(),
    ]);
  }
  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateOrderRequest $request, Order $order): RedirectResponse
  {
    $this->orderService->update($order->id, $request->validated());

    return redirect()->route('order.edit',$order->id)->with('toast_success','Pomyślnie edytowano zamówienie');
  }


  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Order $order)
  {
    $this->orderService->destroy($order->id);

    return redirect()->route('order.index')->with('toast_success','Pomyślnie usunięto zamówienie');
  }
}
