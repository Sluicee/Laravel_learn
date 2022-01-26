<?php $__env->startSection('title-block'); ?>Messages <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<h1>Types</h1>
<form action="<?php echo e(route('applicationType-add')); ?>" method="post">
    <?php echo csrf_field(); ?>

    <div class="form-group mt-3">
        <label for="typeName">Name</label>
        <input type="text" name="typeName" placeholder="Type Name" id="typeName" class="form-control">
    </div>

    <button type="submit" class="btn btn-success mt-3">Add</button>
</form>

<form action="<?php echo e(route('applicationType-delete')); ?>" method="post">
    <?php echo csrf_field(); ?>

    <select class="form-select mt-3" name="appType_select">
        <?php $__currentLoopData = $app_data_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($type->id); ?>">
            <?php echo e($type->name); ?>

        </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>

    <button type="submit" class="btn btn-danger mt-3">Delete</button>
</form>

<h1>Messages</h1>
<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $elmnt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="alert alert-info">
    <h3><?php echo e($elmnt->subject); ?></h3>
    <h3>Status: <?php echo e($elmnt->status); ?></h3>
    <h3>Type: <?php echo e($elmnt->app_type); ?></h3>
    <p><?php echo e($elmnt->email); ?></p>
    <p><small><?php echo e($elmnt->created_at); ?></small></p>
    <a href="<?php echo e(route('contact-message', $elmnt->id)); ?>"><button class="btn btn-success">More...</button></a>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OSPanel1\domains\localhost\laravel-imanivan\resources\views/messages.blade.php ENDPATH**/ ?>