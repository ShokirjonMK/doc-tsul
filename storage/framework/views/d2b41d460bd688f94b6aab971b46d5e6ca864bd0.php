<div class="modal fade" id="confirmation-modal<?php echo e($item->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
	<div class="modal-content">
		<div class="modal-body text-center font-18">
			<h4 class="padding-top-30 mb-30 weight-500"><?php echo e($item->name); ?>ni o'chirmoqchimisiz?</h4>
			<div class="padding-bottom-30 row" style="max-width: 170px; margin: 0 auto;">
				<div class="col-6">
					<button type="button" class="btn btn-secondary border-radius-100 btn-block confirmation-btn" data-dismiss="modal"><i class="fa fa-times"></i></button>
					YO'Q
				</div>
				<div class="col-6">
				<form method="Post" action="<?php echo e(route('department.update',$item->id)); ?>">  
													<?php echo method_field('PATCH'); ?>     
													<?php echo csrf_field(); ?>  	
					<button type="submit" class="btn btn-primary border-radius-100 btn-block confirmation-btn"><i class="fa fa-check"></i></button>
					</form>
					HA
				</div>
			</div>
		</div>
	</div>
</div>
</div><?php /**PATH C:\wamp64\www\doc-tsul\resources\views/admin/pages/department/delete.blade.php ENDPATH**/ ?>