@extends('mk.layouts.master')
@section('link')
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/src/plugins/switchery/switchery.min.css') }}"> --}}
    {{-- <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script> --}}
@endsection
@section('content')
	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Asosiy</h4>
                        </div>
                         <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('mk')}}">Bosh</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Muhokama uchun yangi hujjat kiritish</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <button class="btn btn-primary" form="form-doc-mk" role="button" >
                            Saqlash
                        </button>
                    </div>
                   
                </div>
            </div>

            <form autocomplete="off" id="form-doc-mk" action="{{ route('doc-com.store') }}" class="" method="post" enctype="multipart/form-data">
                @csrf
                @include('mk.pages.doccom.form')


            </form>
		</div>
	</div>
@endsection

@section('js')

    {{-- <script src="{{ asset('assets/admin/src/plugins/switchery/switchery.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/admin/vendors/scripts/advanced-components.js') }}"></script> --}}

@endsection