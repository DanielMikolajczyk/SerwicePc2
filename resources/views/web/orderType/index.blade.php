@extends('web/layouts/master')

@section('title')
  SerwicePC - klienci
@endsection

@section('content')
  <div class="w-full">
    <div class="my-5 flex items-center sm:px-6 lg:px-8">
      <div class="flex-1">
        <img src="{{ asset('storage/images/serwicepc.png') }}" alt="">
      </div>
      <div class="flex-1 text-center">
        <a href="{{ route('ordertype.create') }}">
          <x-buttons.submit bgColor="red" position="center" icon="fas fa-plus">Stwórz</x-buttons.submit>
        </a>
      </div>
    </div>
    @php $headers= json_encode(['Nazwa']) @endphp
    <x-tables.table :headers="$headers">
      @forelse($orderTypes as $orderType)
        <tr>
          <td class="px-6 py-4 whitespace-nowrap">
            <div class="flex items-center">
              <div class="text-sm font-medium text-gray-900">
                {{ $orderType->name }}
              </div>
            </div>
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
            <a href="{{ route('ordertype.show', $orderType->id) }}">
              <x-buttons.info bgColor="green" icon="far fa-eye">Szczegóły</x-buttons.info>
            </a>
            <a href="{{ route('ordertype.edit', $orderType->id) }}">
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
  </div>
@endsection
