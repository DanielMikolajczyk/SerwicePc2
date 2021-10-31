@extends('web/layouts/master')

@section('title')
  SerwicePC - edytuj typ zamówienia
@endsection

@section('content')
  <div class="py-8 mt-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
    <span class="font-medium text-2xl">Edycja Statusu Zamówienia</span>
  </div>
  <x-forms.background>
    <form action="{{ route('diagnose.update', $diagnose->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="p-2">
        <div class="mb-5">
          <x-forms.title>Dane statusu zamówienia:</x-forms.title>
        </div>
        <div class="grid grid-cols-6 gap-4 mb-4 w-full">

          <div class="col-span-2">
            <x-forms.label>Nazwa</x-forms.label>
            <x-forms.input name="name" :value="$diagnose->name" :errors="$errors->messages()" />
          </div>

          <div class="col-span-2">
            <x-forms.label>Cena</x-forms.label>
            <x-forms.input name="price" :value="$diagnose->price" :errors="$errors->messages()" />
          </div>

          <div class="col-span-2">
            <x-forms.label>Typ</x-forms.label>
            <x-forms.select name="type_id" :array="$orderTypes" :errors="$errors->messages()"
              :selected="$diagnose->type->id"/>
          </div>

          <div class="col-span-6">
            <x-forms.label>Opis</x-forms.label>
            <x-forms.textarea name="description" :errors="$errors->messages()">{{ $diagnose->description }}
            </x-forms.textarea>
          </div>

          <div class="col-span-6">
            <x-buttons.submit bgColor="blue" icon="fas fa-check">Zatwierdź</x-buttons.submit>
          </div>

        </div>
      </div>
    </form>
  </x-forms.background>
@endsection