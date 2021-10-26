@props(['name', 'icon' => 'fa-user', 'active' => false])

@php
  $classes = 'text-white';
  if ($active === 'active') {
    $classes = 'text-serwice-blue font-bold';
  }
@endphp

<li class="flex-1 li-dropdown {{ $active }}">
  <div {{ $attributes->merge([
    'class' => 'block py-2 my-2 px-2 align-middle no-underline rounded ' .$classes. '
      hover:bg-sidebar-secondary 
      transition duration-200 ease-in-out',
]) }}>
    <i class="{{ $icon }} px-2"></i>
    <span class="text-medium inline-block">{{ $name }}</span>
    <i class="fas fa-caret-down inline-block px-2 float-right transform duration-500"></i>
  </div>
  <div class="hidden transform duration-500 ease-in-out">
    <ul>
      {{ $slot }}
    </ul>
  </div>
</li>
