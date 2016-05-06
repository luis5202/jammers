<?php $__env->startSection('content'); ?>
	
	<div class="container text-center">
		<div class="page-header">
			<h1>
				<i class="fa fa-shopping-cart"></i>
				CATEGORÍAS <small>[Agregar categoría]</small>
			</h1>
		</div>

		<div class="row">
            <div class="col-md-offset-3 col-md-6">
                
                <div class="page">
                    
                    <?php if(count($errors) > 0): ?>
                        <?php echo $__env->make('admin.partials.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php endif; ?>
                    
                    <?php echo Form::open(['route'=>'admin.category.store']); ?>

        
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
                            <label for="description">Descripción:</label>
                            
                            <?php echo Form::textarea(
                                    'description', 
                                    null, 
                                    array(
                                        'class'=>'form-control'
                                    )
                                ); ?>

                        </div>
                        
                        <div class="form-group">
                            <label for="color">Color:</label>
                            
                            <input type="color" name="color" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <?php echo Form::submit('Guardar', array('class'=>'btn btn-primary')); ?>

                            <a href="<?php echo e(route('admin.category.index')); ?>" class="btn btn-warning">Cancelar</a>
                        </div>
                    
                    <?php echo Form::close(); ?>

                    
                </div>
                
            </div>
        </div>
        

	</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>