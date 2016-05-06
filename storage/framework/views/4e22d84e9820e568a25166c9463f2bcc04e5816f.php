<?php $__env->startSection('content'); ?>
    <div class="container text-center">
        <div class="page-header">
            <h1>
                <i class="fa fa-user"></i> USUARIOS
                <a href="<?php echo e(route('admin.user.create')); ?>" class="btn btn-warning">
                    <i class="fa fa-plus-circle"></i> Usuario
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
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Usuario</th>
                            <th>Correo</th>
                            <th>Tipo</th>
                            <th>Activo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($users as $user): ?>
                            <tr>
                                <td>
                                    <a href="<?php echo e(route('admin.user.edit', $user)); ?>" class="btn btn-primary">
                                        <i class="fa fa-pencil-square-o"></i>
                                    </a>
                                </td>
                                <td>
                                    <?php echo Form::open(['route' => ['admin.user.destroy', $user]]); ?>

        								<input type="hidden" name="_method" value="DELETE">
        								<button onClick="return confirm('Eliminar registro?')" class="btn btn-danger">
        									<i class="fa fa-trash-o"></i>
        								</button>
        							<?php echo Form::close(); ?>

                                </td>
                                <td><?php echo e($user->name); ?></td>
                                <td><?php echo e($user->last_name); ?></td>
                                <td><?php echo e($user->user); ?></td>
                                <td><?php echo e($user->email); ?></td>
                                <td><?php echo e($user->type); ?></td>
                                <td><?php echo e($user->active == 1 ? "Si" : "No"); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            
            <hr>
            
            <?php echo $users->render(); ?>
            
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>