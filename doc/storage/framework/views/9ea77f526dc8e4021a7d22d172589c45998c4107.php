

<?php $__env->startSection('title'); ?>
Tashkiliy tuzulma
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
		<div class="min-height-200px">
			<div class="card-box mb-30">
					<div class="pd-20" style="display: flex; justify-content: space-between;">
						<a href="#" class="text-blue h4" data-toggle="modal" data-target="#order_pdf" ><?php if(! $status): ?>Tarkibiy bo'linma / Lavozim <?php else: ?>
							<?php echo e($department_show->name); ?> ( <?php echo e($department_show->order_name); ?> | <?php echo e($department_show->order_date); ?> | Buyruq <i class="icon-copy fi-eye"></i> ) <?php endif; ?></a>
						<?php if($status && $department_show->order_file): ?>
							<div class="modal fade" id="order_pdf" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
								<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
									<div class="modal-content">
										<div class="modal-body pd-5">
											<div class="img-container">
													<iframe src="<?php echo e($department_show->order_file); ?>" width="100%" height="500px">
													</iframe>
											</div>
										</div>
										<div class="modal-footer">
											
											<button type="button" class="btn btn-primary" data-dismiss="modal">Yopish</button>
										</div>
									</div>
								</div>
							</div>
						<?php endif; ?>
						<a href="#" class="pr-4 btn btn-primary" data-toggle="modal" data-target="#createmodal" ><i class="fa fa-plus"></i> Yangi </a>
					</div>
					<div class="pb-20">
						
						
						<table class="table hover  data-table-export nowrap">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">#</th>
									<th>Nomi</th>
									<th>Shtat soni</th>
									<th>Bo'ysunuvchisi</th>
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
									<td><a href="<?php echo e(route('department.show',['department'=>$item->id])); ?>" ><?php echo e($item->name); ?> </a></td>
									<td ><a href="<?php echo e(route('stdep.show',['stdep'=>$item->id])); ?>"> <?php echo e($item->count_workers); ?> (xodimlarni ko'rish)</a></td>
									<td><?php echo e(\Illuminate\Support\Str::limit($item->parent(), 30, $end='...')); ?></td>
									<td>
										<a class="p-2" href="#"  data-toggle="modal" data-target="#bd-example-modal-lg<?php echo e($item->id); ?>"><i class="dw dw-eye"></i></a>
										<a class="p-2" href="#" data-toggle="modal" data-target="#editmodal<?php echo e($item->id); ?>"><i class="dw dw-edit2"></i></a>
										<a class="p-2" type="button" data-toggle="modal" data-target="#confirmation-modal<?php echo e($item->id); ?>" href="#"><i class="dw dw-delete-3"></i> </a>












									</td>
								</tr>
								<?php echo $__env->make('admin.pages.department.delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
								<?php echo $__env->make('admin.pages.department.modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
								<?php echo $__env->make('admin.pages.department.editmodal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</tbody>
						</table>
					</div>
				</div>
    	</div>

	</div>
</div>


<?php echo $__env->make('admin.pages.department.createmodal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
	<script>
		var uploadField = document.getElementById("InputFileToTheServer_MK");

uploadField.onchange = function() {

    if(this.files[0].size > 5242800){
       alert("Bunday katta hajmdagi ma'lumot yuklashga ruxsat berilmagan. Kichikroq fayl tanlang!");
       this.value = "";
    };
};
	</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\doc-tsul\resources\views/admin/pages/department/index.blade.php ENDPATH**/ ?>