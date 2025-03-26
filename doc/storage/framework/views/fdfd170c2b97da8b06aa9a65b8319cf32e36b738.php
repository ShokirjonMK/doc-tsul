<?php $__env->startSection('title'); ?>
Universitetlar
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
		<div class="min-height-200px">
			<div class="card-box mb-30">
					<div class="pd-20" style="display: flex; justify-content: space-between;">
						<a href="#" class="text-blue h4" data-toggle="modal" data-target="#order_pdf" >Universitetlar</a>
						<a href="#" class="pr-4 btn btn-primary" data-toggle="modal" data-target="#university_createmodal" ><i class="fa fa-plus"></i> Yangi </a>
					</div>
					<div class="pb-20">
						
						
						<table class="table hover  data-table-export nowrap">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">#</th>
									<th>Nomi</th>
									<th>Qisqa nomi</th>
									<th class="datatable-nosort">Amallar</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i=1;
								?>
                       		<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr class="<?php if($item->status==1): ?> table-success <?php else: ?> table-secondary <?php endif; ?>">
									<td class="table-plus"><?php echo e($i++); ?></td>
									
									<td>
										<?php echo e($item->name); ?>

									</td>
									<td>
										<?php echo e($item->name_short); ?>

									</td>
									<td>


										<a class="p-2" href="#" data-toggle="modal" data-target="#editmodal<?php echo e($item->id); ?>"><i class="dw dw-edit2"></i></a>


										<a class="p-2" type="button" data-toggle="modal" data-target="#confirmation-modal<?php echo e($item->id); ?>" href="#"><i class="dw dw-delete-3"></i> </a>

									</td>
								</tr>
								<?php echo $__env->make('admin.pages.university.delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

								<?php echo $__env->make('admin.pages.university.editmodal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</tbody>
						</table>
					</div>
				</div>
    	</div>

	</div>
</div>


<?php echo $__env->make('admin.pages.university.createmodal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
	<script>

	</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/kadr/resources/views/admin/pages/university/index.blade.php ENDPATH**/ ?>