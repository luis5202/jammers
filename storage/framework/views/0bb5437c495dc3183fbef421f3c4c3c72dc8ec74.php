<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title><?php echo $__env->yieldContent('title', 'Tienda Jammers'); ?></title>
	<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.6/cerulean/bootstrap.min.css" rel="stylesheet" integrity="sha384-fUMURLTdEcpeYHly3PAwggI3l2UvdHNg/I+8LRph7hLDcAZm77YfDx3Tjum9d3vK" crossorigin="anonymous">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-hQpvDQiCJaD2H465dQfA717v7lu5qHWtDbWNPvaTJ0ID5xnPUlVXnKzq7b8YUkbN" crossorigin="anonymous">
	
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/main.css')); ?>">

</head>
<body>
	<?php if(\Session::has('message')): ?>
		<?php echo $__env->make('store.partials.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php endif; ?>
	<?php echo $__env->make('store.partials.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->yieldContent('content'); ?>
	<?php echo $__env->make('store.partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<script type="text/javascript" src="<?php echo e(asset('js/pinterest_grid.js')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset('js/main.js')); ?>"></script>

</body>
</html>