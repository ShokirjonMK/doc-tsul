@extends('mk.layouts.master')
{{--<script src="https://code.highcharts.com/maps/modules/exporting.js"></script>--}}
{{--<script src="https://code.highcharts.com/mapdata/countries/uz/uz-all.js"></script>--}}
<script src="https://code.highcharts.com/maps/highmaps.js"></script>
@section('content')
    <div class="main-container">
        <div class="xs-pd-20-10 pd-ltr-20">
            {{-- <div class="page-header">
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
                   <div class="col-md-6 col-sm-12 text-right">
                           <a class="btn btn-primary " href="{{route('doc.create')}}" role="button" >
                                Yangi hujjat kiritish
                           </a>
                   </div>
                </div>
            </div> --}}

            <div class="card-box mb-30">
                    <div class="pd-20 row">
                        <div class="col-md-6">
                            <h4 class="text-blue h4">"{{$search}}" bo'yicha qidiruv natijasi</h4>
                        </div>
                        <div class="col-md-6 text-right">
                            <a class="p-2 m-2" href="@if($status) {{route('mk')}}@else{{route('doc.index')}}@endif" >
                                {{-- <i class="icon-copy dw dw-list" style="font-size: 20px"></i> --}}
                              <i class="icon-copy dw dw-refresh2" style="font-size: 20px"> tozalash </i>
                           </a>
                          
                        </div>
                    </div>
                    <div class="pb-20">
                        <table class=" data-table-export table stripe hover p-2">
                            <thead>
                                <tr>
                                    <th >#</th>
                                    <th>Nomi</th>
                                    <th class="table-plus datatable-nosort" style="width: 10px !important;"></th>
                                    <th>Raqami</th>
                                    <th style="width: 30px !important;">Muddati</th>
                                    <th>Ta'luqliligi</th>
                                    <th>Nazoratchi</th>
                                    <th>Turi</th>
                                    <th>Davomiyligi</th>
                                    <th>Holati</th>
                                    {{-- <th></th> --}}
                                </tr>
                            </thead>
                            <tbody>
                            @php $i=1; @endphp
                            @foreach($data as $item)
                                    @php $statusclass = '' @endphp
                            @if ($item->status == 0)
                                @php $statusclass = 'table-secondary'@endphp
                            @endif
                            @if ($item->end_date == date("Y-m-d"))
                                  @php $statusclass = 'table-danger'@endphp
                            @endif
                            @if ($item->end_date == date("Y-m-d", strtotime("+1 day")))
                                  @php $statusclass = 'table-warning'@endphp
                            @endif
                            @if ($item->end_date > date("Y-m-d", strtotime("+1 day")))
                                  @php $statusclass = 'table-info' @endphp
                            @endif
                                <tr class="{{$statusclass}}">
                                    <td>{{$i++}}</td>
                                    <td><a href="{{route('doc.show', $item->id)}}">

                                        {{$item->name}}

                                    </a></td>
                                    <td style="width: 10px !important;"><i onclick="return open('{{asset($item->document)}}', 'ShokirjonMK', 'width=900,height=500,left=500,top=200')" class="icon-copy dw dw-download1 pointer"></i></td>
                                    <td>{{$item->number}}</td>
                                    <td style="width: 30px !important;">{{$item->end_date}}</td>
                                    <td>@isset($item->releted)
                                        {{$item->releted}}
                                        @endisset
                                    </td>
                                    <td>@isset($item->supervisor)
                                        {{$item->supervisor}}
                                        @endisset
                                    </td>
                                    <td>
                                        {{-- {{$item->type}} --}}
                                         @if ($item->type == 1)
                                        {{'Buyruq'}}
                                        @elseif ($item->type == 0)
                                        {{"Kengash qarori"}}
                                        @endif
                                    </td>
                                    <td>
                                        {{-- {{$item->duration}} --}}
                                        @if ($item->duration == 1)
                                        {{'Davomiy'}}
                                        @elseif ($item->duration == 0)
                                        {{"Muddatli"}}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->status == 1)
                                        {{'Amalda'}}
                                        @elseif ($item->status == 0)
                                        {{"O'z kuchini yo'qotgan"}}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                                        
            <div class="footer-wrap pd-20 mb-20 card-box">
                 <a href="https://t.me/ShokirjonMK" style="text-decoration: none" target="_blank">TOSHKENT DAVLAT YURIDIK UNIVERSITETI
                    "ELEKTRON UNIVERSITET" MARKAZI</a>
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
