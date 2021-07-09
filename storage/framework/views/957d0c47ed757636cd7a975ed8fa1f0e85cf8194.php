


<script src="https://code.highcharts.com/maps/highmaps.js"></script>
<?php $__env->startSection('content'); ?>
    <div class="main-container">
        <div class="xs-pd-20-10 pd-ltr-20">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Asosiy</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo e(route('mk')); ?>">Bosh</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Hujjatlar</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <a class="btn btn-primary " href="<?php echo e(route('doc-com.create')); ?>" role="button" >
                            Muhokama uchun hujjat kiritish
                        </a>
                    </div>
                </div>
            </div>

            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">Hujjatlar</h4>
                </div>
                <div class="pb-20">
                    <table class=" data-table-export table stripe hover  p-2">
                        <thead>
                        <tr>
                            <th >#</th>
                            <th>Nomi</th>
                            <th class="table-plus datatable-nosort" style="width: 10px !important;"></th>
                            <?php if(auth()->user()->role == 777): ?>
                            <th>Izoh</th>
                            <?php endif; ?>
                            <th>Raqami</th>
                            <th style="width: 30px !important;">Muddati</th>
                            <th>Ta'luqliligi</th>
                            <th>Nazoratchi</th>
                            <th>Turi</th>
                            <th>Davomiyligi</th>
                            <th>Holati</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=1; ?>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <?php if($item->status == 0): ?>
                                <?php $item->statusclass = 'table-secondary'?>
                            <?php endif; ?>
                            <?php if($item->end_date == date("Y-m-d")): ?>
                                <?php $item->statusclass = 'table-danger'?>
                            <?php endif; ?>
                            <?php if($item->end_date == date("Y-m-d", strtotime("+1 day"))): ?>
                                <?php $item->statusclass = 'table-warning'?>
                            <?php endif; ?>
                            <?php if($item->end_date > date("Y-m-d", strtotime("+1 day"))): ?>
                                <?php $item->statusclass = 'table-info' ?>
                            <?php endif; ?>
                            <tr class="<?php echo e($item->statusclass); ?>">
                                <td><?php echo e($i++); ?></td>
                                <td><a href="<?php echo e(route('doc-com.show', $item->id)); ?>">
                                    <?php echo e($item->name); ?>

                                </a></td>
                                <td style="width: 10px !important;"><i onclick="return open('<?php echo e(asset($item->document)); ?>', 'ShokirjonMK', 'width=900,height=500,left=500,top=200')" class="icon-copy dw dw-download1 pointer"></i></td>
                                 <?php if(auth()->user()->role == 777): ?>
                                     <td><a href="<?php echo e(route('mk.allcomment', $item->id)); ?>"><?php echo e($item->commentcount()); ?></a></td>
                                <?php endif; ?>
                                <td><?php echo e($item->number); ?></td>
                                <td style="width: 30px !important;"><?php echo e($item->end_date); ?></td>
                                <td><?php if(isset($item->releted->name)): ?>
                                        <?php echo e($item->releted->name); ?>

                                    <?php endif; ?>
                                </td>
                                <td><?php if(isset($item->supervisor->name)): ?>
                                        <?php echo e($item->supervisor->name); ?>

                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php echo e($item->getType()); ?>

                                </td>
                                <td>
                                    <?php echo e($item->getDuration()); ?>

                                </td>
                                <td>
                                    <?php if($item->status == 1): ?>
                                        <?php echo e('Amalda'); ?>

                                    <?php elseif($item->status == 0): ?>
                                        <?php echo e("O'z kuchini yo'qotgan"); ?>

                                    <?php endif; ?>
                                </td>
                            
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>


            <div class="footer-wrap pd-20 mb-20 card-box">
                 <a href="https://t.me/ShokirjonMK" style="text-decoration: none" target="_blank">TOSHKENT DAVLAT YURIDIK UNIVERSITETI
                    "ELEKTRON UNIVERSITET" MARKAZI</a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection("js"); ?>

    <script src="<?php echo e(asset('assets/admin/src/plugins/datatables/js/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/admin/src/plugins/datatables/js/buttons.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/admin/src/plugins/datatables/js/buttons.print.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/admin/src/plugins/datatables/js/buttons.html5.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/admin/src/plugins/datatables/js/buttons.flash.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/admin/src/plugins/datatables/js/pdfmake.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/admin/src/plugins/datatables/js/vfs_fonts.js')); ?>"></script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('mk.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\doc-tsul\resources\views/mk/pages/doccom/index.blade.php ENDPATH**/ ?>