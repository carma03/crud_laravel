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
	<style>
		@import url(//fonts.googleapis.com/css?family=Lato:100);

        .title_home_content {
            text-align: center;
            display: inline-block;
        }

        .title_home {
            font-size: 96px;
            font-weight: 100;
            font-family: 'Lato';
        }    
	</style>
	<div class="container_">
        <div class="title_home_content">
            <div class="title_home">Esta es una demo</div>
        </div>
    </div>
@endsection