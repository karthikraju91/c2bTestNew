<?php echo $__env->make('layouts.user_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldContent('content'); ?>
        <script>
            var public_path   = '<?php echo e(URL::to("/")); ?>';
        </script>
<?php echo $__env->make('layouts.user_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\c2bTest\resources\views/layouts/app_new_user.blade.php ENDPATH**/ ?>