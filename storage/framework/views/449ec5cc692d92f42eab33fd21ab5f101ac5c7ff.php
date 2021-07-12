
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
                            <h4>Muddati <?php echo e($data->end_date); ?> gacha</h4>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="pd-20 card-box mb-30">
                        <div class="clearfix row mb-2">
                            <div class="col-md-12">
                                <h4 class=" h4" >
                                    Hujjatning to'liq matni
                                </h4>
                                <?php echo $data->word_all; ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="pd-10 card-box mb-30">
                        <div class="clearfix row mb-2">
                            <div class="col-md-12">
                                <div class="html-editor card-box ">
                                    <form autocomplete="off" id="form-doc-mk-comment" action="<?php echo e(route('doc-com.comment', ['id'=>$data])); ?>" class="" method="post" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <button class="btn btn-primary w-100" form="form-doc-mk-comment" role="button" >
                                            Saqlash
                                        </button>
                                        <textarea class="textarea_editor form-control border-radius-0" id='mk_text_area_editor_show' value="testasdf asd asd " name="comment" placeholder="Izoh yozish uchun joy...">
                                            <?php if(isset($comment)): ?>
                                                <?php echo e($comment->comment); ?>

                                            <?php endif; ?>
                                        </textarea>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-box mb-30">
                        <h5 class="pd-20 h5 mb-0">Izohlar</h5>
                        <div class="latest-post">
                            <ul>
                                <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <h4> <?php echo $comment->comment; ?></h4>
                                    <span>
                                        <?php if(auth()->user()->id == $comment->user_id ): ?>
                                        Men
                                        <?php else: ?> 
                                        <?php echo e($comment->user->getfio()); ?>

                                        <?php endif; ?>
                                    </span> <span class="pull-right">Oxirgi o'zgartirish: <?php echo e(date('Y-m-d', strtotime($comment->created_at))); ?></span>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
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
  
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('mk.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\doc-tsul\resources\views/mk/pages/doccom/show.blade.php ENDPATH**/ ?>