


<script src="https://code.highcharts.com/maps/highmaps.js"></script>
<?php $__env->startSection('content'); ?>
    <div class="main-container">
        <div class="xs-pd-20-10 pd-ltr-20">
            

            <div class="card-box mb-30">
					<div class="pd-20 row">
                        <div class="col-md-6">
                            <h4 class="text-blue h4">"<?php echo e($search); ?>" bo'yicha qidiruv natijasi</h4>
                        </div>
                        <div class="col-md-6 text-right">
                            <a class="p-2 m-2" href="<?php if($status): ?> <?php echo e(route('mk')); ?><?php else: ?><?php echo e(route('doc.index')); ?><?php endif; ?>" >
                                
                              <i class="icon-copy dw dw-refresh2" style="font-size: 20px"> tozalash </i>
                           </a>
                          
                        </div>
					</div>
					<div class="pb-20">
						
						<table class="table p-2 stripe data-table hover">
                            <thead>
                                <tr>
                                    <th >#</th>
                                    <th>Nomi</th>
                                    <th class="table-plus datatable-nosort" style="width: 10px !important;"></th>
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
                                    <?php $statusclass = '' ?>
                            <?php if($item->status == 0): ?>
                                <?php $statusclass = 'table-secondary'?>
                            <?php endif; ?>
                            <?php if($item->end_date == date("Y-m-d")): ?>
                                  <?php $statusclass = 'table-danger'?>
                            <?php endif; ?>
                            <?php if($item->end_date == date("Y-m-d", strtotime("+1 day"))): ?>
                                  <?php $statusclass = 'table-warning'?>
                            <?php endif; ?>
                            <?php if($item->end_date > date("Y-m-d", strtotime("+1 day"))): ?>
                                  <?php $statusclass = 'table-info' ?>
                            <?php endif; ?>
                                <tr class="<?php echo e($statusclass); ?>">
                                    <td><?php echo e($i++); ?></td>
                                    <td><a href="<?php echo e(route('doc.show', $item->id)); ?>"><?php echo e($item->name); ?></a></td>
                                    <td style="width: 10px !important;"><i onclick="return open('<?php echo e(asset($item->document)); ?>', 'ShokirjonMK', 'width=900,height=500,left=500,top=200')" class="icon-copy dw dw-download1 pointer"></i></td>
                                    <td><?php echo e($item->number); ?></td>
                                    <td style="width: 30px !important;"><?php echo e($item->end_date); ?></td>
                                    <td><?php if(isset($item->releted)): ?>
                                        <?php echo e($item->releted); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td><?php if(isset($item->supervisor)): ?>
                                        <?php echo e($item->supervisor); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        
                                         <?php if($item->type == 1): ?>
                                        <?php echo e('Buyruq'); ?>

                                        <?php elseif($item->type == 0): ?>
                                        <?php echo e("Kengash qarori"); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        
                                        <?php if($item->duration == 1): ?>
                                        <?php echo e('Davomiy'); ?>

                                        <?php elseif($item->duration == 0): ?>
                                        <?php echo e("Muddatli"); ?>

                                        <?php endif; ?>
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

<?php echo $__env->make('mk.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\doc-tsul\resources\views/mk/pages/doc/search.blade.php ENDPATH**/ ?>