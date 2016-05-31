<!DOCTYPE html>
<html lang="es" ng-app="mantenimientoApp">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Mantenimiento</title>

    <!-- Bootstrap -->
    <link href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    {{-- Apartado para la libreria datepicker --}}
    <link href="{{ asset('assets/datetimepicker/css/bootstrap-material-datetimepicker.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/time-line.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/animated.css') }}" rel="stylesheet">

</head>
<body>

    @yield('content')

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/angular.min.js') }}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    {{-- Apartado para la libreria datepicker --}}
    <script src="{{ asset('assets/datetimepicker/js/moment.js') }}"></script>
    <script src="{{ asset('assets/datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>
    {{-- Angular client --}}
    <script src="{{ asset('assets/js/angCli.js') }}"></script>

</body>
</html>