<?php $__env->startSection('title-block'); ?><?php echo e($data->subject); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<h1><?php echo e($data->subject); ?></h1>

<div class="alert alert-info">
    <h3>Status: <?php echo e($data->status); ?></h3>
    <h3>Type: <?php echo e($data->app_type); ?></h3>
    <p><?php echo e($data->name); ?></p>
    <p><?php echo e($data->email); ?></p>
    <p><?php echo e($data->messages); ?></p>
    <p><small><?php echo e($data->created_at); ?></small></p>
    <a href="<?php echo e(route('contact-delete', $data->id)); ?>"><button class="btn btn-danger">Delete</button></a>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit-messages')): ?>
        
        <a href="<?php echo e(route('contact-update', $data->id)); ?>"><button class="btn btn-primary">Edit</button></a>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OSPanel1\domains\localhost\laravel-imanivan\resources\views/message.blade.php ENDPATH**/ ?>