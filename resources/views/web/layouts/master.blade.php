<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  {{-- Css Head --}}
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
  @stack('css-head')

  {{-- Js Head --}}
  @stack('js-head')

  <title>@yield('title')</title>
</head>

<body class="flex">
  <main class="flex-1 order-last bg-gray-100 min-h-screen">
    @yield('content')
  </main>
  <aside class="w-56">
    @include('web/includes/sidebar')
  </aside>

  @stack('js-footer')
</body>

</html>
