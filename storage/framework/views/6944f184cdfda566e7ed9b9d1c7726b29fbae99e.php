<?php $__env->startSection('content'); ?>

	<div class="container text-center">
		<div class="page-header">
			<h1>
				<i class="fa fa-shopping-cart"></i>
				PRODUCTOS 
				<a href="<?php echo e(route('admin.product.create')); ?>" class="btn btn-warning">
					<i class="fa fa-plus-circle"></i> Producto
				</a>
			</h1>
		</div>
		<div class="page">
            
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Editar</th>
                            <th>Eliminar</th>
                            <th>Imagen</th>
                            <th>Nombre</th>
                            <th>Categoría</th>
                            <th>Extracto</th>
                            <th>Precio</th>
                            <th>Visible</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($products as $product): ?>
                            <tr>
                                <td>
                                    <a href="<?php echo e(route('admin.product.edit', $product->slug)); ?>" class="btn btn-primary">
                                        <i class="fa fa-pencil-square-o"></i>
                                    </a>
                                </td>
                                <td>
                                    <?php echo Form::open(['route' => ['admin.product.destroy', $product->slug]]); ?>

        								<input type="hidden" name="_method" value="DELETE">
        								<button onClick="return confirm('Eliminar registro?')" class="btn btn-danger">
        									<i class="fa fa-trash-o"></i>
        								</button>
        							<?php echo Form::close(); ?>

                                </td>
                                <td><img src="<?php echo e($product->image); ?>" width="40"></td>
                                <td><?php echo e($product->name); ?></td>
                                <td><?php echo e($product->category->name); ?></td>
                                <td><?php echo e($product->extract); ?></td>
                                <td>$<?php echo e(number_format($product->price,2)); ?></td>
                                <td><?php echo e($product->visible == 1 ? "Si" : "No"); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            
            <hr>
            
            <?php echo $products->render(); ?>
            
        </div>

	</div>
	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>