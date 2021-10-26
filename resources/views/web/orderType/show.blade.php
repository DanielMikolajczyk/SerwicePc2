@extends('web/layouts/master')

@section('title')
  SerwicePC - edytuj zamówienie
@endsection

@section('content')
  <div class="py-8 mt-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
    <span class="font-medium text-2xl">Szczegóły Typu Zamówienia</span>
  </div>
  <x-forms.background>
    <div class="mb-5">
      <x-forms.title>Typ Zamówienia:</x-forms.title>
    </div>
    <div class="grid grid-cols-6 gap-4 mb-4 w-full">

      <div class="col-span-2">
        <x-forms.label>Nazwa</x-forms.label>
        <x-forms.input name="name" :value="$orderType->name" disabled="true" />
      </div>

      <div class="col-span-6">
        <x-forms.label>Opis</x-forms.label>
        <p>{{ $orderType->description }}</p>
      </div>
      
    </div>
  </x-forms.background>
@endsection
