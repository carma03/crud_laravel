@extends('layouts.master')

@section('titulo', 'Crear Curso')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar from create curso.</p>
@endsection
@section('content')
    <h3>Agregar un nuevo curso.</h3>
    <!-- ver: http://laravelcollective.com/docs/5.1/html -->
    <!-- si hay errores en el ProfesorCreateRequest -->
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
    {!! Form::open(['route' => 'curso.store', 'method' => 'POST']) !!}
        @include('curso.forms.info_curso')
        {!! Form::submit('Registrar',$attributes = array('class' => 'btn btn-success')) !!}
    {!! Form::close() !!}
@endsection