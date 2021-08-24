@extends('web/layouts/master')

@section('title')
  SerwicePC - edytuj typ zamówienia
@endsection

@section('content')
  @if ($errors->any())
    {!! implode('', $errors->all('<div>:message</div>')) !!}
  @endif
  <div>
    <div class="py-8 mt-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
      <span class="font-medium text-2xl">Edytuj typ zamówienia:</span>
    </div>
    <div class="py-4">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <form action="{{ route('departament.update', $departament->id) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="p-2">
                <div class="text-xl font-medium mb-5">Dane departamentu: </div>
                <div class="mb-4">
                  <label class="text-gray-600 block">Nazwa</label>
                  <input type="text"
                    class="border border-gray-300 @error('name') border-red-600 @enderror mt-1 rounded p-1 w-96"
                    name="name" required value="{{ $departament->name }}">
                  @error('name')
                    <div class="text-red-600 text-sm my-2">
                      <span class="font-medium">{{ $message }}</span>
                    </div>
                  @enderror
                </div>
                <div class="mb-4">
                  <label class="text-gray-600 block">Kod</label>
                  <input type="text"
                    class="border border-gray-300 @error('code') border-red-600 @enderror mt-1 rounded p-1 w-96"
                    name="code" required value="{{ $departament->code }}">
                  @error('code')
                    <div class="text-red-600 text-sm my-2">
                      <span class="font-medium">{{ $message }}</span>
                    </div>
                  @enderror
                </div>
                <div class="text-right">
                  <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full float-right"
                    required>Submit</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
