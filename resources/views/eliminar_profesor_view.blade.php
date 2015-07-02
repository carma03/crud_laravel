@extends('layouts.master')

@section('titulo', 'Eliminar Page')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar from delete profesor.</p>
@endsection

@section('content')
    <h3>Esta es la página para eliminar un profesor.</h3>
@endsection