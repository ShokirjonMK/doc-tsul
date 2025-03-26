@extends('admin.layouts.master')
@section('content')

    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="card-box mb-30">
                    <div class="pd-20" style="display: flex; justify-content: space-between;">
                        <a href="#" class="text-blue h4"  >Bo'limlar  </a>
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
                                <th>Ishchilar soni</th>
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
                                    <td><a href="{{route('department.show',['department'=>$item->id])}}" >{{ $item->name }} </a></td>
                                    <td ><a href="{{route('stdep.show',['stdep'=>$item->id])}}"> {{ $item->count_workers }} ko'rish/biriktirish </a></td>
                                    <td>{{ $item->parent()}}</td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                <i class="dw dw-more"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                <a href="#" class="dropdown-item" data-toggle="modal" data-target="#bd-example-modal-lg{{$item->id}}"><i class="dw dw-eye"></i> Ko'rish </a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#editmodal{{$item->id}}"><i class="dw dw-edit2"></i> Tahrirlash</a>
                                                <a class="dropdown-item" type="button" data-toggle="modal" data-target="#confirmation-modal{{$item->id}}" href="#"><i class="dw dw-delete-3"></i> O'chirish</a>
                                            </div>
                                        </div>
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

@endsection
