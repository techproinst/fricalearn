<!DOCTYPE html>
<html lang="en">

<head>
  <x-head />
</head>

<body>
  <x-flash-sales />
  <x-nav-bar />

  @yield('content')



  <x-footer />

  <script src="{{ asset('assets/scripts/index.js') }}"></script>
  {!! ToastMagic::scripts() !!}

</body>

</html>