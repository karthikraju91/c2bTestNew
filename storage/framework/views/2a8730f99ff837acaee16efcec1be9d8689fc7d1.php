<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.side_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div id="main-wrapper" data-sidebartype="full">
<div class="page-wrapper">
<div class="container-fluid">
<?php echo $__env->yieldContent('content'); ?>
        <script>
            var public_path   = '<?php echo e(URL::to("/")); ?>';
        </script>
</div>		
</div>
</div>		
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH D:\xampp\htdocs\c2bTest\resources\views/layouts/app_new.blade.php ENDPATH**/ ?>