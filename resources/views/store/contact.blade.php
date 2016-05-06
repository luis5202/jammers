@extends('store.template')

@section('content')
    <div class="container text-center">

        <div class="page-header">
          <h1><i class="fa fa-user"></i> Contactanos</h1>
        </div>

        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <div class="page">

                @include('store.partials.errors')

                    {!!Form::open(['route'=>'mail.store'])!!}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Nombre:</label>
                                
                                {!! 
                                    Form::text(
                                        'name', 
                                        null, 
                                        array(
                                            'class'=>'form-control',
                                            'placeholder' => 'Ingresa el nombre...',
                                            'autofocus' => 'autofocus'
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
                            
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group">
                            <label for="mensaje">Mensaje:</label>
                            
                            {!! 
                                Form::textarea(
                                    'mensaje', 
                                    null, 
                                    array(
                                        'class'=>'form-control'
                                    )
                                ) 
                            !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Enviar', array('class'=>'btn btn-primary')) !!}                            
                        </div>
                        
                     {!!Form::close()!!}
                    

                </div>
            </div>
        </div>
    </div>
@stop