<div class="brand-logo">
			<a href="<?php echo e(route('admin')); ?>">
				
				<span class="light-logo">
					E-univ TSUL 
				</span> 
				<span class="dark-logo" style="color: #0b132b; font-weight: 700 !important;">
					E-univ TSUL
				</span> 
			</a>
			<div class="close-sidebar" data-toggle="left-sidebar-close">
				<i class="ion-close-round"></i>
			</div>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu icon-style-1 icon-list-style-2">
				<ul id="accordion-menu">
					<?php echo $__env->make('admin.includes.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				
				</ul>
			</div>
		</div><?php /**PATH C:\wamp64\www\doc-tsul\resources\views/admin/includes/leftsidebar.blade.php ENDPATH**/ ?>