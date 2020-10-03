<?php $__env->startSection('content'); ?>

<style>
.table td, .table th {
     border-top: 0px; 
}
</style>

<div class="card">
	
	<div class="card-body">

<center><label><?php echo e(Session::get("message")); ?></label></center>

<a href="<?php echo e(asset('customers/list')); ?>" class='btn btn-primary' style="float:right;">BACK</a>

<p style="background:#3fbbc0;color:#fff;padding:7px;"> <b>CUSTOMER DETAILS</b> </p>


<table class="table">
<tr><th><b>Customer Name</b></th><th><b>Email</b></th><th></th></tr>
<tr><td><?php echo e($data->name); ?></td><td><?php echo e($data->email); ?></td><td></td>
<tr><th><b>Mobile No</b></th><th><b>Gender</b></th><th><b>Address</b></th></tr>
<tr><td><?php echo e($data->phone); ?></td><td><?php if($data->gender==1): ?> Male <?php else: ?> Female <?php endif; ?></td><td><?php echo e($data->address); ?></td></tr>
<tr><th><b>Hobbies</b></th><th><b>state</b></th><th><b>City</b></th></tr>
<tr><td><?php echo e($data->hobbies); ?></td><td><?php if($data->state==1): ?> Thamilnadu <?php else: ?> Telangana <?php endif; ?></td><td><?php echo e($city->name); ?></td></tr>
<tr><th>Image</th></tr>
<tr><td><img src="<?php echo e(asset('customers')); ?>/<?php echo e($data->profile_pic); ?>" width="100" style="margin-top:10px;"></td></tr>
</tr>
</table>


</div>
</div>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_new', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\c2bTest\resources\views/customers/view.blade.php ENDPATH**/ ?>