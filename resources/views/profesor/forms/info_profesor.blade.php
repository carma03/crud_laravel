<div class="form-group">
    {!! Form::label('nombre', 'Nombre') !!}
    {!! Form::text('nombre', $value = null, $attributes = array(
                                            'id' => 'nombre_profesor',
                                            'class' => 'form-control',
                                            'placeholder' => 'Nombre',
                                            'required' => 'required'
                                        )
            
                            ) 
            !!}
</div>
<div class="form-group">
    {!! Form::label('apellido', 'Apellido') !!}
    {!! Form::text('apellido', $value = null, $attributes = array(
                                            'id' => 'apellido_profesor',
                                            'class' => 'form-control',
                                            'placeholder' => 'Apelllido',
                                            'required' => 'required'
                                        )
            
                            ) 
            !!}
</div>
<div class="form-group">
        {!! Form::label('email', 'E-Mail Address:') !!}
        {!! Form::email('email', $value = null, $attributes = array(
                                                                'id' => 'email_profesor',
                                                                'class' => 'form-control',
                                                                'placeholder' => 'Email',
                                                                'required' => 'required'
                                        )
                            ) 
        !!} 
</div>
<div class="form-group">
        {!! Form::label('codigo', 'Código') !!}
        {!! Form::text('codigo', $value = null, $attributes = array(
                                            'id' => 'codigo_profesor',
                                            'class' => 'form-control',
                                            'placeholder' => 'Código',
                                            'required' => 'required'
                                        )
            
                            ) 
        !!}
</div>