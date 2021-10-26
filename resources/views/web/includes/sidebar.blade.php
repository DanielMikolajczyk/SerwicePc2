<div class="w-56 section bg-sidebar-primary overflow-y-auto overflow-x-hidden h-screen text-center px-2 fixed pt-8">
  <div class="mx-auto">
    <ul class="flex flex-col text-left">
      <x-sidebar.li icon="fas fa-chart-line" name="Dashboard"
        :active="request()->routeIs('dashboard.*') ? 'active' : ''" />
      <x-sidebar.li icon="fas fa-user" name="Profil" 
        :active="request()->routeIs('profile.*') ? 'active' : ''" />
      <x-sidebar.li-dropdown icon="fas fa-scroll" name="Zamówienia"
        :active="request()->routeIs('order*') || request()->routeIs('accessory.*') || request()->routeIs('diagnose.*') ? 'active' : ''">
        <x-sidebar.li icon="px-4" name="Spis Zamówień" :href="route('order.index')"
          :active="request()->routeIs('order.*') ? 'active' : ''" />
        <x-sidebar.li icon="px-4" name="Akcesoria" :href="route('accessory.index')" 
          :active="request()->routeIs('accessory.*') ? 'active' : ''" />
        <x-sidebar.li icon="px-4" name="Statusy" :href="route('orderstatus.index')"
          :active="request()->routeIs('orderstatus.*') ? 'active' : ''" />
        <x-sidebar.li icon="px-4" name="Diagnozy" :href="route('diagnose.index')"
          :active="request()->routeIs('diagnose.*') ? 'active' : ''" />
        <x-sidebar.li icon="px-4" name="Typy" :href="route('ordertype.index')"
          :active="request()->routeIs('ordertype.*') ? 'active' : ''" />
      </x-sidebar.li-dropdown>
      <x-sidebar.li-dropdown icon="fas fa-users" name="Klienci"
        :active="request()->routeIs('client*') ? 'active' : ''">
        <x-sidebar.li icon="px-4" name="Spis Klientów" :href="route('client.index')"
          :active="request()->routeIs('client.*') ? 'active' : ''" />
        <x-sidebar.li icon="px-4" name="Typy" :href="route('clienttype.index')"
          :active="request()->routeIs('clienttype.*') ? 'active' : ''" />
      </x-sidebar.li-dropdown>
      <x-sidebar.li icon="fas fa-map" name="Departamenty" :href="route('departament.index')"
        :active="request()->routeIs('departament.*') ? 'active' : ''" />
      <x-sidebar.li icon="fas fa-user-plus" name="Role" :href="route('role.index')"
        :active="request()->routeIs('role.*') ? 'active' : ''" />
    </ul>
  </div>
</div>

@push('js-footer')
  <script>
    (function() {
      Array.from(document.getElementsByClassName('li-dropdown')).forEach(element => {
        if (element.classList.contains('active')) {
          element.lastElementChild.classList.toggle('hidden');
          element.firstElementChild.lastElementChild.classList.toggle('-rotate-90');
        }
        element.addEventListener('click', () => {
          element.lastElementChild.classList.toggle('hidden');
          element.firstElementChild.lastElementChild.classList.toggle('-rotate-90');
        })
      });
    })();
  </script>
@endpush
