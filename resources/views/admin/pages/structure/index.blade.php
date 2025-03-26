@extends('admin.layouts.master')
@section('content')
<div class="main-container">
{{--     <div class="alert alert-success alert-dismissible fade show swal2-popup swal2-modal swal2-show" role="alert">
    	<div class="swal2-header"><ul class="swal2-progresssteps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"><span class="swal2-x-mark"><span class="swal2-x-mark-line-left"></span><span class="swal2-x-mark-line-right"></span></span></div><div class="swal2-icon swal2-question" style="display: none;"><span class="swal2-icon-text">?</span></div><div class="swal2-icon swal2-warning" style="display: none;"><span class="swal2-icon-text">!</span></div><div class="swal2-icon swal2-info" style="display: none;"><span class="swal2-icon-text">i</span></div><div class="swal2-icon swal2-success swal2-animate-success-icon" style="display: flex;"><div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div><span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span><div class="swal2-success-ring"></div> <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div><div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title">Good job!</h2><button type="button" class="swal2-close" style="display: none;">×</button></div>
	<strong>Holy guacamole!</strong> You should check in on some of those fields below.
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">×</span>
	</button>
	</div>

<div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;">
	<div class="swal2-header">
		<ul class="swal2-progresssteps" style="display: none;"></ul>
		<div class="swal2-icon swal2-error" style="display: none;">
			<span class="swal2-x-mark"><span class="swal2-x-mark-line-left"></span>
			<span class="swal2-x-mark-line-right"></span>
		</span>
		</div>
			<div class="swal2-icon swal2-question" style="display: none;">
				<span class="swal2-icon-text">?</span></div><div class="swal2-icon swal2-warning" style="display: none;"><span class="swal2-icon-text">!</span></div><div class="swal2-icon swal2-info" style="display: none;"><span class="swal2-icon-text">i</span></div><div class="swal2-icon swal2-success swal2-animate-success-icon" style="display: flex;"><div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div><span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span><div class="swal2-success-ring"></div> <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div><div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title">Good job!</h2><button type="button" class="swal2-close" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" style="display: block;">You clicked the button!</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validationerror" id="swal2-validationerror" style="display: none;"></div></div><div class="swal2-actions" style="display: flex;"><button type="button" class="swal2-confirm btn btn-success swal2-styled" aria-label="" style="border-left-color: rgb(48, 133, 214); border-right-color: rgb(48, 133, 214);">OK</button><button type="button" class="swal2-cancel btn btn-danger swal2-styled" aria-label="" style="display: inline-block;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div></div>
 --}}

								<button type="button" class="btn mb-20 btn-primary btn-block" id="sa-test">Click me</button>




    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="card-box pd-20 height-100-p mb-30">
            <div class="row align-items-center">
                    <div class="col-md-8">
                    <h4 class="font-20 weight-500 mb-10 text-capitalize">
                       <div class="weight-600 font-30 text-blue align-items-center">Structura</div>
                    </h4>
                    {{-- <p class="font-18 max-width-600"></p> --}}
                </div>
            </div>
        </div>

		<div class="min-height-200px">
			<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Asosiy boshqaruv </h4>
						
					</div>
					<div class="pb-20">
						<table class="data-table table stripe hover nowrap">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">#</th>
									<th>Nomi</th>
									<th>Batafsil</th>
									<th class="text-center">Ishchilar soni</th>
									<th>Bo'ysunuvchisi</th>
									<th class="datatable-nosort">Amallar</th>
								</tr>
							</thead>
							<tbody>
								@php 
								$i=1;
								@endphp
                       		@foreach($data as $item)
								<tr class="@if($item->status==1) table-success @else table-secondary @endif">
									<td class="table-plus">{{ $i++}}</td>
									<td>{{ $item->name }}</td>
									<td>{{ $item->description }}</td>
									<td >{{ $item->count_workers }}</td>
									<td>{{ $item->parent() }}</td>
									<td>
										<div class="dropdown">
											<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="dw dw-more"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
											<a href="#" class="dropdown-item" data-toggle="modal" data-target="#bd-example-modal-lg{{$item->id}}">
												<i class="dw dw-eye"></i> Ko'rish -</a>
												<a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Tahrirlash</a>
												<a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> O'chirish</a>
											</div>
										</div>
									</td>
								</tr>
								@include('admin.pages.structure.modal')
							@endforeach
							</tbody>
						</table>
					</div>
				</div>
    	</div>

	</div>
</div>




@endsection

@section('js')
	<script src="{{ asset('assets/admin/src/plugins/switchery/switchery.min.js') }}"></script>
	<!-- bootstrap-tagsinput js -->
	<script src="{{ asset('assets/admin/src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>
	<!-- bootstrap-touchspin js -->
	<script src="{{ asset('assets/admin/src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js') }}"></script>
	<script src="{{ asset('assets/admin/vendors/scripts/advanced-components.js') }}"></script>


@endsection
