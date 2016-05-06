<?php if(Auth::check() &&  Auth::user()->type=="admin"): ?>
<nav class="navbar navbar-inverse  navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">      
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <!--<a class="navbar-brand main-title" href="<?php echo e(route('home')); ?>">Jammers Mexico</a>-->
      <a class="navbar-brand" href="<?php echo e(route('home')); ?>">
        <img alt="Brand" src="/storage/logo.JPG"></a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
     <p class="navbar-text" >Tienda Jammers</p>      
      <ul class="nav navbar-nav navbar-right">
      <li>
        <?php echo Form::open(array('route'=>'home', 'method'=>'GET', 'class' => 'navbar-form navbar-left', 'role' => 'search' )); ?>

          <div class="form-group">
            
            <?php echo Form::text('name',    null, array('class'=>'form-control', 'placeholder' => 'Buscar producto...', 'autofocus' => 'autofocus')); ?>

          </div>
          <button type="submit" class="btn btn-primary">Buscar</button>
        <?php echo Form::close(); ?>

      </li>
        <li><?php echo link_to('admin/home', "Administrar"); ?></li>
        <li><a href="<?php echo e(route('cart-show')); ?>"><i class="fa fa-shopping-cart"></i></a></li>       
        <?php echo $__env->make('store.partials.menu-user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      </ul>
    </div>
  </div>
</nav>
<?php else: ?>
<nav class="navbar navbar-inverse  navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">      
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <!--<a class="navbar-brand main-title" href="<?php echo e(route('home')); ?>">Jammers Mexico</a>-->
      <a class="navbar-brand" href="<?php echo e(route('home')); ?>">
        <img alt="Brand" src="/storage/logo.JPG"></a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
     <p class="navbar-text" >Tienda Jammers</p>      
      <ul class="nav navbar-nav navbar-right">
        <li>
            <?php echo Form::open(array('route'=>'home', 'method'=>'GET', 'class' => 'navbar-form navbar-left', 'role' => 'search' )); ?>

          <div class="form-group">
            
            <?php echo Form::text('name',    null, array('class'=>'form-control', 'placeholder' => 'Buscar producto...', 'autofocus' => 'autofocus')); ?>

          </div>
          <button type="submit" class="btn btn-primary">Buscar</button>
        <?php echo Form::close(); ?>

        </li>
        <li><a href="<?php echo e(route('cart-show')); ?>"><i class="fa fa-shopping-cart"></i></a></li>       
        <?php echo $__env->make('store.partials.menu-user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      </ul>
    </div>
  </div>
</nav>


<?php endif; ?>
