@extends('web/layouts/master')

@section('title')
  SerwicePC - stwórz zamówienie
@endsection

@section('content')
  <div>
    <div class="py-8 mt-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
      <span class="font-medium text-2xl">Stwórz nowe zamówienie</span>
    </div>
    <div class="py-4">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <form action="{{ route('order.store') }}" method="POST">
              @csrf
              <div class="flex justify-around">
                <div class="p-2">
                  <div class="text-xl font-medium mb-5">Dane zamówienia</div>
                  <div class="mb-4">
                    <label class="text-gray-600 block">
                      Typ zamówienia
                    </label>
                    <select name="order[type]"
                      class="mt-1 border border-gray-300 @error('order.type') border-red-600 @enderror @error('order.type') border-red-600 @enderror rounded p-1 w-96">
                      <option value="{{ old('order.type') }}">{{ old('order.type') }}</option>
                      @foreach ($orderTypes as $type)
                        <option value="{{ $type->type }}">{{ $type->type }}</option>
                      @endforeach
                    </select>
                    @error('order.type')
                      <div class="text-red-600 text-sm my-2">
                        <span class="font-medium">{{ $message }}</span>
                      </div>
                    @enderror
                  </div>
                  <div class="mb-4">
                    <label class="text-gray-600 block">
                      Numer seryjny
                    </label>
                    <input type="text" class="border border-gray-300 @error('order.serial_number') border-red-600 @enderror mt-1 rounded p-1 w-96" name="order[serial_number]"
                      required value="{{ old('order.serial_number') }}">
                    @error('order.serial_number')
                      <div class="text-red-600 text-sm my-2">
                        <span class="font-medium">{{ $message }}</span>
                      </div>
                    @enderror
                  </div>
                  <div class="mb-4">
                    <label class="text-gray-600 block">
                      Numer artykułu (part number)
                    </label>
                    <input type="text" class="border border-gray-300 @error('order.part_number') border-red-600 @enderror mt-1 rounded p-1 w-96" name="order[part_number]"
                      required value="{{ old('order.part_number') }}">
                    @error('order.part_number')
                      <div class="text-red-600 text-sm my-2">
                        <span class="font-medium">{{ $message }}</span>
                      </div>
                    @enderror
                  </div>
                  <div class="mb-4">
                    <label class="text-gray-600 block">
                      Model
                    </label>
                    <input type="text" class="border border-gray-300 @error('order.model') border-red-600 @enderror mt-1 rounded p-1 w-96" name="order[model]" required
                      value="{{ old('order.model') }}">
                    @error('order.model')
                      <div class="text-red-600 text-sm my-2">
                        <span class="font-medium">{{ $message }}</span>
                      </div>
                    @enderror
                  </div>
                  <div class="mb-4">
                    <label class="text-gray-600 block">
                      Producent
                    </label>
                    <input type="text" class="border border-gray-300 @error('order.manufacturer') border-red-600 @enderror mt-1 rounded p-1 w-96" name="order[manufacturer]"
                      required value="{{ old('order.manufacturer') }}">
                    @error('order.manufacturer')
                      <div class="text-red-600 text-sm my-2">
                        <span class="font-medium">{{ $message }}</span>
                      </div>
                    @enderror
                  </div>
                  <div class="mb-4">
                    <label class="text-gray-600 block">
                      Przewidywana data wydania
                    </label>
                    <input type="text" class="border border-gray-300 @error('order.deadline') border-red-600 @enderror mt-1 rounded p-1 w-96" name="order[deadline]"
                      required value="{{ old('order.deadline') }}">
                    @error('order.deadline')
                      <div class="text-red-600 text-sm my-2">
                        <span class="font-medium">{{ $message }}</span>
                      </div>
                    @enderror
                  </div>
                  <div class="mb-4">
                    <label class="text-gray-600 block">Wygląd urządzenia</label>
                    <textarea name="order[visual_description]" class="w-96 border border-gray-300 @error('order.visual_description') border-red-600 @enderror mt-1 rounded p-1 h-40">
                                  {{ old('order.visual_description') }}
                                </textarea>
                    @error('order.visual_description')
                      <div class="text-red-600 text-sm my-2">
                        <span class="font-medium">{{ $message }}</span>
                      </div>
                    @enderror
                  </div>
                  <div class="mb-4">
                    <label class="text-gray-600 block">Opis usterki</label>
                    <textarea name="order[issue_description]" class="w-96 border border-gray-300 @error('order.issue_description') border-red-600 @enderror mt-1 rounded p-1 h-40">
                                  {{ old('order.issue_description') }}
                                </textarea>
                    @error('order.issue_description')
                      <div class="text-red-600 text-sm my-2">
                        <span class="font-medium">{{ $message }}</span>
                      </div>
                    @enderror
                  </div>
                </div>
                <div class="p-2 w-96">
                  <div class="text-xl font-medium mb-5">Dane klienta</div>
                  <div class="mb-4 flex">
                    <div>
                      <label class="text-gray-600 block">
                        Imię
                      </label>
                      <input type="text" class="border border-gray-300 @error('client.first_name') border-red-600 @enderror mt-1 rounded p-1 w-40" name="client[first_name]"
                        required value="{{ old('client.first_name') }}">
                      @error('client.first_name')
                        <div class="text-red-600 text-sm my-2">
                          <span class="font-medium">{{ $message }}</span>
                        </div>
                      @enderror
                    </div>
                    <div class="ml-3">
                      <label class="text-gray-600 block">
                        Nazwisko
                      </label>
                      <input type="text" class="border border-gray-300 @error('client.last_name') border-red-600 @enderror mt-1 rounded p-1 w-52" name="client[last_name]"
                        required value="{{ old('client.last_name') }}">
                      @error('client.last_name')
                        <div class="text-red-600 text-sm my-2">
                          <span class="font-medium">{{ $message }}</span>
                        </div>
                      @enderror
                    </div>
                  </div>
                  <div class="mb-4">
                    <label class="text-gray-600 block">
                      Numer telefonu
                    </label>
                    <input type="text" class="border border-gray-300 @error('client.phone_number') border-red-600 @enderror mt-1 rounded p-1 w-96" name="client[phone_number]"
                      required value="{{ old('client.phone_number') }}">
                    @error('client.phone_number')
                      <div class="text-red-600 text-sm my-2">
                        <span class="font-medium">{{ $message }}</span>
                      </div>
                    @enderror
                  </div>
                  <div class="mb-4">
                    <label class="text-gray-600 block">
                      Email
                    </label>
                    <input type="text" class="border border-gray-300 @error('client.email') border-red-600 @enderror mt-1 rounded p-1 w-96" name="client[email]" required
                      value="{{ old('client.email') }}">
                    @error('client.email')
                      <div class="text-red-600 text-sm my-2">
                        <span class="font-medium">{{ $message }}</span>
                      </div>
                    @enderror
                  </div>
                  <div class="mb-4">
                    <label class="text-gray-600 block">
                      Adres
                    </label>
                    <input type="text" class="border border-gray-300 @error('client.address') border-red-600 @enderror mt-1 rounded p-1 w-96" name="client[address]"
                      required value="{{ old('client.address') }}">
                    @error('client.address')
                      <div class="text-red-600 text-sm my-2">
                        <span class="font-medium">{{ $message }}</span>
                      </div>
                    @enderror
                  </div>
                  <div class="pb-4">
                    <label class="text-gray-600 block" for="client_type">
                      Typ klienta
                    </label>
                    <select name="client[type]" class="mt-1 border border-gray-300 @error('client.type') border-red-600 @enderror rounded p-1 w-96">
                      <option value="{{ old('client.type') }}">{{ old('client.type') }}</option>
                      @foreach ($clientTypes as $type)
                        <option value="{{ $type->type }}">{{ $type->type }}</option>
                      @endforeach
                    </select>
                    @error('client.type')
                      <div class="text-red-600 text-sm my-2">
                        <span class="font-medium">{{ $message }}</span>
                      </div>
                    @enderror
                  </div>
                  <div class="text-xl font-medium my-5">Dodatkowe informacje o zamówieniu</div>
                  <div class="mb-4">
                    <label class="text-gray-600 block">
                      Akcesoria
                    </label>
                    {{-- <input type="text" class="border border-gray-300 @error('order.type') border-red-600 @enderror mt-1 rounded p-1 w-96" --}}
                    {{-- required> TODO --}}
                  </div>
                  <div class="mb-4">
                    <label class="text-gray-600 block">Komentarz</label>
                    <textarea name="order[comment]" class="w-96 border border-gray-300 @error('order.comment') border-red-600 @enderror mt-1 rounded p-1 h-40">
                                  {{ old('order.comment') }}
                                </textarea>
                    @error('client.comment')
                      <div class="text-red-600 text-sm my-2">
                        <span class="font-medium">{{ $message }}</span>
                      </div>
                    @enderror
                  </div>
                  <div class="p-1">
                    <button role="submit"
                      class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full float-right"
                      required>Submit</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
