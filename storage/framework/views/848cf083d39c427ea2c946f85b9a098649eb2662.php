<?php $__env->startSection('content'); ?>

    <div class="container text-center">
        <div class="page-header">
            <h1><i class="fa fa-rocket"></i> JAMMERS MEXICO - DASHBOARD</h1>
        </div>
        
        <h2>Bienvenido(a) <?php echo e(Auth::user()->user); ?> al Panel de administración.</h2><hr>
        
        <div class="row">
            
            <div class="col-md-6">
                <div class="panel">
                    <i class="fa fa-list-alt icon-home"></i>
                    <a href="<?php echo e(route('admin.category.index')); ?>" class="btn btn-warning btn-block btn-home-admin">CATEGORÍAS</a>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="panel">
                    <i class="fa fa-shopping-cart  icon-home"></i>
                    <a href="<?php echo e(route('admin.product.index')); ?>" class="btn btn-warning btn-block btn-home-admin">PRODUCTOS</a>
                </div>
            </div>
                    
        </div>
        
        <div class="row">
            
            <div class="col-md-6">
                <div class="panel">
                    <i class="fa fa-cc-paypal  icon-home"></i>
                    <a href="<?php echo e(route('admin.order.index')); ?>" class="btn btn-warning btn-block btn-home-admin">PEDIDOS</a>
                </div>
            </div> 
            
            <div class="col-md-6">
                <div class="panel">
                    <i class="fa fa-users  icon-home"></i>
                    <a href="<?php echo e(route('admin.user.index')); ?>" class="btn btn-warning btn-block btn-home-admin">USUARIOS</a>
                </div>
            </div>
                    
        </div>

        <div class="row">
            
            <div class="col-md-6">
                <div class="panel">
                    <i class="glyphicon glyphicon-cog icon-home"></i>
                    <a href="<?php echo e(route('admin.order.index')); ?>" class="btn btn-warning btn-block btn-home-admin">MI PÁGINA</a>
                </div>
            </div> 
            
            <div class="col-md-6">
                <div class="panel">
                    <i class="glyphicon glyphicon-duplicate icon-home"></i>
                    <a href="#" class="btn btn-warning btn-block btn-home-admin">REPORTES</a>
                </div>
            </div>
                    
        </div>
        
    </div>
    <hr>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>