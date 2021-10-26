@props(['value', 'selected' => ''])

<option value="{{ $value }}" @if($selected == $value) selected @endif 
  >{{ $slot }}</option>
