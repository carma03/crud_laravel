@extends('layouts.master')

@section('titulo', 'Mostrar Profesores')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar from display profesor.</p>
@endsection

@section('content')
    <h3>Listado de Profesores.</h3>
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Código</th>
            <th>Email</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach($profesores as $profesor)
                <tr>
                    <th scope="row"><?php echo $i; ?></th>
                    <td>
                        {!! link_to_route('profesor.show', $title = $profesor->nombre.' '.$profesor->apellido, $parameters = $profesor->id, $attributes = array('class' => '')); !!}
                    </td>
                    <td>{{$profesor -> codigo}}</td>
                    <td>{{$profesor -> email}}</td>
                    <td>
                        {!! link_to_route('profesor.edit', $title = 'Editar', $parameters = $profesor->id, $attributes = array('class' => 'btn btn-info btn-sm')); !!}
                    </td>
                    <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal_{!! $profesor->id !!}">
                          Eliminar
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="myModal_{!! $profesor->id !!}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel_{!! $profesor->id !!}">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Eliminar al Profesor "{{$profesor -> nombre}}"</h4>
                              </div>
                              <div class="modal-body">
                                ¿Seguro desea eliminar el profesor: ?<br>
                                {{$profesor -> nombre}}<br>
                                {{$profesor -> codigo}}<br>
                                Email: {{$profesor -> email}}<br>
                              </div>
                              <div class="modal-footer">

                                {!! Form::open(['route' => ['profesor.destroy', $profesor->id], 'id' => 'form_'.$profesor->id, 'method' => 'DELETE']) !!}
                                  <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
                                  {!! Form::submit('Eliminar',$attributes = array('class' => 'btn btn-danger')) !!}
                        {!! Form::close() !!}
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
    <div class="paginador text-center">
        {!! str_replace('/?', '?', $profesores->render()) !!} <!-- muestra el paginador -->
    </div>

@endsection