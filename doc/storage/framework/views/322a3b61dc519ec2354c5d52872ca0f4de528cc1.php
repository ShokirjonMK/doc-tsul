<?php $__env->startSection('content'); ?>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
		<div class="min-height-200px">
			<form  action="<?php echo e(route('ie.store')); ?>" method="post">
				<?php echo csrf_field(); ?>
			<div class="card-box mb-30">
					<div class="pd-20" style="display: flex; justify-content: space-between;">
						<a href="#" class="text-blue h4" >Bo'limlar</a>
						<button class="pr-4 btn btn-primary" type="submit" ><i class="fa fa-save"></i> Saqlash </button>
					</div>
					<div class="row m-2">
						<div class="col-md-12">
							<div class="form-group">
								<label>Bo'lim/Kafedra boshlig'ini tanlang</label>
								<select name="boos" class="custom-select2 form-control" style="width: 100%; height: 38px;">
									<optgroup label="Alaskan/Hawaiian Time Zone">
										<option value="AK">Alaska</option>
										<option value="HI">Hawaii</option>
									</optgroup>
									<optgroup label="Pacific Time Zone">
										<option value="CA">California</option>
										<option value="NV">Nevada</option>
										<option value="OR">Oregon</option>
										<option value="WA">Washington</option>
									</optgroup>
									<optgroup label="Mountain Time Zone">
										<option value="AZ">Arizona</option>
										<option value="CO">Colorado</option>
										<option value="ID">Idaho</option>
										<option value="MT">Montana</option>
										<option value="NE">Nebraska</option>
										<option value="NM">New Mexico</option>
										<option value="ND">North Dakota</option>
										<option value="UT">Utah</option>
										<option value="WY">Wyoming</option>
									</optgroup>
								</select>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label>Xodimlarni belgilang</label>
								<select name="xodimlar[]" class="custom-select2 form-control" multiple="multiple" style="width: 100%;">
									<optgroup label="Alaskan/Hawaiian Time Zone">
										<option value="AK">Alaska</option>
										<option value="HI">Hawaii</option>
									</optgroup>
									<optgroup label="Pacific Time Zone">
										<option value="CA">California</option>
										<option value="NV">Nevada</option>
										<option value="OR">Oregon</option>
										<option value="WA">Washington</option>
									</optgroup>
									<optgroup label="Mountain Time Zone">
										<option value="AZ">Arizona</option>
										<option value="CO">Colorado</option>
										<option value="ID">Idaho</option>
										<option value="MT">Montana</option>
										<option value="NE">Nebraska</option>
										<option value="NM">New Mexico</option>
										<option value="ND">North Dakota</option>
										<option value="UT">Utah</option>
										<option value="WY">Wyoming</option>
									</optgroup>
								</select>
							</div>
						</div>
					</div>
				</form>

			<div class="pb-20">
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
					<?php
						$i=1;
					?>
					<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr >
							<td><?php echo e($i++); ?></td>
							<td>
								<?php echo e($item->fio()); ?>

							</td>
							<td>
								<?php echo e($item->phone); ?>

							</td>
							<td>
								<?php echo e($item->passport_seira); ?><?php echo e($item->passport_number); ?>

							</td>

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
	
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/kadr/resources/views/admin/pages/ie/index.blade.php ENDPATH**/ ?>