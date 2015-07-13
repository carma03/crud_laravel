@extends('layouts.master') @section('titulo', 'Mostrar Cursos') @section('sidebar') @parent

<p>This is appended to the master sidebar from display cursos.</p>
@endsection @section('content')
<h3>Listado de cursos.</h3>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre del curso</th>
                <th>Profesor</th>
                <th style="width:400px">Descripcion</th>
                <th>Periodo</th>
                <th>Año</th>
                <th>Fecha Inicio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
                @foreach($cursos as $curso)
                <tr>
                    <th scope="row">
                        <?php echo $i; ?>
                    </th>
                    <td>
                        {!! link_to_route('curso.show', $title = $curso->nombre, $parameters = $curso->id, $attributes = array('class' => '')); !!}
                    </td>
                    <?php $profesor = DB::table('profesors')->where('id', $curso -> id_profesor)->first(); ?>
                        <td>
                            {!! link_to_route('profesor.show', $title = $profesor->nombre." ".$profesor->apellido, $parameters = $profesor->id, $attributes = array('class' => '')); !!}
                        </td>
                        <td>{{$curso -> descripcion}}</td>
                        <td>{{$curso -> periodo}}</td>
                        <td>{{$curso -> anio}}</td>
                        <td>{{$curso -> fecha_inicio}}</td>
                        <td>
                            {!! link_to_route('curso.edit', $title = 'Editar', $parameters = $curso->id, $attributes = array('class' => 'btn btn-info btn-sm')); !!}
                        </td>
                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal_{!! $curso->id !!}">
                                Eliminar
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="myModal_{!! $curso->id !!}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel_{!! $curso->id !!}">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Eliminar al Curso "{{$curso -> nombre}}"</h4>
                                        </div>
                                        <div class="modal-body">
                                            ¿Seguro desea eliminar el curso: ?
                                            <br> {{$curso -> nombre}}
                                            <br> Profesor: {{$profesor->nombre." ".$profesor->apellido}}
                                            <br> Descripción: {{$curso -> descripcion}}
                                            <br> Periodo: {{$curso -> periodo}}
                                            <br> Año: {{$curso -> anio}}
                                            <br> Fecha Inicio: {{$curso -> fecha_inicio}}
                                            <br>
                                        </div>
                                        <div class="modal-footer">

                                            {!! Form::open(['route' => ['curso.destroy', $curso->id], 'id' => 'form_'.$curso->id, 'method' => 'DELETE']) !!}
                                            <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
                                            {!! Form::submit('Eliminar',$attributes = array('class' => 'btn btn-danger')) !!} {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <td>
                </tr>
                <?php $i++; ?>
                    @endforeach
        </tbody>
    </table>

</div>
<!-- fin table-responsive -->
<div class="paginador text-center">
    {!! str_replace('/?', '?', $cursos->render()) !!}
    <!-- muestra el paginador -->
</div>

@endsection
