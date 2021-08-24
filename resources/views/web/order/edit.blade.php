@extends('web/layouts/master')

@section('title')
  SerwicePC - edytuj zamówienie
@endsection

@section('content')
  @if($errors->any())
    {!! implode('', $errors->all('<div>:message</div>')) !!}
  @endif
  <div>
    <div class="py-8 mt-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
      <span class="font-medium text-2xl">Edytuj zamówienie: </span>{{ $order->id }}
    </div>
    <div class="py-4">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <form action="{{ route('order.update',$order->id) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="flex justify-around">
                <div class="p-2">
                  <div class="text-xl font-medium mb-5">Dane zamówienia</div>
                  <div class="mb-4">
                    <label class="text-gray-600 block">
                      Typ zamówienia
                    </label>
                    <select name="type_id"
                      class="mt-1 border border-gray-300 @error('type_id') border-red-600 @enderror @error('type') border-red-600 @enderror rounded p-1 w-96">
                      @foreach ($orderTypes as $type)
                        <option value="{{ $type->id }}" @if($order->type_id === $type->id) selected @endif>
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
                    <label class="text-gray-600 block">
                      Numer seryjny
                    </label>
                    <input type="text"
                      class="border border-gray-300 @error('serial_number') border-red-600 @enderror mt-1 rounded p-1 w-96"
                      name="serial_number" required value="{{ $order->serial_number }}">
                    @error('serial_number')
                      <div class="text-red-600 text-sm my-2">
                        <span class="font-medium">{{ $message }}</span>
                      </div>
                    @enderror
                  </div>
                  <div class="mb-4">
                    <label class="text-gray-600 block">
                      Numer artykułu (part number)
                    </label>
                    <input type="text"
                      class="border border-gray-300 @error('part_number') border-red-600 @enderror mt-1 rounded p-1 w-96"
                      name="part_number" required value="{{ $order->part_number }}">
                    @error('part_number')
                      <div class="text-red-600 text-sm my-2">
                        <span class="font-medium">{{ $message }}</span>
                      </div>
                    @enderror
                  </div>
                  <div class="mb-4">
                    <label class="text-gray-600 block">
                      Model
                    </label>
                    <input type="text"
                      class="border border-gray-300 @error('model') border-red-600 @enderror mt-1 rounded p-1 w-96"
                      name="model" required value="{{ $order->model }}">
                    @error('model')
                      <div class="text-red-600 text-sm my-2">
                        <span class="font-medium">{{ $message }}</span>
                      </div>
                    @enderror
                  </div>
                  <div class="mb-4">
                    <label class="text-gray-600 block">
                      Producent
                    </label>
                    <input type="text"
                      class="border border-gray-300 @error('manufacturer') border-red-600 @enderror mt-1 rounded p-1 w-96"
                      name="manufacturer" required value="{{ $order->manufacturer }}">
                    @error('manufacturer')
                      <div class="text-red-600 text-sm my-2">
                        <span class="font-medium">{{ $message }}</span>
                      </div>
                    @enderror
                  </div>
                  <div class="mb-4">
                    <label class="text-gray-600 block">
                      Przewidywana data wydania
                    </label>
                    <input type="text"
                      class="border border-gray-300 @error('deadline') border-red-600 @enderror mt-1 rounded p-1 w-96"
                      name="deadline" required value="{{ $order->deadline }}">
                    @error('deadline')
                      <div class="text-red-600 text-sm my-2">
                        <span class="font-medium">{{ $message }}</span>
                      </div>
                    @enderror
                  </div>
                  <div class="mb-4">
                    <label class="text-gray-600 block">Wygląd urządzenia</label>
                    <textarea name="visual_description"
                      class="w-96 border border-gray-300 mt-1 rounded p-1 h-40
                        @error('visual_description') border-red-600 @enderror">{{ $order->visual_description }}</textarea>
                    @error('visual_description')
                      <div class="text-red-600 text-sm my-2">
                        <span class="font-medium">{{ $message }}</span>
                      </div>
                    @enderror
                  </div>
                  <div class="mb-4">
                    <label class="text-gray-600 block">Opis usterki</label>
                    <textarea name="issue_description"
                      class="w-96 border border-gray-300 @error('issue_description') border-red-600 @enderror mt-1 rounded p-1 h-40"
                      >{{ $order->issue_description }}</textarea>
                    @error('issue_description')
                      <div class="text-red-600 text-sm my-2">
                        <span class="font-medium">{{ $message }}</span>
                      </div>
                    @enderror
                  </div>
                </div>
                <div class="p-2 w-96">
                  <div class="text-xl font-medium mb-5">Dane klienta</div>
                  <div class="mb-4 flex">
                    <div class="pb-1 border-b-2 flex-1">
                      <label class="text-gray-600 block">
                        Imię
                      </label>
                      <div class="font-medium text-xl">
                        {{ $order->client->first_name }}                      
                      </div>
                    </div>
                    <div class="ml-3 pb-1 border-b-2 flex-1">
                      <label class="text-gray-600 block">
                        Nazwisko
                      </label>
                      <div class="font-medium text-xl">
                        {{ $order->client->last_name }}                     
                      </div>
                    </div>
                  </div>
                  <div class="mb-4 pb-1 border-b-2">
                    <label class="text-gray-600 block">
                      Numer telefonu
                    </label>
                    <div class="font-medium text-xl">
                      {{ $order->client->phone_number }}
                    </div>
                  </div>
                  <div class="mb-4 pb-1 border-b-2">
                    <label class="text-gray-600 block">
                      Email
                    </label>
                    <div class="font-medium text-xl">
                      {{ $order->client->email }}
                    </div>
                  </div>
                  <div class="mb-4 pb-1 border-b-2">
                    <label class="text-gray-600 block">
                      Adres
                    </label>
                    <div class="font-medium text-xl">
                      {{ $order->client->address }}
                    </div>
                  </div>
                  <div class="text-xl font-medium my-5">Dodatkowe informacje o zamówieniu</div>
                  <div class="mb-4">
                    <label class="text-gray-600 block">
                      Akcesoria
                    </label>
                    {{-- <input type="text" class="border border-gray-300 @error('type') border-red-600 @enderror mt-1 rounded p-1 w-96" --}}
                    {{-- required> TODO --}}
                  </div>
                  <div class="mb-4">
                    <label class="text-gray-600 block">Komentarz</label>
                    <textarea name="comment"
                      class="w-96 border border-gray-300 @error('comment') border-red-600 @enderror mt-1 rounded p-1 h-40"
                      >{{ $order->comment }}</textarea>
                    @error('comment')
                      <div class="text-red-600 text-sm my-2">
                        <span class="font-medium">{{ $message }}</span>
                      </div>
                    @enderror
                  </div>
                  <div class="p-1">
                    <button type="submit"
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
