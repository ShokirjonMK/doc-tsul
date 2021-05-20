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
                        <h4>
                            {{$data->name}}
                            <i onclick="return open('{{asset($data->document)}}', 'ShokirjonMK', 'width=900,height=500,left=500,top=200')" class="icon-copy dw dw-download1 ml-5 pointer"></i>
                        </h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('mk')}}">Bosh</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{$data->name}} 
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <div class="title">
                        <h4>Muddati {{$data->end_date}} gacha</h4>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-9">
                <div class="pd-20 card-box mb-30">
                    <div class="clearfix row mb-2">
                        <div class="col-md-12">
                            <h4 class=" h4" >Hujjatning to'liq matni  <i onclick="return open('{{asset($data->generatedpdf)}}', 'ShokirjonMK', 'width=900,height=500,left=500,top=200')" class="icon-copy dw dw-download1 ml-5 pointer"></i></h4>
                                    @php echo $data->word_all; @endphp
                            {{-- <p>{{$data->word_all}}</p> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="pd-20 card-box mb-30">
                    <div class="clearfix row mb-2">
                        <div class="col-md-12">
                            <h4 class=" h4" >Barcha loyiha kirituvchilar: </h4>
                            @foreach ($attached as $attached_one)
                            <h4 class="text-blue h4" >
                                {{$attached_one->getuserfio()}} {{$attached_one->end_date}} 
                                @if ($attached_one->with_file == 1)
                                <i onclick="return open('{{asset($attached_one->document)}}', 'ShokirjonMK', 'width=900,height=500,left=500,top=200')" class="icon-copy dw dw-download1 pointer"></i>
                                @endif
                            </h4>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>
                @foreach ($attached_with as $attached_one)
                <div class="pd-20 card-box mb-30">
                    <div class="clearfix row mb-2">
                        <div class="col-md-12">
                            <div class="pull-left">
                                <h4 class="text-blue h4" >
                                    {{$attached_one->getuserfio()}} {{$attached_one->end_date}}                              
                                @if ($attached_one->with_file == 1)
                                    <i onclick="return open('{{asset($attached_one->document)}}', 'ShokirjonMK', 'width=900,height=500,left=500,top=200')" class="icon-copy dw dw-download1 ml-5 pointer"></i>
                                @endif
                                </h4>
                                @php echo $attached_one->word; @endphp
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

        <iframe id="mkiframePdfshow" style=" width: 100%; height: 600px;" src="{{asset($data->document)}}" class="document-mk" ></iframe>
        
    </div>
</div>
@endsection

@section('js')
<script>

    // window.open('https://javascript.info');


// button.onclick = () => {
//   window.open('https://javascript.info');
// };

</script>

@endsection