<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Abonos') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/abono.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
</head>
<body>
<div id="app">
    @include('layouts.logged_user')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>
                    <div class="panel-heading"><a href="{{ route('registro_abono') }}">(+) Registro de Abono</a></div>
                </div>
                <div class="panel-body">
                   <strong> Lista de abonos de usuario: {{ auth()->user()->dni }}  </strong>
                   <table class="table table-striped table-hover tabla_abono">
                        <thead>
                        <tr>
                            <th>DNI intendente</th>
                            <th>Nombre intendente</th>
                            <th>Importe</th>
                            <th>URL</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($abonos as $abono)
                            <tr>
                                <td>{{$abono->dni_abonado}}</td>
                                <td>{{$abono->GetIntendenteById->nombres}} {{$abono->GetIntendenteById->apellidos}}</td>
                                <td>{{$abono->importe}}</td>
                                <td><a href="{{$abono->url}}" target="_blank">{{$abono->url}}</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
