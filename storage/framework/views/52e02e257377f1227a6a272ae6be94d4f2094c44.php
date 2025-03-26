
<?php $__env->startSection('content'); ?>
<style type="text/css">
	.last-td{
        width: 100px;
        
        text-align: center;
    }
</style>
<div class="main-container">

    <div class="pd-ltr-20 xs-pd-20-10">
       

		<div class="min-height-200px">
			<div class="card-box mb-30">
					<div class="pd-20" style="display: flex; justify-content: space-between;">
						<a href="#" class="text-blue h4"  >Xodimlar </a>
						<a href="<?php echo e(route('staff.create')); ?>" class="pr-4 btn btn-primary" ><i class="fa fa-plus"></i> Yangi </a>
					</div>

					<div class="pb-20">
						<table class=" data-table-export table stripe hover nowrap">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">#</th>
									<th>F.I.O</th>
									<th>Telefon</th>
									<th>Pasport</th>
									<th>Amallar</th>
								</tr>
							</thead>
							<tbody>
								<?php  $i=1; ?>
	                       		<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr >
										<td><?php echo e($i++); ?></td>
										<td> <?php echo e($item->fio()); ?> </td>
										<td> <?php echo e($item->phone); ?> </td>
										<td> <?php echo e($item->passport_seria); ?><?php echo e($item->passport_number); ?> </td>
										<td class="last-td">
											<a class="p-2" href="<?php echo e(route('staff.show' , ['staff' => $item->id])); ?>"  ><i class="dw dw-eye"></i></a>
											<a class="p-2" href="<?php echo e(route('staff.edit', ['staff' => $item->id])); ?>"><i class="dw dw-edit2"></i></a>















										</td>
									</tr
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</tbody>
						</table>
					</div>
				</div>
    	</div>

	</div>
</div>




<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
	<script src="<?php echo e(asset('assets/admin/src/plugins/switchery/switchery.min.js')); ?>"></script>
	<!-- bootstrap-tagsinput js -->
	<script src="<?php echo e(asset('assets/admin/src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js')); ?>"></script>
	<!-- bootstrap-touchspin js -->
	<script src="<?php echo e(asset('assets/admin/src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/admin/vendors/scripts/advanced-components.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\doc-tsul\resources\views/admin/pages/staff/index.blade.php ENDPATH**/ ?>