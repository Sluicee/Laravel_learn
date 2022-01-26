<?php $__env->startSection('header'); ?>

<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
    <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
    </a>

    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="<?php echo e(route('home')); ?>" class="nav-link px-2 link-dark">Home</a></li>
        <li><a href="<?php echo e(route('contact')); ?>" class="nav-link px-2 link-dark">Contactus</a></li>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit-messages')): ?>
        <li><a href="<?php echo e(route('contact-messages')); ?>" class="nav-link px-2 link-dark">Admin Panel</a></li>
        <?php endif; ?>
    </ul>

    <?php if(Auth::check()): ?>
    <div class="col-md-3 text-end">
        <span><?php echo e(Auth::user()->name); ?></span>
        <a href="<?php echo e(route('user.private')); ?>"  class="btn btn-primary">User page</a>
        <a href="<?php echo e(route('user.logout')); ?>" class="btn btn-outline-primary me-2">Logout</a>
    </div>
    <?php else: ?>
    <div class="col-md-3 text-end">
        <a href="<?php echo e(route('user.login')); ?>" class="btn btn-outline-primary me-2">Login</a>
        <a href="<?php echo e(route('user.registration')); ?>"  class="btn btn-primary">Registration</a>
    </div>
    <?php endif; ?>
    
</header><?php /**PATH D:\OSPanel1\domains\localhost\laravel-imanivan\resources\views/inc/header.blade.php ENDPATH**/ ?>