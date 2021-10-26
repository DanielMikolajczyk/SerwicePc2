@extends('web/layouts/master')

@section('title')
  SerwicePC - klienci
@endsection

@section('content')
<div class="w-full">
  <div class="my-5 flex items-center sm:px-6 lg:px-8">
    <div class="flex-1">
      <img src="{{ asset('storage/images/serwicepc.png') }}" alt="">
    </div>
    <div class="flex-1 text-center">
      <a href="{{ route('role.create') }}">
        <x-buttons.submit bgColor="red" position="center" icon="fas fa-plus">Stwórz</x-buttons.submit>
      </a>
    </div>
  </div>
  @php $headers= json_encode(['Nazwa']) @endphp
  <x-tables.table :headers="$headers">
    @forelse($roles as $role)
      <tr>
        <td class="px-6 py-4 whitespace-nowrap">
          <div class="flex items-center">
            <div class="text-sm font-medium text-gray-900">
              {{ $role->name }}
            </div>
          </div>
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
          <a href="{{ route('role.show', $role->id) }}">
            <x-buttons.info bgColor="green" icon="far fa-eye">Szczegóły</x-buttons.info>
          </a>
          <a href="{{ route('role.edit', $role->id) }}">
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
</div>
@endsection
