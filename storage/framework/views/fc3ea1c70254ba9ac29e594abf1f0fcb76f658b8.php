<?php if(Auth::user()->role == 777 || Auth::user()->role == 333): ?>

	<li class="<?php if(  Request::is('mk/doc')  ): ?> show <?php endif; ?>">
		<a href="<?php echo e(route('doc.index')); ?>" class="dropdown-toggle">
			<span class="micon dw dw-house-1"></span><span class="mtext">Asosiy </span>
		</a>
	</li>
	<li class="<?php if(  Request::is('mk/user')  ): ?> show <?php endif; ?>">
		<a href="<?php echo e(route('user.index')); ?>" class="dropdown-toggle">
			<span class="micon dw dw-user"></span><span class="mtext">Foydalanuvchilar </span>
		</a>
	</li>
<?php endif; ?>
<?php if(Auth::user()->role == 555): ?>

	<li class="show">
		<a href="<?php echo e(route('mk.doc.mydoc')); ?>" class="dropdown-toggle">
			<span class="micon dw dw-house-1"></span><span class="mtext">Hujjatlarim </span>
		</a>
	</li>
	
<?php endif; ?>
	<li class="<?php if(Request::is('mk/user')): ?> show <?php endif; ?>">
		<a href="<?php echo e(route('doc-com.index')); ?>" class="dropdown-toggle">
			
			<span class="micon dw dw-edit-file"></span><span class="mtext">Muhokama </span>
		</a>
	</li><?php /**PATH C:\wamp64\www\doc-tsul\resources\views/mk/includes/menu.blade.php ENDPATH**/ ?>