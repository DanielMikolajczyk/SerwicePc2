@extends('web/layouts/master')

@section('title')
  SerwicePC - stwórz klienta
@endsection

@section('content')
  <div>
    <div class="py-8 mt-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
      <span class="font-medium text-2xl">Zapisz nowego klienta</span>
    </div>
    <x-forms.background>
      <form action="{{ route('client.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="p-2">
          <div class="mb-5">
            <x-forms.title>Dane klienta:</x-forms.title>
          </div>
          <div class="grid grid-cols-6 gap-4 mb-4 w-full">
            <div class="col-span-2">
              <x-forms.label>Imię</x-forms.label>
              <x-forms.input name="first_name" :value="old('first_name')" :errors="$errors->messages()" />
            </div>

            <div class="col-span-2">
              <x-forms.label>Drugie imię</x-forms.label>
              <x-forms.input name="middle_name" :value="old('middle_name')" :errors="$errors->messages()" />
            </div>

            <div class="col-span-2">
              <x-forms.label>Nazwisko</x-forms.label>
              <x-forms.input name="last_name" :value="old('last_name')" :errors="$errors->messages()" />
            </div>

            <div class="col-span-2">
              <x-forms.label>Numer Telefonu</x-forms.label>
              <x-forms.input name="phone_number" :value="old('phone_number')" :errors="$errors->messages()" />
            </div>

            <div class="col-span-2">
              <x-forms.label>Adres</x-forms.label>
              <x-forms.input name="address" :value="old('address')" :errors="$errors->messages()" />
            </div>

            <div class="col-span-2">
              <x-forms.label>Email</x-forms.label>
              <x-forms.input name="email" :value="old('email')" :errors="$errors->messages()" />
            </div>

            <div class="col-span-6">
              <x-forms.label>Opis</x-forms.label>
              <x-forms.textarea name="description" :errors="$errors->messages()">{{ old('description') }}
              </x-forms.textarea>
            </div>

            <div class="col-span-2">
              <x-forms.label>Typ klienta</x-forms.label>
              <x-forms.select name="type_id" :array="$clientTypes" :errors="$errors->messages()"
                :selected="old('type_id')" />
            </div>

            <div class="col-span-2">
              <x-forms.label>Zdjęcie</x-forms.label>
              <x-forms.input name="image" type="file" :value="old('image')" :errors="$errors->messages()" />
            </div>

            <div class="col-span-2 self-center">
              <x-buttons.submit bgColor="blue" icon="fas fa-check">Zatwierdź</x-buttons.submit>
            </div>
          </div>
        </div>
      </form>
    </x-forms.background>
  </div>
@endsection
