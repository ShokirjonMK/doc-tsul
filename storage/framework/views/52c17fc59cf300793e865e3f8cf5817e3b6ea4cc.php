
<div class="modal fade bs-example-modal-lg" id="bd-example-modal-lg<?php echo e($item->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel<?php echo e($item->id); ?>" aria-hidden="true">
				<div class="modal-dialog modal-lg modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title" id="myLargeModalLabel<?php echo e($item->id); ?>"><?php echo e($item->name); ?></h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="close">&times;</span></button>
						</div>
						<div class="modal-body">
							<form>
								<div class="form-group row">
									<label class="col-sm-12 col-md-2 col-form-label">Nomi</label>
									<div class="col-sm-12 col-md-10">
										<input class="form-control" type="text"  readonly="true"  name="name" value="<?php echo e($item->name); ?>" placeholder="Johnny Brown">
									</div>
								</div>

								<div class="form-group row">
									<label class="col-sm-12 col-md-2 col-form-label">Bo'ysunuvchisi</label>
									<div class="col-sm-12 col-md-10">
										<input class="form-control" placeholder=""  readonly="true" name="description" value="<?php echo e($item->parent()); ?>"  type="search">
										
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-12 col-md-2 col-form-label">Shtat soni</label>
									<div class="col-sm-12 col-md-10">
										<input class="form-control"  readonly="true" name="count_workers" value="<?php echo e($item->count_workers); ?>" type="number">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-12 col-md-2 col-form-label">Buyruq</label>
									<div class="col-sm-12 col-md-5">
										<input  required="true" class="form-control" readonly="true"  placeholder="Nomi"  name="order_name" value="<?php echo e($item->order_name); ?>"  type="search">
									</div>
									<div class="col-sm-12 col-md-5">
										<input  required="true" class="form-control" readonly="true" placeholder="Vaqti"  name="order_date" value="<?php echo e($item->order_date); ?>" type="date">
									</div>
									<?php if($item->order_file): ?>




									<?php endif; ?>
								</div>
								<div class="form-group row">
									<label class="col-sm-12 col-md-2 col-form-label">Holati</label>
									<div class="col-sm-12 col-md-10">
										<select disabled="true" class="custom-select col-12">
											<option selected=""><?php echo e($item->status()); ?></option>
											
										</select>
									</div>
								</div>
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Yopish</button>
							
						</div>
					</div>
				</div>
			</div>
<?php /**PATH C:\wamp64\www\doc-tsul\resources\views/admin/pages/department/modal.blade.php ENDPATH**/ ?>