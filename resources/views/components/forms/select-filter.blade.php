@props(['name', 'array','selected' => '', 'errors' => []])

<select name="{{ $name }}"
  {{ $attributes->merge([
    'class' => 'w-full bg-transparent text-sm font-semibold text-center',
  ]) }}>

  <option></option>
  
  @foreach ($array as $item)
    <x-forms.option :value="$item->id" :selected="$selected">{{ $item->name }}</x-forms.option>
  @endforeach
</select>

@if(Arr::exists($errors,$name))
  <x-forms.error :messages="$errors[$name]"/>
@endif
