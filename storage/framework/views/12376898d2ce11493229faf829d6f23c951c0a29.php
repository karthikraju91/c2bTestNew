<?php $__env->startSection('content'); ?>

<style>
.table td, .table th {
     border-top: 0px; 
}
</style>

<div class="card">
	
	<div class="card-body">

<center><label><?php echo e(Session::get("message")); ?></label></center>

<a href="<?php echo e(asset('videos/list')); ?>" class='btn btn-primary' style="float:right;">BACK</a>

<p style="background:#3fbbc0;color:#fff;padding:7px;"> <b>VIDEO DETAILS</b> </p>


<table class="table">
<tr><th><b>Title</b></th></tr>
<tr><td><?php echo e($video->title); ?></td></tr>
<tr><th><b>Description</b></th></tr>
<tr><td><?php echo e($video->description); ?></td></tr>
</table>

<p>Image</p>
<image width="150" src="<?php echo e(asset('videos')); ?>/<?php echo e($video->image); ?>">
<a href="<?php echo e(asset('videos')); ?>/<?php echo e($video->image); ?>">click Here to full view</a>
	<br>
<p>VIDEO PREVIEW</p>
<iframe width="220" height="115" src="<?php echo e(asset('videos')); ?>/<?php echo e($video->video_links); ?>" allowfullscreen></iframe>

	
</div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_new', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\c2bTest\resources\views/videos/view.blade.php ENDPATH**/ ?>