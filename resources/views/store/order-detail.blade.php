@if(Auth::check() )
@extends('store.template')

@section('content')
	
	<div class="container text-center">
		<div class="page-header">
			<h1><i class="fa fa-shopping-cart"></i> Detalle del pedido</h1>
		</div>

		<div class="page">
			<div class="table-responsive">
				<h3>Datos del usuario</h3>
				<table class="table table-striped table-hover table-bordered">
					<tr><td>Nombre:</td><td>{{ Auth::user()->name . " " . Auth::user()->last_name }}</td></tr>
					<tr><td>Usuario:</td><td>{{ Auth::user()->user }}</td></tr>
					<tr><td>Correo:</td><td>{{ Auth::user()->email }}</td></tr>
					<tr><td>Dirección:</td><td>{{ Auth::user()->address }}</td></tr>
				</table>
			</div>
			<div class="table-responsive">
				<h3>Datos del pedido</h3>
				<table class="table table-striped table-hover table-bordered">
					<tr>
						<th>Producto</th>
						<th>Precio</th>
						<th>Cantidad</th>
						<th>Subtotal</th>
					</tr>
					@foreach($cart as $item)
						<tr>
							<td>{{ $item->name }}</td>
							<td>${{ number_format($item->price,2) }}</td>
							<td>{{ $item->quantity }}</td>
							<td>${{ number_format($item->price * $item->quantity,2) }}</td>
						</tr>
					@endforeach
				</table><hr>
				<h3>
					<span class="label label-success">
						Total: ${{ number_format($total, 2) }}
					</span>
				</h3><hr>
				<p>
					<a href="{{ route('cart-show') }}" class="btn btn-primary">
						<i class="fa fa-chevron-circle-left"></i> Regresar
					</a>

					<a href="{{route('payment')}}" class="btn btn-warning">
						Pagar con <i class="fa fa-cc-paypal fa-2x"></i>
					</a>
				</p>
			</div>
		</div>
	</div>

@stop
@else	
	<div class="container text-center">
		<div class="page-header">
			<h1><i class="fa fa-shopping-cart"></i> Detalle del pedido</h1>
		</div>

		<div class="page">
		<h3>Detalles de Envío</h3>
			 @if (count($errors) > 0)
                        @include('admin.partials.errors')
                    @endif
                    
                    {!! Form::open(['route'=>'shipping-detail']) !!}
        
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
                                        'required' => 'required'
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
                                        'required' => 'required'
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
                                        'required' => 'required'
                                    )
                                ) 
                            !!}
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
                                        'required' => 'required'
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
                                        'required' => 'required'
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
                                        'required' => 'required'
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
                                        'required' => 'required'
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
                                        'required' => 'required'
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
                                        'required' => 'required'
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
                                        'required' => 'required'
                                    )
                                ) 
                            !!}
                        </div>
                        
                        <div class="form-group">
                            <label for="references_address">Referencias del domicilio:</label>
                            
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
			<div class="table-responsive">
				<h3>Datos del pedido</h3>
				<table class="table table-striped table-hover table-bordered">
					<tr>
						<th>Producto</th>
						<th>Precio</th>
						<th>Cantidad</th>
						<th>Subtotal</th>
					</tr>
					@foreach($cart as $item)
						<tr>
							<td>{{ $item->name }}</td>
							<td>${{ number_format($item->price,2) }}</td>
							<td>{{ $item->quantity }}</td>
							<td>${{ number_format($item->price * $item->quantity,2) }}</td>
						</tr>
					@endforeach
				</table><hr>
				<h3>
					<span class="label label-success">
						Total: ${{ number_format($total, 2) }}
					</span>
				</h3><hr>
				<p>
					<a href="{{ route('cart-show') }}" class="btn btn-primary">
						<i class="fa fa-chevron-circle-left"></i> Regresar
					</a>

					
	                        {!! Form::submit('Pagar con PayPal', array('class'=>'btn btn-warning')) !!}
	                        
	                				</p>
			</div>

			 			
                    
                    {!! Form::close() !!}

		</div>
	</div>



@endif