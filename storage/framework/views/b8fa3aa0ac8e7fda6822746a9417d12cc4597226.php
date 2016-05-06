<?php $__env->startSection('content'); ?>

	<div class="container text-center">
		<div class="page-header">
			<h1>
				<i class="fa fa-shopping-cart"></i>
				CATEGORÍAS <a href="<?php echo e(route('admin.category.create')); ?>" class="btn btn-warning"><i class="fa fa-plus-circle"></i> Categoría</a>
			</h1>
		</div>
		<div class="page">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th>Editar</th>
							<th>Eliminar</th>
							<th>Nombre</th>
							<th>Descripción</th>
							<th>Color</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($categories as $category): ?>
							<tr>
								<td>
									<a href="<?php echo e(route('admin.category.edit', $category)); ?>" class="btn btn-primary">
										<i class="fa fa-pencil-square"></i>
									</a>
								</td>
								<td>
										<?php echo Form::open(['route' => ['admin.category.destroy', $category]]); ?>

        								<input type="hidden" name="_method" value="DELETE">
        								<button onClick="return confirm('Eliminar registro?')" class="btn btn-danger">
        									<i class="fa fa-trash-o"></i>
        								</button>
        								<?php echo Form::close(); ?>

								</td>
								<td><?php echo e($category->name); ?></td>
								<td><?php echo e($category->description); ?></td>
								<td><?php echo e($category->color); ?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>

	</div>
	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>