@props(['position' => '', 'bgColor' => 'blue', 'icon' => '', 'size'=>'normal'])

@php
  switch($position){
    case "center": 
      $position = 'mx-auto';
      break;
    case "left": 
      $position = 'float-left';
      break;
    default: 
      $position = 'float-right';
  }

  switch($size){
    case "small":
      $dimensions = 'px-2 py-1';
      break;
    case "normal":
      $dimensions = 'px-4 py-2';
      break;
  }
@endphp

<button type="submit"
  {{ $attributes->merge(['class' => 
  'bg-'.$bgColor.'-500 text-white text-small font-medium '.$dimensions.' rounded-full '.$position.'
  hover:bg-'.$bgColor.'-700
  transition duration-500 ease-in-out']) }}
  >
  <i class="{{ $icon }}"></i>
  <span>{{ $slot }}</span>
</button>
