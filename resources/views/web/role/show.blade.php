@extends('web/layouts/master')

@section('title')
  SerwicePC - edytuj zamówienie
@endsection

@section('content')
  <div>
    <div class="py-8 mt-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
      <span class="font-medium text-2xl">Edytuj zamówienie: </span>{{ $role->id }}
    </div>
    <x-forms.background>
      <div class="pb-1 border-b-2 flex-1">
        <label class="text-gray-600 block">Nazwa</label>
        <div class="font-medium text-xl">
          {{ $role->name }}
        </div>
      </div>
      @forelse($role->permissions as $permission)
        <div>{{ $permission->name }}</div>
      @empty
        <div>no permissions</div>
      @endforelse
    </x-forms.background>
  </div>
@endsection
