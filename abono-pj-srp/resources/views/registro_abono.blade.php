<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Abonos') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Abonos
                </a>
                <a class="navbar-brand" href="{{ url('dashboard') }}">
                    Dashboard
                </a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Registrar Abono</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="post" enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="dni_usuario" class="col-md-4 control-label">DNI Usuario</label>

                                <div class="col-md-6">
                                    <input disabled id="dni_usuario" type="text" class="form-control" name="dni_usuario" value="{{ auth()->user()->dni }}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="dni_intendente" class="col-md-4 control-label">DNI Intendente</label>

                                <div class="col-md-6">
                                    <input id="dni_intendente" type="text" class="form-control" name="dni_intendente" required autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="importe" class="col-md-4 control-label">Importe</label>

                                <div class="col-md-6">
                                    <input id="importe" type="text" class="form-control" name="importe" required autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="file" class="col-md-4 control-label">Archivo adjunto</label>
                                <div class="col-md-6">
                                    <input type="file" name="file" id="file">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="button" class="btn btn-primary">
                                        Registrar Abono
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
