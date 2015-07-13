@extends('layouts.master') @section('titulo', 'Home Page') @section('sidebar') @parent

<p>This is appended to the master sidebar.</p>
@endsection @if(Session::has('message'))
<div class='alert alert-success' role='alert'>
    {{Session::get('message')}}
</div>
@endif @section('content')
<div class="container_">
    <div class="title_home_content">
        <div class="title_home">Esta es una demo de un CRUD en Laravel</div>
        <!-- <img src="http://lorempicsum.com/futurama/400/200/7" alt=""> -->
        <div class="img">

        </div>
    </div>
</div>
@endsection
