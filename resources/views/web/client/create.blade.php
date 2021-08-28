@extends('web/layouts/master')

@section('title')
  SerwicePC - stwórz klienta
@endsection

@section('content')
  @if ($errors->any())
    {!! implode('', $errors->all('<div>:message</div>')) !!}
  @endif
  <div>
    <div class="py-8 mt-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
      <span class="font-medium text-2xl">Zapisz nowego klienta</span>
    </div>
    <div class="py-4">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <form action="{{ route('client.store') }}" method="POST">
              @csrf
              <div class="p-2">
                <div class="text-xl font-medium mb-5">Dane klienta</div>
                <div class="mb-4">
                  <label class="text-gray-600 block">
                    Typ klienta
                  </label>
                  <select name="type_id"
                    class="mt-1 border border-gray-300 @error('type_id') border-red-600 @enderror @error('order.type') border-red-600 @enderror rounded p-1 w-96">
                    <option value=""></option>
                    @foreach ($clientTypes as $type)
                      <option value="{{ $type->id }}" @if (old('type_id') === $type->id) selected @endif>
                        {{ $type->name }}
                      </option>
                    @endforeach
                  </select>
                  @error('type_id')
                    <div class="text-red-600 text-sm my-2">
                      <span class="font-medium">{{ $message }}</span>
                    </div>
                  @enderror
                </div>
                <div class="mb-4">
                  <label class="text-gray-600 block">Imię</label>
                  <input type="text"
                    class="border border-gray-300 @error('first_name') border-red-600 @enderror mt-1 rounded p-1 w-96"
                    name="first_name" required value="{{ old('first_name') }}">
                  @error('first_name')
                    <div class="text-red-600 text-sm my-2">
                      <span class="font-medium">{{ $message }}</span>
                    </div>
                  @enderror
                </div>
                <div class="mb-4">
                  <label class="text-gray-600 block">Drugie Imię</label>
                  <input type="text"
                    class="border border-gray-300 @error('middle_name') border-red-600 @enderror mt-1 rounded p-1 w-96"
                    name="middle_name" required value="{{ old('middle_name') }}">
                  @error('middle_name')
                    <div class="text-red-600 text-sm my-2">
                      <span class="font-medium">{{ $message }}</span>
                    </div>
                  @enderror
                </div>
                <div class="mb-4">
                  <label class="text-gray-600 block">Nazwisko</label>
                  <input type="text"
                    class="border border-gray-300 @error('last_name') border-red-600 @enderror mt-1 rounded p-1 w-96"
                    name="last_name" required value="{{ old('last_name') }}">
                  @error('last_name')
                    <div class="text-red-600 text-sm my-2">
                      <span class="font-medium">{{ $message }}</span>
                    </div>
                  @enderror
                </div>
                <div class="mb-4">
                  <label class="text-gray-600 block">Numer telefonu</label>
                  <input type="text"
                    class="border border-gray-300 @error('phone_number') border-red-600 @enderror mt-1 rounded p-1 w-96"
                    name="phone_number" required value="{{ old('phone_number') }}">
                  @error('phone_number')
                    <div class="text-red-600 text-sm my-2">
                      <span class="font-medium">{{ $message }}</span>
                    </div>
                  @enderror
                </div>
                <div class="mb-4">
                  <label class="text-gray-600 block">Adres</label>
                  <input type="text"
                    class="border border-gray-300 @error('address') border-red-600 @enderror mt-1 rounded p-1 w-96"
                    name="address" required value="{{ old('address') }}">
                  @error('address')
                    <div class="text-red-600 text-sm my-2">
                      <span class="font-medium">{{ $message }}</span>
                    </div>
                  @enderror
                </div>
                <div class="mb-4">
                  <label class="text-gray-600 block">Email</label>
                  <input type="text"
                    class="border border-gray-300 @error('email') border-red-600 @enderror mt-1 rounded p-1 w-96"
                    name="email" required value="{{ old('email') }}">
                  @error('email')
                    <div class="text-red-600 text-sm my-2">
                      <span class="font-medium">{{ $message }}</span>
                    </div>
                  @enderror
                </div>
                <div class="mb-4">
                  <label class="text-gray-600 block">Opis</label>
                  <textarea name="description" class="w-96 border border-gray-300 @error('description') border-red-600 @enderror mt-1 rounded p-1 h-40">
                    {{ old('description') }}
                  </textarea>
                  @error('description')
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
