<?php $__env->startSection('content'); ?>
    <div class="container text-center">

        <div class="page-header">
          <h1><i class="fa fa-user"></i> Contactanos</h1>
        </div>

        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <div class="page">

                <?php echo $__env->make('store.partials.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    <?php echo Form::open(['route'=>'mail.store']); ?>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Nombre:</label>
                                
                                <?php echo Form::text(
                                        'name', 
                                        null, 
                                        array(
                                            'class'=>'form-control',
                                            'placeholder' => 'Ingresa el nombre...',
                                            'autofocus' => 'autofocus'
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
                            
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group">
                            <label for="mensaje">Mensaje:</label>
                            
                            <?php echo Form::textarea(
                                    'mensaje', 
                                    null, 
                                    array(
                                        'class'=>'form-control'
                                    )
                                ); ?>

                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo Form::submit('Enviar', array('class'=>'btn btn-primary')); ?>                            
                        </div>
                        
                     <?php echo Form::close(); ?>

                    

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('store.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>