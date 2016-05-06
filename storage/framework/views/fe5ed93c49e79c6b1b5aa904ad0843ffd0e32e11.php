<?php if(Auth::check()): ?>
	<li class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
			<i class="fa fa-user"></i> <?php echo e(Auth::user()->user); ?> <span class="caret"></span>
		</a>
		<ul class="dropdown-menu" role="menu">
			<li><a href="<?php echo e(route('logout')); ?>">Finalizar sesión</a></li>
		</ul>
	</li>
<?php else: ?>
	<li class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
			<i class="fa fa-user"></i> <span class="caret"></span>
		</a>
		<ul class="dropdown-menu" role="menu">
			<li><a href="<?php echo e(route('login-get')); ?>">Iniciar sesión</a></li>
			<li><a href="<?php echo e(route('register-get')); ?>">Registrarse</a></li>
		</ul>
	</li>
<?php endif; ?>