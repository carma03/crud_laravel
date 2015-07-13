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
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
        <img src="../images/teacher_icon.png" alt="" class="img img-responsive">
    </div>
    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
        <h2>{{$profesor->nombre}} {{$profesor->apellido}}</h2>
        <a href="mailto:{{$profesor->email}}"><i class="fa fa-envelope"></i> {{$profesor->email}} </a>
        <br>
            Código: {{$profesor->codigo}}<br>
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
</div>
@endsection
