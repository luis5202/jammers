<?php $__env->startSection('content'); ?>
	
	<div class="container text-center">
		<div class="page-header">
			<h1>
				<i class="fa fa-shopping-cart"></i>
				PRODUCTOS <small>[Agregar producto]</small>
			</h1>
		</div>

		<div class="row">
            <div class="col-md-offset-3 col-md-6">
                
                <div class="page">
                    
                    <?php if(count($errors) > 0): ?>
                        <?php echo $__env->make('admin.partials.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php endif; ?>
                    
                    <?php echo Form::open(array('route'=>'admin.product.store', 'files' => true)); ?>

                    
                        <div class="form-group">
                            <label class="control-label" for="category_id">Categoría</label>
                            <?php echo Form::select('category_id', $categories, null, ['class' => 'form-control']); ?>

                        </div>
        
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
                            <label for="extract">Extracto:</label>
                            
                            <?php echo Form::text(
                                    'extract', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingresa el extracto...',
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
                            <label for="price">Precio:</label>
                            
                            <?php echo Form::text(
                                    'price', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingresa el precio...',
                                    )
                                ); ?>

                        </div>
                        
                        <div class="form-group">
                            <label for="image">Imagen:</label>
                            
                            <?php echo Form::file(
                                    'image', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        
                                    )
                                ); ?>

                        </div>
                        
                        <div class="form-group">
                            <label for="visible">Visible:</label>
                            
                            <?php echo Form::checkbox(
                                    'visible', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                    )
                                ); ?>

                        </div>
                        
                        <div class="form-group">
                            <?php echo Form::submit('Guardar', array('class'=>'btn btn-primary')); ?>

                            <a href="<?php echo e(route('admin.product.index')); ?>" class="btn btn-warning">Cancelar</a>
                        </div>
                    
                    <?php echo Form::close(); ?>

                    
                </div>
                
            </div>
        </div>
        

	</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>