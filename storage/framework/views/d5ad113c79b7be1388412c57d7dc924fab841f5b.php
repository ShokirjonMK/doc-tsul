<?php $__env->startSection('content'); ?>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
		<div class="min-height-200px">
			<div class="card-box mb-30">
				<form id="form_id_stdep" action="<?php echo e(route('stdep.store')); ?>" method="post">
					<?php echo csrf_field(); ?>
					<input type="hidden" value="<?php echo e($department->id); ?>" name="department">
					<div class="pd-20" style="display: flex; justify-content: space-between;">
						<a href="#" class="text-blue h4" ><?php echo e($department->name); ?></a> <?php if($status): ?> <?php echo e($staff_boss->fio()); ?> <?php endif; ?>
						<button class="pr-4 btn btn-primary" type="submit" ><i class="fa fa-save"></i> Saqlash </button>
					</div>



























				</form>

			<div class="pb-20 m-2">
				<table class=" data-table-export table stripe hover nowrap">
					<thead>
					<tr>
						<th class="table-plus datatable-nosort">#</th>
						<th>F.I.O</th>
						<th>Telefon</th>
						<th>Pasport</th>
						<th></th>
					</tr>
					</thead>
					<tbody>
					<?php $i=1; ?>
					<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr <?php if($status): ?><?php if($boss_dep->staff_id == $item->id): ?> class="table-success" <?php endif; ?> <?php endif; ?>>
							<td><?php echo e($i++); ?></td>
							<td> <?php echo e($item->fio()); ?> </td>
							<td> <?php echo e($item->phone); ?> </td>
							<td> <?php echo e($item->passport_seira); ?><?php echo e($item->passport_number); ?> </td>
							<td class="last-td">
								<div class="dropdown">
									<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
										<i class="dw dw-more"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
										<a href="<?php echo e(route('staff.show' , ['staff' => $item->id])); ?>" class="dropdown-item" ><i class="dw dw-eye"></i> Ko'rish </a>
										<a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Tahrirlash</a>
										<a class="dropdown-item" type="button" data-toggle="modal" data-target="#confirmation-modal<?php echo e($item->id); ?>" href="#"><i class="dw dw-delete-3"></i> O'chirish</a>
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
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
		<?php if(session('error_allready_recorded')): ?>
		<script type="text/javascript">
		 // $('#sa-test').click(function () {
			$( document ).ready(function() {
				swal(
					{
						type: 'error',
						title: 'Oops...',
						text: 'Allaqachon biriktirilgan!',
					}
				)
			});
		</script>
		<?php endif; ?>
		<?php if(session('error_not_select')): ?>
		<script type="text/javascript">
		 // $('#sa-test').click(function () {
			$( document ).ready(function() {
				swal(
					{
						type: 'error',
						title: 'Oops...',
						text: 'Hech narsa tanlanmagan!',
					}
				)
			});
		</script>
		<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/kadr/resources/views/admin/pages/stdep/index.blade.php ENDPATH**/ ?>