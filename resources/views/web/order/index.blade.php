@extends('web/layouts/master')

@section('title')
  SerwicePC - zamówienia
@endsection

@section('content')
@if($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
@endif
  <div class="w-full mx-auto">
    <div class="my-5 flex items-center sm:px-6 lg:px-8">
      <div class="flex-1">
        <img src="{{ asset('storage/images/serwicepc.png') }}" alt="">
      </div>
      <div class="flex-1 text-center">
        <a href="{{ route('order.create') }}">
          <x-buttons.submit bgColor="red" position="center" icon="fas fa-plus">Stwórz</x-buttons.submit>
        </a>
      </div>
    </div>
    @php $headers= json_encode(['Kod','Wydanie', 'Status', 'Produkt', 'Nazwa Klienta']) @endphp
    <x-tables.table :headers="$headers">
      <tr class="text-center py-2 bg-gray-50">
        <form action="{{route('order.index')}}" method="GET">
          <td><input type="text" class="w-full bg-transparent text-sm font-semibold pl-4 focus:outline-none" name="code" value="{{app('request')->input('code')}}"></td>
          <td><input type="text" class="w-full bg-transparent text-sm font-semibold text-center focus:outline-none" name="deadline" value="{{app('request')->input('deadline')}}"></td>
          <td><x-forms.select-filter name="status" :array="$orderStatuses" :selected="app('request')->input('status') ?? ''"/></td>
          <td><x-forms.select-filter name="type" :array="$orderTypes" :selected="app('request')->input('type') ?? ''"/></td>
          <td><input type="text" class="w-full bg-transparent text-sm font-semibold text-center focus:outline-none" name="client_name" value="{{app('request')->input('client_name')}}"></td>
          <td><x-buttons.submit bgColor="blue" icon="fas fa-search" size="small" position="center">Szukaj</x-buttons.submit></td>
        </form>
      </tr>
      @forelse($orders as $order)
        
        <tr class="text-center">
          <td class="px-6 py-4 whitespace-nowrap">
            <div class="text-sm text-gray-900 text-left">{{ $order->code }}</div>
          </td>
          <td class="px-6 py-4 whitespace-nowrap">
            <div class="text-sm text-gray-900">{{ $order->deadline }}</div>
          </td>
          <td class="px-6 py-4 whitespace-nowrap">
            <div class="flex items-center justify-center flex-col">
              <div class="text-sm font-medium text-gray-900">
                {{ $order->status->name }}
              </div>
              <div class="text-sm text-gray-500">
                {{ $order->updated_at }}
              </div>
            </div>
          </td>
          <td class="px-6 py-4 whitespace-nowrap">
            <div class="text-sm text-gray-900">{{ $order->type->name }}</div>
          </td>
          <td class="px-6 py-4 whitespace-nowrap">
            <div class="text-sm text-gray-900">{{ $order->client->fullName }}</div>
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
            <a href="{{ route('order.show', $order->id) }}">
              <x-buttons.info bgColor="green" icon="far fa-eye">Szczegóły</x-buttons.info>
            </a>
            <a href="{{ route('order.edit', $order->id) }}">
              <x-buttons.info bgColor="yellow" icon="fas fa-pen">Edytuj</x-buttons.info>
            </a>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="6" class="px-6 py-4 whitespace-nowrap text-center font-medium">Brak danych</td>
        </tr>
      @endforelse
    </x-tables.table>
    <div class="w-full mx-auto my-5">
      {{ $orders->onEachSide(1)->links('vendor.pagination.default') }}
    </div>
    <div class="w-full pl-3 my-5">
      <p>Wyświetlono <span class="font-bold">{{ $orders->count() }}</span> z <span class="font-bold">{{ $orders->total() }}</span> wyników.</p>
    </div>
  </div>
@endsection
