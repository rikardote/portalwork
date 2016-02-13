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
    <link rel="stylesheet" href="{{ asset('css/jquery-bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('css/stylelayout.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/toastr/css/toastr.min.css') }}">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

</head>
<body>
    <div class="supreme-container">
        @include('partials._nav_citas')
    </div>
    <section>
        <div class="container spark-screen">
          <div class="row">
            <div class="col-md-10 col-md-offset-1">
              <div class="panel panel-primary">
                <div class="panel-heading">@yield('title')</div>
                <div class="panel-body">
                   @yield('content')
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>    
    
    <footer class="footer">
      <div class="container">
        <p class="text-muted"> &copy;  {{date('Y')}} ISSSTE BAJA CALIFORNIA Por: Ricardo Fuentes</p>
      </div>
    </footer>
    

    <!-- JavaScripts -->
    <script src="{{ asset('plugins/jquery/js/jquery.js') }}"></script>
    <script src="{{ asset('plugins/datepicker/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('plugins/datepicker/js/ui.datepicker-es-MX.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ asset('plugins/toastr/js/toastr.min.js') }}"></script>
    @yield('js');
  
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
     <script>
        $('#alert').delay(2000).fadeOut(800)
    </script>
     {!! Toastr::render() !!}
</body>
</html>
