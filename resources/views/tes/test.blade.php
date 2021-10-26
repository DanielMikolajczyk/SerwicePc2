@extends('web/layouts/master')

@section('sidebar')
  <div class="w-56 bg-sidebar-primary overflow-y-auto overflow-x-hidden h-screen text-center px-2 fixed pt-8">
    <div class="mx-auto">
      <ul class="flex flex-col text-left">
        <x-sidebar.li icon="fas fa-chart-line" name="Dashboard" :active="$sidebarActive"/>
        <x-sidebar.li icon="fas fa-user" name="Profil" :active="$sidebarActive"/>
        <x-sidebar.li-dropdown icon="fas fa-scroll" name="Zamówienia" :active="$sidebarActive">
          <x-sidebar.li icon="px-4" name="Spis Zamówień" :active="$sidebarActive"/>
          <x-sidebar.li icon="px-4" name="Akcesoria" :active="$sidebarActive"/>
          <x-sidebar.li icon="px-4" name="Statusy" :active="$sidebarActive"/>
          <x-sidebar.li icon="px-4" name="Typy" :active="$sidebarActive"/>
        </x-sidebar.li-dropdown>
        <x-sidebar.li-dropdown icon="fas fa-users" name="Klienci" :active="$sidebarActive">
          <x-sidebar.li icon="px-4" name="Spis Klientów" :active="$sidebarActive"/>
          <x-sidebar.li icon="px-4" name="Typy" :active="$sidebarActive"/>
        </x-sidebar.li-dropdown>
        <x-sidebar.li icon="fas fa-map" name="Departamenty" :active="$sidebarActive"/>
        <x-sidebar.li icon="fas fa-user-plus" name="Role" :active="$sidebarActive"/>
      </ul>
    </div>
  </div>
@endsection

@push('js-footer')
  <script>
    Array.from(document.getElementsByClassName('li-dropdown')).forEach(element => {
      element.addEventListener('click', () => {
        element.lastElementChild.classList.toggle('hidden');
        element.firstElementChild.lastElementChild.classList.toggle('-rotate-90');
      })
    });
  </script>
@endpush
