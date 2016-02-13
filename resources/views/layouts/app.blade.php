<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}">
    
    @yield('styles')
     <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}">
    <!-- Styles -->
    
    <link rel="stylesheet" href="{{ asset('css/stylelayout.css') }}">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

</head>
<body>
    @yield('nav')
        
    @yield('content')
    

    <!-- JavaScripts -->
    <script src="{{ asset('plugins/jquery/js/jquery.js') }}"></script>
    

    @yield('js');
  <script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
     <script>
        $('#alert').delay(2000).fadeOut(800)
    </script>
</body>
</html>
