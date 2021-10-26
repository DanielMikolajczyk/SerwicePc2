@props(['name', 'href' => '#','icon' => '', 'active' => false])

@php
  $classes = 'text-white';
  if ($active === 'active'){
    $classes = 'text-serwice-blue font-bold bg-sidebar-secondary';
  }
@endphp

<li class="flex-1">
  <a href="{{ $href }}"
  {{ $attributes->merge([
    'class' => 'block py-2 my-2 pl-2 align-middle no-underline rounded '.$classes.'
      hover:bg-sidebar-secondary 
      transition duration-200 ease-in-out',
]) }}>
    <i class="{{ $icon }} px-2"></i>
    <span class="text-medium inline-block">{{ $name }}</span>
  </a>
</li>
