@extends('web/layouts/master')

@section('title')
  SerwicePC - stwórz klienta
@endsection

@section('content')
  <div>
    <div class="py-8 mt-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
      <span class="font-medium text-2xl">Zapisz nowy typ zamówienia</span>
    </div>
    <x-forms.background>
      <form action="{{ route('role.store') }}" method="POST">
        @csrf
        <div class="p-2">
          <div class="mb-5">
            <x-forms.title>Stwórz nową rolę:</x-forms.title>
          </div>
          <div class="w-1/2 mb-4">
            <x-forms.label>Nazwa</x-forms.label>
            <x-forms.input name="name" :value="old('name')" :errors="$errors->messages()" />
          </div>
          <div class="grid grid-cols-4 gap-4 w-full">
            @foreach ($permissions as $permission)
              <div class="col-span-1 flex items-center 
                @if($loop->iteration%4)) border-r-2 border-gray-200 @endif">
                <x-forms.label for="permission[]">{{ $permission->name }}</x-forms.label>
                <x-forms.input type="checkbox" name="permission[]" value="{{ $permission->id }}"
                  :errors="$errors->messages()" />
              </div>
              @if(!($loop->iteration%4))
                <div class="border-2 border-gray-100 col-span-4"></div>
              @endif
            @endforeach
          </div>
          <div class="text-right">
            <button type="submit"
              class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full float-right"
              required>Submit</button>
          </div>
        </div>
      </form>
    </x-forms.background>
  </div>
@endsection
