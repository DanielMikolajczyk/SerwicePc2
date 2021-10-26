@extends('web/layouts/master')

@section('title') SerwicePC - diagnozy @endsection

@section('content')
  <div class="w-full">
    <div class="my-5 flex items-center sm:px-6 lg:px-8">
      <div class="flex-1">
        <img src="{{ asset('storage/images/serwicepc.png') }}" alt="">
      </div>
      <div class="flex-1 text-center">
        <a href="{{ route('diagnose.create') }}">
          <x-buttons.submit bgColor="red" position="center" icon="fas fa-plus">Stwórz</x-buttons.submit>
        </a>
      </div>
    </div>
    @php $headers= json_encode(['Diagnoza','Typ sprzętu']) @endphp
    <x-tables.table :headers="$headers">
      <tr class="text-center py-2 bg-gray-50">
        <form action="{{ route('diagnose.index') }}" method="GET">
          <td><input type="text" class="w-full bg-transparent text-sm font-semibold pl-4" name="name" value="{{app('request')->input('client_name')}}"></td>
          <td><x-forms.select-filter name="type" :array="$orderTypes" :selected="app('request')->input('type') ?? ''"/></td>
          <td><x-buttons.submit bgColor="blue" icon="fas fa-search" size="small" position="center">Szukaj</x-buttons.submit></td>
        </form>
      </tr>
      @forelse($diagnoses as $diagnose)
        <tr>
          <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-left">
            {{ $diagnose->name }}
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
            {{ $diagnose->type->name }}
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
            <a href="{{ route('diagnose.show', $diagnose->id) }}">
              <x-buttons.info bgColor="green" icon="far fa-eye">Szczegóły</x-buttons.info>
            </a>
            <a href="{{ route('diagnose.edit', $diagnose->id) }}">
              <x-buttons.info bgColor="yellow" icon="fas fa-pen">Edytuj</x-buttons.info>
            </a>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="2" class="px-6 py-4 whitespace-nowrap text-center font-medium">Brak danych</td>
          <td colspan="1"></td>
        </tr>
      @endforelse
    </x-tables.table>
    <div class="w-full mx-auto my-5">
      {{ $diagnoses->onEachSide(1)->links('vendor.pagination.default') }}
    </div>
    <div class="w-full pl-3 my-5">
      <p>Wyświetlono <span class="font-bold">{{ $diagnoses->count() }}</span> z <span class="font-bold">{{ $diagnoses->total() }}</span> wyników.</p>
    </div>
  </div>
@endsection
