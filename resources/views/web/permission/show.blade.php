@extends('web/layouts/master')

@section('title')
  SerwicePC - edytuj zamówienie
@endsection

@section('content')
  <div>
    <div class="py-8 mt-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
      <span class="font-medium text-2xl">Edytuj zamówienie: </span>{{ $permission->id }}
    </div>
    <div class="py-4">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <div class="pb-1 border-b-2 flex-1">
              <label class="text-gray-600 block">Nazwa</label>
              <div class="font-medium text-xl">
                {{ $permission->name }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
