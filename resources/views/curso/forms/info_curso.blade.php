<div class="form-group">
    {!! Form::label('nombre', 'Nombre') !!}
    {!! Form::text('nombre', $value = null, $attributes = array(
                                            'id' => 'nombre_curso',
                                            'class' => 'form-control',
                                            'placeholder' => 'Nombre',
                                            'required' => 'required'
                                        )
            
                            ) 
            !!}
</div>
<div class="form-group">
    {!! Form::label('profesor', 'Profesor del curso') !!}
    <?php 
        $profesores = DB::table('profesors')->get();//obtiene los profesores de la BD
        $lista_profesores = array();
        $lista_profesores[""] = 'Seleccione Profesor...';
        foreach($profesores as $profesor){
            //almacena los profesores en una lista para crear el select
            $lista_profesores[$profesor->id] = $profesor->nombre ." ".$profesor->apellido;
        }
    ?>
    {!! Form::select('id_profesor', $lista_profesores,null, $attributes = array(
                                                            'class' => 'form-control', 'required' => 'required'
                                                        )
                        )
        !!}
</div>
<div class="form-group">
    {!! Form::label('descripcion', 'Descripcion') !!}
    {!! Form::textArea('descripcion', $value = null, $attributes = array(
                                            'id' => 'descripcion_curso',
                                            'class' => 'form-control',
                                            'placeholder' => 'Descripcion',
                                            'required' => 'required'
                                        )
            
                            ) 
            !!}
</div>
<div class="form-group">
        {!! Form::label('periodo', 'Periodo:') !!}
        {!! Form::select('periodo', array(
                                        '' => 'Seleccione Periodo...',
                                        '1P' => '1P', 
                                        '2P' => '2P'
                                    ),null, $attributes = array(
                                                            'class' => 'form-control', 'required' => 'required'
                                                        )
                        )
        !!} 
</div>
<div class="form-group">
        {!! Form::label('anio', 'Año') !!}
        {!! Form::select('anio', array(
                                        '' => 'Seleccione Año...',
                                        '2015' => '2015', 
                                        '2016' => '2016',
                                        '2017' => '2017'
                                    ), null, $attributes = array(
                                                            'class' => 'form-control',
                                                            'required' => 'required'
                                                            )
                        )
        !!}
</div>
<div class="form-group">
    {!! Form::label('fecha_inicio', 'Fecha Inicio') !!}
        {!! Form::text('fecha_inicio', $value = null, $attributes = array(
                                            'id' => 'fecha_inicio',
                                            'class' => 'form-control',
                                            'placeholder' => 'Fecha Inicio',
                                            'required' => 'required'
                                        )
            
                            ) 
        !!}
    <!-- ver: http://www.eyecon.ro/bootstrap-datepicker/ -->
    <script>
        $(function() {
            $( "#fecha_inicio" ).datepicker({
                format: 'yyyy-mm-dd'
            });
        });
    </script>
</div>