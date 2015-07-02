@extends('layouts.master')

@section('titulo', 'Ver Profesor')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar from see profesor.</p>
@endsection

@section('content')
    <h3>Esta es la página para ver un profesor.</h3>
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
        Nombre: {{$profesor->nombre}} {{$profesor->apellido}}<br>
        Código: {{$profesor->codigo}}<br>
        Correo Electrónico: {{$profesor->email}}<br>
        Cursos: 
        <?php 
            $cursos = DB::table('cursos')->where('id_profesor', $profesor->id)->get();
        ?>
            <ul>
                @foreach($cursos as $curso)
                    <li>
                        {!! link_to_route('curso.show', $title = $curso->nombre, $parameters = $curso->id, $attributes = array('class' => '')); !!}
                    </li>
                @endforeach
            </ul>
        <br>
@endsection