@extends('web/layouts/master')

@section('title') SerwicePC - edytuj diagnozę @endsection

@section('content')
  <div class="py-8 mt-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
    <span class="font-medium text-2xl">Szczegóły Akcesorium</span>
  </div>
  <x-modals.modal/>
  <x-forms.background>
    <div class="mb-5 flex justify-between">
      <x-forms.title>Status Akcesorium:</x-forms.title>
      <div>
        <a class="mx-2" href="{{route('accessory.edit',$accessory->id)}}">
          <x-buttons.info bgColor="yellow" class="px-4 py-2" icon="fas fa-arrow-right" iconPosition="right">
            Przejdź do edycji
          </x-buttons.info>
        </a>
        <a href="{{route('order.show',$accessory->order_id)}}">
          <x-buttons.info bgColor="blue" class="px-4 py-2" icon="fas fa-arrow-right" iconPosition="right">
            Przejdź do zamówienia
          </x-buttons.info>
        </a>
      </div>
    </div>
    <div class="grid grid-cols-6 gap-4 mb-4 w-full">

      <div class="col-span-2">
        <x-forms.label>Nazwa</x-forms.label>
        <x-forms.input name="name" :value="$accessory->name" disabled="true" />
      </div>

      <div class="col-span-2">
        <x-forms.label>Id zamówienia</x-forms.label>
        <x-forms.input name="price" :value="$accessory->order_id" disabled="true" />
      </div>

      <div class="col-span-2">
        <x-forms.label>Producent</x-forms.label>
        <x-forms.input name="name2" :value="$accessory->manufacturer" disabled="true" />
      </div>

      <div class="col-span-6">
        <x-forms.label>Opis</x-forms.label>
        <p>{{ $accessory->description }}</p>
      </div>

      @if(!is_null($accessory->image_url))
        <div class="col-span-6 grid grid-cols-6 gap-4" id='modal-grid'>
        @forelse(scandir($accessory->image_url) as $scan)
          @if(is_file($accessory->image_url.'/'.$scan))
            <div class="col-span-2">
              <img src="{{ asset($accessory->image_url.'/'.$scan) }}" alt="" class="cursor-pointer" onclick="displayModal(this.src)">
            </div>
          @endif
        @empty
          <div class="col-span-2">
            Brak zdjęć
          </div>
        @endforelse
        </div>
      @endif
      
    </div>
  </x-forms.background>
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