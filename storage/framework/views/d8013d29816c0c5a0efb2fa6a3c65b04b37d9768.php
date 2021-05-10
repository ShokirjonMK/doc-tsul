


<script src="https://code.highcharts.com/maps/highmaps.js"></script>
<?php $__env->startSection('content'); ?>
    <div class="main-container">
        <div class="xs-pd-20-10 pd-ltr-20">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo e(route('mk')); ?>">Bosh</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Foydalanuvchilar</li>
                            </ol>
                        </nav>
                    </div>
                   <div class="col-md-6 col-sm-12 text-right">
						<a class="btn btn-primary " href="<?php echo e(route('mk.user.create')); ?>" role="button" >
							Yangi foydalanuvchi kiritish
						</a>
                   </div>

				   

                </div>
            </div>
			<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Data Table with Export Buttons</h4>
					</div>
					<div class="pb-20">
						<table class="table hover multiple-select-row data-table-export nowrap">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">#</th>
									<th>F.I.O</th>
									<th>Bo'linma</th>
									<th>Username</th>
									<th>Holati</th>
									<th class="table-plus datatable-nosort"></th>
								</tr>
							</thead>
							<tbody>
								<?php $i=1; ?>
							<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

							<?php if($item->status == 0): ?>
								<?php $item->statusclass = 'table-secondary'?>
							<?php endif; ?>
							
								
								<tr class="<?php echo e($item->statusclass); ?>">
									<td><?php echo e($i++); ?></td>
									<td><a href="<?php echo e(route('mk.user.show', ['id'=>$item->id])); ?>"><?php echo e($item->getfio()); ?></a></td>
									<td>
									<?php echo e(\Illuminate\Support\Str::limit($item->department->name, 50, $end='...')); ?>

									</td>
									<td><?php echo e($item->username); ?></td>
									<td><?php if($item->status == 1): ?>
										<?php echo e('Faol'); ?>

										<?php elseif($item->status == 0): ?>
										<?php echo e("Nofaol"); ?>

									<?php endif; ?></td>
									<td class="last-td">
										<div class="dropdown">
											<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="dw dw-more"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
												<a href="#" class="dropdown-item" ><i class="dw dw-eye"></i> Ko'rish </a>
												<a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Tahrirlash</a>
												<a class="dropdown-item"  href="#"><i class="dw dw-delete-3"></i> O'chirish</a>
											</div>
										</div>
									</td>
								</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</tbody>
						</table>
				</div>
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

<?php echo $__env->make('mk.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\doc-tsul\resources\views/mk/pages/user/index.blade.php ENDPATH**/ ?>