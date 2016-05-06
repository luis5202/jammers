<?php $__env->startSection('content'); ?>

    <div class="container text-center">
        
        <div class="page-header">
            <h1>
                <i class="fa fa-user"></i> USUARIOS <small>[ Agregar usuario ]</small>
            </h1>
        </div>
        
        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                
                <div class="page">
                    
                    <?php if(count($errors) > 0): ?>
                        <?php echo $__env->make('admin.partials.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php endif; ?>
                    
                    <?php echo Form::open(['route'=>'admin.user.store']); ?>

        
                        <div class="form-group">
                            <label for="name">Nombre:</label>
                            
                            <?php echo Form::text(
                                    'name', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingresa el nombre...',
                                        'autofocus' => 'autofocus',
                                        //'required' => 'required'
                                    )
                                ); ?>

                        </div>
                        
                        <div class="form-group">
                            <label for="last_name">Apellidos:</label>
                            
                            <?php echo Form::text(
                                    'last_name', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingresa los apellidos...',
                                        //'required' => 'required'
                                    )
                                ); ?>

                        </div>
                        
                        <div class="form-group">
                            <label for="email">Correo:</label>
                            
                            <?php echo Form::text(
                                    'email', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingresa el correo...',
                                        //'required' => 'required'
                                    )
                                ); ?>

                        </div>
                        
                        <div class="form-group">
                            <label for="user">Usuario:</label>
                            
                            <?php echo Form::text(
                                    'user', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingresa el nombre de usuario...',
                                        //'required' => 'required'
                                    )
                                ); ?>

                        </div>
                        
                        <div class="form-group">
                            <label for="password">Password:</label>
                            
                            <?php echo Form::password(
                                    'password', 
                                    array(
                                        'class'=>'form-control',
                                        //'required' => 'required'
                                    )
                                ); ?>

                        </div>
                        
                        <div class="form-group">
                            <label for="confirm_password">Confirmar Password:</label>
                            
                            <?php echo Form::password(
                                    'password_confirmation',
                                    array(
                                        'class'=>'form-control',
                                        //'required' => 'required'
                                    )
                                ); ?>

                        </div>
                        
                        <div class="form-group">
                            <label for="type">Tipo:</label>
                            
                            <?php echo Form::radio('type', 'user', true); ?> User
                            <?php echo Form::radio('type', 'admin'); ?> Admin
                        </div>

                        <div class="form-group">
                            <label for="country">Pais:</label>
                            
                            <?php echo Form::text(
                                    'country', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingresa el pais en el que vives...',
                                        //'required' => 'required'
                                    )
                                ); ?>

                        </div>

                        <div class="form-group">
                            <label for="state">Estado:</label>
                            
                            <?php echo Form::text(
                                    'state', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingresa el estado en el que vives...',
                                        //'required' => 'required'
                                    )
                                ); ?>

                        </div>

                        <div class="form-group">
                            <label for="city">Delegación/Municipio:</label>
                            
                            <?php echo Form::text(
                                    'city', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingresa la Delegación o municipio en el que vives...',
                                        //'required' => 'required'
                                    )
                                ); ?>

                        </div>

                        <div class="form-group">
                            <label for="colony">Colonia:</label>
                            
                            <?php echo Form::text(
                                    'colony', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingresa la colonia en la que vives...',
                                        //'required' => 'required'
                                    )
                                ); ?>

                        </div>

                        <div class="form-group">
                            <label for="address">Calle y Número:</label>
                            
                            <?php echo Form::text(
                                    'address', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingresa la calle y número de tu domicilio...',
                                        //'required' => 'required'
                                    )
                                ); ?>

                        </div>

                        <div class="form-group">
                            <label for="post_code">Código Postal:</label>
                            
                            <?php echo Form::text(
                                    'post_code', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingresa código postal de tu domicilio...',
                                        //'required' => 'required'
                                    )
                                ); ?>

                        </div>

                        <div class="form-group">
                            <label for="phone_number">Teléfono:</label>
                            
                            <?php echo Form::text(
                                    'phone_number', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingresa tu número de teléfono...',
                                        //'required' => 'required'
                                    )
                                ); ?>

                        </div>
                        
                        <div class="form-group">
                            <label for="references_address">Referencias del domicilio:</label>
                            
                            <?php echo Form::textarea(
                                    'references_address', 
                                    null, 
                                    array(
                                        'class'=>'form-control'
                                    )
                                ); ?>

                        </div>
                        
                        <div class="form-group">
                            <label for="active">Active:</label>
                            
                            <?php echo Form::checkbox('active', null, true); ?>

                        </div>
                        
                        <div class="form-group">
                            <?php echo Form::submit('Guardar', array('class'=>'btn btn-primary')); ?>

                            <a href="<?php echo e(route('admin.user.index')); ?>" class="btn btn-warning">Cancelar</a>
                        </div>
                    
                    <?php echo Form::close(); ?>

                    
                </div>
                
            </div>
        </div>
        
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>