@props(['messages' => []])

@forelse($messages as $message)
  <div class="text-red-600 text-sm my-2">
    <span class="font-medium">{{ $message }}</span>
  </div>
@empty
  <div></div>
@endforelse
