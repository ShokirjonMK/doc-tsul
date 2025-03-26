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
                        <div class="title">
                            <h4>Asosiy</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('mk')}}">Bosh</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Hujjatlar</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Hujjatlar</h4>
					</div>
					<div class="pb-20">
						<table class=" data-table-export table stripe hover nowrap p-2">
                            <thead>
                            <tr>
                                <th class="table-plus datatable-nosort">#</th>
                                <th>Nomi</th>
                                <th>Raqami</th>
                                <th>Muddati</th>
                                <th class="text-center">Fayl</th>
                                <th>Holati</th>
                                {{-- <th></th> --}}
                            </tr>
                            </thead>
                            <tbody>
                            @php $i=1; @endphp
                            @foreach($data as $item)
                            @if ($item->status == 0)
                                @php $item->statusclass = 'table-secondary'@endphp
                            @endif
                            @if ($item->end_date == date("Y-m-d"))
                                  @php $item->statusclass = 'table-danger'@endphp
                            @endif
                            @if ($item->end_date == date("Y-m-d", strtotime("+1 day")))
                                  @php $item->statusclass = 'table-warning'@endphp
                            @endif
                            @if ($item->end_date > date("Y-m-d", strtotime("+1 day")))
                                  @php $item->statusclass = 'table-info' @endphp
                            @endif
                                <tr>
                                <tr class="{{$item->statusclass}}">
                                    <td>{{$i++}}</td>
                                    <td><a href="{{route('mk.doc.myshow', ['id' => $item->doc->id])}}">{{$item->doc->name}}</a></td>
                                    <td>{{$item->doc->number}}</td>
                                    <td>{{$item->end_date}}</td>
                                    @if ($item->document)
                                        <td><i onclick="return open('{{asset($item->document)}}', 'ShokirjonMK', 'width=900,height=500,left=500,top=200')" class="icon-copy dw dw-download1 ml-5 pointer"></i></td>
                                    @else
                                        <td><i onclick="return open('{{asset($item->doc->document)}}', 'ShokirjonMK', 'width=900,height=500,left=500,top=200')" class="icon-copy dw dw-download1 ml-5 pointer"></i></td>
                                        @endif
                                    <td>@if ($item->status == 1)
                                        {{'Faol'}}
                                        @elseif ($item->status == 0)
                                        {{"Nofaol"}}
                                    @endif</td>
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
