@props(['name', 'array','selected' => '', 'errors' => []])

@php
  $borderColor = Arr::exists($errors,$name)
                 ?"red"
                 :"gray";
@endphp

<select name="{{ $name }}"
  {{ $attributes->merge([
    'class' => 'text-sm font-normal border border-'.$borderColor.'-300 rounded-lg p-1 w-full mt-2 
        focus:outline-none focus:ring-2 focus:ring-'.$borderColor.'-300
        transition duration-500 ease-in-out',
  ]) }}>

  @if($selected === '')<option></option> @endif

  @foreach ($array as $item)
    <x-forms.option :value="$item->id" :selected="$selected">{{ $item->name }}</x-forms.option>
  @endforeach
</select>

@if(Arr::exists($errors,$name))
  <x-forms.error :messages="$errors[$name]"/>
@endif
