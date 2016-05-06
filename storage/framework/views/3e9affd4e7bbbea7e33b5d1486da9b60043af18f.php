<?php $__env->startSection('content'); ?>
	<div class="container text-center">
		<div class="page-header">
		  <h1><i class="fa fa-shopping-cart"></i> Carrito de compras</h1>
		</div>

		<div class="table-cart">
			<?php if(count($cart)): ?>

			<p>
				<a href="<?php echo e(route('cart-trash')); ?>" class="btn btn-danger">
					Vaciar carrito <i class="fa fa-trash"></i>
				</a>
			</p>

			<div class="table-responsive">
				<table class="table table-striped table-hover table-bordered">
					<thead>
						<tr>
							<th>Imagen</th>
							<th>Producto</th>
							<th>Precio</th>
							<th>Cantidad</th>
							<th>Subtotal</th>
							<th>Quitar</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($cart as $item): ?>
							<tr> 
								<td><img src="<?php echo e($item->image); ?>"></td>
								<td><?php echo e($item->name); ?></td>
								<td>$<?php echo e(number_format($item->price,2)); ?></td>
								<td>
									<input 
										type="number"
										min="1"
										max="100"
										value="<?php echo e($item->quantity); ?>"
										id="product_<?php echo e($item->id); ?>"
									>
									<a 
										href="#" 
										class="btn btn-warning btn-update-item"
										data-href="<?php echo e(route('cart-update', $item->slug)); ?>"
										data-id = "<?php echo e($item->id); ?>"
									>
										<i class="fa fa-refresh"></i>
									</a>
								</td>
								<td>$<?php echo e(number_format($item->price * $item->quantity,2)); ?></td>
								<td>
									<a href="<?php echo e(route('cart-delete', $item->slug)); ?>" class="btn btn-danger">
										<i class="fa fa-remove"></i>
									</a>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table><hr>
				
				<h3>
					<span class="label label-success">
						Total: $<?php echo e(number_format($total,2)); ?>

					</span>
				</h3>

			</div>
			<?php else: ?>
				<h3><span class="label label-warning">No hay productos en el carrito :(</span></h3>
			<?php endif; ?>
			<hr>
			<p>
				<a href="<?php echo e(route('home')); ?>" class="btn btn-primary">
					<i class="fa fa-chevron-circle-left"></i> Seguir comprando
				</a>

				<a href="<?php echo e(route('order-detail')); ?>" class="btn btn-primary">
				 Continuar <i class="fa fa-chevron-circle-right"></i>
				</a>
			</p>
		</div>

	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('store.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>