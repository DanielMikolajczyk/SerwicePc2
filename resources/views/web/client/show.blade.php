@extends('web/layouts/master')

@section('title')
  SerwicePC - edytuj zamówienie
@endsection

@section('content')
  <div>
    <div class="py-2 mt-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
      <span class="font-medium text-2xl">Szczegóły klienta</span>
    </div>
    <x-forms.background>
      <div class="mb-5 p-2 flex justify-between">
        <x-forms.title>
          <div class="flex items-center">
            <img class="h-10 w-10 mr-3 rounded-full"
              src="{{ $client->image_url != null 
                          ? asset($client->image_url)
                          : asset('storage/images/default-avatar.png') }}"
              alt="">
            <div>{{$client->fullName}}</div>
          </div>
        </x-forms.title>
        <div>
          <a class="mx-2" href="{{route('client.edit',$client->id)}}">
            <x-buttons.info bgColor="yellow" class="px-4 py-2" icon="fas fa-arrow-right" iconPosition="right">
              Przejdź do edycji
            </x-buttons.info>
          </a>
        </div>
      </div>
      <div class="grid grid-cols-6 gap-4 mb-4 w-full">
        <div class="col-span-2">
          <x-forms.label>Imię</x-forms.label>
          <x-forms.input name="first_name" :value="$client->first_name" disabled="true" />
        </div>

        <div class="col-span-2">
          <x-forms.label>Drugie imię</x-forms.label>
          <x-forms.input name="middle_name" :value="$client->middle_name" disabled="true" />
        </div>

        <div class="col-span-2">
          <x-forms.label>Nazwisko</x-forms.label>
          <x-forms.input name="last_name" :value="$client->last_name" disabled="true" />
        </div>

        <div class="col-span-2">
          <x-forms.label>Numer Telefonu</x-forms.label>
          <x-forms.input name="phone_number" :value="$client->phone_number" disabled="true" />
        </div>

        <div class="col-span-2">
          <x-forms.label>Adres</x-forms.label>
          <x-forms.input name="address" :value="$client->address" disabled="true" />
        </div>

        <div class="col-span-2">
          <x-forms.label>Email</x-forms.label>
          <x-forms.input name="email" :value="$client->email" disabled="true" />
        </div>

        <div class="col-span-6">
          <x-forms.label>Opis</x-forms.label>
          <p>{{ $client->description }}</p>
        </div>
      </div>
    </x-forms.background>

    <div class="my-5"></div>
    <div class="py-2 max-w-7xl mx-auto sm:px-6 lg:px-8">
      <span class="font-medium text-2xl">Zamówienia klienta</span>
    </div>

    @php $headers= json_encode(['Kod','Wydanie', 'Status', 'Produkt']) @endphp

    <x-tables.table :headers="$headers">
      @forelse($client->orders as $order)
        <tr>
          <td class="px-6 py-4 whitespace-nowrap">
            <div class="text-sm text-gray-900 text-left">{{ $order->code }}</div>
          </td>
          <td class="px-6 py-4 whitespace-nowrap">
            <div class="text-sm text-gray-900">{{ $order->deadline }}</div>
          </td>
          <td class="px-6 py-4 whitespace-nowrap">
            <div class="text-sm text-gray-900">{{ $order->status->name }}</div>
          </td>
          <td class="px-6 py-4 whitespace-nowrap">
            <div class="text-sm text-gray-900">{{ $order->type->name }}</div>
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
          <td colspan="4" class="text-center font-bold">Brak zamówień dla tego klienta</td>
          <td></td>
        </tr>
      @endforelse
    </x-tables.table>

  </div>
@endsection
