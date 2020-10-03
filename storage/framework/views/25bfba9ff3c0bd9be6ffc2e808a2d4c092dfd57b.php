<?php $__env->startSection('content'); ?>

<center><label style='color:red'><?php echo e(Session::get("message")); ?></label></center>

<a href="<?php echo e(asset('videos/list')); ?>" class='btn btn-primary' style="float:right;">All Videos</a>

<p style="background:#3fbbc0;color:#fff;padding:7px;"> <b>EDIT VIDEO DETAILS</b> </p>
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

<form method="post" action="<?php echo e(asset('videos/edit_data')); ?>" enctype="multipart/form-data" role="form">

<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
<input type="hidden" name="id" value="<?php echo e($videos->id); ?>">

          <div class="form-row">
            <div class="col-md-4 form-group">
			<label><b>Title</b></label>
              <input type="text" name="title" class="form-control" style="border-radius:0px" id="title" placeholder="Enter Video Title" value="<?php echo e($videos->title); ?>">
              <div class="validate"></div>
            </div>
            
            
          </div>
		  
		  <div class="row">
		  
		  <div class="col-md-8 form-group">
			<label><b>Description</b></label>
              <textarea class="form-control" name="description" id="description" style="border-radius:0px" placeholder="Video Description"  value="<?php echo e($videos->description); ?>"><?php echo e($videos->description); ?></textarea>
              <div class="validate"></div>
            </div>
		  
		  </div>
		  
		  
		  <div class="row">
			
			<div class="col-sm-4">
			<label><b>Upload Image</b></label>
				<input type="file" name="image" class="form-control">
				
			</div>
		  <img src="<?php echo e(asset('videos')); ?>/<?php echo e($videos->image); ?>" width="100" style="margin-top:10px;"></div>
		  </div>
		  
		  <br>
		  
          <div class="form-row">

			<div class="col-sm-4"><label><b>Upload Image</b></label><input type="file" name="upload_file" class="form-control" style="border-radius:0px">
			<iframe src="<?php echo e(asset('videos')); ?>/<?php echo e($videos->video_links); ?>" width="100" style="margin-top:10px;"></iframe></div>
			
			
          </div>
        <br>
          
		  
		  <input type="submit" style="margin-left:0px;" name="submit" value="Edit Student" class="btn btn-primary" style="border-radius:0px">
		  
		  
        </form>
		
</div>		
</div>		
		

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_new', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\c2bTest\resources\views/videos/edit.blade.php ENDPATH**/ ?>