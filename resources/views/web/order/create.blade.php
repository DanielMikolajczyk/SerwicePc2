@extends('web/layouts/master')

@section('title')
  SerwicePC - stwórz zamówienie
@endsection

@section('content')
  <div>
    <div class="py-8 mt-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
      <span class="font-medium text-2xl">Stwórz nowe zamówienie</span>
    </div>
    <x-forms.background>
      <form action="{{ route('order.store') }}" method="POST" enctype="multipart/form-data" class="overflow-x-hidden">
        @csrf
        <div class="w-full-3x flex relative transition-all right-0 duration-1000 ease-in-out" id="main-div">
          <div class="w-1/3">
            <div class="p-2">
              <div class="mb-5">
                <x-forms.title>Dane klienta:</x-forms.title>
              </div>
              <div class="grid grid-cols-6 gap-4 mb-4 w-full">
                <div class="col-span-3">
                  <x-forms.label>Numer telefonu</x-forms.label>
                  <div class="flex align-center">
                    <div class="w-3/4">
                      <x-forms.input id="phone" name="client[phone_number]" :value="old('client[phone_number]')"
                        :errors="$errors->messages()" />
                    </div>
                    <x-buttons.info bgColor="blue" icon="fas fa-search" class="mx-3"
                      onclick="loadClient(document.getElementById('phone').value)">
                      Szukaj
                    </x-buttons.info>
                  </div>
                </div>
                <div class="col-span-3"></div>
                <div class="col-span-3">
                  <x-forms.label>Imię</x-forms.label>
                  <x-forms.input name="client[first_name]" :value="old('client[first_name]')"
                    :errors="$errors->messages()" id="first_name" />
                </div>
                <div class="col-span-3">
                  <x-forms.label>Nazwisko</x-forms.label>
                  <x-forms.input name="client[last_name]" :value="old('client[last_name]')" :errors="$errors->messages()"
                    id="last_name" />
                </div>
                <div class="col-span-3">
                  <x-forms.label>Adres</x-forms.label>
                  <x-forms.input name="client[address]" :value="old('client[address]')" :errors="$errors->messages()"
                    id="address" />
                </div>
                <div class="col-span-3">
                  <x-forms.label>Email</x-forms.label>
                  <x-forms.input name="client[email]" :value="old('client[email]')" :errors="$errors->messages()"
                    id="email" />
                </div>
                <div class="col-span-3">
                  <x-forms.label>Typ klienta</x-forms.label>
                  <x-forms.select name="client[type_id]" :array="$clientTypes" :errors="$errors->messages()"
                    :selected="old('client[type_id]')" id="type" />
                </div>
              </div>
            </div>
          </div>
          <div class="w-1/3 left-full">
            <div class="p-2">
              <div class="mb-5">
                <x-forms.title>Dane zamówienia:</x-forms.title>
              </div>
              <div id="order-grid" class="grid grid-cols-6 gap-4 mb-4 w-full">
                <div class="col-span-2">
                  <x-forms.label>Model</x-forms.label>
                  <x-forms.input name="order[model]" :value="old('order[model]')" :errors="$errors->messages()" />
                </div>
                <div class="col-span-2">
                  <x-forms.label>Numer seryjny</x-forms.label>
                  <x-forms.input name="order[serial_number]" :value="old('order[serial_number]')"
                    :errors="$errors->messages()" />
                </div>
                <div class="col-span-2">
                  <x-forms.label>Numer partii</x-forms.label>
                  <x-forms.input name="order[part_number]" :value="old('order[part_number]')"
                    :errors="$errors->messages()" />
                </div>
                <div class="col-span-2">
                  <x-forms.label>Producent</x-forms.label>
                  <x-forms.input name="order[manufacturer]" :value="old('order[manufacturer]')"
                    :errors="$errors->messages()" />
                </div>
                <div class="col-span-2">
                  <x-forms.label>Data wydania</x-forms.label>
                  <x-forms.input type="date" name="order[deadline]" :value="old('order[deadline]')"
                    :errors="$errors->messages()" />
                </div>
                <div class="col-span-2">
                  <x-forms.label>Typ</x-forms.label>
                  <x-forms.select name="order[type_id]" :array="$orderTypes" :errors="$errors->messages()"
                    :selected="old('order[type_id]')" />
                </div>
                <div class="col-span-3">
                  <x-forms.label>Wygląd Sprzętu</x-forms.label>
                  <x-forms.textarea name="order[visual_description]" :errors="$errors->messages()">
                    {{ old('order[visual_description]') }}
                  </x-forms.textarea>
                </div>
                <div class="col-span-3">
                  <x-forms.label>Opis usterki</x-forms.label>
                  <x-forms.textarea name="order[issue_description]" :errors="$errors->messages()">
                    {{ old('order[issue_description]') }}
                  </x-forms.textarea>
                </div>
                <div class="col-span-2">
                  <x-buttons.info id="order-image-btn" bgColor="green" icon="fas fa-plus">Dodaj zdjęcie</x-buttons.info>
                </div>
              </div>
            </div>
          </div>
          <div class="w-1/3 left-full-2x">
            <div class="p-2">
              <div class="mb-5">
                <x-forms.title>Akcesoria (opcjonalne):</x-forms.title>
              </div>
              <div id="accessory-grid" class="grid grid-cols-6 gap-2 mb-4 w-full">
                @if (array_key_contains('accessory', $errors->messages()))
                  <div class="col-span-6 border-2 p-4 border-red-500">
                    <span class="text-red-500">Nieprawidłowe dane akcesorium</span>
                  </div>
                @endif
                <div class="col-span-6">
                  <button id="accessory-create" type="button" class='bg-blue-500 w-full text-white font-bold py-2 px-4 rounded-full 
                          hover:bg-blue-700 transition duration-500 ease-in-out'>
                    <i class="fas fa-plus"></i>
                    <span>Dodaj nowe akcesorium</span>
                  </button>
                </div>
                <div class="col-span-2">
                  <x-buttons.submit bgColor="blue" icon="fas fa-check">Zatwierdź</x-buttons.submit>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="flex w-full justify-around">
          <x-buttons.info id="prev" bgColor="blue" class="px-4 py-2" icon="fas fa-arrow-left">Wstecz</x-buttons.info>
          <x-buttons.info id="next" bgColor="blue" class="px-4 py-2" icon="fas fa-arrow-right" iconPosition="right">
            Dalej</x-buttons.info>
        </div>
      </form>
    </x-forms.background>
  </div>
