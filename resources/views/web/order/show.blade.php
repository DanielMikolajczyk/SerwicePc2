@extends('web/layouts/master')

@section('title')
  SerwicePC - edytuj zamówienie
@endsection

@section('content')
  <div>
    <div class="py-8 mt-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
      <span class="font-medium text-2xl">Edytuj zamówienie: </span>{{ $order->id }}
    </div>
    <div class="py-4">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <div class="flex justify-around">
              <div class="p-2">
                <div class="text-xl font-medium mb-5">Dane zamówienia</div>
                <div class="mb-4 pb-1 border-b-2">
                  <label class="text-gray-600 block">
                    Numer seryjny
                  </label>
                  <div class="font-medium text-xl">
                    {{ $order->serial_number }}
                  </div>
                </div>
                <div class="mb-4 pb-1 border-b-2">
                  <label class="text-gray-600 block">
                    Numer artykułu (part number)
                  </label>
                  <div class="font-medium text-xl">
                    {{ $order->part_number }}
                  </div>
                </div>
                <div class="mb-4 pb-1 border-b-2">
                  <label class="text-gray-600 block">
                    Model
                  </label>
                  <div class="font-medium text-xl">
                    {{ $order->model }}
                  </div>
                </div>
                <div class="mb-4 pb-1 border-b-2">
                  <label class="text-gray-600 block">
                    Producent
                  </label>
                  <div class="font-medium text-xl">
                    {{ $order->manufacturer }}
                  </div>
                </div>
                <div class="mb-4 pb-1 border-b-2">
                  <label class="text-gray-600 block">
                    Przewidywana data wydania
                  </label>
                  <div class="font-medium text-xl">
                    {{ $order->deadline }}
                  </div>
                </div>
                <div class="mb-4 pb-1 border-b-2">
                  <label class="text-gray-600 block">
                    Wygląd urządzenia
                  </label>
                  <div class="font-medium">
                    <p>
                      {{ $order->visual_description }}
                    </p>
                  </div>
                </div>
                <div class="mb-4 pb-1 border-b-2">
                  <label class="text-gray-600 block">
                    Opis usterki
                  </label>
                  <div class="font-medium">
                    <p>
                      {{ $order->issue_description }}
                    </p>
                  </div>
                </div>
              </div>
              <div class="p-2 w-96">
                <div class="text-xl font-medium mb-5">Dane klienta</div>
                <div class="mb-4 flex">
                  <div class="pb-1 border-b-2 flex-1">
                    <label class="text-gray-600 block">
                      Imię
                    </label>
                    <div class="font-medium text-xl">
                      {{ $order->client->first_name }}
                    </div>
                  </div>
                  <div class="ml-3 pb-1 border-b-2 flex-1">
                    <label class="text-gray-600 block">
                      Nazwisko
                    </label>
                    <div class="font-medium text-xl">
                      {{ $order->client->last_name }}
                    </div>
                  </div>
                </div>
                <div class="mb-4 pb-1 border-b-2">
                  <label class="text-gray-600 block">
                    Numer telefonu
                  </label>
                  <div class="font-medium text-xl">
                    {{ $order->client->phone_number }}
                  </div>
                </div>
                <div class="mb-4 pb-1 border-b-2">
                  <label class="text-gray-600 block">
                    Email
                  </label>
                  <div class="font-medium text-xl">
                    {{ $order->client->email }}
                  </div>
                </div>
                <div class="mb-4 pb-1 border-b-2">
                  <label class="text-gray-600 block">
                    Adres
                  </label>
                  <div class="font-medium text-xl">
                    {{ $order->client->address }}
                  </div>
                </div>
                <div class="text-xl font-medium my-5">Dodatkowe informacje o zamówieniu</div>
                <div class="mb-4">
                  <label class="text-gray-600 block">
                    Akcesoria
                  </label>
                  {{-- <input type="text" class="border border-gray-300 mt-1 rounded p-1 w-96" --}}
                  {{-- required> TODO --}}
                </div>
                <div class="mb-4">
                  <label class="text-gray-600 block">Komentarz</label>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
