@extends('web/layouts/master')

@section('title') SerwicePC - akcesoria @endsection

@section('content')
  <div class="w-full">
    <div class="my-5 flex items-center sm:px-6 lg:px-8">
      <div class="flex-1">
        <img src="{{ asset('storage/images/serwicepc.png') }}" alt="">
      </div>
    </div>
    @php $headers= json_encode(['Akcesorium','Id zamówienia', 'Klient']) @endphp
    <x-tables.table :headers="$headers">
      <tr class="text-center py-2 bg-gray-50">
        <form action="{{ route('accessory.index') }}" method="GET">
          <td><input type="text" class="w-full bg-transparent text-sm font-semibold pl-4" name="name" value="{{app('request')->input('name')}}"></td>
          <td><input type="text" class="w-full bg-transparent text-sm font-semibold pl-4 text-center" name="order" value="{{app('request')->input('order')}}"></td>
          <td><input type="text" class="w-full bg-transparent text-sm font-semibold pl-4 text-center" name="client_name" value="{{app('request')->input('client_name')}}"></td>
          <td><x-buttons.submit bgColor="blue" icon="fas fa-search" size="small" position="center">Szukaj</x-buttons.submit></td>
        </form>
      </tr>
      @forelse($accessories as $accessory)
        <tr>
          <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-left">
            {{ $accessory->name }}
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
            {{ $accessory->order_id }}
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
            {{ $accessory->order->client->fullName }}
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
            <a href="{{ route('accessory.show', $accessory->id) }}">
              <x-buttons.info bgColor="green" icon="far fa-eye">Szczegóły</x-buttons.info>
            </a>
            <a href="{{ route('accessory.edit', $accessory->id) }}">
              <x-buttons.info bgColor="yellow" icon="fas fa-pen">Edytuj</x-buttons.info>
            </a>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="3" class="px-6 py-4 whitespace-nowrap text-center font-medium">Brak danych</td>
        </tr>
      @endforelse
    </x-tables.table>
    <div class="w-full mx-auto my-5">
      {{ $accessories->onEachSide(1)->links('vendor.pagination.default') }}
    </div>
    <div class="w-full pl-3 my-5">
      <p>Wyświetlono <span class="font-bold">{{ $accessories->count() }}</span> z <span class="font-bold">{{ $accessories->total() }}</span> wyników.</p>
    </div>
  </div>
@endsection