@endsection

@push('js-footer')
  <script type="text/javascript" src="{{ asset('js/web/orderPage.js') }}"></script>
  {{-- <script type="text/javascript" src="{{ asset('js/web/orderAccessory.js') }}"></script> --}}
  <script>
    let orderImage = 0;
    const orderImageBtn = document.getElementById('order-image-btn');
    const orderGrid = document.getElementById('order-grid');

    orderImageBtn.addEventListener('click', (e) => {
      e.preventDefault;
      orderImage++;
      orderGrid.insertAdjacentHTML('beforeend', `
                <div class="col-span-2 flex">
                  <x-forms.input type="file" name="order[image][${orderImage}]" :value="old('order[image][0]')"
                    :errors="$errors->messages()" />
                  <x-buttons.info id="delete-order-image-${orderImage}" bgColor="red" icon="fas fa-trash" class="mt-2"></x-buttons.info>
                </div>
      `);
      document.getElementById('delete-order-image-' + orderImage).addEventListener('click', (e) => {
        e.preventDefault;
        e.currentTarget.parentElement.remove();
      })
    });
  </script>
  <script>
    const accessoryGrid = document.getElementById('accessory-grid');
    const accessoryBtn = document.getElementById('accessory-create');
    let accessoryId = 0;
    let accessoryImage = 0;
    // Dodaj Akcesorium
    accessoryBtn.addEventListener('click', (e) => {
      e.preventDefault;
      accessoryId++;
      accessoryGrid.insertAdjacentHTML('beforeend', ` 
              <div class="col-span-6 grid grid-cols-6 gap-4 mb-2 w-full">
                <div class="col-span-6">
                  <button id="accessory-${accessoryId}" type="button" class="bg-gray-500 w-full text-white font-bold py-2 px-4 rounded-full
                    hover:bg-blue-700 transition duration-500 ease-in-out">
                      <span>Akcesorium ${accessoryId}</span>
                      <i class="mx-4 fas fa-arrow-down"></i>
                  </button>
                </div>
                <div class="col-span-6 grid grid-cols-6 gap-4 mb-4 w-full" id=${accessoryId}>
                  <div class="col-span-2">
                    <x-forms.label>Nazwa</x-forms.label>
                    <x-forms.input name="accessory[${accessoryId}][name]" :value="old('accessory[${accessoryId}][name]')" :errors="$errors->messages()" />
                  </div>
                  <div class="col-span-2">
                    <x-forms.label>Producent</x-forms.label>
                    <x-forms.input name="accessory[${accessoryId}][manufacturer]" :value="old('accessory[${accessoryId}][manufacturer]')" :errors="$errors->messages()" />
                  </div>
                  <div class="col-span-2 place-self-center">
                    <x-buttons.info id="delete-${accessoryId}" bgColor="red" class="px-4 py-2" icon="fas fa-backspace">
                      Usuń</x-buttons.info>
                  </div>
                  <div class="col-span-6">
                    <x-forms.label>Opis Sprzętu</x-forms.label>
                    <x-forms.textarea name="accessory[${accessoryId}][description]" :errors="$errors->messages()">{{ old('accessory[${accessoryId}][description]') }}
                    </x-forms.textarea>
                  </div>
                  <div class="col-span-2">
                    <x-buttons.info id="accessory-image-btn-${accessoryId}" bgColor="green" icon="fas fa-plus">Dodaj zdjęcie</x-buttons.info>
                  </div>
                </div>
              </div>`);
      //Zmiana strzałki
      document.getElementById('accessory-' + accessoryId).addEventListener('click', (e) => {
        e.preventDefault;
        e.currentTarget.lastElementChild.classList.toggle('fa-arrow-down');
        e.currentTarget.lastElementChild.classList.toggle('fa-arrow-right');
        e.currentTarget.parentElement.nextElementSibling.classList.toggle('hidden');
      });
      //Dodaj przycisk do usunięcia Akcesorium
      document.getElementById('delete-' + accessoryId).addEventListener('click', (e) => {
        e.preventDefault;
        e.currentTarget.parentElement.parentElement.parentElement.remove();
      });
      //Dodaj event listener do przycisku dodania zdjęć do Akcesorium
      document.getElementById('accessory-image-btn-' + accessoryId).addEventListener('click', (e) => {
        e.preventDefault;
        accessoryImage++;
        currentAccessoryId = e.currentTarget.parentElement.parentElement.id;
        e.currentTarget.parentElement.parentElement.insertAdjacentHTML('beforeend', `
              <div class="col-span-2 flex">
                <x-forms.input type="file" name="accessory[${currentAccessoryId}][image][${accessoryImage}]" value=""
                 :errors="$errors->messages()" />
                <x-buttons.info id="delete-accessory-image-${accessoryImage}" bgColor="red" icon="fas fa-trash" class="mt-2"></x-buttons.info>
              </div>
        `);
        //Dodaj przycisk do usunięcia danego zdjęcia
        document.getElementById('delete-accessory-image-' + accessoryImage).addEventListener('click', (e) => {
          e.preventDefault;
          e.currentTarget.parentElement.remove();
        })
      });

    });
  </script>
  <script>
    function loadClient(phone) {
      const xhttp = new XMLHttpRequest();
      phone = phone.trim();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          const client = JSON.parse(xhttp.responseText);
          document.getElementById('first_name').value = client.first_name;
          document.getElementById('last_name').value = client.last_name;
          document.getElementById('address').value = client.address;
          document.getElementById('email').value = client.email;
        }
      };
      xhttp.open("GET", 'http://127.0.0.1:8000/api/client/' + phone);
      xhttp.send();
    }
  </script>
@endpush
