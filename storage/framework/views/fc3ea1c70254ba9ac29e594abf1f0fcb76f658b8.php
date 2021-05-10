
<?php if(Auth::user()->role == 777): ?>

	<li class="show">
		<a href="<?php echo e(route('doc.index')); ?>" class="dropdown-toggle">
			<span class="micon dw dw-house-1"></span><span class="mtext">Asosiy </span>
		</a>
	</li>
	<li class=" ">
		<a href="<?php echo e(route('mk.user.index')); ?>" class="dropdown-toggle">
			<span class="micon dw dw-user"></span><span class="mtext">Foydalanuvchilar </span>
		</a>
	</li>

	
<?php endif; ?><?php /**PATH C:\wamp64\www\doc-tsul\resources\views/mk/includes/menu.blade.php ENDPATH**/ ?>