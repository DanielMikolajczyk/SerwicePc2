@extends('web/layouts/master')

@section('title')
  SerwicePC - edytuj zamówienie
@endsection

@section('content')
  <div>
    <div class="py-8 mt-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="font-medium text-2xl">
        Szczegóły zamówienia: <span>{{ $order->code }}</span>
      </div>
    </div>
    <x-modals.modal/>
    <x-forms.background>
      <div class="grid grid-cols-6 gap-4 mb-4 w-full">
        <div class="col-span-6 flex">
          <x-forms.label>
            <div class="text-lg"> Szczegóły dotyczące sprzętu:</div>
          </x-forms.label>
          <div class="justify-self-end">
            <a href="{{route('order.edit',$order->id)}}">
              <x-buttons.info class="w-40" bgColor="yellow" icon="fas fa-arrow-right" iconPosition="right">Przejdź do edycji</x-buttons.info>
            </a>
          </div>
        </div>

        <div class="col-span-2">
          <x-forms.label>Typ zamówienia</x-forms.label>
          <x-forms.input name="1" :value="$order->type->name" disabled="true"/>
        </div>

        <div class="col-span-2">
          <x-forms.label>Numer seryjny</x-forms.label>
          <x-forms.input name="1" :value="$order->serial_number" disabled="true"/>
        </div>

        <div class="col-span-2">
          <x-forms.label>Numer partii</x-forms.label>
          <x-forms.input name="1" :value="$order->part_number" disabled="true"/>
        </div>
        
        <div class="col-span-2">
          <x-forms.label>Producent</x-forms.label>
          <x-forms.input name="1" :value="$order->manufacturer" disabled="true"/>
        </div>
        
        <div class="col-span-2">
          <x-forms.label>Model</x-forms.label>
          <x-forms.input name="1" :value="$order->model" disabled="true"/>
        </div>
        <div class="col-span-2"></div>
        <div class="col-span-2">
          <x-forms.label>Status zamówienia</x-forms.label>
          <x-forms.input name="1" :value="$order->status->name" disabled="true"/>
        </div>

        <div class="col-span-2">
          <x-forms.label>Zapłacono</x-forms.label>
          <x-forms.input name="1" :value="$order->paid ? 'Tak' : 'Nie'" disabled="true"/>
        </div>

        <div class="col-span-2">
          <x-forms.label>Przewidywany czas Zakończenia</x-forms.label>
          <x-forms.input name="1" type="date" :value="$order->deadline" disabled="true"/>
        </div>

        <div class="col-span-3">
          <x-forms.label>Opis usterki</x-forms.label>
          <x-forms.input class="h-20" name="1" :value="$order->issue_description" disabled="true"/>
        </div>

        <div class="col-span-3">
          <x-forms.label>Wygląd sprzętu</x-forms.label>
          <x-forms.input class="h-20" name="1" :value="$order->visual_description" disabled="true"/>
        </div>

        <div class="col-span-6">
          <x-forms.label>Komentarz</x-forms.label>
          <x-forms.input class="h-20" name="1" :value="$order->comment" disabled="true"/>
        </div>

        @if(!is_null($order->image_url))
          <div class="col-span-6 grid grid-cols-6 gap-4">
            @forelse(scandir($order->image_url) as $scan)
              @if(is_file($order->image_url.'/'.$scan))
                <div class="col-span-2">
                  <img src="{{ asset($order->image_url.'/'.$scan) }}" alt="" onclick="displayModal(this.src)" class="cursor-pointer">
                </div>
              @endif
            @empty
              <div class="col-span-2">Brak zdjęć</div>
            @endforelse
          </div>
        @endif


        <div class="col-span-6 pt-4 border-t-2">
          <x-forms.label>
            <div class="text-lg"> Szczegóły dotyczące akcesriów:</div>
          </x-forms.label>
        </div>

        @forelse($order->accessories as $accessory)
          <div class="col-span-3">
            <a href="{{route('accessory.show',$accessory->id)}}">
              <x-buttons.info bgColor="green" icon="fas fa-arrow-right" iconPosition="right"> 
                Przejdź do akcesorium o nazwie: <span> {{ $accessory->name }} </span>
              </x-buttons.info>
            </a>
          </div>
        @empty
          <div class="col-span-6">
            <span>Brak akcesoriów dla tego zamówienia</span>
          </div>
        @endforelse 

        <div class="col-span-6 pt-4 border-t-2">
          <x-forms.label>
            <div class="text-lg"> Szczegóły dotyczące klienta:</div>
          </x-forms.label>
        </div>
        <div class="col-span-3">
          <a href="{{route('client.show',$order->client->id)}}">
            <x-buttons.info bgColor="green" icon="fas fa-arrow-right" iconPosition="right"> 
              Przejdź do klienta o nazwie: <span> {{ $order->client->fullName }} </span>
            </x-buttons.info>
          </a>
        </div>
      </div>
    </x-forms.background>
  </div>
@endsection

@push('js-footer')
  <script>
    const modalBox = document.getElementById('modal-box');
    const modalImg = document.getElementById('modal-img');

    function displayModal(source){
      modalBox.classList.toggle('hidden');
      modalImg.src = source;
    }
    modalBox.addEventListener('click',(e)=>{
      modalBox.classList.toggle('hidden');
    })
  </script>
@endpush