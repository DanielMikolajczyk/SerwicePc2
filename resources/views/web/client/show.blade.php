@extends('web/layouts/master')

@section('title')
  SerwicePC - edytuj zamówienie
@endsection

@section('content')
  <div>
    <div class="py-8 mt-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
      <span class="font-medium text-2xl">Edytuj zamówienie: </span>{{ $client->id }}
    </div>
    <div class="py-4">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <div class="pb-1 border-b-2 flex-1">
              <label class="text-gray-600 block">Imię</label>
              <div class="font-medium text-xl">
                {{ $client->first_name }}
              </div>
            </div>
            <div class="pb-1 border-b-2 flex-1">
              <label class="text-gray-600 block">Drugie imię</label>
              <div class="font-medium text-xl">
                {{ $client->middle_name }}
              </div>
            </div>
            <div class="pb-1 border-b-2 flex-1">
              <label class="text-gray-600 block">Nazwisko</label>
              <div class="font-medium text-xl">
                {{ $client->last_name }}
              </div>
            </div>
            <div class="pb-1 border-b-2 flex-1">
              <label class="text-gray-600 block">Adres</label>
              <div class="font-medium text-xl">
                {{ $client->address }}
              </div>
            </div>
            <div class="pb-1 border-b-2 flex-1">
              <label class="text-gray-600 block">Numer telefonu</label>
              <div class="font-medium text-xl">
                {{ $client->phone_number }}
              </div>
            </div>
            <div class="pb-1 border-b-2 flex-1">
              <label class="text-gray-600 block">Email</label>
              <div class="font-medium text-xl">
                {{ $client->email }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
