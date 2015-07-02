@extends('layouts.master')

@section('titulo', 'Eliminar Profesor')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar from destroy profesor.</p>
@endsection

@section('content')
    <h3>Esta es la página para emilinar un profesor.</h3>
    <!-- ver: http://laravelcollective.com/docs/5.1/html -->
    {!! Form::open(['route' => ['profesor.destroy', $profesor->id], 'method' => 'DELETE']) !!}
        //@include('profesor.forms.info_profesor')
        {!! Form::submit('Eliminar',$attributes = array('class' => 'btn btn-danger')) !!}
    {!! Form::close() !!}
@endsection