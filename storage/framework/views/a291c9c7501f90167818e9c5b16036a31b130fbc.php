<?php $__env->startSection('content'); ?>

<style>
.error{
	color:red;
}
</style>

<center><label><?php echo e(Session::get("message")); ?></label></center>

<a href="<?php echo e(asset('videos/list')); ?>" class='btn btn-primary' style="float:right;">All Videos</a>

<p style="background:#3fbbc0;color:#fff;padding:7px;"> <b>ADD VIDEO DETAILS</b> </p>
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

<form method="post" action="<?php echo e(asset('videos/save_data')); ?>" enctype="multipart/form-data" role="form">

<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

          <div class="form-row">
            <div class="col-md-4 form-group">
			<label><b>Title</b></label>
              <input type="text" name="title" class="form-control" style="border-radius:0px" id="name" placeholder="Enter Video Title" value="<?php echo e(old('title')); ?>">
<?php if($errors->has('title')): ?>
    <div class="error"><?php echo e($errors->first('title')); ?></div>
<?php endif; ?>
            </div>
        
          </div>
		  
		  <div class="row">
		  <div class="col-md-8 form-group">
			<label><b>Description</b></label>
              <textarea type="text" class="form-control" name="description" id="description" style="border-radius:0px" placeholder="Video description" data-rule="description"><?php echo e(old('description')); ?></textarea>
<?php if($errors->has('description')): ?>
    <div class="error"><?php echo e($errors->first('description')); ?></div>
<?php endif; ?>
            </div>
		  </div>
		  
		  
		  <div class="row">
			
			<div class="col-sm-4">
			<label><b>Upload Image</b></label>
				<input type="file" name="image" class="form-control">
				<?php if($errors->has('image')): ?>
    <div class="error"><?php echo e($errors->first('image')); ?></div>
<?php endif; ?>
			</div>
		  
		  </div>
		  
		  <br>
		  
          <div class="form-row">
            			
			<div class="col-sm-4"><label><b>Upload Video</b></label><input type="file" name="upload_file" class="form-control" style="border-radius:0px">
			<?php if($errors->has('upload_file')): ?>
    <div class="error"><?php echo e($errors->first('upload_file')); ?></div>
<?php endif; ?>
			</div>
			
          </div>
        
		<br>
		  <input type="submit" style="margin-left:0px;" name="submit" value="Add Video" class="btn btn-primary" style="border-radius:0px">
		  
		  
        </form>

</div>
</div>



		
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_new', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\c2bTest\resources\views/videos/add.blade.php ENDPATH**/ ?>