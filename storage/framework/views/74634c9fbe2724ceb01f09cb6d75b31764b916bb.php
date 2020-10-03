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

<div class="card">

<a href="<?php echo e(asset('video/add')); ?>" class="btn btn-primary"><b>Add New Video</b></a>-->


	<div class="card-body">
		<h5 class="card-title">VIDEOS LIST</h5>
		<div class="table-responsive">
			<table id="zero_config" class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>Title</th>
					<th>Description</th>
				</tr>
			</thead>
			<tbody>
		<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>	
			<tr>
				<td><?php echo e($video->title); ?></td>
				<td><?php echo e($video->description); ?></td>
			</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
			</tbody>
			</table>
		</div>
	</div>
</div>	


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_new', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\c2bTest\resources\views/customers/videos.blade.php ENDPATH**/ ?>