<?php $__env->startSection('content'); ?>
<div class="container text-center">
	<div class="page-header">
	  <h1><i class="fa fa-shopping-cart"></i> Detalle del producto</h1>
	</div>

	<div class="row">
		<div class="col-md-6">
			<div class="product-block">
				<img src="<?php echo e($product->image); ?>">
			</div>	
		</div>
		<div class="col-md-6">
			<div class="product-block">
				<h3><?php echo e($product->name); ?></h3><hr>
				<div class="product-info panel">
					<p><?php echo e($product->description); ?></p>
					<h3>
						<span class="label label-success">Precio: $<?php echo e(number_format($product->price,2)); ?></span>
					</h3>
					<p>
						<a class="btn btn-warning btn-block" href="<?php echo e(route('cart-add',$product->slug)); ?>">
							Lo quiero <i class="fa fa-cart-plus fa-2x"></i>
						</a>
					</p>
				</div>
			</div>	
		</div>
	</div><hr>

	<p>
		<a class="btn btn-primary" href="<?php echo e(route('home')); ?>">
			<i class="fa fa-chevron-circle-left"></i> Regresar
		</a>
	</p>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('store.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>