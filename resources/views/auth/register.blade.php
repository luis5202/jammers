@extends('store.template')

@section('content')
    <div class="container text-center">

        <div class="page-header">
          <h1><i class="fa fa-user"></i> Registrarse</h1>
        </div>

        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <div class="page">

                @include('store.partials.errors')

                    <form method="POST" action="/auth/register">
                        {!! csrf_field() !!}

                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input class="form-control" type="text" name="name" value="{{ old('name') }}">
                        </div>

                        <div class="form-group">
                            <label for="last_name">Apellidos</label>
                            <input class="form-control" type="text" name="last_name" value="{{ old('last_name') }}">
                        </div>

                        <div class="form-group">
                            <label for="email">Correo</label>
                            <input class="form-control" type="email" name="email" value="{{ old('email') }}">
                        </div>

                        <div class="form-group">
                            <label for="user">Usuario</label>
                            <input class="form-control" type="text" name="user" value="{{ old('user') }}">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input class="form-control" type="password" name="password">
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Confirmar Password</label>
                            <input class="form-control" type="password" name="password_confirmation">
                        </div>

                        <div class="form-group">
                            <label for="user">Pais</label>
                            <input class="form-control" type="text" name="country" value="{{ old('country') }}">
                        </div>

                        <div class="form-group">
                            <label for="user">Estado</label>
                            <input class="form-control" type="text" name="state" value="{{ old('state') }}">
                        </div>

                        <div class="form-group">
                            <label for="user">Delegación/Municipio</label>
                            <input class="form-control" type="text" name="city" value="{{ old('city') }}">
                        </div>

                        <div class="form-group">
                            <label for="user">Colonia</label>
                            <input class="form-control" type="text" name="colony" value="{{ old('colony') }}">
                        </div>

                        <div class="form-group">
                            <label for="user">Calle y Número</label>
                            <input class="form-control" type="text" name="address" value="{{ old('address') }}">
                        </div>

                        <div class="form-group">
                            <label for="user">Código Postal</label>
                            <input class="form-control" type="text" name="post_code" value="{{ old('post_code') }}">
                        </div>

                        <div class="form-group">
                            <label for="user">Teléfono</label>
                            <input class="form-control" type="text" name="phone_number" value="{{ old('phone_number') }}">
                        </div>

                        <div class="form-group">
                            <label for="adrress">Referencias de Domicilio</label>
                            <textarea class="form-control" name="references_address">{{ old('references_address') }}</textarea>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Crear cuenta</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@stop
