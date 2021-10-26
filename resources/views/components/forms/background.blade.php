<div {{ $attributes->merge([
  'class' => 'py-4 max-w-7xl mx-auto sm:px-6 lg:px-8'])}}>
  <div class="bg-white p-8 shadow-sm sm:rounded-lg">
    {{ $slot }}
  </div>
</div>
