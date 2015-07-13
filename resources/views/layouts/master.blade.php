<!DOCTYPE html>
<html lang="es">
    <head>
        <title>@yield('titulo')</title>
        <link media="all" type="text/css" rel="stylesheet" href="{{asset('css/datepicker.css')}}" />
        <link media="all" type="text/css" rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
        <!-- {!!Html::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css')!!} -->

        <link media="all" type="text/css" rel="stylesheet" href="{{asset('css/jquery-ui.min.css')}}" />
        <!-- {!!Html::style('https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css')!!}-->

        <link media="all" type="text/css" rel="stylesheet" href="{{asset('css/main.css')}}" />

        <script src="{{asset('js/jquery/2.1.4/jquery.min.js')}}"></script>
        <!--{!!Html::script('https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js')!!}-->
        
        <!-- Material Design for Bootstrap -->
        <link href="{{asset('material_design/css/roboto.min.css')}}" rel="stylesheet">
        <link href="{{asset('material_design/css/material-fullpalette.min.css')}}" rel="stylesheet">
        <link href="{{asset('material_design/css/ripples.min.css')}}" rel="stylesheet">
        
        <!-- ver: http://www.eyecon.ro/bootstrap-datepicker/ -->
        <script src="{{asset('js/bootstrap-datepicker.js')}}"></script>
        
        <!-- Font Awesome -->
        <link href="{{asset('fonts/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
        <!-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"> -->

    </head>
    <body>
        <div class="navbar navbar-fixed-top navbar-default">
            <div class="container">
              <div class="navbar-header"><a class="navbar-brand" href="#">Carlos Puello</a><a class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                  <span class="glyphicon glyphicon-bar"></span>
                  <span class="glyphicon glyphicon-bar"></span>
                  <span class="glyphicon glyphicon-bar"></span>
                </a>
              </div>
                <div class="navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="{!! URL::to('/') !!}">Inicio</a></li>
                        <li>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                              Profesores <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                              <li><a href="{!! URL::to('/profesor') !!}">Profesores</a></li>
                              <li><a href="{!! URL::to('/profesor/create') !!}">Agregar Nuevo Profesor</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                              Cursos <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                              <li><a href="{!! URL::to('/curso') !!}">Cursos</a></li>
                              <li><a href="{!! URL::to('/curso/create') !!}">Agregar Nuevo Curso</a></li>
                            </ul>
                        </li>
                    </ul>

                </div>
                <!--/.navbar-collapse -->
            </div>
        </div><!-- fin navbar -->
        
        <div class="container">
            <div class="row">
                <section class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                   <br>
                    @if(Session::has('message'))
                        <div class="alert alert-info alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{Session::get('message')}}
                        </div>
                    @endif
                    @yield('content')
                </section><!-- fin col-md-12 -->
            </div><!-- fin row -->
        </div><!-- fin container -->

        <div class="footer">
            <!-- <h5>Este es el footer</h5> -->
        </div>

        <script src="{{asset('js/bootstrap/3.3.5/bootstrap.min.js')}}"></script>
        <!-- {!!Html::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js')!!} -->

    </body>
</html>
