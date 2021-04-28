@extends('mk.layouts.master')
@section('title')
{{$data->name}}
@endsection
@section('link')
@endsection
@section('content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>{{$data->name}}</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('mk')}}">Bosh</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$data->name}}</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <div class="title">
                        <h4>{{$data->end_date}}</h4>
                    </div>
                </div>

            </div>
        </div>
        <div class="pd-20 card-box mb-30">
            <div class="clearfix row mb-2">
                <div class="col-md-6">
                    <div class="pull-left">
                        @foreach ($attached_without as $without)
                            
                        <h4 class="text-blue h4">{{$without->userget}}</h4>
                        @endforeach
                    </div>
                </div>
                
                
            </div>


        </div>
        <iframe id="mkiframePdfshow" style=" width: 100%; height: 600px;" src="{{asset($data->document)}}" class="document-mk" ></iframe>
        
    </div>
</div>
@endsection

@section('js')
@endsection