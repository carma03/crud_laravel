@extends('layouts.master')

@section('titulo', 'Eliminar Curso')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar from destroy curso.</p>
@endsection

@section('content')
    <h3>Eliminar curso.</h3>
    <!-- ver: http://laravelcollective.com/docs/5.1/html -->
    {!! Form::open(['route' => ['curso.destroy', $curso->id], 'method' => 'DELETE']) !!}
        //@include('curso.forms.info_curso')
        {!! Form::submit('Eliminar',$attributes = array('class' => 'btn btn-danger')) !!}
    {!! Form::close() !!}
@endsection