@extends('admin.template')

@section('content')

    <div class="container text-center">
        
        <div class="page-header">
            <h1>
                <i class="fa fa-user"></i> USUARIOS <small>[ Editar usuario ]</small>
            </h1>
        </div>
        
        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                
                <div class="page">
                    
                    @if (count($errors) > 0)
                        @include('admin.partials.errors')
                    @endif
                    
                    {!! Form::model($user, array('route' => array('admin.user.update', $user))) !!}
                    
                        <input type="hidden" name="_method" value="PUT">
        
                        <div class="form-group">
                            <label for="name">Nombre:</label>
                            
                            {!! 
                                Form::text(
                                    'name', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingresa el nombre...',
                                        'autofocus' => 'autofocus',
                                        //'required' => 'required'
                                    )
                                ) 
                            !!}
                        </div>
                        
                        <div class="form-group">
                            <label for="last_name">Apellidos:</label>
                            
                            {!! 
                                Form::text(
                                    'last_name', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingresa los apellidos...',
                                        //'required' => 'required'
                                    )
                                ) 
                            !!}
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Correo:</label>
                            
                            {!! 
                                Form::text(
                                    'email', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingresa el correo...',
                                        //'required' => 'required'
                                    )
                                ) 
                            !!}
                        </div>
                        
                        <div class="form-group">
                            <label for="user">Usuario:</label>
                            
                            {!! 
                                Form::text(
                                    'user', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingresa el nombre de usuario...',
                                        //'required' => 'required'
                                    )
                                ) 
                            !!}
                        </div>
                        
                        <div class="form-group">
                            <label for="type">Tipo:</label>
                            
                            {!! Form::radio('type', 'user', $user->type=='user' ? true : false) !!} User
                            {!! Form::radio('type', 'admin', $user->type=='admin' ? true : false) !!} Admin
                        </div>

                        
                        <div class="form-group">
                            <label for="country">Pais:</label>
                            
                            {!! 
                                Form::text(
                                    'country', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingresa el pais en el que vives...',
                                        //'required' => 'required'
                                    )
                                ) 
                            !!}
                        </div>

                        <div class="form-group">
                            <label for="state">Estado:</label>
                            
                            {!! 
                                Form::text(
                                    'state', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingresa el estado en el que vives...',
                                        //'required' => 'required'
                                    )
                                ) 
                            !!}
                        </div>

                        <div class="form-group">
                            <label for="city">Delegación/Municipio:</label>
                            
                            {!! 
                                Form::text(
                                    'city', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingresa la Delegación o municipio en el que vives...',
                                        //'required' => 'required'
                                    )
                                ) 
                            !!}
                        </div>

                        <div class="form-group">
                            <label for="colony">Colonia:</label>
                            
                            {!! 
                                Form::text(
                                    'colony', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingresa la colonia en la que vives...',
                                        //'required' => 'required'
                                    )
                                ) 
                            !!}
                        </div>

                        <div class="form-group">
                            <label for="address">Calle y Número:</label>
                            
                            {!! 
                                Form::text(
                                    'address', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingresa la calle y número de tu domicilio...',
                                        //'required' => 'required'
                                    )
                                ) 
                            !!}
                        </div>

                        <div class="form-group">
                            <label for="post_code">Código Postal:</label>
                            
                            {!! 
                                Form::text(
                                    'post_code', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingresa código postal de tu domicilio...',
                                        //'required' => 'required'
                                    )
                                ) 
                            !!}
                        </div>

                        <div class="form-group">
                            <label for="phone_number">Teléfono:</label>
                            
                            {!! 
                                Form::text(
                                    'phone_number', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingresa tu número de teléfono...',
                                        //'required' => 'required'
                                    )
                                ) 
                            !!}
                        </div>
                        
                        <div class="form-group">
                            <label for="references_address">Dirección:</label>
                            
                            {!! 
                                Form::textarea(
                                    'references_address', 
                                    null, 
                                    array(
                                        'class'=>'form-control'
                                    )
                                ) 
                            !!}
                        </div>
                        <div class="form-group">
                            <label for="active">Active:</label>
                            
                            {!! Form::checkbox('active', null, $user->active == 1 ? true : false) !!}
                        </div><hr>
                        
                        <fieldset>
                            <legend>Cambiar password:</legend>
                            <div class="form-group">
                                <label for="password">Nuevo Password:</label>
                                
                                {!! 
                                    Form::password(
                                        'password', 
                                        array(
                                            'class'=>'form-control',
                                            //'required' => 'required'
                                        )
                                    ) 
                                !!}
                            </div>
                            
                            <div class="form-group">
                                <label for="confirm_password">Confirmar Nuevo Password:</label>
                                
                                {!! 
                                    Form::password(
                                        'password_confirmation',
                                        array(
                                            'class'=>'form-control',
                                            //'required' => 'required'
                                        )
                                    ) 
                                !!}
                            </div>
                        </fieldset><hr>
                        
                        <div class="form-group">
                            {!! Form::submit('Actualizar', array('class'=>'btn btn-primary')) !!}
                            <a href="{{ route('admin.user.index') }}" class="btn btn-warning">Cancelar</a>
                        </div>
                    
                    {!! Form::close() !!}
                    
                </div>
                
            </div>
        </div>
        
    </div>

@stop