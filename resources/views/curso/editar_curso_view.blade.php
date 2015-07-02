@extends('layouts.master')

@section('titulo', 'Editar Curso')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar from edit curso.</p>
@endsection

@section('content')
    <h3>Editar curso.</h3>
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
    {!! Form::model($curso, ['route' => ['curso.update', $curso->id], 'id'=>'form_edit_curso', 'method' => 'PUT']) !!}
        <?php //para que sea un solo form, si se quiere agregar un campo, solo se edita un solo form para crear y actualizar ?>
        @include('curso.forms.info_curso')
        {!! Form::submit('Guardar',$attributes = array('class' => 'btn btn-success')) !!}
    {!! Form::close() !!}

@endsection