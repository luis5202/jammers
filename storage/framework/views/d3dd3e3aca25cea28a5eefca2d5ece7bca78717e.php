<?php $__env->startSection('content'); ?>
    <div class="container text-center">

        <div class="page-header">
          <h1><i class="fa fa-user"></i> Registrarse</h1>
        </div>

        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <div class="page">

                <?php echo $__env->make('store.partials.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    <form method="POST" action="/auth/register">
                        <?php echo csrf_field(); ?>


                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input class="form-control" type="text" name="name" value="<?php echo e(old('name')); ?>">
                        </div>

                        <div class="form-group">
                            <label for="last_name">Apellidos</label>
                            <input class="form-control" type="text" name="last_name" value="<?php echo e(old('last_name')); ?>">
                        </div>

                        <div class="form-group">
                            <label for="email">Correo</label>
                            <input class="form-control" type="email" name="email" value="<?php echo e(old('email')); ?>">
                        </div>

                        <div class="form-group">
                            <label for="user">Usuario</label>
                            <input class="form-control" type="text" name="user" value="<?php echo e(old('user')); ?>">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input class="form-control" type="password" name="password">
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Confirmar Password</label>
                            <input class="form-control" type="password" name="password_confirmation">
                        </div>

                        <div class="form-group">
                            <label for="user">Pais</label>
                            <input class="form-control" type="text" name="country" value="<?php echo e(old('country')); ?>">
                        </div>

                        <div class="form-group">
                            <label for="user">Estado</label>
                            <input class="form-control" type="text" name="state" value="<?php echo e(old('state')); ?>">
                        </div>

                        <div class="form-group">
                            <label for="user">Delegación/Municipio</label>
                            <input class="form-control" type="text" name="city" value="<?php echo e(old('city')); ?>">
                        </div>

                        <div class="form-group">
                            <label for="user">Colonia</label>
                            <input class="form-control" type="text" name="colony" value="<?php echo e(old('colony')); ?>">
                        </div>

                        <div class="form-group">
                            <label for="user">Calle y Número</label>
                            <input class="form-control" type="text" name="address" value="<?php echo e(old('address')); ?>">
                        </div>

                        <div class="form-group">
                            <label for="user">Código Postal</label>
                            <input class="form-control" type="text" name="post_code" value="<?php echo e(old('post_code')); ?>">
                        </div>

                        <div class="form-group">
                            <label for="user">Teléfono</label>
                            <input class="form-control" type="text" name="phone_number" value="<?php echo e(old('phone_number')); ?>">
                        </div>

                        <div class="form-group">
                            <label for="adrress">Referencias de Domicilio</label>
                            <textarea class="form-control" name="references_address"><?php echo e(old('references_address')); ?></textarea>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Crear cuenta</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('store.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>