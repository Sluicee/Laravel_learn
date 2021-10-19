<?php $__env->startSection('title-block'); ?>Update <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<h1>Update page</h1>

<form action="<?php echo e(route('contact-update-submit', $data->id)); ?>" method="post">
    <?php echo csrf_field(); ?>

    <select class="form-select" name="status_select">
        <option value="sent">
            sent
        </option>

        <option value="solved">
            solved
        </option>

        <option value="reject">
            reject
        </option>
    </select>

    <button type="submit" class="btn btn-success mt-3">Update</button>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OSPanel1\domains\localhost\laravel-imanivan\resources\views/update_message.blade.php ENDPATH**/ ?>