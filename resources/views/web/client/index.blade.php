@extends('web/layouts/master')

@section('title') SerwicePC - klienci @endsection

@section('content')
  <div class="w-full">
    <div class="my-5 flex items-center sm:px-6 lg:px-8">
      <div class="flex-1">
        <img src="{{ asset('storage/images/serwicepc.png') }}" alt="">
      </div>
      <div class="flex-1 text-center">
        <a href="{{ route('client.create') }}">
          <x-buttons.submit bgColor="red" position="center" icon="fas fa-plus">Stwórz</x-buttons.submit>
        </a>
      </div>
    </div>
    @php $headers= json_encode(['Klient','Numer Telefonu']) @endphp
    <x-tables.table :headers="$headers">
      <tr class="text-center py-2 bg-gray-50">
        <form action="{{ route('client.index') }}" method="GET">
          <td><input type="text" class="w-full bg-transparent text-sm font-semibold pl-4 text-center" name="client_name" value="{{app('request')->input('client_name')}}"></td>
          <td><input type="text" class="w-full bg-transparent text-sm font-semibold pl-4 text-center" name="phone" value="{{app('request')->input('phone')}}"></td>
          <td><x-buttons.submit bgColor="blue" icon="fas fa-search" size="small" position="center">Szukaj</x-buttons.submit></td>
        </form>
      </tr>
      @forelse($clients as $client)
        <tr>
          <td class="px-6 py-4 whitespace-nowrap">
            <div class="flex items-center">
              <div class="flex-shrink-0 h-10 w-10">
                <img class="h-10 w-10 rounded-full"
                  src="{{ $client->image_url != null 
                          ? asset($client->image_url)
                          : asset('storage/images/default-avatar.png') }}"
                  alt="">
              </div>
              <div class="ml-4">
                <div class="text-sm font-medium text-gray-900">
                  {{ $client->fullName }}
                </div>
                <div class="text-sm text-gray-500">
                  {{ $client->email ?? '' }}
                </div>
              </div>
            </div>
          </td>
          <td class="px-6 py-4 whitespace-nowrap">
            <div class="text-sm text-gray-900">{{ $client->phone_number }}</div>
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
            <a href="{{ route('client.show', $client->id) }}">
              <x-buttons.info bgColor="green" icon="far fa-eye">Szczegóły</x-buttons.info>
            </a>
            <a href="{{ route('client.edit', $client->id) }}">
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
