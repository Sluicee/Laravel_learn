<?php $__env->startSection('title-block'); ?>Contact <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<h1>Contact page</h1>

<form action="<?php echo e(route('contact-form')); ?>" method="post">
    <?php echo csrf_field(); ?>

    <input name="user_id"id="user_id" style="display: none" value="<?php echo e(Auth::user()->id); ?>">

    <div class="form-group mt-3" style="display:none">
        <label for="name">Name</label>
        <input type="text" name="name" placeholder="Name" id="name" class="form-control" value="<?php echo e(Auth::user()->name); ?>">
    </div>

    <div class="form-group mt-3" style="display:none">
        <label for="email">Email</label>
        <input type="text" name="email" placeholder="Email" id="email" class="form-control" value="<?php echo e(Auth::user()->email); ?>">
    </div>

    <div class="form-group mt-3">
        <label for="subject">Subject</label>
        <input type="text" name="subject" placeholder="Subject" id="subject" class="form-control">
    </div>

    <div class="form-group mt-3">
        <label for="message">Message</label>
        <textarea type="text" name="message" placeholder="Message" id="message" class="form-control"></textarea>
    </div>
    <select class="form-select mt-3" name="appType_select">
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($type->name); ?>">
            <?php echo e($type->name); ?>

        </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>

    <button type="submit" class="btn btn-success mt-3">Submit</button>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OSPanel1\domains\localhost\laravel-imanivan\resources\views/contact.blade.php ENDPATH**/ ?>