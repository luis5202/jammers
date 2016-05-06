<?php $__env->startSection('content'); ?>
    <div class="container text-center">
        <div class="page-header">
            <h1>
                <i class="fa fa-shopping-cart"></i> PEDIDOS
            </h1>
        </div>
        
        <div class="page">
            
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Detalle Envío</th>
                            <th>Detalle Pedido</th>
                            <th>Eliminar</th>
                            <th>Fecha</th>
                            <th>Usuario</th>
                            <th>Subtotal</th>
                            <th>Envio</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($orders as $order): ?>
                            <tr>
                                <td>
                                    <a 
                                        href="#" 
                                        class="btn btn-primary btn-detalle-envio"
                                        data-id="<?php echo e($order->id); ?>"
                                        data-path="<?php echo e(route('admin.shipping.detail')); ?>"
                                        data-toggle="modal" 
                                        data-target="#myModal2"
                                        data-token="<?php echo e(csrf_token()); ?>"
                                    >
                                        <i class="fa fa-external-link"></i>
                                    </a>
                                </td>
                                <td>
                                    <a 
                                        href="#" 
                                        class="btn btn-primary btn-detalle-pedido"
                                        data-id="<?php echo e($order->id); ?>"
                                        data-path="<?php echo e(route('admin.order.getItems')); ?>"
                                        data-toggle="modal" 
                                        data-target="#myModal"
                                        data-token="<?php echo e(csrf_token()); ?>"
                                    >
                                        <i class="fa fa-external-link"></i>
                                    </a>
                                </td>
                                <td>
                                    <?php echo Form::open(['route' => ['admin.order.destroy', $order->id]]); ?>

        								<button onClick="return confirm('Eliminar registro?')" class="btn btn-danger">
        									<i class="fa fa-trash-o"></i>
        								</button>
        							<?php echo Form::close(); ?>

                                </td>
                                <td><?php echo e($order->created_at); ?></td>
                                <td><?php echo e($order->user->name . " " . $order->user->last_name); ?></td>
                                <td>$<?php echo e(number_format($order->subtotal,2)); ?></td>
                                <td>$<?php echo e(number_format($order->shipping,2)); ?></td>
                                <td>$<?php echo e(number_format($order->subtotal + $order->shipping,2)); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <hr>
            
            <?php echo $orders->render(); ?>
            
        </div>
    </div>
    
    <?php echo $__env->make('admin.partials.modal-detalle-pedido', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('admin.partials.modal-detalle-envio', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>