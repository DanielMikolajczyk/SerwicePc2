<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderStatusRequest;
use App\Http\Requests\UpdateOrderStatusRequest;
use App\Models\OrderStatus;
use App\Services\OrderService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Services\OrderStatusService;

class OrderStatusController extends Controller
{

  protected $orderStatusService;

  public function __construct(OrderStatusService $orderStatusService)
  {
    $this->authorizeResource(OrderStatus::class, 'orderstatus');
    $this->orderStatusService = $orderStatusService;
  }

  public function index(): View
  {
    $orderStatuses = OrderStatus::all();

    return view('web/orderStatus/index', [
      'orderStatuses' => $orderStatuses 
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create(): View
  {
    return view('web/orderStatus/create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreOrderStatusRequest $request): RedirectResponse
  {
    $orderStatus = $this->orderStatusService->create($request->validated());

    return redirect()->route('orderstatus.index');
  }

  /**
   * Display the specified resource.
   */
  public function show(OrderStatus $orderStatus): View
  {
    return view('web/orderStatus/show', [
      'orderStatus'     => $orderStatus
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(OrderStatus $orderStatus): View
  {
    return view('web/orderStatus/edit', [
      'orderStatus' => $orderStatus
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(OrderStatus $orderStatus, UpdateOrderStatusRequest $request): RedirectResponse
  {
    $this->orderStatusService->update($orderStatus->id, $request->validated());

    return redirect()->route('orderstatus.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(OrderStatus $orderStatus, OrderService $orderService): RedirectResponse
  {
    $orderService->deleteStatusOrders($orderStatus->id);
    $this->orderStatusService->destroy($orderStatus->id);
    
    return redirect()->route('orderstatus.index');
  }
}
