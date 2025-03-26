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
                                <li class="breadcrumb-item active" aria-current="page">Hujjatlar</li>
                            </ol>
                        </nav>
                    </div>
                    @if (Auth::user()->role != 555)
                        <div class="col-md-6 col-sm-12 text-right">
                            <a class="btn btn-primary " href="{{ route('doc.create') }}" role="button">
                                Yangi hujjat kiritish
                            </a>
                        </div>
                    @endif
                </div>
            </div>

            <div class="card-box mb-30">
                <div class="pd-20" style="display: flex; justify-content: space-between;">
                    <a href="#" class="text-blue h4">Hujjatlar </a>
                    <a href="{{ route('doc.create') }}" class="pr-4 btn btn-primary"><i class="fa fa-plus"></i>
                        Yangi hujjat kiritish </a>
                </div>

                {{-- <form method="GET" action="{{ route('doc.index') }}" class="mb-3 ml-5">
                    <div class="row">
                        <!-- Bitirgan yili filter -->
                        <div class="col-md-2">
                            <label for="graduated_year">Bitirgan yili</label>
                            <select name="graduated_year" id="graduated_year" class="form-control">
                                <option value="">Barchasi</option>
                                @foreach (range(date('Y'), 1990) as $year)
                                    <option value="{{ $year }}"
                                        {{ request('graduated_year') == $year ? 'selected' : '' }}>
                                        {{ $year }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Ta'lim turi filter (EduType model orqali) -->
                        <div class="col-md-2">
                            <label for="education_type">Ta'lim turi</label>
                            <select name="education_type" id="education_type" class="form-control">
                                <option value="">Barchasi</option>
                                @foreach ($eduTypes as $eduType)
                                    <option value="{{ $eduType->id }}"
                                        {{ request('education_type') == $eduType->id ? 'selected' : '' }}>
                                        {{ $eduType->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="education_form">Ta'lim shakli</label>
                            <select name="education_form" id="education_form" class="form-control">
                                <option value="">Barchasi</option>
                                @foreach ($eduForms as $eduForm)
                                    <option value="{{ $eduForm->id }}"
                                        {{ request('education_form') == $eduForm->id ? 'selected' : '' }}>
                                        {{ $eduForm->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="fio">F.I.O bo‘yicha qidirish
                                <i class="fa fa-info-circle text-primary" data-toggle="tooltip" data-placement="top"
                                    title="Masalan: 'abd sher' deb qidirsangiz 'Abdiyev Sherzod' natija chiqadi."></i>
                            </label>
                            <input type="text" name="fio" id="fio" class="form-control"
                                value="{{ request('fio') }}" placeholder="Ism, familiya yoki otasining ismi">
                        </div>



                        <!-- Qidirish tugmasi -->
                        <div class="col-md-2 align-self-end">
                            <button type="submit" class="btn btn-primary">Filtrlash</button>
                            <a href="{{ route('student.index') }}" class="btn btn-secondary">Tozalash</a>
                        </div>
                        <div class="col-md-2 align-self-end">
                            <a href="{{ route('students.export-excel', request()->query()) }}" class="btn btn-success">
                                <i class="fas fa-file-excel"></i> Excel
                            </a>

                        </div>
                    </div>
                </form> --}}

                <div class="pb-20">
                    <table class=" data-table-export table stripe hover  p-2">
                        <thead>
                            <tr>
                                <th>#</th>
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
                            @foreach ($data as $key => $item)
                                @if ($item->status == 0)
                                    @php $item->statusclass = 'table-secondary'@endphp
                                @endif
                                @if ($item->end_date == date('Y-m-d'))
                                    @php $item->statusclass = 'table-danger'@endphp
                                @endif
                                @if ($item->end_date == date('Y-m-d', strtotime('+1 day')))
                                    @php $item->statusclass = 'table-warning'@endphp
                                @endif
                                @if ($item->end_date > date('Y-m-d', strtotime('+1 day')))
                                    @php $item->statusclass = 'table-info' @endphp
                                @endif
                                <tr class="{{ $item->statusclass }}">
                                    <td>{{ $data->firstItem() + $key }}</td>
                                    <td data-toggle="tooltip" title="{{ $item->name }}"><a
                                            href="{{ route('doc.show', $item->id) }}">
                                            {{ $item->short_name }}
                                        </a>
                                    </td>
                                    <td style="width: 10px !important;"><i
                                            onclick="return open('{{ asset($item->document) }}', 'ShokirjonMK', 'width=900,height=500,left=500,top=200')"
                                            class="icon-copy dw dw-download1 pointer"></i></td>
                                    <td>{{ $item->number }}</td>
                                    <td style="width: 107px !important;">{{ $item->end_date }}</td>
                                    <td>
                                        @isset($item->releted->name)
                                            {{ $item->releted->name }}
                                        @endisset
                                    </td>
                                    <td>
                                        @isset($item->supervisor->name)
                                            {{ $item->supervisor->name }}
                                        @endisset
                                    </td>
                                    <td>
                                        {{ $item->getType() }}
                                    </td>
                                    <td>
                                        {{ $item->getDuration() }}
                                    </td>
                                    <td>
                                        @if ($item->status == 1)
                                            {{ 'Amalda' }}
                                        @elseif ($item->status == 0)
                                            {{ "O'z kuchini yo'qotgan" }}
                                        @endif
                                    </td>
                                    {{-- <td class="last-td">
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                            <i class="dw dw-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <a href="#" class="dropdown-item" ><i class="dw dw-eye"></i> Ko'rish </a>
                                            <a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Tahrirlash</a>
                                            <a class="dropdown-item"  href="#"><i class="dw dw-delete-3"></i> O'chirish</a>
                                        </div>
                                    </div>
                                </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-between align-items-center mt-3 ml-5 mr-5">
                        <div>
                            <strong>Jami hujjatlar soni: {{ $data->total() }}</strong>
                        </div>
                        <div>
                            {{ $data->links() }}
                        </div>
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
    <script>
        $(document).ready(function() {
            let table = $('.data-table-export').DataTable();
            table.destroy(); // Avvalgi DataTable'ni o‘chirish
            $('.data-table-export').DataTable({
                "paging": false, // Sahifalashni o‘chirish
                "info": false, // Pastki yozuvlarni yashirish
                "ordering": false, // Saralashni o‘chirish
                "searching": false // Qidiruvni o‘chirish
            });
        });
    </script>

    <script src="{{ asset('assets/admin/src/plugins/datatables/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/admin/src/plugins/datatables/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/admin/src/plugins/datatables/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/admin/src/plugins/datatables/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/admin/src/plugins/datatables/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/admin/src/plugins/datatables/js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/admin/src/plugins/datatables/js/vfs_fonts.js') }}"></script>
@endsection
