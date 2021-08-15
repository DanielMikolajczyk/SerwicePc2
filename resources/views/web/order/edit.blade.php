@extends('web/layouts/master')

@section('title')
  SerwicePC - zamówienie
@endsection

@section('content')
  <div>
    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
      <span class="font-medium">Sczegóły zamówienia nr:</span> {{$order->id}}
    </div>
    <div class="py-4">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                  <form action="{{route('order.update',$order->id)}}" method="POST" class="flex">
                    @csrf
                    @method('PUT')
                      <div class="p-2">
                        <div class="mb-4">
                          <label class="text-xl text-gray-600">Status 
                            <span class="text-red-500">*</span>
                          </label>
                          <input type="text" class="border border-gray-300 rounded p-1 w-full" name="title" id="title" value="{{$order->orderStatus->status}}" required>
                        </div>
                        
                        <div class="mb-4">
                          <label class="text-xl text-gray-600">Description</label>
                          <input type="text" class="border-2 border-gray-300 p-2 w-full" name="description" id="description" placeholder="(Optional)">
                        </div>
                        
                        <div class="mb-8">
                          <label class="text-xl text-gray-600">Content <span class="text-red-500">*</span></label>
                          <textarea name="content" class="border-2 border-gray-500">
                            
                          </textarea>
                        </div>
                        
                        <div class="p-1">
                          <button role="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" required>Submit</button>
                        </div>
                      </div>
                      <div class="p-2 w-80">
                        <div class="border-b space-y-2 pb-4">
                          <label class="text-gray-600 ml-2">
                            Klient 
                          </label>
                          <div class="flex justify-between items-center">
                            <div class="ml-2">
                              {{$order->client->fullName}}
                            </div>
                            <div class="mr-2 space-x-2 transform hover:text-purple-500 hover:scale-110 flex justify-between items-center">
                              <a href="" class="w-5">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                              </a>
                              <a href="" class="w-5">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg>
                              </a>
                            </div>
                          </div>
                        </div>
                        <div class="border-b space-y-2 pb-4 mt-4">
                          <label class="text-gray-600 ml-2">
                            Typ zamówienia 
                          </label>
                          <div class="flex justify-between items-center">
                            <div class="ml-2">
                              {{$order->orderType->type}}
                            </div>
                            <div class="mr-2 space-x-2 transform hover:text-purple-500 hover:scale-110 flex justify-between items-center">
                              <a href="" class="w-5">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                              </a>
                              <a href="" class="w-5">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg>
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
          
          <script>
            CKEDITOR.replace( 'content' );
            </script>

@endsection