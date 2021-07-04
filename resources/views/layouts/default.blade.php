<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  @include('includes.head')
</head>
<body class="text-gray-700 bg-gray-100">
  {{-- Header --}}
  <header class="fixed w-full py-4 bg-white shadow-md">
    @include('includes.header')
  </header>

  {{-- Main --}}
  <main>
    @yield('content')
  </main>

  {{-- Footer --}}
  <footer>
    @include('includes.footer')
  </footer>

  {{-- JS --}}
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  @yield('javascript')
</body>
</html>