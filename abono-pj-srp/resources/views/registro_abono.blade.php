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
    <script type="text/javascript" src="{{ asset('js/registro_abono.js')}}"></script>
</head>
<body>
<div id="app">
    @include('layouts.logged_user')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Registrar Abono</div>

                    <div class="panel-body">
                        <form id="registro_abono_form" class="form-horizontal" method="post" enctype="multipart/form-data">

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
                                    <input id="id_intendente" type="hidden" class="form-control" name="id_intendente">
                                </div>
                            </div>

                            <div class="intendente_data form-group">
                                <div class="form-group">
                                    <label for="nombres_intendente" class="col-md-4 control-label" style="margin-left: 24%">Nombres Intendente:</label>
                                    <input id="nombres_intendente" type="text" name="nombres_intendente" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="apellidos_intendente" class="col-md-4 control-label" style="margin-left: 24%">Apellidos Intendente:</label>
                                    <input id="apellidos_intendente" type="text" name="apellidos_intendente" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="telefono_intendente" class="col-md-4 control-label" style="margin-left: 24%">Telefono Intendente:</label>
                                    <input id="telefono_intendente" type="text" name="telefono_intendente" disabled>
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
                                    <input type="file" name="file_abono" id="file_abono">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="button" class="btn btn-primary registro_abono">
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
