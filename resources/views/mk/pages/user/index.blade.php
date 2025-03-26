@extends('mk.layouts.master')
{{--<script src="https://code.highcharts.com/maps/modules/exporting.js"></script>--}}
{{--<script src="https://code.highcharts.com/mapdata/countries/uz/uz-all.js"></script>--}}
<script src="https://code.highcharts.com/maps/highmaps.js"></script>
@section('content')
    <div class="main-container">
        <div class="xs-pd-20-10 pd-ltr-20">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        {{-- <div class="title">
                            <h4>Asosiy</h4>
                        </div> --}}
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('mk')}}">Bosh</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Foydalanuvchilar</li>
                            </ol>
                        </nav>
                    </div>
                   <div class="col-md-6 col-sm-12 text-right">
						<a class="btn btn-primary " href="{{route('user.create')}}" role="button" >
							Yangi foydalanuvchi kiritish
						</a>
                   </div>

				   

                </div>
            </div>
			<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Data Table with Export Buttons</h4>
					</div>
					<div class="pb-20">
						<table class="table hover data-table-export nowrap">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">#</th>
									<th>F.I.O</th>
									<th>Bo'linma</th>
									<th>Username</th>
									<th>Holati</th>
									<th class="table-plus datatable-nosort"></th>
								</tr>
							</thead>
							<tbody>
								@php $i=1; @endphp
							@foreach($data as $item)

							@if ($item->status == 0)
								@php $item->statusclass = 'table-secondary'@endphp
							@endif
								<tr class="{{$item->statusclass}}">
									<td>{{$i++}}</td>
									<td><a href="{{route('user.show', $item->id)}}">{{$item->getfio()}}</a></td>
									<td>
{{--									{{ \Illuminate\Support\Str::limit($item->department->name, 50, $end='...') }}--}}
										{{ \Illuminate\Support\Str::limit($item->department->name, 150, $end='...') }}
									</td>
									<td>{{$item->username}}</td>
									<td>@if ($item->status == 1)
										{{'Faol'}}
										@elseif ($item->status == 0)
										{{"Nofaol"}}
									@endif</td>
									<td>
										<a class="p-1" href="{{route('user.show',$item->id)}}"><i class="dw dw-eye"></i></a>
										<a class="p-1" href="{{route('user.edit', $item->id)}}" ><i class="dw dw-edit2"></i></a>
{{--										<a class="p-1" href="{{route('user.delete', $item->id)}}"><i class="dw dw-delete-3"></i> </a>--}}
									</td>
								</tr>
							@endforeach
							</tbody>
						</table>
				</div>
			</div>
        
        </div>
    </div>
@endsection


@section("js")
	<script src="{{asset('assets/admin/src/plugins/datatables/js/dataTables.buttons.min.js')}}"></script>
	<script src="{{asset('assets/admin/src/plugins/datatables/js/buttons.bootstrap4.min.js')}}"></script>
	<script src="{{asset('assets/admin/src/plugins/datatables/js/buttons.print.min.js')}}"></script>
	<script src="{{asset('assets/admin/src/plugins/datatables/js/buttons.html5.min.js')}}"></script>
	<script src="{{asset('assets/admin/src/plugins/datatables/js/buttons.flash.min.js')}}"></script>
	<script src="{{asset('assets/admin/src/plugins/datatables/js/pdfmake.min.js')}}"></script>
	<script src="{{asset('assets/admin/src/plugins/datatables/js/vfs_fonts.js')}}"></script>
@endsection
