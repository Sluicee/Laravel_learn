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

    <?php if( $data->messageImageBefore != null ): ?>
        <h3>Image before:</h3>
        <img style="width: 100%;" src="<?php echo e(asset("storage/image/$data->messageImageBefore")); ?>" alt="">
    <?php endif; ?>

    <?php if( $data->messageImageAfter != null ): ?>
        <h3>Image after:</h3>
        <img style="width: 100%;" src="<?php echo e(asset("storage/image/$data->messageImageAfter")); ?>" alt="">
    <?php endif; ?>

    <?php if( $data->status == 'sent' or Gate::check('edit-messages')): ?>
        <form method="GET" action="<?php echo e(route('contact-delete', $data->id)); ?>">
            <?php echo csrf_field(); ?>
            <input name="_method" type="hidden" value="DELETE">
            <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>Delete</button>
        </form>
    <?php endif; ?>
    
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit-messages')): ?>
        <a href="<?php echo e(route('contact-update', $data->id)); ?>"><button class="btn btn-primary mt-3">Edit</button></a>
    <?php endif; ?>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
 
     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });
  
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OSPanel1\domains\localhost\laravel-imanivan\resources\views/message.blade.php ENDPATH**/ ?>