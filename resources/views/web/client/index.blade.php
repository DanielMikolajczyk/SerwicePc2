@extends('web/layouts/master')

@section('title')
  SerwicePC - klienci
@endsection

@section('content')
  <div class="w-full mx-auto">
    <div class="my-5">
      Logo
      <a href="{{ route('client.create') }}" class="ml-3">
        Create
      </a>
    </div>
    <div class="overflow-x-scroll">
      <div class="min-h-screen bg-gray-100 flex items-center justify-center bg-gray-100 font-sans overflow-hidden">
        <div class="bg-white shadow-md rounded my-6">
          <table class="min-w-max w-full table-auto">
            <thead>
              <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                <th class="py-3 px-4 text-center">Imię</th>
                <th class="py-3 px-4 text-center">Nazwisko</th>
                <th class="py-3 px-4 text-center">Numer telefonu</th>
                <th class="py-3 px-4 text-center">Opcje</th>
              </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
              @forelse($clients as $client)
                <tr class="border-b border-gray-200 hover:bg-gray-100 font-sm text-center">
                  <td class="py-3 px-4">
                    <span class="font-medium">{{ $client->first_name }}</span>
                  </td>
                  <td class="py-3 px-4">
                    <span class="font-medium">{{ $client->last_name }}</span>
                  </td>
                  <td class="py-3 px-4">
                    <span>{{ $client->phone_number }}</span>
                  </td>
                  <td class="py-3 px-4">
                    <div class="flex item-center justify-center">
                      <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                        <a href="{{ route('client.show', $client->id) }}">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                          </svg>
                        </a>
                      </div>
                      <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                        <a href="{{ route('client.edit', $client->id) }}">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                          </svg>
                        </a>
                      </div>
                      <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                        <form method="post"
                          action="{{ route('client.destroy', $client->id) }}" 
                          id="delete_form_{{ $client->id }}">
                          @csrf
                          @method('DELETE')
                          <a href="javascript:{}"
                            onclick="document.getElementById('delete_form_{{ $client->id }}').submit();">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                          </a>
                        </form>
                      </div>
                    </div>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="8">Brak wyników do wyświetlenia</td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
