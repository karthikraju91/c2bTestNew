<?php $__env->startSection('content'); ?>

<center><label style='color:red'><?php echo e(Session::get("message")); ?></label></center>

<a href="<?php echo e(asset('customers/list')); ?>" class='btn btn-primary' style="float:right;">All Customers</a>

<p style="background:#3fbbc0;color:#fff;padding:7px;"> <b>EDIT CUSTOMER DETAILS</b> </p>
<?php if(count($errors) > 0): ?>
   <div class = "alert alert-danger">
      <ul>
         <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
   </div>
<?php endif; ?>

<div class="card">
	
	<div class="card-body">

<form method="post" action="<?php echo e(asset('customer/edit_data')); ?>" enctype="multipart/form-data" role="form">

<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
<input type="hidden" name="id" value="<?php echo e($customer->id); ?>">

          <div class="form-row">
            <div class="col-md-4 form-group">
			<label><b>Name</b></label>
              <input type="text" name="name" class="form-control" style="border-radius:0px" id="name" placeholder="Enter Student Name" value="<?php echo e($customer->name); ?>">
              <div class="validate"></div>
            </div>
            <div class="col-md-4 form-group">
			<label><b>Email</b></label>
              <input type="email" class="form-control" name="email" id="email" style="border-radius:0px" placeholder="Student Email" data-rule="email" data-msg="Please enter a valid email" value="<?php echo e($customer->email); ?>">
              <div class="validate"></div>
            </div>
            <div class="col-md-4 form-group">
			<label><b>Mobile Number</b></label>
              <input type="tel" class="form-control" name="phone" id="phone" style="border-radius:0px" placeholder="Student Phone Number" data-rule="maxlen:10" data-msg="Please enter 10 digits mobile number" maxlength="10" value="<?php echo e($customer->phone); ?>" onkeypress="return isNumber(event)">
              <div class="validate"></div>
            </div>
          </div>
          <div class="form-row">
            
			
			
			<div class="col-sm-4"><label><b>Upload Image</b></label><input type="file" name="upload_file" class="form-control" style="border-radius:0px"><img src="<?php echo e(asset('customers')); ?>/<?php echo e($customer->profile_pic); ?>" width="100" style="margin-top:10px;"></div>
			
			
			<div class="col-md-8 form-group">
			<label><b>Address</b></label>
              <textarea type="text" name="address" value="<?php echo e(old('address')); ?>" class="form-control" style="border-radius:0px" id="address" placeholder="address" autocomplete="off"><?php echo e($customer->address); ?></textarea>
              <div class="validate"></div>
            </div>
			
          </div>
        <div class="form-row">    
            <div class="col-md-4 form-group">
              <p><b>Gender</b> : &nbsp;&nbsp;</p>
				 <input type="radio" name="gender" value=1 <?php if($customer->gender==1): ?> checked <?php endif; ?> > male <br>
				 <input type="radio" name="gender" value=2 <?php if($customer->gender==2): ?> checked <?php endif; ?> > female
            </div>
			
			<div class="col-md-4 form-group">
              <p><b>Hobbies</b> : &nbsp;&nbsp;</p>
				 <input type="checkbox" name="hobbies[]" value="music" <?php if(in_array("music", explode(",",$customer->hobbies) )): ?> checked <?php endif; ?> > Music<br>
				 <input type="checkbox" name="hobbies[]" value="books" <?php if(in_array("book", explode(",",$customer->hobbies) )): ?> checked <?php endif; ?> > Reading Books
            </div>
			
		
			<div class="col-md-4 form-group">
			<label><b>State</b></label>
              <select name="state" class="form-control" style="border-radius:0px" id="state1" onchange="cityList1()">
				<option value=""> Select State</option>
				<option value="1" <?php if($customer->state==1): ?> selected  <?php endif; ?> > Thamilnadu</option>
				<option value="2" <?php if($customer->state==2): ?> selected  <?php endif; ?> > Telanagana</option>
			  </select>
              <div class="validate"></div>
            </div>
			
          </div>
<input type="hidden" class="cityID" value="<?php echo e($customer->city_id); ?>">
<input type="hidden" class="stateID" value="<?php echo e($customer->state); ?>">
          <div class="row">
			<div class="col-md-4 form-group">
			<label><b>City</b></label>
              <select name="city_id" class="form-control" style="border-radius:0px" id="city1">
			  <option value="">Select City</option>
			  <?php $__currentLoopData = $city; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $scity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			  <option value="<?php echo e($scity->id); ?>" selected><?php echo e($scity->name); ?></option>
			  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			  </select>
              <div class="validate"></div>
            </div>
		  </div>
          
		  
		  <input type="submit" style="margin-left:0px;" name="submit" value="Edit Student" class="btn btn-primary" style="border-radius:0px">
		  
		  
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

function cityList1(){
	alert();
	var sid = $("#state1").val();
	if(sid==''){
		sid = $(".stateID").val();
	}
	var data = {'sid':sid,"_token":"<?php echo e(csrf_token()); ?>"};
	var cid = $(".cityID").val();
	$("#city1").empty();
	$.post("<?php echo e(asset('customer/city_list')); ?>",data,function(response){
		var opt = '<option value=""> Select City</option>';
		$.each(response.data,function(k,v){
			if(cid == v.id){
				var s = 'selected';
			}else{
				var s = '';
			}
			opt +="<option value="+v.id+" "+s+" >"+v.name+"</option>";
		});
		$("#city1").html(opt);
	});
}

</script>		

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_new', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\c2bTest\resources\views/customers/edit.blade.php ENDPATH**/ ?>