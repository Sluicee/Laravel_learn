<?php $__env->startSection('title-block'); ?>Update <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<h1>Update page</h1>

<form enctype="multipart/form-data" action="<?php echo e(route('contact-update-submit', $data->id)); ?>" method="post">
    <?php echo csrf_field(); ?>
    <?php if($data->status === "sent"): ?>
    <select class="form-select" name="status_select">
            <option value="sent">
                new
            </option>
            <option value="solved">
                solved
            </option>
            <option value="reject">
                reject
            </option>
    </select>
    <?php endif; ?>

    <div class="form-group mt-3 afterImage" style="display: none">
        <label for="afterImage">Image</label>
        <input type="file" class="form-control-file" id="afterImage" name="afterImage">
    </div>

    <div class="form-group mt-3 rejectReason" style="display: none">
        <label for="rejectReason">Reject Reason</label>
        <textarea type="text" name="rejectReason" placeholder="Reject Reason" id="rejectReason" class="form-control"></textarea>
    </div>

    <script>
        $(function() {

        var $select = $('.form-select'),
            $input = $('.rejectReason');
            $input2 = $('.afterImage');
        $select.on('change', function() {
        if($select.val() === 'reject') {
            $input.show();
            $input.attr("required", true);
            $input2.hide();
            $input2.attr("required", false);
        } 
        else if ($select.val() === 'solved') {
            $input2.show();
            $input2.attr("required", true);
            $input.hide();
            $input.attr("required", false);
        }
        else {
            $input.hide();
            $input.attr("required", false);
            $input2.hide();
            $input2.attr("required", false);
        }
        });

        });
    </script>

    <button type="submit" class="btn btn-success mt-3">Update</button>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OSPanel1\domains\localhost\laravel-imanivan\resources\views/update_message.blade.php ENDPATH**/ ?>