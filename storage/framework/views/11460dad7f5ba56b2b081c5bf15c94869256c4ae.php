
<?php $__env->startSection('link'); ?>
    
    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Asosiy</h4>
                        </div>
                         <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo e(route('mk')); ?>">Bosh</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Muhokama uchun yangi hujjat kiritish</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <button class="btn btn-primary" form="form-doc-mk" role="button" >
                            Saqlash
                        </button>
                    </div>
                   
                </div>
            </div>

            <form autocomplete="off" id="form-doc-mk" action="<?php echo e(route('doc-com.store')); ?>" class="" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo $__env->make('mk.pages.doccom.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


            </form>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

    
    

<?php $__env->stopSection(); ?>
<?php echo $__env->make('mk.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\doc-tsul\resources\views/mk/pages/doccom/new.blade.php ENDPATH**/ ?>