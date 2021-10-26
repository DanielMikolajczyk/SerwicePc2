@props(['name', 'value', 'type' => 'text', 'errors' => [], 'placeholder' => '', 'disabled' => false])

@php
  $name = string_array_to_dot($name);
  $borderColor = Arr::exists($errors,$name)
                 ?"red"
                 :"gray";
@endphp

<input name="{{ dot_to_string_array($name) }}" value="{{ $value }}" type="{{ $type }}"
  placeholder="{{ $placeholder }}" 
  @if($disabled) disabled @endif
  {{ $attributes->merge([
    'class' => 'text-sm font-normal border border-'.$borderColor.'-300 rounded-lg p-1 w-full mt-2 
          focus:outline-none focus:ring-2 focus:ring-'.$borderColor.'-300
          transition duration-500 ease-in-out',
]) }}>

@if(Arr::exists($errors,$name))
  <x-forms.error :messages="$errors[$name]"/>
@endif