
<?php $__env->startSection('title'); ?>
<?php echo e($data->name); ?>

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
                        <h4><?php echo e($data->name); ?></h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('mk')); ?>">Bosh</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo e($data->name); ?></li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <div class="title">
                        <h4><?php echo e($data->end_date); ?></h4>
                    </div>
                </div>

            </div>
        </div>
        <div class="pd-20 card-box mb-30">
            <div class="clearfix row mb-2">
                <div class="col-md-6">
                    <div class="pull-left">
                        <?php $__currentLoopData = $attached_without; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $without): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                        <h4 class="text-blue h4"><?php echo e($without->userget); ?></h4>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                
                
            </div>


        </div>
        <iframe id="mkiframePdfshow" style=" width: 100%; height: 600px;" src="<?php echo e(asset($data->document)); ?>" class="document-mk" ></iframe>
        
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('mk.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\doc-tsul\resources\views/mk/pages/doc/show.blade.php ENDPATH**/ ?>