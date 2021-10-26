@props(['for' => ''])

<label for="{{ $for }}"
  {{ $attributes->merge([
  'class' => 'w-full text-md font-medium capitalize']) }}
  >{{ $slot }}</label>
