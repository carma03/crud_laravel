@extends('layouts.master')

@section('titulo', 'Ver Profesor')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar from see profesor.</p>
@endsection

@section('content')
    @if(count($errors) > 0)
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{!! $error !!}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <?php //para que sea un solo form, si se quiere agregar un campo, solo se edita un solo form para crear y actualizar ?>
    <h3>{{$curso->nombre}}</h3>
        Profesor:
        <?php 
            $profesores = DB::table('profesors')->where('id', $curso->id_profesor)->get();
        ?>
                @foreach($profesores as $profesor)
                        {!! link_to_route('profesor.show', $title = $profesor->nombre." ".$profesor->apellido, $parameters = $profesor->id, $attributes = array('class' => '')); !!}
                @endforeach
        <br>
        Descripción: {{$curso->descripcion}}<br>
        Periodo: {{$curso->periodo}}<br>
        Año: {{$curso->anio}}<br>
        Fecha Inicio: {{$curso->fecha_inicio}}<br>

@endsection
