<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>
	@yield('title')
	</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/admin/vendors/images/apple-touch-icon.png') }}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/admin/vendors/images/favicon-32x32.png') }}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/admin/vendors/images/favicon-16x16.png') }}">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/vendors/styles/core.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/vendors/styles/icon-font.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/src/plugins/datatables/css/dataTables.bootstrap4.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/src/plugins/datatables/css/responsive.bootstrap4.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/vendors/styles/style.css') }}">

{{--  --}}
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/src/plugins/sweetalert2/sweetalert2.css') }}">
	<!-- switchery css -->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/src/plugins/switchery/switchery.min.css')}}">
	<!-- bootstrap-tagsinput css -->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')}}">
	<!-- bootstrap-touchspin css -->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.css')}}">
	@yield('link')

{{--  --}}
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	

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
	{{-- Loadeer --}}
		{{-- <div class="pre-loader">
			<div class="pre-loader-box">
				<div class="loader-logo"><img src="{{ asset('assets/admin/vendors/images/deskapp-logo.svg') }}" alt=""></div>
				<div class='loader-progress' id="progress_div">
					<div class='bar' id='bar1'></div>
				</div>
				<div class='percent' id='percent1'>0%</div>
				<div class="loading-text">
					Loading...
				</div>
			</div>
		</div> --}}
	{{-- Loadeer --}}


	<div class="header">
		@include('admin.includes.header')
	</div>

	<div class="right-sidebar">
		@include('admin.includes.rightsidebar')
	</div>

	<div class="left-side-bar">
		@include('admin.includes.leftsidebar')

		
	</div>
	<div class="mobile-menu-overlay"></div>

	@yield('content')



	<!-- myjs -->
	<script src="{{ asset('js/main.js') }}"></script>

	<!-- myjs -->
	<script src="{{ asset('assets/admin/vendors/scripts/core.js') }}"></script>
	<script src="{{ asset('assets/admin/vendors/scripts/script.min.js') }}"></script>
	<script src="{{ asset('assets/admin/vendors/scripts/process.js') }}"></script>
	<script src="{{ asset('assets/admin/vendors/scripts/layout-settings.js') }}"></script>

	<script src="{{ asset('assets/admin/src/plugins/apexcharts/apexcharts.min.js') }}"></script>
	

	<script src="{{asset('assets/admin/src/plugins/datatables/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('assets/admin/src/plugins/datatables/js/dataTables.bootstrap4.min.js')}}"></script>
	<script src="{{asset('assets/admin/src/plugins/datatables/js/dataTables.responsive.min.js')}}"></script>
	<script src="{{asset('assets/admin/src/plugins/datatables/js/responsive.bootstrap4.min.js')}}"></script>
	<!-- buttons for Export datatable -->
	<script src="{{asset('assets/admin/src/plugins/datatables/js/dataTables.buttons.min.js')}}"></script>
	<script src="{{asset('assets/admin/src/plugins/datatables/js/buttons.bootstrap4.min.js')}}"></script>
	<script src="{{asset('assets/admin/src/plugins/datatables/js/buttons.print.min.js')}}"></script>
	<script src="{{asset('assets/admin/src/plugins/datatables/js/buttons.html5.min.js')}}"></script>
	<script src="{{asset('assets/admin/src/plugins/datatables/js/buttons.flash.min.js')}}"></script>
	<script src="{{asset('assets/admin/src/plugins/datatables/js/pdfmake.min.js')}}"></script>
	<script src="{{asset('assets/admin/src/plugins/datatables/js/vfs_fonts.js')}}"></script>


	<script src="{{ asset('assets/admin/src/plugins/jquery-steps/jquery.steps.js') }}"></script>
	<script src="{{ asset('assets/admin/vendors/scripts/steps-setting.js') }}"></script>

	
{{--	Js dash 2--}}

	<script src="{{ asset('assets/admin/src/plugins/jQuery-Knob-master/jquery.knob.min.js') }}"></script>
	<script src="{{ asset('assets/admin/src/plugins/highcharts-6.0.7/code/highcharts.js') }}"></script>
	<script src="{{ asset('assets/admin/src/plugins/highcharts-6.0.7/code/highcharts-more.js') }}"></script>
	<script src="{{ asset('assets/admin/src/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js') }}"></script>
	<script src="{{ asset('assets/admin/src/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
	<script src="{{ asset('assets/admin/vendors/scripts/dashboard2.js') }}"></script>
	<!-- Datatable Setting js -->
	<script src="{{ asset('assets/admin/vendors/scripts/datatable-setting.js') }}"></script>

		<script src="{{asset('assets/admin/src/plugins/sweetalert2/sweetalert2.all.js')}}"></script>
	<script src="{{asset('assets/admin/src/plugins/sweetalert2/sweet-alert.init.js')}}"></script>

	<script src="{{ asset('inputmask/min/jquery.inputmask.bundle.min.js') }}"></script>

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
	{{-- @if (\Session::has('success')) --}}
	{{-- @if (session('success')) --}}
	@if (session('success'))
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
	@endif

	@if (session('error'))
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
	@endif

	@yield('js')
</body>
</html>