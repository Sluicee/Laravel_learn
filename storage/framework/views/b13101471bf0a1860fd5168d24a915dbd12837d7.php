<?php $__env->startSection('title-block'); ?>Home <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<h1>Cabinet</h1>
<p>Hello <?php echo e(Auth::user()->name); ?>. it's your messages page</p>

<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $elmnt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="alert alert-info mt-3">
    <h3>Status: <?php echo e($elmnt->status); ?></h3>
    <h3>Type: <?php echo e($elmnt->app_type); ?></h3>
    <h3><?php echo e($elmnt->subject); ?></h3>
    <p><?php echo e($elmnt->email); ?></p>
    <p><small><?php echo e($elmnt->created_at); ?></small></p>
    <a href="<?php echo e(route('contact-message', $elmnt->id)); ?>"><button class="btn btn-success">More...</button></a>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('aside'); ?>##parent-placeholder-b77cad1467608c98b4675073084c13ea3aba2ffb##<p>Home side text</p>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OSPanel1\domains\localhost\laravel-imanivan\resources\views/private.blade.php ENDPATH**/ ?>