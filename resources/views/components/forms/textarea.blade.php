@props(['name', 'errors' => []])

@php
  $borderColor = Arr::exists($errors,$name)
                 ?"red"
                 :"gray";
@endphp

<textarea name="{{ $name }}"
  {{ $attributes->merge([
    'class' => 'text-sm font-normal border border-'.$borderColor.'-300 rounded-lg p-1 w-full h-32 mt-2 
          focus:outline-none focus:ring-2 focus:ring-'.$borderColor.'-300
          transition duration-500 ease-in-out',
]) }}>{{ $slot }}</textarea>

@if(Arr::exists($errors,$name))
  <x-forms.error :messages="$errors[$name]"/>
@endif