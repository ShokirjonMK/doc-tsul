
<?php $__env->startSection('title'); ?>
<?php echo e($data->getfio()); ?> 
<?php $__env->stopSection(); ?>
<?php $__env->startSection('link'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>
                           Foydalanuvchi ko'rish <a class="ml-2 p-1" href="<?php echo e(route('user.edit',$data->id)); ?>" ><i class="dw dw-edit2"></i></a>
                            
                        </h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('mk')); ?>">Bosh</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(route('user.index')); ?>">Foydalanuvchilar</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                            <?php echo e($data->getfio()); ?> 
                            </li>
                        </ol>
                    </nav>
                </div>
               

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="pd-20 card-box mb-30">
                  
						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label><span>*</span>Familiya :
												<span class="error">
													<?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
													<?php echo e($message); ?>

													<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
												</span>
											</label>
											<input readonly type="text" class="form-control" name="last_name" value="<?php echo e($data->last_name); ?>">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label><span>*</span>Ism :
												<span class="error">
													<?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
													<?php echo e($message); ?>

													<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
												</span>
											</label>
											<input readonly type="text" class="form-control" name="first_name" value="<?php echo e($data->first_name); ?>">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Sharif :
												<span class="error">
													<?php $__errorArgs = ['middle_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
													<?php echo e($message); ?>

													<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
												</span>
											</label>
											<input readonly type="text" class="form-control" name="middle_name" value="<?php echo e($data->middle_name); ?>">
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label><span>*</span>Telefon :
										<span class="error">
											<?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
											<?php echo e($message); ?>

											<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
												</span>
									</label>
									<input readonly type="text" class="form-control phone" maxlength="10" placeholder="99 9999999" name="phone" value="<?php echo e($data->phone); ?>">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label><span>*</span>Bo'linma :
										<span class="error">
													<?php $__errorArgs = ['department'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
											<?php echo e($message); ?>

											<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
												</span>
									</label>
									<input readonly type="text" class="form-control" name="department" value="<?php echo e($data->department->name); ?>">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Lavozimi :
										<span class="error">
											<?php $__errorArgs = ['position'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
											<?php echo e($message); ?>

											<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
										</span>
									</label>
									<input readonly type="text" class="form-control" name="position" value="<?php echo e($data->position); ?>">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Username :
										<span class="error">
											<?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
											<?php echo e($message); ?>

											<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
										</span>
									</label>
									<input readonly type="text" class="form-control" name="username" value="<?php echo e($data->username); ?>">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label id="showpass">Parol : <i style="font-size: 18px" class="dw dw-eye ml-3"></i>
										
									</label>
									<input id="mkpassinput" readonly  type="text" class="form-control" name="username" value="<?php echo e($data->getPass()); ?>">
								</div>
							</div>

						</div>
                </div>
            </div>
            

        </div>
              
    
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>
$("#mkpassinput").hide();
$( "#showpass" ).click(function() {
	
  $("#mkpassinput").show();
});

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('mk.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\doc-tsul\resources\views/mk/pages/user/show.blade.php ENDPATH**/ ?>