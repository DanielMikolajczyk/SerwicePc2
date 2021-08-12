<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  {{-- Css Head --}}
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  @stack('css-head')

  {{-- Js Head --}}
  @stack('js-head')

  <title>@yield('title')</title>
</head>
<body class="flex">
  <main class="flex-1 order-last bg-gray-100">
    @yield('content')
  </main>
  <aside class="flex-none min-h-screen w-48" style="background-color: #213259;">
    @include('web/includes/sidebar')
  </aside>
</body>
</html>