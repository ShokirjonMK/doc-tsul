@extends('admin.layouts.master')
@section('content')
<style type="text/css">
	.last-td{
        width: 100px;
        
        text-align: center;
    }
</style>
<div class="main-container">

    <div class="pd-ltr-20 xs-pd-20-10">
       

		<div class="min-height-200px">
			<div class="card-box mb-30">
					<div class="pd-20" style="display: flex; justify-content: space-between;">
						<a href="#" class="text-blue h4"  >Xodimlar </a>
						<a href="{{ route('staff.create') }}" class="pr-4 btn btn-primary" ><i class="fa fa-plus"></i> Yangi </a>
					</div>

					<div class="pb-20">
						<table class=" data-table-export table stripe hover nowrap">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">#</th>
									<th>F.I.O</th>
									<th>Telefon</th>
									<th>Pasport</th>
									<th>Amallar</th>
								</tr>
							</thead>
							<tbody>
								@php  $i=1; @endphp
	                       		@foreach($data as $item)
									<tr >
										<td>{{ $i++ }}</td>
										<td> {{ $item->fio() }} </td>
										<td> {{ $item->phone }} </td>
										<td> {{ $item->passport_seria }}{{ $item->passport_number }} </td>
										<td class="last-td">
											<a class="p-2" href="{{ route('staff.show' , ['staff' => $item->id]) }}"  ><i class="dw dw-eye"></i></a>
											<a class="p-2" href="{{ route('staff.edit', ['staff' => $item->id]) }}"><i class="dw dw-edit2"></i></a>
{{--											<a class="p-2" type="button" data-toggle="modal" data-target="#confirmation-modal{{$item->id}}" href="#"><i class="dw dw-delete-3"></i></a>--}}




{{--											<div class="dropdown">--}}
{{--												<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">--}}
{{--													<i class="dw dw-more"></i>--}}
{{--												</a>--}}
{{--												<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">--}}
{{--													<a href="{{ route('staff.show' , ['staff' => $item->id]) }}" class="dropdown-item" ><i class="dw dw-eye"></i> Ko'rish </a>--}}
{{--													<a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Tahrirlash</a>--}}
{{--													<a class="dropdown-item" type="button" data-toggle="modal" data-target="#confirmation-modal{{$item->id}}" href="#"><i class="dw dw-delete-3"></i> O'chirish</a>--}}
{{--												</div>--}}
{{--											</div>--}}
										</td>
									</tr
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
