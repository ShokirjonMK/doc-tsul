@extends('mk.layouts.master')
@section('link')
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
                                <li class="breadcrumb-item"><a href="{{route('doc')}}">Bosh</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Yangi hujjat kiritish</li>
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

            <form autocomplete="off" id="form-doc-mk" action="{{ route('doc.store') }}" class="" method="post" enctype="multipart/form-data">
                @csrf
                @include('mk.pages.doc.form')


            </form>
		</div>
	</div>
@endsection

@section('js')

@endsection