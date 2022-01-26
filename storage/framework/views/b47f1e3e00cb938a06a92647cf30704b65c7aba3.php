<?php $__env->startSection('title-block'); ?>Home <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<h1>Home page</h1>

<div class="solved_counter">
    <?php
    $solved = 0;
    foreach ($data as $value) {
        if ($value->status == "solved") {
            $solved++;
        };
    };
?>

<h3 class="solved">Solved: <?php echo e($solved); ?> </h3>
</div>

<?php
    $count = 0;
?>

<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $elmnt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<?php
    if ($count == 4) {
        break;
    }
    $count++;
?>

<div class="alert alert-info">
    <h3><?php echo e($elmnt->subject); ?></h3>
    <h3>Status: <?php echo e($elmnt->status); ?></h3>
    <h3>Type: <?php echo e($elmnt->app_type); ?></h3>
    <p><small><?php echo e($elmnt->created_at); ?></small></p>
    <?php if( $elmnt->messageImageAfter != null ): ?>
        <div class="home_images">
            <img class="home_image home_image_after" src="<?php echo e(asset("storage/image/$elmnt->messageImageAfter")); ?>" alt="">
            <img class="home_image home_image_before" src="<?php echo e(asset("storage/image/$elmnt->messageImageBefore")); ?>" alt="">
        </div>

    <?php endif; ?>
</div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<script>
    var audio = new Audio('storage/image/PTQJUES-message-notification.mp3');
    $(document).ready(function(){
        setInterval(function(){
            $(".solved_counter").load(location.href + " .solved");
            console.log("refreshed");
        }, 5000);
    });
</script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('aside'); ?>##parent-placeholder-b77cad1467608c98b4675073084c13ea3aba2ffb##<p>Home side text</p>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OSPanel1\domains\localhost\laravel-imanivan\resources\views/home.blade.php ENDPATH**/ ?>