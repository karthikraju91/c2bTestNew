<?php $__env->startSection('content'); ?>

<style>
.table td, .table th {
     border-top: 0px; 
}
</style>

<div class="card">
	
	<div class="card-body">

<div class="table-responsive">
			<table id="zero_config" class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>S.no</th>
					<th>Title</th>
					<th>Description</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
		<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>	
			<tr>
				<td><?php echo e($key + 1); ?></td>
				<td><?php echo e($video->title); ?></td>
				<td><?php echo e($video->description); ?></td>
				<td><a href="<?php echo e(asset('users/view')); ?>/<?php echo e($video->id); ?>">View</a></td>
			</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
			</tbody>
			</table>
		</div>

	
</div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_new_user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\c2bTest\resources\views/users/user_view.blade.php ENDPATH**/ ?>