@extends('web/layouts/master')

@section('title')
  SerwicePC - edytuj typ zamówienia
@endsection

@section('content')
  <div class="py-8 mt-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
    <span class="font-medium text-2xl">Edycja akcesorium</span>
  </div>
  <x-modals.modal/>
  <x-forms.background>
    <form action="{{ route('accessory.update', $accessory->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="p-2">
        <div class="mb-5 flex justify-between">
          <x-forms.title>Dane akcesorium:</x-forms.title>
          <div>
            <a class="mx-2" href="{{route('accessory.show',$accessory->id)}}">
              <x-buttons.info bgColor="green" class="px-4 py-2" icon="fas fa-arrow-right" iconPosition="right">
                Przejdź do szczegółów
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
            <x-forms.input name="name" :value="$accessory->name" />
          </div>
    
          <div class="col-span-2">
            <x-forms.label>Producent</x-forms.label>
            <x-forms.input name="manufacturer" :value="$accessory->manufacturer" />
          </div>
    
          <div class="col-span-6">
            <x-forms.label>Opis</x-forms.label>
            <x-forms.textarea name="description" :errors="$errors->messages()">{{ $accessory->description }}
            </x-forms.textarea>
          </div>

          @if(!is_null($accessory->image_url))
            <div class="col-span-6 grid grid-cols-6 gap-4">
            @forelse(scandir($accessory->image_url) as $scan)
              @if(is_file($accessory->image_url.'/'.$scan))
                <div class="col-span-2">
                  <img src="{{ asset($accessory->image_url.'/'.$scan) }}" alt="" onclick="displayModal(this.src)" class="cursor-pointer">
                </div>
              @endif
            @empty
                <div class="col-span-2">
                  Brak zdjęć
                </div>
            @endforelse
            </div>
          @endif

          <div class="col-span-6">
            <x-buttons.submit bgColor="blue" icon="fas fa-check">Zatwierdź</x-buttons.submit>
          </div>

        </div>
      </div>
    </form>
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