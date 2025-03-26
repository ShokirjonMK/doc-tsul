@extends('mk.layouts.master')
@section('title')
{{$data->getfio()}} 
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
                           Foydalanuvchi tahrirlash  <a class="ml-2 p-1" href="{{route('user.show', $data->id)}}" ><i class="dw dw-eye"></i></a>
                            {{-- <i onclick="return open('{{asset($data->document)}}', 'ShokirjonMK', 'width=900,height=500,left=500,top=200')" class="icon-copy dw dw-download1 ml-5 pointer"></i> --}}
                        </h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('mk')}}">Bosh</a></li>
                            <li class="breadcrumb-item"><a href="{{route('user.index')}}">Foydalanuvchilar</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                            {{$data->getfio()}} 
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="pd-20 card-box mb-30">
                    <form action="{{ route('user.update', ['user' => $data->id]) }}"  method="POST" enctype="multipart/form-data">
                        @csrf
						@method('PUT')
						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label><span>*</span>Familiya :
												<span class="error">
													@error('last_name')
													{{ $message }}
													@enderror
												</span>
											</label>
											<input   type="text" class="form-control" name="last_name" value="{{ $data->last_name }}">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label><span>*</span>Ism :
												<span class="error">
													@error('first_name')
													{{ $message }}
													@enderror
												</span>
											</label>
											<input   type="text" class="form-control" name="first_name" value="{{ $data->first_name}}">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Sharif :
												<span class="error">
													@error('middle_name')
													{{ $message }}
													@enderror
												</span>
											</label>
											<input   type="text" class="form-control" name="middle_name" value="{{ $data->middle_name }}">
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label><span>*</span>Telefon :
										<span class="error">
											@error('phone')
											{{ $message }}
											@enderror
												</span>
									</label>
									<input   type="text" class="form-control phone" maxlength="10" placeholder="99 9999999" name="phone" value="{{ $data->phone }}">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label><span>*</span>Bo'linma :
										<span class="error">
													@error('department')
											{{ $message }}
											@enderror
												</span>
									</label>
                                    <select class="form-control" name="department">
										@foreach($department as $department_one)
											<option @if($data->department_id == $department_one->id) selected="true" @endif value="{{ $department_one->id }}">{{ $department_one->name }}</option>
										@endforeach

									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Lavozimi :
										<span class="error">
											@error('position')
											{{ $message }}
											@enderror
										</span>
									</label>
									<input   type="text" class="form-control" name="position" value="{{ $data->position}}">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Username :
										<span class="error">
											@error('username')
											{{ $message }}
											@enderror
										</span>
									</label>
									<input   type="text" class="form-control" name="username" value="{{ $data->username}}">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label id="showpass">Parol :
									</label>
									<input id="mkpassinput" min="6"  type="text" class="form-control" name="password" value="">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
                                     <button class="btn btn-primary w-100 mt-4" type="submit" role="button" >
                                        Saqlash
                                     </button>

								
								</div>
							</div>

						</div>
                    </form>
                </div>
            </div>
            

        </div>
              
    
    </div>
</div>
@endsection

@section('js')

@endsection