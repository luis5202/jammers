<?php $__env->startSection('content'); ?>

<?php echo $__env->make('store.partials.slider', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


	<div class="container text-center">
	<div id="products">
		<?php foreach($products as $product): ?>
			<?php if($product->visible!=0): ?>
			<div class="product white-panel">
				<h3><?php echo e($product->name); ?></h3><hr>
				<img src="<?php echo e($product->image); ?>" width="200">
				<div class="product-info panel">
					<p><?php echo e($product->extract); ?></p>
					<h3><span class="label label-success">Precio: $<?php echo e(number_format($product->price,2)); ?></span></h3>
					<p>
						<a class="btn btn-warning" href="<?php echo e(route('cart-add',$product->slug)); ?>"><i class="fa fa-cart-plus"></i> Lo quiero</a>
						<a class="btn btn-primary" href="<?php echo e(route('product-detail', $product->slug)); ?>"><i class="fa fa-chevron-circle-right"></i> Leer mas</a>
					</p>
				</div>
			</div>
			<?php endif; ?>
		<?php endforeach; ?>
	</div>
</div>
	

<?php $__env->stopSection(); ?>
<?php echo $__env->make('store.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>