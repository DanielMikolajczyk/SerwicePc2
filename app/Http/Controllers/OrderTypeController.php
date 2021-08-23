<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderTypeRequest;
use App\Http\Requests\UpdateOrderTypeRequest;
use App\Models\OrderType;
use App\Services\OrderService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Services\OrderTypeService;

class OrderTypeController extends Controller
{

  protected $orderTypeService;

  public function __construct(OrderTypeService $orderTypeService)
  {
    $this->orderTypeService = $orderTypeService;
  }

  public function index(): View
  {
    return view('web/orderType/index', [
      'orderTypes' => OrderType::all()
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create(): View
  {
    return view('web/ordertype/create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreOrderTypeRequest $request): RedirectResponse
  {
    $orderType = $this->orderTypeService->create($request->validated());

    return redirect()->route('ordertype.index');
  }

  /**
   * Display the specified resource.
   */
  public function show(OrderType $orderType): View
  {
    return view('web/orderType/show', [
      'orderType'     => $orderType
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(OrderType $orderType): View
  {
    return view('web/orderType/edit', [
      'orderType' => $orderType
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(OrderType $orderType, UpdateOrderTypeRequest $request): RedirectResponse
  {
    $this->orderTypeService->update($orderType->id, $request->validated());

    return redirect()->route('ordertype.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(OrderType $orderType, OrderService $orderService): RedirectResponse
  {
    $orderService->deleteTypeOrders($orderType->id);
    $this->orderTypeService->destroy($orderType->id);
    
    return redirect()->route('ordertype.index');
  }
}
