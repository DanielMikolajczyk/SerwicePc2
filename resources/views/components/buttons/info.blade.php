@props(['icon' => '', 'bgColor' => 'blue', 'iconPosition' => 'left', 'id'=>""])

<button id="{{ $id }}" type="button"
  {{ $attributes->merge(['class' => 
  'bg-'.$bgColor.'-400 text-white text-sm font-medium py-1 px-2 rounded-full
  hover:bg-'.$bgColor.'-600
  transition duration-500 ease-in-out']) }}
  >
  @if($iconPosition === 'left') <i class="{{ $icon }} "></i> @endif
  <span>{{ $slot }}</span>
  @if($iconPosition === 'right') <i class="{{ $icon }} "></i> @endif
</button>
