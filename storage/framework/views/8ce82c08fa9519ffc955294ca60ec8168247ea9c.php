<?php $__env->startSection('content'); ?>

<div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">CUSTOMERS</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Videos</li>
                                </ol>
                            </nav>
                        </div>
                    </div>

<center><span style="color:red;"><b><?php echo e(Session::get("message")); ?></b></span></center>
<div class="card">

<a href="<?php echo e(asset('videos/add')); ?>" class="btn btn-primary"><b>Add New Video</b></a>


	<div class="card-body">
		<h5 class="card-title">VIDEOS LIST</h5>
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
				<td><a href="<?php echo e(asset('videos/view')); ?>/<?php echo e($video->id); ?>">View</a> &nbsp; &nbsp; <a href="<?php echo e(asset('videos/edit')); ?>/<?php echo e($video->id); ?>">Edit</a> &nbsp;&nbsp; <a onclick="return confirm('Are you sure?')" href="<?php echo e(asset('videos/delete')); ?>/<?php echo e($video->id); ?>">Delete</a></td>
			</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
			</tbody>
			</table>
		</div>
	</div>
</div>	


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_new', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\c2bTest\resources\views/videos/list.blade.php ENDPATH**/ ?>