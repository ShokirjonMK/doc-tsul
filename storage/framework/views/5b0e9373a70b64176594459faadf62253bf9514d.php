<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>
	<?php echo $__env->yieldContent('title'); ?>
	</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo e(asset('assets/admin/vendors/images/apple-touch-icon.png')); ?>">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(asset('assets/admin/vendors/images/favicon-32x32.png')); ?>">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('assets/admin/vendors/images/favicon-16x16.png')); ?>">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/admin/vendors/styles/googleapis.css')); ?>">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/admin/vendors/styles/core.css')); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/admin/vendors/styles/icon-font.min.css')); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/admin/src/plugins/datatables/css/dataTables.bootstrap4.min.css')); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/admin/src/plugins/datatables/css/responsive.bootstrap4.min.css')); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/admin/vendors/styles/style.css')); ?>">


	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/admin/src/plugins/sweetalert2/sweetalert2.css')); ?>">
	<!-- switchery css -->
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/admin/src/plugins/switchery/switchery.min.css')); ?>">
	<!-- bootstrap-tagsinput css -->
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/admin/src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')); ?>">
	<!-- bootstrap-touchspin css -->
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/admin/src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.css')); ?>">
	<?php echo $__env->yieldContent('link'); ?>


	<!-- Global site tag (gtag.js) - Google Analytics -->
	
	<script async src="<?php echo e(asset('assets/admin/vendors/scripts/googletagmanager.js')); ?>"></script>
	

	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
	<style type="text/css">
		#datatables_buttons_info{
			text-align: center;
		}
        .main-container{
            padding: 10px !important;
        }
	</style>
</head>
<body>
	<style type="text/css">
		.j-flex{
			display: flex;
			justify-content: space-between;
		}
		span.error{
			color: #E13400;
		}
	</style>
	
	
		
	


	

	
	<div class="mobile-menu-overlay"></div>

	<?php echo $__env->yieldContent('content'); ?>



	<!-- myjs -->
	<script src="<?php echo e(asset('js/main.js')); ?>"></script>

	<!-- myjs -->
	<script src="<?php echo e(asset('assets/admin/vendors/scripts/core.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/admin/vendors/scripts/script.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/admin/vendors/scripts/process.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/admin/vendors/scripts/layout-settings.js')); ?>"></script>

	<script src="<?php echo e(asset('assets/admin/src/plugins/apexcharts/apexcharts.min.js')); ?>"></script>
	

	<script src="<?php echo e(asset('assets/admin/src/plugins/datatables/js/jquery.dataTables.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/admin/src/plugins/datatables/js/dataTables.bootstrap4.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/admin/src/plugins/datatables/js/dataTables.responsive.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/admin/src/plugins/datatables/js/responsive.bootstrap4.min.js')); ?>"></script>
	<!-- buttons for Export datatable -->

	<script src="<?php echo e(asset('assets/admin/src/plugins/jquery-steps/jquery.steps.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/admin/vendors/scripts/steps-setting.js')); ?>"></script>

	


	<script src="<?php echo e(asset('assets/admin/src/plugins/jQuery-Knob-master/jquery.knob.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/admin/src/plugins/highcharts-6.0.7/code/highcharts.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/admin/src/plugins/highcharts-6.0.7/code/highcharts-more.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/admin/src/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/admin/src/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/admin/vendors/scripts/dashboard2.js')); ?>"></script>
	<!-- Datatable Setting js -->
	<script src="<?php echo e(asset('assets/admin/vendors/scripts/datatable-setting.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/admin/src/plugins/sweetalert2/sweetalert2.all.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/admin/src/plugins/sweetalert2/sweet-alert.init.js')); ?>"></script>

	<script src="<?php echo e(asset('inputmask/min/jquery.inputmask.bundle.min.js')); ?>"></script>

	<script type="text/javascript">

		$('#passport_seria').inputmask( "AA" );
		$('#passport_number').inputmask( "9999999" );

		$('.phone').inputmask( "99 9999999" );
		$('#phone111').inputmask( "99 99999" );
		$('#test123').inputmask( "99 99999" );

		$('#passport_jshshir').inputmask({

			'mask' : '99999999999999'

		});
	</script>
	
	
	<?php if(session('success')): ?>
		<script type="text/javascript">
		 // $('#sa-test').click(function () {
		$( document ).ready(function() {
            swal(
                {
                    type: 'success',
                    title: 'Muvaffaqiyatli!',
                    showConfirmButton: false,
                    timer: 1500
                }
            )
        });
	</script>
	<?php endif; ?>
	<?php if(session('error')): ?>
		<script type="text/javascript">
		 // $('#sa-test').click(function () {
		$( document ).ready(function() {
            swal(
                {
                    type: 'error',
                    title: 'Oops...',
                    text: 'Xatolik yuz berdi!',
                }
            )
        });
	</script>
	<?php endif; ?>
	<?php if(session('validate')): ?>
		<script type="text/javascript">
		 // $('#sa-test').click(function () {
		$( document ).ready(function() {
            swal(
                {
                    type: 'error',
                    title: 'Oops...',
                    text: 'Xatolik yuz berdi!',
                }
            )
        });
	</script>
	<?php endif; ?>
	<?php echo $__env->yieldContent('js'); ?>
</body>
</html><?php /**PATH C:\wamp64\www\doc-tsul\resources\views/mk/layouts/master555.blade.php ENDPATH**/ ?>