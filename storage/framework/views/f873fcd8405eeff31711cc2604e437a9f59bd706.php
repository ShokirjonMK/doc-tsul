<div class="modal fade bs-example-modal-lg" id="editmodal<?php echo e($item->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel<?php echo e($item->id); ?>" aria-hidden="true">
				<div class="modal-dialog modal-lg modal-dialog-centered">
				<form  action="<?php echo e(route('department.tahrir')); ?>" method="post" enctype="multipart/form-data">
								 <?php echo csrf_field(); ?>
								 <input type="hidden" name="id" value="<?php echo e($item->id); ?>">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title" id="myLargeModalLabel<?php echo e($item->id); ?>"><?php echo e($item->name); ?></h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="close">&times;</span></button>
						</div>
						<div class="modal-body">
								<div class="form-group row">
									<label class="col-sm-12 col-md-2 col-form-label">Nomi</label>
									<div class="col-sm-12 col-md-10">
										<input class="form-control" type="text"  name="name" value="<?php echo e($item->name); ?>" placeholder="Nomi">
									</div>
								</div>
								
								<div class="form-group row">
									<label class="col-sm-12 col-md-2 col-form-label">Bo'ysunuvchisi</label>
									<div class="col-sm-12 col-md-10">
										<select class="form-control" name="parent_id" data-style="btn-outline-primary">
											<option value="<?php echo e($item->parent_id); ?>"><?php echo e($item->parent()); ?></option>
											<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $selitem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<?php if($selitem->id != $item->id && $selitem->id != $item->parent_id ): ?>
											<option <?php if($selitem->status !=1 ): ?> disabled <?php endif; ?>
											 value="<?php echo e($selitem->id); ?>"><?php echo e($selitem->name); ?></option>
											 <?php endif; ?>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-12 col-md-2 col-form-label">Shtat soni</label>
									<div class="col-sm-12 col-md-10">
										<input class="form-control"  name="count_workers" value="<?php echo e($item->count_workers); ?>" type="text">
									</div>
								</div>
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Buyruq</label>
								<div class="col-sm-12 col-md-3">
									<input  required="true" class="form-control" placeholder="Nomi"  name="order_name" value="<?php echo e($item->order_name); ?>"  type="search">
								</div>
								<div class="col-sm-12 col-md-3">
									<input  required="true" class="form-control" placeholder="Vaqti"  name="order_date" value="<?php echo e($item->order_date); ?>" type="date">
								</div>
								<div class="col-sm-12 col-md-4">
									<input type="file" class="form-control file-input" name="order_file">
								</div>
							</div>

							<div class="form-group row">
									<label class="col-sm-12 col-md-2 col-form-label">Holati</label>
									<div class="col-sm-12 col-md-10">
										<select name="status" class="custom-select col-12">
											<option <?php if($item->status ==1): ?> selected="" <?php endif; ?> value="1">Faol</option>
											<option <?php if($item->status ==2): ?> selected="" <?php endif; ?> value="2">Nofaol</option>
										</select>
									</div>
								</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Yopish</button>
							<button type="submit" class="btn btn-primary">Saqlash</button>
						</div>
					</div>
				</form>
				</div>
			</div>
<?php /**PATH /var/www/kadr/resources/views/admin/pages/department/editmodal.blade.php ENDPATH**/ ?>