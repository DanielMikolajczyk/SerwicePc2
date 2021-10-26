@extends('web/layouts/master')

@section('title')
  SerwicePC - edytuj zamówienie
@endsection

@section('content')
  <x-modals.modal />
  <div>
    <div class="py-8 mt-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="font-medium text-2xl">
        Edytuj zamówienie: <span>{{ $order->code }}</span>
      </div>
    </div>
    <x-forms.background>
      <form action="{{ route('order.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-6 gap-4 mb-4 w-full">
          <div class="col-span-6 flex items-center justify-between">
            <div>
              <a href="{{ route('order.edit', $order->id) }}">
                <x-buttons.info class="w-44" bgColor="yellow" icon="fas fa-arrow-left">Edytuj</x-buttons.info>
              </a>
            </div>
            <h6 class="text-medium font-bold ">Etap zamówienia</h6>
            <div>
              <a href="{{ route('order.show', $order->id) }}">
                <x-buttons.info class="w-44" bgColor="green" icon="fas fa-arrow-right" iconPosition="right">
                  Przejdź do szczegółów</x-buttons.info>
              </a>
            </div>
          </div>
          <div class="col-span-6">
            <div class="stepper-wrapper">
              <div class="stepper-item @if ($order->status->stage_number > 1) completed @else active @endif">
                <div class="step-counter">1</div>
                <div class="step-name text-sm">
                  Przyjęcie zamówienia
                  <div class="text-xs text-gray-600 text-center">{{ $order->created_at }}</div>
                </div>
              </div>
              <div class="stepper-item @if ($order->status->stage_number > 2) completed @elseif($order->status->stage_number == 2) active @endif">
                <div class="step-counter">2</div>
                <div class="step-name text-sm">Diagnoza</div>
              </div>
              <div class="stepper-item @if ($order->status->stage_number > 3) completed @elseif($order->status->stage_number == 3) active @endif">
                <div class="step-counter">3</div>
                <div class="step-name text-sm">Oczekiwanie na decyzję</div>
              </div>
              <div class="stepper-item @if ($order->status->stage_number > 4) completed @elseif($order->status->stage_number == 4) active @endif">
                <div class="step-counter">4</div>
                <div class="step-name text-sm">Naprawa</div>
              </div>
              <div class="stepper-item @if ($order->status->stage_number == 5) completed @endif">
                <div class="step-counter">5</div>
                <div class="step-name text-sm">
                  Zakończenie
                  <div class="text-xs text-gray-600 text-center">{{ $order->deadline }}</div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-span-2">
            <x-forms.label>Status zamówienia</x-forms.label>
            <x-forms.select name="status_id" :array="$orderStatuses" :errors="$errors->messages()"
              :selected="$order->status_id" />
          </div>

          <div class="col-span-2">
            <x-forms.label>Typ zamówienia</x-forms.label>
            <x-forms.select name="type_id" :array="$orderTypes" :errors="$errors->messages()"
              :selected="$order->type_id" />
          </div>

          <div class="col-span-2">
            <x-forms.label>Numer seryjny</x-forms.label>
            <x-forms.input name="serial_number" :value="$order->serial_number" :errors="$errors->messages()" id="email" />
          </div>

          <div class="col-span-2">
            <x-forms.label>Numer partii</x-forms.label>
            <x-forms.input name="part_number" :value="$order->part_number" :errors="$errors->messages()" id="email" />
          </div>

          <div class="col-span-2">
            <x-forms.label>Producent</x-forms.label>
            <x-forms.input name="manufacturer" :value="$order->manufacturer" :errors="$errors->messages()" id="email" />
          </div>

          <div class="col-span-2">
            <x-forms.label>Model</x-forms.label>
            <x-forms.input name="model" :value="$order->model" :errors="$errors->messages()" id="email" />
          </div>

          <div class="col-span-2">
            <x-forms.label>Wydanie</x-forms.label>
            <x-forms.input name="deadline" type="date" :value="$order->deadline" :errors="$errors->messages()" id="email" />
          </div>

          <div class="col-span-2">
            <x-forms.label>Zapłacono</x-forms.label>
            <select name="paid"
              class="text-sm font-normal border border-'.$borderColor.'-300 rounded-lg p-1 w-full mt-2
                focus:outline-none focus:ring-2 focus:ring-gray-300">
              <option value="0" @if (!$order->paid) selected @endif>Nie</option>
              <option value="1" @if ($order->paid) selected @endif>Tak</option>
            </select>
          </div>

          <div class="col-span-3">
            <x-forms.label>Opis usterki</x-forms.label>
            <x-forms.textarea name="issue_description" :errors="$errors->messages()">
              {{ $order->issue_description }}
            </x-forms.textarea>
          </div>
          
          <div class="col-span-3">
            <x-forms.label>Opis sprzętu</x-forms.label>
            <x-forms.textarea name="visual_description" :errors="$errors->messages()">
              {{ $order->visual_description }}
            </x-forms.textarea>
          </div>
          
          <div class="col-span-6">
            <x-forms.label>Komentarz</x-forms.label>
            <x-forms.textarea name="comment" :errors="$errors->messages()">
              {{ $order->comment }}
            </x-forms.textarea>
          </div>

          <div class="col-span-6">
            <x-buttons.submit bgColor="blue" icon="fas fa-check" class="my-4">Zatwierdź</x-buttons.submit>
          </div>

        </div>
      </form>
      @if (!is_null($order->image_url))
        <div class="col-span-6 grid grid-cols-6 gap-4" id='modal-grid'>
          @forelse(scandir($order->image_url) as $scan)
            @if (is_file($order->image_url . '/' . $scan))
              <div class="col-span-2">
                <img src="{{ asset($order->image_url . '/' . $scan) }}" alt="" class="cursor-pointer"
                  onclick="displayModal(this.src)">
              </div>
            @endif
          @empty
            <div class="col-span-2">
              Brak zdjęć
            </div>
          @endforelse
        </div>
      @endif
    </x-forms.background>
  </div>
@endsection

@push('js-footer')
  <script>
    const modalBox = document.getElementById('modal-box');
    const modalImg = document.getElementById('modal-img');

    function displayModal(source) {
      modalBox.classList.toggle('hidden');
      modalImg.src = source;
    }
    modalBox.addEventListener('click', (e) => {
      modalBox.classList.toggle('hidden');
    })
  </script>
@endpush
