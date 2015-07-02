@extends('layouts.master')

@section('titulo', 'Home Page')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@if(Session::has('message'))
    <div class='alert alert-success' role='alert'>
        {{Session::get('message')}}
    </div>
@endif

@section('content')
    <h3>Esta es la home page llamada desde HomeController.php</h3>
@endsection