@extends('admin.layouts.master')

@section('title')
Tashkiliy tuzulma
@endsection
@section('content')

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
		<div class="min-height-200px">
			<div class="card-box mb-30">
					<div class="pd-20" style="display: flex; justify-content: space-between;">
						<a href="#" class="text-blue h4" data-toggle="modal" data-target="#order_pdf" >@if(! $status)Tarkibiy bo'linma / Lavozim @else
							{{$department_show->name}} ( {{$department_show->order_name }} | {{$department_show->order_date}} | Buyruq <i class="icon-copy fi-eye"></i> ) @endif</a>
						@if($status && $department_show->order_file)
							<div class="modal fade" id="order_pdf" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
								<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
									<div class="modal-content">
										<div class="modal-body pd-5">
											<div class="img-container">
													<iframe src="{{$department_show->order_file}}" width="100%" height="500px">
													</iframe>
											</div>
										</div>
										<div class="modal-footer">
											{{--												<input type="submit" value="Update" class="btn btn-primary">--}}
											<button type="button" class="btn btn-primary" data-dismiss="modal">Yopish</button>
										</div>
									</div>
								</div>
							</div>
						@endif
						<a href="#" class="pr-4 btn btn-primary" data-toggle="modal" data-target="#createmodal" ><i class="fa fa-plus"></i> Yangi </a>
					</div>
					<div class="pb-20">
						{{-- <table class="data-table table stripe hover nowrap"> --}}
						{{-- <table class="table hover multiple-select-row data-table-export nowrap"> --}}
						<table class="table hover  data-table-export nowrap">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">#</th>
									<th>Nomi</th>
									<th>Shtat soni</th>
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
									<td><a href="{{route('department.show',['department'=>$item->id])}}" >{{ $item->name}} </a></td>
									<td ><a href="{{route('stdep.show',['stdep'=>$item->id])}}"> {{ $item->count_workers }} (xodimlarni ko'rish)</a></td>
									<td>{{ \Illuminate\Support\Str::limit($item->parent(), 30, $end='...') }}</td>
									<td>
										<a class="p-2" href="#"  data-toggle="modal" data-target="#bd-example-modal-lg{{$item->id}}"><i class="dw dw-eye"></i></a>
										<a class="p-2" href="#" data-toggle="modal" data-target="#editmodal{{$item->id}}"><i class="dw dw-edit2"></i></a>
										<a class="p-2" type="button" data-toggle="modal" data-target="#confirmation-modal{{$item->id}}" href="#"><i class="dw dw-delete-3"></i> </a>


{{--										<div class="dropdown">--}}
{{--											<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">--}}
{{--												<i class="dw dw-more"></i>--}}
{{--											</a>--}}
{{--											<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">--}}
{{--												<a href="#" class="dropdown-item" data-toggle="modal" data-target="#bd-example-modal-lg{{$item->id}}"><i class="dw dw-eye"></i> Ko'rish </a>--}}
{{--												<a class="dropdown-item" href="#" data-toggle="modal" data-target="#editmodal{{$item->id}}"><i class="dw dw-edit2"></i> Tahrirlash</a>--}}
{{--												<a class="dropdown-item" type="button" data-toggle="modal" data-target="#confirmation-modal{{$item->id}}" href="#"><i class="dw dw-delete-3"></i> O'chirish</a>--}}
{{--											</div>--}}
{{--										</div>--}}
									</td>
								</tr>
								@include('admin.pages.department.delete')
								@include('admin.pages.department.modal')
								@include('admin.pages.department.editmodal')
							@endforeach
							</tbody>
						</table>
					</div>
				</div>
    	</div>

	</div>
</div>


@include('admin.pages.department.createmodal')


@endsection

@section('js')
	<script>
		var uploadField = document.getElementById("InputFileToTheServer_MK");

uploadField.onchange = function() {

    if(this.files[0].size > 5242800){
       alert("Bunday katta hajmdagi ma'lumot yuklashga ruxsat berilmagan. Kichikroq fayl tanlang!");
       this.value = "";
    };
};
	</script>
@endsection
