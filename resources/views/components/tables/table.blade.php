@props(['headers', 'options' => true, 'fullWidth' => false])


<div class="my-2 overflow-x-auto py-2 text-center inline-block w-full @if(!$fullWidth) 2xl:w-11/12 sm:px-6 lg:px-8 @endif">
  <div class="shadow overflow-hidden sm:rounded-lg">
    <table class="w-full divide-y divide-gray-200">
      <thead class="bg-gray-100">
        <tr>
          @forelse(json_decode($headers) as $header)
            <th scope="col"
              class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider
                  @if ($loop->first) text-left @else text-center @endif">
              {{ $header }}
            </th>
          @empty
            <th></th>
          @endforelse
          @if ($options)
            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
              <span>Opcje</span>
            </th>
          @endif
        </tr>
      </thead>
      <tbody class="bg-white divide-y divide-gray-200">
        {{ $slot }}
      </tbody>
    </table>
  </div>
</div>
