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
                                <li class="breadcrumb-item active" aria-current="page">Statistika</li>
                            </ol>
                        </nav>
                    </div>
                   <div class="col-md-6 col-sm-12 text-right">
                           <a class="p-2 m-2" href="{{route('doc.index')}}" >
                                <i class="icon-copy dw dw-list" style="font-size: 20px"></i>
                              
                           </a>
                           <a class="btn btn-primary " href="{{route('doc.create')}}" role="button" >
                                Yangi hujjat kiritish
                           </a>
                   </div>
                </div>
            </div>
            <div class="faq-wrap">	
                <div class="padding-bottom-30">
                    <div class="card">
                        <div class="card-header">
                            <button class="btn btn-block collapsed" data-toggle="collapse" data-target="#faq2-2">
                                <h4 class="h4 text-blue">Umumiy qidiruv</h4>
                            </button>
                        </div>
                        <div id="faq2-2" class="collapse">
                            <div class="card-body">
                               <form autocomplete="off" id="mk-search" action="{{ route('mk_search') }}" class="" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label> Nomi :</label>
                                                <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label > Raqami :</label>
                                                <input type="text" value="{{ old('number') }}" name="number" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label > Nazoratchi :</label>
                                                <select class="selectpicker form-control" required name="supervisor_id" data-style="btn-outline-primary">
                                                    <option value="0">Barcha</option>
                                                    @foreach ($supervisor as $supervisor_one)
                                                        <option value="{{$supervisor_one->id}}">{{$supervisor_one->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label > Hujjat ta'luqliligi :</label>
                                                <select class="selectpicker form-control" required name="releted_id" data-style="btn-outline-primary">
                                                    <option value="0">Barcha</option>
                                                    @foreach ($releted as $releted_one)
                                                        <option value="{{$releted_one->id}}">{{$releted_one->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label> Hujjat matnidan  :</label>
                                                <textarea type="text" name="word_all" class="form-control"> 
                                                </textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6 row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label> Hujjat turi :</label>
                                                    <select class="selectpicker form-control" required name="type" data-style="btn-outline-primary">
                                                        {{-- <select name="status" required class="custom-select col-12"> --}}
                                                        <option value="2" selected>Barchasi</option>                
                                                        <option value="1">Buyruq</option>
                                                        <option value="0">Kengash qarori</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Davomiyligi</label>
                                                    <select class="selectpicker form-control" required name="duration" data-style="btn-outline-primary">
                                                        {{-- <select name="status" required class="custom-select col-12"> --}} 
                                                        <option value="2" selected>Barchasi</option>                      
                                                        <option value="1">Doimiy</option>
                                                        <option value="0">Muddatli</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label> Muddati (oraliqni belgilang) </label>
                                                    <input class="form-control datetimepicker-range" name="date_range" placeholder="Select Month" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label> Holati </label>
                                                    <select class="selectpicker form-control" required name="status" data-style="btn-outline-primary">
                                                        <option value="2" selected>Barchasi</option>
                                                        <option value="1"  >Amalda</option>
                                                        <option value="0">O'z kuchini yo'qotgan</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="text-right">
                                        <button class="btn btn-primary" role="button" >
                                            <i class="icon-copy dw dw-search" style="font-size: 20px"></i> Izlash
                                        </button>
                                    </div>
                                </form> 
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="row clearfix progress-box">
                <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
                    <div class="card-box pd-30 height-100-p">
                        <div class="progress-box text-center">
                            <input type="text" class="knob dial1" value="300" data-width="100" data-height="100" data-linecap="round" data-thickness="0.12" data-bgColor="#fff" data-fgColor="#1b00ff" data-angleOffset="180" readonly>
                            <h5 class="text-blue padding-top-10 h5">Yangi hujjatlar</h5>
                            <span class="d-block"> {{$count}}  <i class="fa fa-line-chart text-blue"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
                    <div class="card-box pd-30 height-100-p">
                        <div class="progress-box text-center">
                            <input type="text" class="knob dial2" value="300" data-width="100" data-height="100" data-linecap="round" data-thickness="0.12" data-bgColor="#fff" data-fgColor="#00e091" data-angleOffset="180" readonly>
                            <h5 class="text-light-green padding-top-10 h5">Yakunlangan</h5>
                            <span class="d-block"> 300 <i class="fa text-light-green fa-line-chart"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
                    <div class="card-box pd-30 height-100-p">
                        <div class="progress-box text-center">
                            <input type="text" class="knob dial3" value="300" data-width="100" data-height="100" data-linecap="round" data-thickness="0.12" data-bgColor="#fff" data-fgColor="#f56767" data-angleOffset="180" readonly>
                            <h5 class="text-light-orange padding-top-10 h5">Faol hujjatlar</h5>
                            <span class="d-block"> 200 <i class="fa text-light-orange fa-line-chart"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
                    <div class="card-box pd-30 height-100-p">
                        <div class="progress-box text-center">
                            <input type="text" class="knob dial4" value="300" data-width="100" data-height="100" data-linecap="round" data-thickness="0.12" data-bgColor="#fff" data-fgColor="#a683eb" data-angleOffset="180" readonly>
                            <h5 class="text-light-purple padding-top-10 h5"> Bajarilganlar </h5>
                            <span class="d-block"> 200 | 211 <i class="fa text-light-purple fa-line-chart"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12 mb-30">
                    <div class="card-box pd-30 pt-10 height-100-p">
                        <h2 class="mb-30 h4">Hujjat turlari</h2>
                        <div class="browser-visits">
                            {{-- <ul>
                                <li class="d-flex flex-wrap align-items-center">
                                    <div class="icon">
                                        <i  style="color: #1b00ff;" class="icon-copy fa fa-id-badge" aria-hidden="true"></i>
                                    </div>
                                    <div class="browser-name">Professorlar | Dotsentlar soni</div>
                                    <div class="visit"><span class="badge badge-pill badge-primary">12 | 20</span></div>
                                </li>
                                <li class="d-flex flex-wrap align-items-center">
                                    <div class="icon">
                                        <i style="color: #1b00ff;" class="icon-copy fa fa-user-circle-o" aria-hidden="true"></i>
                                    </div>
                                    <div class="browser-name">Fan nomzod | doktorlari soni</div>
                                    <div class="visit"><span class="badge badge-pill badge-secondary">14 | 25</span></div>
                                </li>
                                <li class="d-flex flex-wrap align-items-center">
                                    <div class="icon">
                                        <i style="color: #1b00ff;" class="icon-copy fa fa-star-half-empty" aria-hidden="true"></i>
                                    </div>
                                    <div class="browser-name">Darajasizlar soni</div>
                                    <div class="visit"><span class="badge badge-pill badge-success">26 | 32</span></div>
                                </li>
                                <hr>
                                <li class="d-flex flex-wrap align-items-center">
                                    <div class="icon">
                                        <i style="color: #1b00ff;" class="icon-copy fa fa-dot-circle-o" aria-hidden="true"></i>
                                    </div>
                                    <div class="browser-name">Davlat adliya maslahatchisi</div>
                                    <div class="visit"><span class="badge badge-pill badge-warning">13</span></div>
                                </li>
                                <li class="d-flex flex-wrap align-items-center">
                                    <div class="icon">
                                        <i style="color: #1b00ff;" class="icon-copy ion-ionic"></i>
                                    </div>
                                    <div class="browser-name">Unvonlilar soni</div>
                                    <div class="visit"><span class="badge badge-pill badge-info">32</span></div>
                                </li>
                                <li class="d-flex flex-wrap align-items-center">
                                    <div class="icon">
                                        <i style="color: #1b00ff;" class="icon-copy ion-ionic"></i>
                                    </div>
                                    <div class="browser-name">Unvonsizlar soni</div>
                                    <div class="visit"><span class="badge badge-pill badge-info">21</span></div>
                                </li>
                            </ul> --}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-6 col-sm-12 mb-30">
                    <div class="card-box pd-30 pt-10 height-100-p">
                        <h2 class="mb-30 h4">O'zbekiston xaritasi</h2>
{{--                       <div id="container"></div>--}}
                       <div id="container"></div>
                    </div>
                </div>
            </div>
{{--            <div class="row">--}}
{{--                <div class="col-lg-7 col-md-12 col-sm-12 mb-30">--}}
{{--                    <div class="card-box pd-30 height-100-p">--}}
{{--                        <h4 class="mb-30 h4">Compliance Trend</h4>--}}
{{--                        <div id="compliance-trend" class="compliance-trend"></div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-5 col-md-12 col-sm-12 mb-30">--}}
{{--                    <div class="card-box pd-30 height-100-p">--}}
{{--                        <h4 class="mb-30 h4">Records</h4>--}}
{{--                        <div id="chart" class="chart"></div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="footer-wrap pd-20 mb-20 card-box">
                ShokirjonMK <a href="https://t.me/ShokirjonMK" target="_blank">Bog'lanish</a>

            </div>
        </div>
    </div>
@endsection


@section("js")
    <script src="https://code.highcharts.com/maps/highmaps.js"></script>

   	<script src="{{ asset('js/uzbekistan_chart.js') }}"></script>


 <script>
        // Prepare demo data
// Data is joined to map using value of 'hc-key' property by default.
// See API docs for 'joinBy' for more info on linking data and map.
var data = [
    ['uz-fa', 0],
    ['uz-tk', 1],
    ['uz-an', 2],
    ['uz-ng', 3],
    ['uz-ji', 4],
    ['uz-si', 5],
    ['uz-ta', 6],
    ['uz-bu', 7],
    ['uz-kh', 8],
    ['uz-qr', 9],
    ['uz-nw', 10],
    ['uz-sa', 11],
    ['uz-qa', 12],
    ['uz-su', 13]
];

// Create the chart
Highcharts.mapChart('container', {
    chart: {
        map: 'countries/uz/uz-all'
    },

    title: {
        text: 'O\'zbekiston'
    },

    subtitle: {
        text: 'Xaritasi '
    },

    mapNavigation: {
        enabled: true,
        buttonOptions: {
            verticalAlign: 'bottom'
        }
    },

    colorAxis: {
        min: 0
    },

    series: [{
        data: data,
        name: 'Test',
        states: {
            hover: {
                color: '#BADA55'
            }
        },
        dataLabels: {
            enabled: true,
            format: '{point.name}'
        }
    }]
});

    </script>


    <script>
         $("text.highcharts-credits").empty();
    //highcharts-credits
    </script>

    <script>
        $(".dial1").knob();
        $({animatedVal: 0}).animate({animatedVal: 80}, {
            duration: 3000,
            easing: "swing",
            step: function() {
                $(".dial1").val(Math.ceil(this.animatedVal)).trigger("change");
            }
        });

        $(".dial2").knob();
        $({animatedVal: 0}).animate({animatedVal: 50}, {
            duration: 3000,
            easing: "swing",
            step: function() {
                $(".dial2").val(Math.ceil(this.animatedVal)).trigger("change");
            }
        });

        $(".dial3").knob();
        $({animatedVal: 0}).animate({animatedVal: 60}, {
            duration: 3000,
            easing: "swing",
            step: function() {
                $(".dial3").val(Math.ceil(this.animatedVal)).trigger("change");
            }
        });

        $(".dial4").knob();
        $({animatedVal: 0}).animate({animatedVal: 30}, {
            duration: 3000,
            easing: "swing",
            step: function() {
                $(".dial4").val(Math.ceil(this.animatedVal)).trigger("change");
            }
        });
    </script>


    @endsection
