<?php $__env->startSection('content'); ?>

<style>
.table td, .table th {
     border-top: 0px; 
}
</style>

<div class="card">
	
	<div class="card-body">


<div class="col-sm-12">

<h4>VIDEO DETAILS</h4>

<div class="col-sm-12">
<iframe width="500" style="float:left;" height="300" src="<?php echo e(asset('videos')); ?>/<?php echo e($data->video_links); ?>" allowfullscreen></iframe>&nbsp; &nbsp;
<img width="450" src="<?php echo e(asset('videos')); ?>/<?php echo e($data->image); ?>">
</div>
<div class="col-sm-12">
<p><b>Title</b> : <?php echo e($data->title); ?></p>
<p><b>Description</b> : <?php echo e($data->description); ?></p>
<p><b>Date</b> : <?php echo e(date("d-m-Y",strtotime($data->created_at))); ?>

</div>


</div>

	
</div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_new_user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\c2bTest\resources\views/users/view.blade.php ENDPATH**/ ?>