@extends('web/layouts/master')

@section('title')
  SerwicePC
@endsection

@section('content')
  <div>
    <div class="py-8 mt-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
      <span class="font-medium text-2xl">Edycja klienta</span>
    </div>
    <x-forms.background>
      <form action="{{ route('client.update', $client->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-5 p-2 flex justify-between">
          <x-forms.title>
            <div class="flex items-center">
              <img class="h-10 w-10 mr-3 rounded-full"
                src="{{ $client->image_url != null ? asset($client->image_url) : asset('storage/images/default-avatar.png') }}"
                alt="">
              <div>{{ $client->fullName }}</div>
            </div>
          </x-forms.title>
          <div>
            <a class="mx-2" href="{{ route('client.show', $client->id) }}">
              <x-buttons.info bgColor="green" class="px-4 py-2" icon="fas fa-arrow-right" iconPosition="right">
                Przejdź do szczegółów
              </x-buttons.info>
            </a>
          </div>
        </div>
        <div class="grid grid-cols-6 gap-4 mb-4 w-full">
          <div class="col-span-2">
            <x-forms.label>Imię</x-forms.label>
            <x-forms.input name="first_name" :value="$client->first_name" :errors="$errors->messages()" />
          </div>

          <div class="col-span-2">
            <x-forms.label>Drugie imię</x-forms.label>
            <x-forms.input name="middle_name" :value="$client->middle_name" :errors="$errors->messages()" />
          </div>

          <div class="col-span-2">
            <x-forms.label>Nazwisko</x-forms.label>
            <x-forms.input name="last_name" :value="$client->last_name" :errors="$errors->messages()" />
          </div>

          <div class="col-span-2">
            <x-forms.label>Numer Telefonu</x-forms.label>
            <x-forms.input name="phone_number" :value="$client->phone_number" :errors="$errors->messages()" />
          </div>

          <div class="col-span-2">
            <x-forms.label>Adres</x-forms.label>
            <x-forms.input name="address" :value="$client->address" :errors="$errors->messages()" />
          </div>

          <div class="col-span-2">
            <x-forms.label>Email</x-forms.label>
            <x-forms.input name="email" :value="$client->email" :errors="$errors->messages()" />
          </div>

          <div class="col-span-6">
            <x-forms.label>Opis</x-forms.label>
            <x-forms.textarea name="description" :errors="$errors->messages()">{{ $client->description }}
            </x-forms.textarea>
          </div>

          <div class="col-span-2">
            <x-forms.label>Typ klienta</x-forms.label>
            <x-forms.select name="type_id" :array="$clientTypes" :errors="$errors->messages()"
              :selected="$client->type_id" />
          </div>

          <div class="col-span-4">
            <x-buttons.submit bgColor="blue">Zatwierdź</x-buttons.submit>
          </div>
        </div>
      </form>
    </x-forms.background>
  </div>
@endsection
