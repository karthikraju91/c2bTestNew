<?php $__env->startSection('content'); ?>

<style>
.error{
	color:red;
}
</style>

<center><label><?php echo e(Session::get("message")); ?></label></center>

<a href="<?php echo e(asset('customers/list')); ?>" class='btn btn-primary' style="float:right;">All Customers</a>

<p style="background:#3fbbc0;color:#fff;padding:7px;"> <b>ADD CUSTOMER DETAILS</b> </p>
<!--
<?php if(count($errors) > 0): ?>
   <div class = "alert alert-danger">
      <ul>
         <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
   </div>
<?php endif; ?>
-->

<div class="card">
	
	<div class="card-body">

<form method="post" action="<?php echo e(asset('customer/save_data')); ?>" enctype="multipart/form-data" role="form">

<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

          <div class="form-row">
            <div class="col-md-4 form-group">
			<label><b>Name</b></label>
              <input type="text" name="name" class="form-control" style="border-radius:0px" id="name" placeholder="Enter Customer Name" value="<?php echo e(old('name')); ?>">
<?php if($errors->has('name')): ?>
    <div class="error"><?php echo e($errors->first('name')); ?></div>
<?php endif; ?>
            </div>
            <div class="col-md-4 form-group">
			<label><b>Email</b></label>
              <input type="email" class="form-control" name="email" id="email" style="border-radius:0px" placeholder="Customer Email" data-rule="email" data-msg="Please enter a valid email" value="<?php echo e(old('email')); ?>">
<?php if($errors->has('email')): ?>
    <div class="error"><?php echo e($errors->first('email')); ?></div>
<?php endif; ?>
            </div>
            <div class="col-md-4 form-group">
			<label><b>Mobile Number</b></label>
              <input type="tel" class="form-control" name="phone" id="phone" style="border-radius:0px" placeholder="Customer Phone Number" data-rule="maxlen:10" data-msg="Please enter 10 digits mobile number" maxlength="10" value="<?php echo e(old('phone')); ?>" onkeypress="return isNumber(event)">
<?php if($errors->has('phone')): ?>
    <div class="error"><?php echo e($errors->first('phone')); ?></div>
<?php endif; ?>
            </div>
          </div>
          <div class="form-row">
            			
			<div class="col-sm-4"><label><b>Upload Image</b></label><input type="file" name="upload_file" class="form-control" style="border-radius:0px"></div>
			
			<div class="col-md-8 form-group">
			<label><b>Address</b></label>
              <textarea type="text" name="address" value="<?php echo e(old('address')); ?>" class="form-control" style="border-radius:0px" id="address" placeholder="address" autocomplete="off"><?php echo e(old('address')); ?></textarea>
<?php if($errors->has('address')): ?>
    <div class="error"><?php echo e($errors->first('address')); ?></div>
<?php endif; ?>
            </div>
			
          </div>
        <div class="form-row">    
            <div class="col-md-4 form-group">
              <p><b>Gender</b> : &nbsp;&nbsp; </p>
				 <input type="radio" name="gender" value=1 <?php if(old('gender')==1): ?> checked <?php endif; ?>> male<br>
				 <input type="radio" name="gender" value=2 <?php if(old('gender')==2): ?> checked <?php endif; ?>> female<br>
<?php if($errors->has('gender')): ?>
    <div class="error"><?php echo e($errors->first('gender')); ?></div>
<?php endif; ?>
            </div>
			
			<div class="col-md-4 form-group">
              <p><b>Hobbies</b> : &nbsp;&nbsp;</p>
				 <input type="checkbox" name="hobbies[]" value="music" <?php if(old('hobbies') != null): ?> <?php if(in_array("music",old('hobbies') )): ?> checked <?php endif; ?> <?php endif; ?>> Music<br>
				 <input type="checkbox" name="hobbies[]" value="books" <?php if(old('hobbies') != null): ?> <?php if(in_array("books",old('hobbies') )): ?> checked <?php endif; ?> <?php endif; ?>> Reading Books<br>
<?php if($errors->has('hobbies')): ?>
    <div class="error"><?php echo e($errors->first('hobbies')); ?></div>
<?php endif; ?>				 
            </div>
			
			<div class="col-md-4 form-group">
			<label><b>State</b></label>
              <select name="state" class="form-control" style="border-radius:0px" id="state" onchange="cityList()">
				<option value=""> Select State</option>
				<option <?php if(old('state')==1): ?> selected <?php endif; ?>  value="1"> Thamilnadu</option>
				<option value="2" <?php if(old('state')==2): ?> selected <?php endif; ?> > Telanagana</option>
			  </select>
<?php if($errors->has('state')): ?>
    <div class="error"><?php echo e($errors->first('state')); ?></div>
<?php endif; ?>
            </div>

          </div>
		  
		  <div class="row">
			<div class="col-md-4 form-group">
			<label><b>City</b></label>
              <select name="city" class="form-control" style="border-radius:0px" id="city">
			  <option value="">Select City</option>
			  </select>
<?php if($errors->has('city')): ?>
    <div class="error"><?php echo e($errors->first('city')); ?></div>
<?php endif; ?>
            </div>
		  </div>

          
          
		  
		  <input type="submit" style="margin-left:0px;" name="submit" value="Add Student" class="btn btn-primary" style="border-radius:0px">
		  
		  
        </form>

</div>
</div>

<script>
function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

</script>

		
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_new', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\c2bTest\resources\views/customers/add.blade.php ENDPATH**/ ?>