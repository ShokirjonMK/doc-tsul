
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
                        <h4>
                            <?php echo e($data->name); ?>

                            <i onclick="return open('<?php echo e(asset($data->document)); ?>', 'ShokirjonMK', 'width=900,height=500,left=500,top=200')" class="icon-copy dw dw-download1 ml-5 pointer"></i>
                        </h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('mk')); ?>">Bosh</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <?php echo e($data->name); ?> 
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <div class="title">
                        <h4>Umumiy muddati <?php echo e($data->end_date); ?> gacha</h4>
                    </div>
                </div>
            </div>
        </div>
        <?php if($attached): ?>
            
      
        <div class="pd-20 card-box mb-30">
            <div class="clearfix row mb-2">
                <div class="col-md-12">
                    <h4 class="text-blue h4" >
                        Biriktirilgan qism. Muddati <?php echo e($attached->end_date); ?> gacha                              
                        <i onclick="return open('<?php echo e(asset($attached->document)); ?>', 'ShokirjonMK', 'width=900,height=500,left=500,top=200')" class="icon-copy dw dw-download1 ml-5 pointer"></i>
                    </h4>
                    <?php echo $attached->word; ?>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <div class="row">
            <div class="col-md-12">
                <div class="pd-20 card-box mb-30">
                    <div class="clearfix row mb-2">
                        <div class="col-md-12">
                            <h4 class="text-blue h4" >
                                Hujjatning to'liq matni:                        
                                <i onclick="return open('<?php echo e(asset($data->document)); ?>', 'ShokirjonMK', 'width=900,height=500,left=500,top=200')" class="icon-copy dw dw-download1 ml-5 pointer"></i>
                            </h4>
                            <?php echo $data->word_all; ?>
                            
                        </div>
                    </div>
                </div>
            </div>

        </div>
        
        <iframe id="mkiframePdfshow" style=" width: 100%; height: 600px;" src="<?php echo e(asset($data->document)); ?>" class="document-mk" ></iframe>
        
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>

    // window.open('https://javascript.info');


// button.onclick = () => {
//   window.open('https://javascript.info');
// };

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('mk.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\doc-tsul\resources\views/mk/pages/doc/myshow.blade.php ENDPATH**/ ?>