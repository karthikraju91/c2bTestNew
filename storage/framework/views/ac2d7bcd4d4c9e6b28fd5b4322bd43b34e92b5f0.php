<?php $__env->startSection('content'); ?>

<div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">CUSTOMERS</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Users</li>
                                </ol>
                            </nav>
                        </div>
                    </div>

<div class="card">

<!--<a href="<?php echo e(asset('customer/add')); ?>" class="btn btn-primary"><b>Add Customers</b></a>-->


	<div class="card-body">
		<h5 class="card-title">USERS LIST</h5>
		<div class="table-responsive">
			<table id="zero_config" class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>Name</th>
					<th>Email</th>
				</tr>
			</thead>
			<tbody>
		<?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>	
			<tr>
				<td><?php echo e($customer->name); ?></td>
				<td><?php echo e($customer->email); ?></td>
			</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
			</tbody>
			</table>
		</div>
	</div>
</div>	


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_new', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\c2bTest\resources\views/customers/list.blade.php ENDPATH**/ ?>