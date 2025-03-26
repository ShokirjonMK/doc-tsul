@extends('admin.layouts.master')
@section('content')

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
		<div class="min-height-200px">
			<div class="card-box mb-30">
				<form id="form_id_stdep" action="{{route('stdep.store')}}" method="post">
					@csrf
					<input type="hidden" value="{{$department->id}}" name="department">
					<div class="pd-20" style="display: flex; justify-content: space-between;">
						<a href="#" class="text-blue h4" >{{$department->name}}</a> @if($status) {{$staff_boss->fio()}} @endif
						<button class="pr-4 btn btn-primary" type="submit" ><i class="fa fa-save"></i> Saqlash </button>
					</div>
{{--					<div class="row m-2">--}}
{{--						<div class="col-md-12">--}}
{{--							<div class="form-group">--}}
{{--								<label>Bo'lim/Kafedra boshlig'ini tanlang</label>--}}
{{--								<select name="staff_boss_id" class="custom-select2 form-control" placeholder="Tanlang" style="width: 100%; height: 38px;">--}}
{{--									<optgroup label="Faqat boshliq tanlash kerak">--}}
{{--										<option value="0">Tanlang</option>--}}
{{--										@foreach($staff_all as $item)--}}
{{--										<option @if($status) @if( $boss_dep->staff_id == $item->id) selected @endif @endif value="{{$item->id}}">{{$item->fio()}}</option>--}}
{{--										@endforeach--}}
{{--									</optgroup>--}}
{{--								</select>--}}
{{--							</div>--}}
{{--						</div>--}}
{{--						<div class="col-md-12">--}}
{{--							<div class="form-group">--}}
{{--								<label>Xodimlarni belgilang</label>--}}
{{--								<select  name="xodimlar[]" class="custom-select2 form-control" multiple="multiple" style="width: 100%;">--}}
{{--									<optgroup label="Kerakli xodimni qidirib tanlang">--}}
{{--										@foreach($staff_all as $item)--}}
{{--											<option value="{{$item->id}}">{{$item->fio()}}</option>--}}
{{--										@endforeach--}}
{{--									</optgroup>--}}
{{--								</select>--}}
{{--							</div>--}}
{{--						</div>--}}
{{--					</div>--}}
				</form>

			<div class="pb-20 m-2">
				<table class=" data-table-export table stripe hover nowrap">
					<thead>
					<tr>
						<th class="table-plus datatable-nosort">#</th>
						<th>F.I.O</th>
						<th>Telefon</th>
						<th>Pasport</th>
						<th></th>
					</tr>
					</thead>
					<tbody>
					@php $i=1; @endphp
					@foreach($data as $item)
						<tr @if($status)@if($boss_dep->staff_id == $item->id) class="table-success" @endif @endif>
							<td>{{ $i++ }}</td>
							<td> {{ $item->fio() }} </td>
							<td> {{ $item->phone }} </td>
							<td> {{ $item->passport_seira }}{{ $item->passport_number }} </td>
							<td class="last-td">
								<div class="dropdown">
									<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
										<i class="dw dw-more"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
										<a href="{{ route('staff.show' , ['staff' => $item->id]) }}" class="dropdown-item" ><i class="dw dw-eye"></i> Ko'rish </a>
										<a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Tahrirlash</a>
										<a class="dropdown-item" type="button" data-toggle="modal" data-target="#confirmation-modal{{$item->id}}" href="#"><i class="dw dw-delete-3"></i> O'chirish</a>
									</div>
								</div>
							</td>
						</tr>
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
		@if (session('error_allready_recorded'))
		<script type="text/javascript">
		 // $('#sa-test').click(function () {
			$( document ).ready(function() {
				swal(
					{
						type: 'error',
						title: 'Oops...',
						text: 'Allaqachon biriktirilgan!',
					}
				)
			});
		</script>
		@endif
		@if (session('error_not_select'))
		<script type="text/javascript">
		 // $('#sa-test').click(function () {
			$( document ).ready(function() {
				swal(
					{
						type: 'error',
						title: 'Oops...',
						text: 'Hech narsa tanlanmagan!',
					}
				)
			});
		</script>
		@endif

@endsection
