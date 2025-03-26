@extends('mk.layouts.master')
{{-- <script src="https://code.highcharts.com/maps/modules/exporting.js"></script> --}}
{{-- <script src="https://code.highcharts.com/mapdata/countries/uz/uz-all.js"></script> --}}
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
                                <li class="breadcrumb-item"><a href="{{ route('mk') }}">Bosh</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Statistika</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <a class="p-2 m-2" href="{{ route('doc.index') }}">
                            <i class="icon-copy dw dw-list" style="font-size: 20px"></i>

                        </a>
                        <a class="btn btn-primary " href="{{ route('doc.create') }}" role="button">
                            Yangi hujjat kiritish
                        </a>
                    </div>
                </div>
            </div>
            <div class="faq-wrap">
                <div class="padding-bottom-30">
                    <div class="card">
                        <div class="card-header">
                            <button class="btn btn-block collaps" data-toggle="collapse" data-target="#faq2-2">
                                <h4 class="h4 text-blue">Umumiy qidiruv</h4>
                            </button>
                        </div>
                        <div id="faq2-2" class="show">
                            <div class="card-body">
                                <form autocomplete="off" id="mk-search" action="{{ route('mk_search') }}" class=""
                                    method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label> Nomi :</label>
                                                <input type="text" name="name" value="{{ old('name') }}"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label> Raqami :</label>
                                                <input type="text" value="{{ old('number') }}" name="number"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label> Nazoratchi :</label>
                                                <select class="selectpicker form-control" required name="supervisor_id"
                                                    data-style="btn-outline-primary">
                                                    <option value="0">Barcha</option>
                                                    @foreach ($supervisor as $supervisor_one)
                                                        <option value="{{ $supervisor_one->id }}">
                                                            {{ $supervisor_one->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label> Hujjat ta'luqliligi :</label>
                                                <select class="selectpicker form-control" required name="releted_id"
                                                    data-style="btn-outline-primary">
                                                    <option value="0">Barcha</option>
                                                    @foreach ($releted as $releted_one)
                                                        <option value="{{ $releted_one->id }}">{{ $releted_one->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label> Hujjat matnidan :</label>
                                                <textarea type="text" style="height: 140px;" name="word_all" class="form-control"> 
                                                </textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6 row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label> Hujjat turi :</label>
                                                    <select class="selectpicker form-control" required name="type"
                                                        data-style="btn-outline-primary">
                                                        {{-- <select name="status" required class="custom-select col-12"> --}}
                                                        <option value="3" selected>Barchasi</option>
                                                        <option value="1">Buyruq</option>
                                                        <option value="0">Kengash qarori</option>
                                                        <option value="2">Memorandum</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Davomiyligi</label>
                                                    <select class="selectpicker form-control" required name="duration"
                                                        data-style="btn-outline-primary">
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
                                                    <input class="form-control datetimepicker-range" name="date_range"
                                                        placeholder="Select Month" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label> Holati </label>
                                                    <select class="selectpicker form-control" required name="status"
                                                        data-style="btn-outline-primary">
                                                        <option value="2" selected>Barchasi</option>
                                                        <option value="1">Amalda</option>
                                                        <option value="0">O'z kuchini yo'qotgan</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="text-right">
                                        <button class="btn btn-primary" role="button">
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
                            <input type="text" class="knob dial4" value="300" data-width="100" data-height="100"
                                data-linecap="round" data-thickness="0.12" data-bgColor="#fff" data-fgColor="#a683eb"
                                data-angleOffset="180" readonly>
                            <h5 class="text-light-purple padding-top-10 h5"> Buyruq / Kengash qarori / Memorandum </h5>
                            <span class="d-block"> {{ $buyruq }} / {{ $kengash }} / {{ $memorandum }} <i
                                    class="fa text-light-purple fa-line-chart"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
                    <div class="card-box pd-30 height-100-p">
                        <div class="progress-box text-center">
                            <input type="text" class="knob dial2" value="300" data-width="100" data-height="100"
                                data-linecap="round" data-thickness="0.12" data-bgColor="#fff" data-fgColor="#00e091"
                                data-angleOffset="180" readonly>
                            <h5 class="text-light-green padding-top-10 h5">Faol hujjatlar</h5>
                            <span class="d-block"> {{ $faol }} <i
                                    class="fa text-light-green fa-line-chart"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
                    <div class="card-box pd-30 height-100-p">
                        <div class="progress-box text-center">
                            <input type="text" class="knob dial1" value="300" data-width="100" data-height="100"
                                data-linecap="round" data-thickness="0.12" data-bgColor="#fff" data-fgColor="#1b00ff"
                                data-angleOffset="180" readonly>
                            <h5 class="text-blue padding-top-10 h5">Doimiy / Muddatli hujjatlar</h5>
                            <span class="d-block"> {{ $doimiy }} / {{ $muddatli }} <i
                                    class="fa fa-line-chart text-blue"></i></span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
                    <div class="card-box pd-30 height-100-p">
                        <div class="progress-box text-center">
                            <input type="text" class="knob dial3" value="300" data-width="100" data-height="100"
                                data-linecap="round" data-thickness="0.12" data-bgColor="#fff" data-fgColor="#f56767"
                                data-angleOffset="180" readonly>
                            <h5 class="text-light-orange padding-top-10 h5"> Faol bo'lmaganlar </h5>
                            <span class="d-block"> {{ $yakunlangan }} <i
                                    class="fa text-light-orange fa-line-chart"></i></span>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12 mb-30">
                    <div class="card-box pd-30 pt-10 height-100-p">
                        <h2 class="mb-30 h4">Hujjat ta'luqliligi bo'yicha holati</h2>
                        <div class="browser-visits">
                            <ul>
                                <li class="d-flex flex-wrap align-items-center">
                                    <div class="icon">
                                        <span style="color: #1b00ff;" class="icon-copy ti-slice"></span>

                                    </div>
                                    <div class="browser-name">O'quv yo'nalish</div>
                                    <div class="visit"><span
                                            class="badge badge-pill badge-primary">{{ $doc->where('releted_id', 1)->count() }}</span>
                                    </div>
                                </li>
                                <li class="d-flex flex-wrap align-items-center">
                                    <div class="icon">

                                        <span style="color: #1b00ff;" class="icon-copy ti-signal"></span>
                                        {{-- <i  class="icon-copy fa fa-user-circle-o" aria-hidden="true"></i> --}}
                                    </div>
                                    <div class="browser-name">Ilmiy yo'nalish</div>
                                    <div class="visit"><span
                                            class="badge badge-pill badge-secondary">{{ $doc->where('releted_id', 2)->count() }}</span>
                                    </div>
                                </li>
                                <li class="d-flex flex-wrap align-items-center">
                                    <div class="icon">
                                        <i style="color: #1b00ff;" class="icon-copy fa fa-star-half-empty"
                                            aria-hidden="true"></i>
                                    </div>
                                    <div class="browser-name">Ma'naviy yo'nalish</div>
                                    <div class="visit"><span
                                            class="badge badge-pill badge-success">{{ $doc->where('releted_id', 3)->count() }}</span>
                                    </div>
                                </li>

                                <li class="d-flex flex-wrap align-items-center">
                                    <div class="icon">
                                        <i style="color: #1b00ff;" class="icon-copy fa fa-dot-circle-o"
                                            aria-hidden="true"></i>
                                    </div>
                                    <div class="browser-name">Xalqaro yo'nalish</div>
                                    <div class="visit"><span
                                            class="badge badge-pill badge-warning">{{ $doc->where('releted_id', 4)->count() }}</span>
                                    </div>
                                </li>
                                <li class="d-flex flex-wrap align-items-center">
                                    <div class="icon">
                                        <i style="color: #1b00ff;" class="icon-copy ion-ionic"></i>
                                    </div>
                                    <div class="browser-name">Kadr yo'nalishi</div>
                                    <div class="visit"><span
                                            class="badge badge-pill badge-info">{{ $doc->where('releted_id', 5)->count() }}</span>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-6 col-sm-12 mb-30">
                    <div class="bg-white pd-20 card-box mb-30 h-100">
                        <div id="chart5"></div>
                    </div>
                </div>
            </div>







            <div class="footer-wrap pd-20 mb-20 card-box">
                <a href="https://t.me/ShokirjonMK" style="text-decoration: none" target="_blank">TOSHKENT DAVLAT YURIDIK
                    UNIVERSITETI
                    "ELEKTRON UNIVERSITET" MARKAZI</a>
            </div>
        </div>
    </div>
@endsection


@section('js')
    {{-- <script src="https://code.highcharts.com/maps/highmaps.js"></script> --}}

    {{-- <script src="{{ asset('assets/admin/vendors/scripts/apexcharts-setting.js') }}"></script> --}}
    <script>
        Highcharts.chart('chart5', {
            title: {
                text: 'Statistika'
            },
            xAxis: {
                // categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            series: [{
                type: 'pie',
                allowPointSelect: true,
                keys: ['name', 'y', 'selected', 'sliced'],
                data: [
                    ['Kadr yo\'nalish', {{ $doc->where('releted_id', 5)->count() }}, false],
                    ['Ilmiy yo\'nalish', {{ $doc->where('releted_id', 2)->count() }}, false],
                    ['Ma\'naviy yo\'nalish', {{ $doc->where('releted_id', 3)->count() }}, false],
                    ['O\'quv yo\'nalish', {{ $doc->where('releted_id', 1)->count() }}, true, true],
                    ['Xalqaro yo\'nalish', {{ $doc->where('releted_id', 4)->count() }}, false]

                ],
                showInLegend: true
            }]
        });
    </script>



    <script>
        $("text.highcharts-credits").empty();
        //highcharts-credits
    </script>

    <script>
        $(".dial1").knob();
        $({
            animatedVal: 0
        }).animate({
            animatedVal: {{ $doimiy_f }}
        }, {
            duration: 3000,
            easing: "swing",
            step: function() {
                $(".dial1").val(Math.ceil(this.animatedVal)).trigger("change");
            }
        });

        $(".dial2").knob();
        $({
            animatedVal: 0
        }).animate({
            animatedVal: {{ $faol_f }}
        }, {
            duration: 3000,
            easing: "swing",
            step: function() {
                $(".dial2").val(Math.ceil(this.animatedVal)).trigger("change");
            }
        });

        $(".dial3").knob();
        $({
            animatedVal: 0
        }).animate({
            animatedVal: {{ $yakunlangan_f }}
        }, {
            duration: 3000,
            easing: "swing",
            step: function() {
                $(".dial3").val(Math.ceil(this.animatedVal)).trigger("change");
            }
        });

        $(".dial4").knob();
        $({
            animatedVal: 0
        }).animate({
            animatedVal: {{ $buyruq_f }}
        }, {
            duration: 3000,
            easing: "swing",
            step: function() {
                $(".dial4").val(Math.ceil(this.animatedVal)).trigger("change");
            }
        });
    </script>
@endsection
