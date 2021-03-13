@extends('admin.layouts.master')
@section('content')
<style type="text/css">
	.last-td{
        width: 100px;
        text-align: center;
    }
</style>

<style>
.input-file input[type="file"] {
  visibility: hidden;
  width: 1px;
  height: 1px;
}
.input-file .btn {
  background-color: #ddd;
  border-color: #ccc;
  color: #333;
}
.input-file .file-selected {
  font-size: 10px;
  text-align: center;
  width: 100%;
  display: block;
  margin-top: 5px;
}

.wrap {
  display: table;
  width: 100%;
  height: 100%;
}

.valign-middle {
  display: table-cell;
  vertical-align: middle;
  text-align: center;
}
.profile-timeline-list ul li .diplomaaa{
	padding-left: 120px !important;
}
.profile-photo .edit-avatar {
	right: -39% !important;
	margin-right: 5px !important;
}

.task-list-form ul li {
	padding-bottom: 10px !important;
}

.order_file_class .input-file > span{
    /*padding-bottom: 16px;*/
    /*margin-top: 38px;*/
}

</style>
<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="row">
					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
						<div class="pd-20 card-box height-100-p">
							<div class="profile-photo">
								<a href="{{ route('staff.edit', ['staff' => $data->id]) }}" class="edit-avatar"><i class="fa fa-pencil"></i></a>
								<img data-toggle="modal" data-target="#modal"  style="border-radius: 0 !important; height: 151px; cursor: pointer" src="{{$data->image}}" alt="" class="avatar-photo">
								<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
											<div class="modal-body pd-5">
												<div class="img-container">
													<img id="image" src="{{$data->image}}" alt="Picture">
												</div>
											</div>
											<div class="modal-footer">
{{--												<input type="submit" value="Update" class="btn btn-primary">--}}
												<button type="button" class="btn btn-primary" data-dismiss="modal">Yopish</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							<h5 class="text-center h5 mb-0">{{ $data->fio() }}</h5>
							<p class="text-center text-muted font-14">{{ date("d-m-Y", strtotime($data->birthday)) }} | @if($data->gender==1){{'M'}}@else{{'F'}}@endif | {{$data->nationality->name}}  </p>
							<div class="profile-info">
								<h5 class="mb-20 h5 text-blue">Asosiy ma'lumotlar: <i class="icon-copy dw dw-notepad-1"></i> {{$data->table_number}}</h5>
								<h5 class="mb-20 h5 text-blue">

									@if($is_worker_now_all->isEmpty())
										<a href="get_staff_to_work" style="width:100%" data-toggle="modal" data-target="#get_staff_to_work" class="bg-light-blue btn text-blue weight-500">
											<i class="ion-plus-round"></i> Xodimni biriktirish</a>
									@else
										<a href="get_staff_to_work" style="width:100%" data-toggle="modal" data-target="#get_staff_to_work" class="bg-light-blue btn text-blue weight-500">
											<i class="ion-plus-round"></i> Qo'shimcha ishga olish</a>
										@foreach($is_worker_now_all as $is_worker_now)
											<hr>
										{{$is_worker_now->department->name}}<br>
										Lavozimi: {{$is_worker_now->position}}<br>
										@endforeach
										<a href="fire_staff_from_work" style="width:100%" data-toggle="modal" data-target="#fire_staff_from_work" class="bg-light-blue btn text-blue weight-500">
											<i class="ion-minus-round"></i> Ishdan bo'shatish</a>
									@endif
								</h5>
								<!-- Fire from work modal End -->
										<div class="modal fade customscroll" id="fire_staff_from_work" tabindex="-1" role="dialog">
											<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
															<div class="modal-content">
																<div class="modal-header">
																	<h5 class="modal-title" id="exampleModalLongTitle">Xodimni ishdan bo'shatish</h5>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Yopish">
																		<span aria-hidden="true">&times;</span>
																	</button>
																</div>
																<div class="modal-body pd-0">
																	<div class="task-list-form">
																		<ul>
																			<li>
																				<form autocomplete="off" id="fire_staff" action="{{ route('staff.fire_staff') }}" method="post" enctype="multipart/form-data">
																					@csrf
																					<input type="hidden" name="id" value="{{$data->id}}">
																					<div class="form-group row">
																						<label class="col-md-3">Bo'lim (+ boshliq)</label>
																						<div class="col-md-9">
																							<select class="selectpicker form-control" required name="department_id" title="Tanlang" data-style="btn-outline-primary">
																							{{-- <select name="status" required class="custom-select col-12"> --}}
																								@foreach($is_worker_now_all as $is_worker_now)
																								<option value="{{$is_worker_now->department_id}}">@if($is_worker_now->boss)+ @endif {{$is_worker_now->department->name}} || {{$is_worker_now->position}}</option>
																								@endforeach
																							</select>
																						</div>
																					</div>
																					<div class="form-group row">
																						<label class="col-md-3">Buyruq sanasi va fayli</label>
																						<div class="col-md-9 row " >
																							<div class="col-md-6">
																								<div class="wrap">
																									<div class="valign-middle ">
																										<div class="form-group ">
																											<input required="true"  type="date" class="form-control file-input" name="end_date" accept="application/pdf">
																										</div>
																									</div>
																								</div>
																							</div>
																							<div class="col-md-6">
																								<div class="wrap">
																									<div class="valign-middle">
																										<div class="form-group order_file_class" >
																											<label for="file1" class="sr-only lab111"> Tanlang </label>
																											<input required="true" type="file" id="file1" class="form-control file-input" name="end_order" accept="application/pdf">
																										</div>
																									</div>
																								</div>
																							</div>
																						</div>
																					</div>
																					<div class="form-group row mb-0">
																						<label class="col-md-3">Qisqacha ma'lumot</label>
																						<div class="col-md-9">
																							<textarea class="form-control" name="description_end"></textarea>
																						</div>
																					</div>

																				</form>
																			</li>

																		</ul>
																	</div>
																	<div class="add-more-task">
{{--																		<a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Add Task"><i class="ion-plus-circled"></i> Add More Task</a>--}}
																	</div>
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-secondary" data-dismiss="modal"> <span class="icon-copy ti-close"></span>  Yopish</button>
																	<button type="submit" form="fire_staff" class="btn btn-primary"><i class="icon-copy fa fa-save" aria-hidden="true"></i> Saqlash</button>
																</div>
															</div>
														</div>
										</div>
								<!-- Fire from work modal Tab End -->
								<!-- Get to work modal End -->
										<div class="modal fade customscroll" id="get_staff_to_work" tabindex="-1" role="dialog">
											<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
															<div class="modal-content">
																<div class="modal-header">
																	<h5 class="modal-title" id="exampleModalLongTitle">Xodimni ishga olish</h5>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Yopish">
																		<span aria-hidden="true">&times;</span>
																	</button>
																</div>
																<div class="modal-body pd-0">
																	<div class="task-list-form">
																		<ul>
																			<li>
																				<form autocomplete="off" id="get_staff" action="{{ route('staff.get_staff') }}" method="post" enctype="multipart/form-data">
																					@csrf
																					<input type="hidden" name="id" value="{{$data->id}}">
																					<div class="form-group row">
																						<label class="col-md-3">Bo'lim</label>
																						<div class="col-md-7">
																							<select class="selectpicker form-control" required name="department_id" title="Tanlang" data-style="btn-outline-primary">
																							{{-- <select name="status" required class="custom-select col-12"> --}}
																								@foreach($department as $departmentOne)
																								<option value="{{$departmentOne->id}}">{{$departmentOne->name}}</option>
																								@endforeach
																							</select>
																						</div>
																						<div class="col-md-2">
																							<div class="custom-control custom-checkbox mt-2">
																								<input type="checkbox" name="boss" class="custom-control-input" id="customCheck1-1">
{{--																								<input type="checkbox" name="bosss">--}}
																								<label class="custom-control-label" for="customCheck1-1">Boshliq</label>
																							</div>
																						</div>
																					</div>
																					<div class="form-group row mb-0"">
																						<label class="col-md-3">Lavozimi</label>
																						<div class="col-md-9">
																							<input class="form-control" style="margin-bottom: 20px;" required="true" name="position"/>
																						</div>
																					</div>
																					<div class="form-group row">
																						<label class="col-md-3">Buyruq sanasi va fayli</label>
																						<div class="col-md-9 row " >
																							<div class="col-md-6">
																								<div class="wrap">
																									<div class="valign-middle ">
																										<div class="form-group ">
																											<input required="true"  type="date" class="form-control file-input" name="start_date" accept="application/pdf">
																										</div>
																									</div>
																								</div>
																							</div>
																							<div class="col-md-6">
																								<div class="wrap">
																									<div class="valign-middle">
																										<div class="form-group order_file_class" >
																											<label for="file1" class="sr-only lab111"> Tanlang </label>
																											<input required="true" type="file" id="file1" class="form-control file-input" name="start_order" accept="application/pdf">
																										</div>
																									</div>
																								</div>
																							</div>
																						</div>
																					</div>
																					<div class="form-group row mb-0">
																						<label class="col-md-3">Qisqacha ma'lumot</label>
																						<div class="col-md-9">
																							<textarea class="form-control" name="description"></textarea>
																						</div>
																					</div>

																				</form>
																			</li>

																		</ul>
																	</div>
																	<div class="add-more-task">
{{--																		<a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Add Task"><i class="ion-plus-circled"></i> Add More Task</a>--}}
																	</div>
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-secondary" data-dismiss="modal"> <span class="icon-copy ti-close"></span>  Yopish</button>
																	<button type="submit" form="get_staff" class="btn btn-primary"><i class="icon-copy fa fa-save" aria-hidden="true"></i> Saqlash</button>
																</div>
															</div>
														</div>
										</div>
								<!-- Get to work modal Tab End -->
								<ul>
									@if($data->partiya_id>1)
									<li>
										<span>{{ $data->partiya->name }}</span>
									</li>
									@endif
									<li>
										<span>Ish stavkasi & rejimi</span>
										{{ $data->stavka->name }} | {{ $data->ish_rejimi->name }}
									</li>
									<li>
										<span>Manzil:</span>
										{{ $data->country->name }} | {{ $data->region->name }} | {{ $data->area->name }} | {{ $data->address }}
									</li>
									<li>
										<span>Telefon raqam:</span>
										{{ $data->phone }} | {{ $data->phone1 }} | {{ $data->phone_home }}
									</li>
									<li>
										<span style="cursor: pointer" data-toggle="modal" data-target="#modal_passport">Passport ma'lumotlari: <i class="icon-copy dw dw-eye"></i></span>
{{--										<a href="modal" class="edit-avatar" data-toggle="modal" data-target="#modal_passport"><i class="fa fa-pencil"></i></a>--}}
										<div class="modal fade" id="modal_passport" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
											<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
												<div class="modal-content">
													<div class="modal-body pd-5">
														<div class="img-container">
															@if($data->passport_pdf)
															<iframe src="{{$data->passport_pdf}}" width="100%" height="500px">
															</iframe>
															@else
																<div class="pd-ltr-20 xs-pd-20-10"><h3 class="text-center">Passport yuklanmagan!</h3></div>
															@endif
														</div>
													</div>
													<div class="modal-footer">
														{{--												<input type="submit" value="Update" class="btn btn-primary">--}}
														<button type="button" class="btn btn-primary" data-dismiss="modal">Yopish</button>
													</div>
												</div>
											</div>
										</div>
										{{ $data->passport_seria }} {{ $data->passport_number }} | {{ $data->passport_jshshir }}
										<br/>
										{{ $data->passport_given_by }}
										<br/>
										{{ $data->passport_issued_date }} | {{ $data->passport_expiration_date }}
									</li>
									<li>
										<span>Malumoti & Ilmiy daraja & unvon </span>
										@if($data->degree_info_id){{ $data->degree_info->name }}@endif |
										@if($data->academic_degree_id){{ $data->academic_degree->name }}@endif |
										@if($data->degree_id){{ $data->degree->name }}@endif
									</li>
								</ul>
							</div>
{{--							<div class="profile-social">--}}
{{--								<h5 class="mb-20 h5 text-blue">Social Links</h5>--}}
{{--								<ul class="clearfix">--}}
{{--									<li><a href="#" class="btn" data-bgcolor="#3b5998" data-color="#ffffff"><i class="fa fa-facebook"></i></a></li>--}}
{{--									<li><a href="#" class="btn" data-bgcolor="#1da1f2" data-color="#ffffff"><i class="fa fa-twitter"></i></a></li>--}}
{{--									<li><a href="#" class="btn" data-bgcolor="#007bb5" data-color="#ffffff"><i class="fa fa-linkedin"></i></a></li>--}}
{{--									<li><a href="#" class="btn" data-bgcolor="#f46f30" data-color="#ffffff"><i class="fa fa-instagram"></i></a></li>--}}
{{--									<li><a href="#" class="btn" data-bgcolor="#c32361" data-color="#ffffff"><i class="fa fa-dribbble"></i></a></li>--}}
{{--									<li><a href="#" class="btn" data-bgcolor="#3d464d" data-color="#ffffff"><i class="fa fa-dropbox"></i></a></li>--}}
{{--									<li><a href="#" class="btn" data-bgcolor="#db4437" data-color="#ffffff"><i class="fa fa-google-plus"></i></a></li>--}}
{{--									<li><a href="#" class="btn" data-bgcolor="#bd081c" data-color="#ffffff"><i class="fa fa-pinterest-p"></i></a></li>--}}
{{--									<li><a href="#" class="btn" data-bgcolor="#00aff0" data-color="#ffffff"><i class="fa fa-skype"></i></a></li>--}}
{{--									<li><a href="#" class="btn" data-bgcolor="#00b489" data-color="#ffffff"><i class="fa fa-vine"></i></a></li>--}}
{{--								</ul>--}}
{{--							</div>--}}
{{--							<div class="profile-skills">--}}
{{--								<h5 class="mb-20 h5 text-blue">Key Skills</h5>--}}
{{--								<h6 class="mb-5 font-14">HTML</h6>--}}
{{--								<div class="progress mb-20" style="height: 6px;">--}}
{{--									<div class="progress-bar" role="progressbar" style="width: 90%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--								</div>--}}
{{--								<h6 class="mb-5 font-14">Css</h6>--}}
{{--								<div class="progress mb-20" style="height: 6px;">--}}
{{--									<div class="progress-bar" role="progressbar" style="width: 70%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--								</div>--}}
{{--								<h6 class="mb-5 font-14">jQuery</h6>--}}
{{--								<div class="progress mb-20" style="height: 6px;">--}}
{{--									<div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--								</div>--}}
{{--								<h6 class="mb-5 font-14">Bootstrap</h6>--}}
{{--								<div class="progress mb-20" style="height: 6px;">--}}
{{--									<div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--								</div>--}}
{{--							</div>--}}
						</div>
					</div>
					<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
						<div class="card-box height-100-p overflow-hidden">
							<div class="profile-tab height-100-p">
								<div class="tab height-100-p">
									<ul class="nav nav-tabs customtab" role="tablist">
										<li class="nav-item">
											<a class="nav-link active" data-toggle="tab" href="#timeline" role="tab">Qarindoshlar</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" data-toggle="tab" href="#diplom" role="tab">Diplomlar</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" data-toggle="tab" href="#mehnat_faoliyati" role="tab">Mehnat faoliyati</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" data-toggle="tab" href="#qualification_info_tab" role="tab">Malaka oshirish</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" data-toggle="tab" href="#mukofot" role="tab">Mukofot</a>
										</li>
{{--										<li class="nav-item">--}}
{{--											<a class="nav-link" data-toggle="tab" href="#setting" role="tab">Faoliyati</a>--}}
{{--										</li>--}}
{{--										<li class="nav-item">--}}
{{--											<a class="nav-link" data-toggle="tab" href="#tasks" role="tab">Ichki faoliyat</a>--}}
{{--										</li>--}}

										<li class="nav-item">
											<a class="nav-link" data-toggle="tab" href="#ichki_faoliyati" role="tab">Ichki faoliyat</a>
										</li>

										<a class="btn btn-lg btn-primaryk" data-bgcolor="#3b5998" data-color="#ffffff" href="{{route('pdf_for_staff', ['id'=>$data->id])}}" role="tab"> <span class="icon-copy ti-download m-4	"></span> </a>

									</ul>

									<div class="tab-content">
										<!-- Qarindoshlar Tab start -->
										<div class="tab-pane fade show active" id="timeline" role="tabpanel">
											<div class="pd-20">
													<div class="task-title row align-items-center" style="padding-bottom: 0px;">
														<div class="col-md-8 col-sm-12">
															<h5>Xodimning qarindoshlari haqida ma'lumot</h5>
														</div>
														<div class="col-md-4 col-sm-12 text-right">
															<a href="relatives_add" data-toggle="modal" data-target="#relatives_add" class="bg-light-blue btn text-blue weight-500"><i class="ion-plus-round"></i> Qo'shish</a>
														</div>
													</div>

												<div class="profile-timeline">
													<div class="profile-timeline-list">
														<ul>
															@foreach($relative as $relativeOne)
															<li>
																<div class="date">{{$relativeOne->relatives_type->name}}</div>
																<div class="task-name"> {{$relativeOne->full_name}}</div>
																<p>{{ $relativeOne->birthday }} {{ $relativeOne->country->name }}
																	@if($relativeOne->region_id){{ $relativeOne->region->name }}}@endif
																	@if($relativeOne->area_id){{ $relativeOne->area->name }}@endif
																	{{ $relativeOne->birth_address }}
																<br>
																	{{ $relativeOne->work_rank }}
																</p>
																<div class="task-time">{{$relativeOne->address}}</div>
															</li>
															@endforeach
														</ul>
													</div>
												</div>
											</div>
										</div>
										<!-- Qarindoshlar Tab End -->

										<!-- Qarindoshlar modal End -->
										<div class="modal fade customscroll" id="relatives_add" tabindex="-1" role="dialog">
														<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
															<div class="modal-content">
																<div class="modal-header">
																	<h5 class="modal-title" id="exampleModalLongTitle">Xodimning qarindoshlarini qo'shish</h5>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Yopish">
																		<span aria-hidden="true">&times;</span>
																	</button>
																</div>
																<div class="modal-body pd-0">
																	<div class="task-list-form">
																		<ul>
																			<li>
																				<form autocomplete="off" id="relatives_form" action="{{ route('staff.relative') }}" method="post" enctype="multipart/form-data">
																					@csrf
																					<input type="hidden" name="id" value="{{$data->id}}">
																					<div class="form-group row">
																						<label class="col-md-3">Qarindoshligi</label>
																						<div class="col-md-9">
																							<select class="selectpicker form-control" required name="RelativesType" title="Tanlang" data-style="btn-outline-primary">
																							{{-- <select name="status" required class="custom-select col-12"> --}}
																								@foreach($RelarivesType as $RelarivesTypeOne)
																								<option value="{{$RelarivesTypeOne->id}}">{{$RelarivesTypeOne->name1}}</option>
																								@endforeach
																							</select>
																						</div>
																					</div>
																					<div class="form-group row">
																						<label class="col-md-3">F.I.O.</label>
																						<div class="col-md-9">
																							<input type="text"  name="full_name" class="form-control">
																						</div>
																					</div>
																					<div class="form-group row">
																						<label class="col-md-3">Ish joyi va lavozimi</label>
																						<div class="col-md-9">
																							<input type="text" name="work" class="form-control">
																						</div>
																					</div>
																					<div class="form-group row">
																						<label class="col-md-3">Tug'ulgan sana va joyi</label>
																						<div class="col-md-9 row">
																							<div class="col-md-6">
																								<input type="date" name="birthday" class="form-control ">
																							</div>
																							<div class="col-md-6">
																								<select class="form-control" name="country_id">
																									@foreach($countries as $country)
																										<option @if((old('country_id') == $country->id) || ($country->code == "UZ")) selected @endif value="{{ $country->id }}">{{ $country->name }}</option>
																									@endforeach
																								</select>
																							</div>
																							<div class="col-md-6" id="inputhide1">
																								<select class="form-control" name="region_id">
																									@foreach($regions as $region)
																										<option @if(old('region_id') == $region->id) selected @endif value="{{ $region->id }}">{{ $region->name }}</option>
																									@endforeach
																								</select>
																							</div>
																							<div class="col-md-6" id="inputhide2">
																								<select class="form-control" name="area_id">

																								</select>
																							</div>
																							<div style="display: none" class="col-md-12 " id="inputhideshow">
																								<textarea class="form-control" name="birth_address" placeholder="Manzilni kiriting..." type="text" ></textarea>
																							</div>
																						</div>
																					</div>
																					<div class="form-group row mb-0">
																						<label class="col-md-3">Turar joyi</label>
																						<div class="col-md-9">
																							<textarea class="form-control" name="address"></textarea>
																						</div>
																					</div>

																				</form>
																			</li>

																		</ul>
																	</div>
																	<div class="add-more-task">
{{--																		<a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Add Task"><i class="ion-plus-circled"></i> Add More Task</a>--}}
																	</div>
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-secondary" data-dismiss="modal"> <span class="icon-copy ti-close"></span>  Yopish</button>
																	<button type="submit" form="relatives_form" class="btn btn-primary"><i class="icon-copy fa fa-save" aria-hidden="true"></i> Saqlash</button>
																</div>
															</div>
														</div>
													</div>
										<!-- Qarindoshlar modal Tab End -->

										<!-- Diplom Tab start -->
										<div class="tab-pane fade " id="diplom" role="tabpanel">
											<div class="pd-20">
													<div class="task-title row align-items-center" style="padding-bottom: 0px;">
														<div class="col-md-8 col-sm-12">
															<h5>Diplom ma'lumotlari</h5>
														</div>
														<div class="col-md-4 col-sm-12 text-right">
															<a href="diplom_add" data-toggle="modal" data-target="#diplom_add" class="bg-light-blue btn text-blue weight-500"><i class="ion-plus-round"></i> Qo'shish</a>
														</div>
													</div>

												<div class="profile-timeline">
													<div class="profile-timeline-list">
														<ul>
															@foreach($education as $education_one)
															<li class="diplomaaa">
																<div class="date">{{$education_one->diplom_issued_date}}</div>
																<div class="task-name"> {{$education_one->university->name}}</div>
																<p>{{ $education_one->specialization }}
																	<br>
																	{{ $education_one->diplom_seria }} | {{ $education_one->diplom_number }}
{{--																	@if($education_one->diplom_type_id){{ $education_one->diplom_types->name }}}@endif--}}


																</p>
																<div class="task-time">{{$education_one->address}}</div>
															</li>
															@endforeach
														</ul>
													</div>
												</div>
											</div>
										</div>
										<!-- Diplom Tab End -->

										<!-- Diplom modal End -->
										<div class="modal fade customscroll" id="diplom_add" tabindex="-1" role="dialog">
														<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
															<div class="modal-content">
																<div class="modal-header">
																	<h5 class="modal-title" id="exampleModalLongTitle">Diplom qo'shish</h5>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Yopish">
																		<span aria-hidden="true">&times;</span>
																	</button>
																</div>
																<div class="modal-body pd-0">
																	<div class="task-list-form">
																		<ul>
																			<li>
																				<form autocomplete="off" id="diplom_form" action="{{ route('staff.diplom') }}" method="post" enctype="multipart/form-data">
																					@csrf
																					<input type="hidden" name="id" value="{{$data->id}}">
																					<div class="form-group row">
																						<label class="col-md-3">Universitet</label>
																						<div class="col-md-9">
																							<select class="selectpicker form-control" required name="university_id" title="Tanlang" data-style="btn-outline-primary">
																							{{-- <select name="status" required class="custom-select col-12"> --}}
																								@foreach($universities as $university_one)
																								<option value="{{$university_one->id}}">{{$university_one->name}}</option>
																								@endforeach
																							</select>
																						</div>
																					</div>
																					<div class="form-group row">
																						<label class="col-md-3">Mutaxasisligi</label>
																						<div class="col-md-9">
																							<input type="text" name="specialization" placeholder="Mutahasisligini kiriting..." class="form-control">
																						</div>
																					</div>
																					<div class="form-group row">
																						<label class="col-md-3">Seriya | raqam</label>
																						<div class="col-md-9 row">
																							<div class="col-md-6">
																								<input type="text" name="diplom_seria" placeholder="Seria" class="form-control">
																							</div>
																							<div class="col-md-6">
																								<input type="text" name="diplom_number" placeholder="Raqami" class="form-control">
																							</div>
																						</div>
																					</div>
																					<div class="form-group row">
																						<label class="col-md-3">Berilgan sana | Turi</label>
																						<div class="col-md-9 row">
																							<div class="col-md-6">
																								<input type="date" name="diplom_issued_date" placeholder="Berilgan sanasi" class="form-control">
																							</div>
																							<div class="col-md-6">
																								<select class="selectpicker form-control" required name="diplom_type_id" title="Tanlang" data-style="btn-outline-primary">
																								{{-- <select name="status" required class="custom-select col-12"> --}}
																									@foreach($diplom_types as $diplom_type)
																									<option value="{{$diplom_type->id}}">{{$diplom_type->name}}</option>
																									@endforeach
																								</select>
																							</div>
																						</div>
																					</div>
																					<div class="form-group row">
																						<label class="col-md-3">Nusxasi va ilovasi</label>
																						<div class="col-md-9 row " >
																							<div class="col-md-6">
																								<div class="wrap">
																									<div class="valign-middle">
																										<div class="form-group">
																											<label for="file" class="sr-only"> </label>
																											<input required="true" type="file" id="file" class="form-control file-input" name="diplom_copy" accept="application/pdf">
																										</div>
																									</div>
																								</div>
																							</div>
																							<div class="col-md-6">
																								<div class="wrap">
																									<div class="valign-middle">
																										<div class="form-group">
																											<label for="file1" class="sr-only lab111"> Tanlang </label>
																											<input required="true" type="file" id="file1" class="form-control file-input" name="diplom_ilova_copy" accept="application/pdf">
																										</div>
																									</div>
																								</div>
																							</div>
																						</div>
																					</div>
																				</form>
																			</li>

																		</ul>
																	</div>
																	<div class="add-more-task">
{{--																		<a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Add Task"><i class="ion-plus-circled"></i> Add More Task</a>--}}
																	</div>
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-secondary" data-dismiss="modal"> <span class="icon-copy ti-close"></span>  Yopish</button>
																	<button type="submit" form="diplom_form" class="btn btn-primary"><i class="icon-copy fa fa-save" aria-hidden="true"></i> Saqlash</button>
																</div>
															</div>
														</div>
													</div>
										<!-- Diplom modal Tab End -->

										<!-- Mehnat faoliyat Tab start -->
										<div class="tab-pane fade " id="mehnat_faoliyati" role="tabpanel">
											<div class="pd-20">
													<div class="task-title row align-items-center" style="padding-bottom: 0px;">
														<div class="col-md-8 col-sm-12">
															<h5>Mehnat faoliyat ma'lumotlari</h5>
														</div>
														<div class="col-md-4 col-sm-12 text-right">
															<a href="mehnat_faoliyat_add" data-toggle="modal" data-target="#mehnat_faoliyat_add" class="bg-light-blue btn text-blue weight-500"><i class="ion-plus-round"></i> Qo'shish</a>
														</div>
													</div>

												<div class="profile-timeline">
													<div class="profile-timeline-list">
														<ul>
															@foreach($work_places as $work_places_one)
															<li class="diplomaaa">
																<div class="date"><b>{{$work_places_one->start_time}} dan {{$work_places_one->end_time}} gacha</b>
																	{{$work_places_one->name}}
																{{ $work_places_one->position }}
																</div>
															</li>
																<br>
																<hr>
															@endforeach
														</ul>
													</div>
												</div>
											</div>
										</div>
										<!-- Mehnat faoliyat Tab End -->

										<!-- Mehnat faoliyat modal End -->
										<div class="modal fade customscroll" id="mehnat_faoliyat_add" tabindex="-1" role="dialog" >
														<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
															<div class="modal-content">
																<div class="modal-header">
																	<h5 class="modal-title" id="exampleModalLongTitle">Mehnat faoliyat qo'shish</h5>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Yopish">
																		<span aria-hidden="true">&times;</span>
																	</button>
																</div>
																<div class="modal-body pd-0">
																	<div class="task-list-form">
																		<ul>
																			<li>
																				<form autocomplete="off" id="workplace_form" action="{{ route('staff.workplace') }}" method="post" enctype="multipart/form-data">
																					@csrf
																					<input type="hidden" name="id" value="{{$data->id}}">
																					<div class="form-group row">
																						<label class="col-md-4">Tashkilot nomi</label>
																						<div class="col-md-8">
																							<input type="text" name="workplace" placeholder="Tashkilot nomini kiriting..." class="form-control">
																						</div>
																					</div>
																					<div class="form-group row">
																						<label class="col-md-4">Lavozimi</label>
																						<div class="col-md-8">
																							<input type="text" name="position" placeholder="Lavozimini kiriting..." class="form-control">
																						</div>
																					</div>
																					<div class="form-group row">
																						<label class="col-md-4">Kirgan / Bo'shagan </label>

																							<div class="col-md-4">
																								<input type="date" name="start_time" placeholder="Kirgan sanasi" class="form-control">
																							</div>
																							<div class="col-md-4">
																								<input type="date" name="end_time" placeholder="Bo'shagan sanasi" class="form-control">
																							</div>

																					</div>


																				</form>
																			</li>

																		</ul>
																	</div>
																	<div class="add-more-task">
{{--																		<a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Add Task"><i class="ion-plus-circled"></i> Add More Task</a>--}}
																	</div>
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-secondary" data-dismiss="modal"> <span class="icon-copy ti-close"></span>  Yopish</button>
																	<button type="submit" form="workplace_form" class="btn btn-primary"><i class="icon-copy fa fa-save" aria-hidden="true"></i> Saqlash</button>
																</div>
															</div>
														</div>
													</div>
										<!-- Mehnat faoliyat modal Tab End -->

										<!-- Ichki faoliyat Tab start -->
										<div class="tab-pane fade " id="ichki_faoliyati" role="tabpanel">
											<div class="pd-20">
													<div class="task-title row align-items-center" style="padding-bottom: 0px;">
														<div class="col-md-8 col-sm-12">
															<h5>Ichki mehnat faoliyat ma'lumotlari</h5>
														</div>
														<div class="col-md-4 col-sm-12 text-right">
															<a href="ichki_faoliyat_add" data-toggle="modal" data-target="#ichki_faoliyat_add" class="bg-light-blue btn text-blue weight-500"><i class="ion-plus-round"></i> Qo'shish</a>
														</div>
													</div>

												<div class="profile-timeline">
													<div class="profile-timeline-list">
														<ul>
															@foreach($inactivities as $inactivity_one)
															<li class="diplomaaa">
																<div class="date">{{$inactivity_one->date}}</div>
																<div class="task-name"> {{$inactivity_one->inactivity_type->name}}</div>
																<p>{{ $inactivity_one->name }}</p>
																<div class="task-time">{{ $inactivity_one->description }}</div>
															</li>
															@endforeach
														</ul>
													</div>
												</div>
											</div>
										</div>
										<!-- Ichki faoliyat Tab End -->

										<!-- Ichki faoliyat modal End -->
										<div class="modal fade customscroll" id="ichki_faoliyat_add" tabindex="-1" role="dialog">
														<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
															<div class="modal-content">
																<div class="modal-header">
																	<h5 class="modal-title" id="exampleModalLongTitle">Ichki faoliyat qo'shish</h5>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Yopish">
																		<span aria-hidden="true">&times;</span>
																	</button>
																</div>
																<div class="modal-body pd-0">
																	<div class="task-list-form">
																		<ul>
																			<li>
																				<form autocomplete="off" id="ichki_menhat_form" action="{{ route('staff.inactivity') }}" method="post" enctype="multipart/form-data">
																					@csrf
																					<input type="hidden" name="id" value="{{$data->id}}">
																					<div class="form-group row">
																						<label class="col-md-3">Nomi</label>
																						<div class="col-md-9">
																							<input type="text" name="name" placeholder="Nomini kiriting..." class="form-control">
																						</div>
																					</div>
																					<div class="form-group row">
																						<label class="col-md-3">Qisqacha</label>
																						<div class="col-md-9">
																							<input type="text" name="description" placeholder="Qisqacha tasnif yozing..." class="form-control">
																						</div>
																					</div>
																					<div class="form-group row">
																						<label class="col-md-3">Sana va turi</label>
																						<div class="col-md-9 row">
																							<div class="col-md-6">
																								<input type="date" name="date" placeholder="Sanasi" class="form-control">
																							</div>
																							<div class="col-md-6">
																								<select class="selectpicker form-control" required name="inactivity_type_id" title="Tanlang" data-style="btn-outline-primary">
																								{{-- <select name="status" required class="custom-select col-12"> --}}
																									@foreach($inactivity_types as $inactivity_type)
																									<option value="{{$inactivity_type->id}}">{{$inactivity_type->name}}</option>
																									@endforeach
																								</select>
																							</div>
																						</div>
																					</div>
																					<div class="form-group row">
																						<label class="col-md-3">Fayl</label>
																						<div class="col-md-8 " >
																								<div class="wrap">
																									<div class="valign-middle">
																										<div class="form-group">
																											<label for="file" class="sr-only"> Tanlang</label>
																											<input required="true" type="file" id="file_ichki" class="form-control file-input" name="in_file" accept="application/pdf">
																										</div>
																									</div>
																							</div>

																						</div>
																					</div>
																				</form>
																			</li>

																		</ul>
																	</div>
																	<div class="add-more-task">
{{--																		<a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Add Task"><i class="ion-plus-circled"></i> Add More Task</a>--}}
																	</div>
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-secondary" data-dismiss="modal"> <span class="icon-copy ti-close"></span>  Yopish</button>
																	<button type="submit" form="ichki_menhat_form" class="btn btn-primary"><i class="icon-copy fa fa-save" aria-hidden="true"></i> Saqlash</button>
																</div>
															</div>
														</div>
													</div>
										<!-- Ishki faoliyat modal Tab End -->

										<!-- malaka_oshirish Tab start -->
										<div class="tab-pane fade " id="qualification_info_tab" role="tabpanel">
											<div class="pd-20">
													<div class="task-title row align-items-center" style="padding-bottom: 0px;">
														<div class="col-md-8 col-sm-12">
															<h5>Malaka oshirish faoliyat ma'lumotlari</h5>
														</div>
														<div class="col-md-4 col-sm-12 text-right">
															<a href="qualification_info_modal" data-toggle="modal" data-target="#qualification_info_modal" class="bg-light-blue btn text-blue weight-500"><i class="ion-plus-round"></i> Qo'shish</a>
														</div>
													</div>

												<div class="profile-timeline">
													<div class="profile-timeline-list">
														<ul>
															@foreach($qualification_info as $qualification_info_one)
															<li class="diplomaaa">
																<div class="date"></div>
																<div class="task-name">{{$qualification_info_one->start_date}} | {{$qualification_info_one->end_date}}</div>
																<p>{{ $qualification_info_one->name }}</p>
																<div class="task-time">{{ $qualification_info_one->description }}</div>
															</li>
															@endforeach
														</ul>
													</div>
												</div>
											</div>
										</div>
										<!-- malaka_oshirish Tab End -->

										<!-- malaka_oshirish modal End -->
										<div class="modal fade customscroll" id="qualification_info_modal" tabindex="-1" role="dialog">
														<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
															<div class="modal-content">
																<div class="modal-header">
																	<h5 class="modal-title" id="exampleModalLongTitle">Malaka oshirish qo'shish</h5>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Yopish">
																		<span aria-hidden="true">&times;</span>
																	</button>
																</div>
																<div class="modal-body pd-0">
																	<div class="task-list-form">
																		<ul>
																			<li>
																				<form autocomplete="off" id="qualification_info_form" action="{{ route('staff.qualification') }}" method="post" enctype="multipart/form-data">
																					@csrf
																					<input type="hidden" name="id" value="{{$data->id}}">
																					<div class="form-group row">
																						<label class="col-md-3">Nomi</label>
																						<div class="col-md-9">
																							<input type="text" name="name" placeholder="Nomini kiriting..." class="form-control">
																						</div>
																					</div>
																					<div class="form-group row">
																						<label class="col-md-3">Qisqacha</label>
																						<div class="col-md-9">
																							<input type="text" name="description" placeholder="Qisqacha tasnif yozing..." class="form-control">
																						</div>
																					</div>
																					<div class="form-group row">
																						<label class="col-md-3">Boshlash va tugash sanasi</label>
																						<div class="col-md-9 row">
																							<div class="col-md-6">
																								<input type="date" name="start_date" placeholder="Sanasi" class="form-control">
																							</div>
																							<div class="col-md-6">
																								<input type="date" name="end_date" placeholder="Sanasi" class="form-control">
																							</div>
																						</div>
																					</div>
																				</form>
																			</li>

																		</ul>
																	</div>
																	<div class="add-more-task">
{{--																		<a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Add Task"><i class="ion-plus-circled"></i> Add More Task</a>--}}
																	</div>
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-secondary" data-dismiss="modal"> <span class="icon-copy ti-close"></span>  Yopish</button>
																	<button type="submit" form="qualification_info_form" class="btn btn-primary"><i class="icon-copy fa fa-save" aria-hidden="true"></i> Saqlash</button>
																</div>
															</div>
														</div>
													</div>
										<!-- malaka_oshirish modal Tab End -->

										<!-- mukofot Tab start -->
										<div class="tab-pane fade " id="mukofot" role="tabpanel">
											<div class="pd-20">
													<div class="task-title row align-items-center" style="padding-bottom: 0px;">
														<div class="col-md-8 col-sm-12">
															<h5>Xodimning mukofotlari</h5>
														</div>
														<div class="col-md-4 col-sm-12 text-right">
															<a href="mukofot_modal" data-toggle="modal" data-target="#mukofot_modal" class="bg-light-blue btn text-blue weight-500"><i class="ion-plus-round"></i> Qo'shish</a>
														</div>
													</div>

												<div class="profile-timeline">
													<div class="profile-timeline-list">
														<ul>
															@foreach($mukofot_staff as $mukofot_staff_one)
															<li class="diplomaaa">
																<div class="date">{{$mukofot_staff_one->date}}</div>
																<div class="task-name">{{ $mukofot_staff_one->mukofot_type->name }}</div>
																<p>{{$mukofot_staff_one->name}}</p>
																<div class="task-time">{{ $mukofot_staff_one->description }}</div>
															</li>
															@endforeach
														</ul>
													</div>
												</div>
											</div>
										</div>
										<!-- mukofot Tab End -->

										<!-- mukofot modal End -->
										<div class="modal fade customscroll" id="mukofot_modal" tabindex="-1" role="dialog">
											<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
															<div class="modal-content">
																<div class="modal-header">
																	<h5 class="modal-title" id="exampleModalLongTitle">Mukofot qo'shish</h5>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Yopish">
																		<span aria-hidden="true">&times;</span>
																	</button>
																</div>
																<div class="modal-body pd-0">
																	<div class="task-list-form">
																		<ul>
																			<li>
																				<form autocomplete="off" id="mukofot_form" action="{{ route('staff.mukofot') }}" method="post" enctype="multipart/form-data">
																					@csrf
																					<input type="hidden" name="id" value="{{$data->id}}">
																					<div class="form-group row">
																						<label class="col-md-3">Turi va sanasi</label>
																						<div class="col-md-9 row" style="padding-right: 0px !important;">
																							<div class="col-md-8" style="">
																								<select class="form-control" name="mukofot_type_id">
																									@foreach($mukofot_type as $mukofot_type_one)
																										<option @if((old('mukofot_type_id') == $mukofot_type_one->id)) selected @endif value="{{ $mukofot_type_one->id }}">{{ $mukofot_type_one->name }}</option>
																									@endforeach
																								</select>
																							</div>
																							<div class="col-md-4" style="padding-right: 0px !important;padding-left: 0px !important;">
																								<input required type="date" name="date" class="form-control ">
																							</div>
																						</div>
																					</div>

																					<div class="form-group row">
																						<label class="col-md-3">Nomi</label>
																						<div class="col-md-9">
																							<input required type="text" name="name" placeholder="Nomini kiriting..." class="form-control">
																						</div>
																					</div>
																					<div class="form-group row">
																						<label class="col-md-3">Qisqacha</label>
																						<div class="col-md-9">
																							<input type="text" name="description" placeholder="Qo'shimcha ma'lumot yozing..." class="form-control">
																						</div>
																					</div>

																				</form>
																			</li>

																		</ul>
																	</div>
																	<div class="add-more-task">
{{--																	<a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Add Task"><i class="ion-plus-circled"></i> Add More Task</a>--}}
																	</div>
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-secondary" data-dismiss="modal"> <span class="icon-copy ti-close"></span>  Yopish</button>
																	<button type="submit" form="mukofot_form" class="btn btn-primary"><i class="icon-copy fa fa-save" aria-hidden="true"></i> Saqlash</button>
																</div>
															</div>
														</div>
										</div>
										<!-- mukofot modal Tab End -->

{{--										<!-- Diplomlar Tab start -->--}}
{{--										<div class="tab-pane fade" id="tasks" role="tabpanel">--}}
{{--											<div class="pd-20 profile-task-wrap">--}}
{{--												<div class="container pd-0">--}}
{{--													<!-- Open Task start -->--}}
{{--													<div class="task-title row align-items-center">--}}
{{--														<div class="col-md-8 col-sm-12">--}}
{{--															<h5>Open Diplomlar (3 Left)</h5>--}}
{{--														</div>--}}
{{--														<div class="col-md-4 col-sm-12 text-right">--}}
{{--															<a href="task-add" data-toggle="modal" data-target="#task-add" class="bg-light-blue btn text-blue weight-500"><i class="ion-plus-round"></i> Add</a>--}}
{{--														</div>--}}
{{--													</div>--}}
{{--													<div class="profile-task-list pb-30">--}}
{{--														<ul>--}}
{{--															<li>--}}
{{--																<div class="custom-control custom-checkbox mb-5">--}}
{{--																	<input type="checkbox" class="custom-control-input" id="task-1">--}}
{{--																	<label class="custom-control-label" for="task-1"></label>--}}
{{--																</div>--}}
{{--																<div class="task-type">Email</div>--}}
{{--																Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id ea earum.--}}
{{--																<div class="task-assign">Assigned to Ferdinand M. <div class="due-date">due date <span>22 February 2019</span></div></div>--}}
{{--															</li>--}}
{{--															<li>--}}
{{--																<div class="custom-control custom-checkbox mb-5">--}}
{{--																	<input type="checkbox" class="custom-control-input" id="task-2">--}}
{{--																	<label class="custom-control-label" for="task-2"></label>--}}
{{--																</div>--}}
{{--																<div class="task-type">Email</div>--}}
{{--																Lorem ipsum dolor sit amet.--}}
{{--																<div class="task-assign">Assigned to Ferdinand M. <div class="due-date">due date <span>22 February 2019</span></div></div>--}}
{{--															</li>--}}
{{--															<li>--}}
{{--																<div class="custom-control custom-checkbox mb-5">--}}
{{--																	<input type="checkbox" class="custom-control-input" id="task-3">--}}
{{--																	<label class="custom-control-label" for="task-3"></label>--}}
{{--																</div>--}}
{{--																<div class="task-type">Email</div>--}}
{{--																Lorem ipsum dolor sit amet, consectetur adipisicing elit.--}}
{{--																<div class="task-assign">Assigned to Ferdinand M. <div class="due-date">due date <span>22 February 2019</span></div></div>--}}
{{--															</li>--}}
{{--															<li>--}}
{{--																<div class="custom-control custom-checkbox mb-5">--}}
{{--																	<input type="checkbox" class="custom-control-input" id="task-4">--}}
{{--																	<label class="custom-control-label" for="task-4"></label>--}}
{{--																</div>--}}
{{--																<div class="task-type">Email</div>--}}
{{--																Lorem ipsum dolor sit amet. Id ea earum.--}}
{{--																<div class="task-assign">Assigned to Ferdinand M. <div class="due-date">due date <span>22 February 2019</span></div></div>--}}
{{--															</li>--}}
{{--														</ul>--}}
{{--													</div>--}}
{{--													<!-- Open Task End -->--}}
{{--													<!-- Close Task start -->--}}
{{--													<div class="task-title row align-items-center">--}}
{{--														<div class="col-md-12 col-sm-12">--}}
{{--															<h5>Closed Diplomlar</h5>--}}
{{--														</div>--}}
{{--													</div>--}}
{{--													<div class="profile-task-list close-tasks">--}}
{{--														<ul>--}}
{{--															<li>--}}
{{--																<div class="custom-control custom-checkbox mb-5">--}}
{{--																	<input type="checkbox" class="custom-control-input" id="task-close-1" checked="" disabled="">--}}
{{--																	<label class="custom-control-label" for="task-close-1"></label>--}}
{{--																</div>--}}
{{--																<div class="task-type">Email</div>--}}
{{--																Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id ea earum.--}}
{{--																<div class="task-assign">Assigned to Ferdinand M. <div class="due-date">due date <span>22 February 2018</span></div></div>--}}
{{--															</li>--}}
{{--															<li>--}}
{{--																<div class="custom-control custom-checkbox mb-5">--}}
{{--																	<input type="checkbox" class="custom-control-input" id="task-close-2" checked="" disabled="">--}}
{{--																	<label class="custom-control-label" for="task-close-2"></label>--}}
{{--																</div>--}}
{{--																<div class="task-type">Email</div>--}}
{{--																Lorem ipsum dolor sit amet.--}}
{{--																<div class="task-assign">Assigned to Ferdinand M. <div class="due-date">due date <span>22 February 2018</span></div></div>--}}
{{--															</li>--}}
{{--															<li>--}}
{{--																<div class="custom-control custom-checkbox mb-5">--}}
{{--																	<input type="checkbox" class="custom-control-input" id="task-close-3" checked="" disabled="">--}}
{{--																	<label class="custom-control-label" for="task-close-3"></label>--}}
{{--																</div>--}}
{{--																<div class="task-type">Email</div>--}}
{{--																Lorem ipsum dolor sit amet, consectetur adipisicing elit.--}}
{{--																<div class="task-assign">Assigned to Ferdinand M. <div class="due-date">due date <span>22 February 2018</span></div></div>--}}
{{--															</li>--}}
{{--															<li>--}}
{{--																<div class="custom-control custom-checkbox mb-5">--}}
{{--																	<input type="checkbox" class="custom-control-input" id="task-close-4" checked="" disabled="">--}}
{{--																	<label class="custom-control-label" for="task-close-4"></label>--}}
{{--																</div>--}}
{{--																<div class="task-type">Email</div>--}}
{{--																Lorem ipsum dolor sit amet. Id ea earum.--}}
{{--																<div class="task-assign">Assigned to Ferdinand M. <div class="due-date">due date <span>22 February 2018</span></div></div>--}}
{{--															</li>--}}
{{--														</ul>--}}
{{--													</div>--}}
{{--													<!-- Close Task start -->--}}
{{--													<!-- add task popup start -->--}}
{{--													<div class="modal fade customscroll" id="task-add" tabindex="-1" role="dialog">--}}
{{--														<div class="modal-dialog modal-dialog-centered" role="document">--}}
{{--															<div class="modal-content">--}}
{{--																<div class="modal-header">--}}
{{--																	<h5 class="modal-title" id="exampleModalLongTitle">Diplomlar Add</h5>--}}
{{--																	<button type="button" class="close" data-dismiss="modal" aria-label="Close" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Close Modal">--}}
{{--																		<span aria-hidden="true">&times;</span>--}}
{{--																	</button>--}}
{{--																</div>--}}
{{--																<div class="modal-body pd-0">--}}
{{--																	<div class="task-list-form">--}}
{{--																		<ul>--}}
{{--																			<li>--}}
{{--																				<form>--}}
{{--																					<div class="form-group row">--}}
{{--																						<label class="col-md-4">Task Type</label>--}}
{{--																						<div class="col-md-8">--}}
{{--																							<input type="text" class="form-control">--}}
{{--																						</div>--}}
{{--																					</div>--}}
{{--																					<div class="form-group row">--}}
{{--																						<label class="col-md-4">Task Message</label>--}}
{{--																						<div class="col-md-8">--}}
{{--																							<textarea class="form-control"></textarea>--}}
{{--																						</div>--}}
{{--																					</div>--}}
{{--																					<div class="form-group row">--}}
{{--																						<label class="col-md-4">Assigned to</label>--}}
{{--																						<div class="col-md-8">--}}
{{--																							<select class="selectpicker form-control" data-style="btn-outline-primary" title="Not Chosen" multiple="" data-selected-text-format="count" data-count-selected-text= "{0} people selected">--}}
{{--																								<option>Ferdinand M.</option>--}}
{{--																								<option>Don H. Rabon</option>--}}
{{--																								<option>Ann P. Harris</option>--}}
{{--																								<option>Katie D. Verdin</option>--}}
{{--																								<option>Christopher S. Fulghum</option>--}}
{{--																								<option>Matthew C. Porter</option>--}}
{{--																							</select>--}}
{{--																						</div>--}}
{{--																					</div>--}}
{{--																					<div class="form-group row mb-0">--}}
{{--																						<label class="col-md-4">Due Date</label>--}}
{{--																						<div class="col-md-8">--}}
{{--																							<input type="text" class="form-control date-picker">--}}
{{--																						</div>--}}
{{--																					</div>--}}
{{--																				</form>--}}
{{--																			</li>--}}
{{--																			<li>--}}
{{--																				<a href="javascript:;" class="remove-task"  data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Remove Task"><i class="ion-minus-circled"></i></a>--}}
{{--																				<form>--}}
{{--																					<div class="form-group row">--}}
{{--																						<label class="col-md-4">Task Type</label>--}}
{{--																						<div class="col-md-8">--}}
{{--																							<input type="text" class="form-control">--}}
{{--																						</div>--}}
{{--																					</div>--}}
{{--																					<div class="form-group row">--}}
{{--																						<label class="col-md-4">Task Message</label>--}}
{{--																						<div class="col-md-8">--}}
{{--																							<textarea class="form-control"></textarea>--}}
{{--																						</div>--}}
{{--																					</div>--}}
{{--																					<div class="form-group row">--}}
{{--																						<label class="col-md-4">Assigned to</label>--}}
{{--																						<div class="col-md-8">--}}
{{--																							<select class="selectpicker form-control" data-style="btn-outline-primary" title="Not Chosen" multiple="" data-selected-text-format="count" data-count-selected-text= "{0} people selected">--}}
{{--																								<option>Ferdinand M.</option>--}}
{{--																								<option>Don H. Rabon</option>--}}
{{--																								<option>Ann P. Harris</option>--}}
{{--																								<option>Katie D. Verdin</option>--}}
{{--																								<option>Christopher S. Fulghum</option>--}}
{{--																								<option>Matthew C. Porter</option>--}}
{{--																							</select>--}}
{{--																						</div>--}}
{{--																					</div>--}}
{{--																					<div class="form-group row mb-0">--}}
{{--																						<label class="col-md-4">Due Date</label>--}}
{{--																						<div class="col-md-8">--}}
{{--																							<input type="text" class="form-control date-picker">--}}
{{--																						</div>--}}
{{--																					</div>--}}
{{--																				</form>--}}
{{--																			</li>--}}
{{--																		</ul>--}}
{{--																	</div>--}}
{{--																	<div class="add-more-task">--}}
{{--																		<a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Add Task"><i class="ion-plus-circled"></i> Add More Task</a>--}}
{{--																	</div>--}}
{{--																</div>--}}
{{--																<div class="modal-footer">--}}
{{--																	<button type="button" class="btn btn-primary">Add</button>--}}
{{--																	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
{{--																</div>--}}
{{--															</div>--}}
{{--														</div>--}}
{{--													</div>--}}
{{--													<!-- add task popup End -->--}}
{{--												</div>--}}
{{--											</div>--}}
{{--										</div>--}}
{{--										<!-- Diplomlar Tab End -->--}}
{{--										<!-- Setting Tab start -->--}}
{{--										<div class="tab-pane fade height-100-p" id="setting" role="tabpanel">--}}
{{--											<div class="profile-setting">--}}
{{--												<form>--}}
{{--													<ul class="profile-edit-list row">--}}
{{--														<li class="weight-500 col-md-6">--}}
{{--															<h4 class="text-blue h5 mb-20">Edit Your Personal Setting</h4>--}}
{{--															<div class="form-group">--}}
{{--																<label>Full Name</label>--}}
{{--																<input class="form-control form-control-lg" type="text">--}}
{{--															</div>--}}
{{--															<div class="form-group">--}}
{{--																<label>Title</label>--}}
{{--																<input class="form-control form-control-lg" type="text">--}}
{{--															</div>--}}
{{--															<div class="form-group">--}}
{{--																<label>Email</label>--}}
{{--																<input class="form-control form-control-lg" type="email">--}}
{{--															</div>--}}
{{--															<div class="form-group">--}}
{{--																<label>Date of birth</label>--}}
{{--																<input class="form-control form-control-lg date-picker" type="text">--}}
{{--															</div>--}}
{{--															<div class="form-group">--}}
{{--																<label>Gender</label>--}}
{{--																<div class="d-flex">--}}
{{--																<div class="custom-control custom-radio mb-5 mr-20">--}}
{{--																	<input type="radio" id="customRadio4" name="customRadio" class="custom-control-input">--}}
{{--																	<label class="custom-control-label weight-400" for="customRadio4">Male</label>--}}
{{--																</div>--}}
{{--																<div class="custom-control custom-radio mb-5">--}}
{{--																	<input type="radio" id="customRadio5" name="customRadio" class="custom-control-input">--}}
{{--																	<label class="custom-control-label weight-400" for="customRadio5">Female</label>--}}
{{--																</div>--}}
{{--																</div>--}}
{{--															</div>--}}
{{--															<div class="form-group">--}}
{{--																<label>Country</label>--}}
{{--																<select class="selectpicker form-control form-control-lg" data-style="btn-outline-secondary btn-lg" title="Not Chosen">--}}
{{--																	<option>United States</option>--}}
{{--																	<option>India</option>--}}
{{--																	<option>United Kingdom</option>--}}
{{--																</select>--}}
{{--															</div>--}}
{{--															<div class="form-group">--}}
{{--																<label>State/Province/Region</label>--}}
{{--																<input class="form-control form-control-lg" type="text">--}}
{{--															</div>--}}
{{--															<div class="form-group">--}}
{{--																<label>Postal Code</label>--}}
{{--																<input class="form-control form-control-lg" type="text">--}}
{{--															</div>--}}
{{--															<div class="form-group">--}}
{{--																<label>Phone Number</label>--}}
{{--																<input class="form-control form-control-lg" type="text">--}}
{{--															</div>--}}
{{--															<div class="form-group">--}}
{{--																<label>Address</label>--}}
{{--																<textarea class="form-control"></textarea>--}}
{{--															</div>--}}
{{--															<div class="form-group">--}}
{{--																<label>Visa Card Number</label>--}}
{{--																<input class="form-control form-control-lg" type="text">--}}
{{--															</div>--}}
{{--															<div class="form-group">--}}
{{--																<label>Paypal ID</label>--}}
{{--																<input class="form-control form-control-lg" type="text">--}}
{{--															</div>--}}
{{--															<div class="form-group">--}}
{{--																<div class="custom-control custom-checkbox mb-5">--}}
{{--																	<input type="checkbox" class="custom-control-input" id="customCheck1-1">--}}
{{--																	<label class="custom-control-label weight-400" for="customCheck1-1">I agree to receive notification emails</label>--}}
{{--																</div>--}}
{{--															</div>--}}
{{--															<div class="form-group mb-0">--}}
{{--																<input type="submit" class="btn btn-primary" value="Update Information">--}}
{{--															</div>--}}
{{--														</li>--}}
{{--														<li class="weight-500 col-md-6">--}}
{{--															<h4 class="text-blue h5 mb-20">Edit Social Media links</h4>--}}
{{--															<div class="form-group">--}}
{{--																<label>Facebook URL:</label>--}}
{{--																<input class="form-control form-control-lg" type="text" placeholder="Paste your link here">--}}
{{--															</div>--}}
{{--															<div class="form-group">--}}
{{--																<label>Twitter URL:</label>--}}
{{--																<input class="form-control form-control-lg" type="text" placeholder="Paste your link here">--}}
{{--															</div>--}}
{{--															<div class="form-group">--}}
{{--																<label>Linkedin URL:</label>--}}
{{--																<input class="form-control form-control-lg" type="text" placeholder="Paste your link here">--}}
{{--															</div>--}}
{{--															<div class="form-group">--}}
{{--																<label>Instagram URL:</label>--}}
{{--																<input class="form-control form-control-lg" type="text" placeholder="Paste your link here">--}}
{{--															</div>--}}
{{--															<div class="form-group">--}}
{{--																<label>Dribbble URL:</label>--}}
{{--																<input class="form-control form-control-lg" type="text" placeholder="Paste your link here">--}}
{{--															</div>--}}
{{--															<div class="form-group">--}}
{{--																<label>Dropbox URL:</label>--}}
{{--																<input class="form-control form-control-lg" type="text" placeholder="Paste your link here">--}}
{{--															</div>--}}
{{--															<div class="form-group">--}}
{{--																<label>Google-plus URL:</label>--}}
{{--																<input class="form-control form-control-lg" type="text" placeholder="Paste your link here">--}}
{{--															</div>--}}
{{--															<div class="form-group">--}}
{{--																<label>Pinterest URL:</label>--}}
{{--																<input class="form-control form-control-lg" type="text" placeholder="Paste your link here">--}}
{{--															</div>--}}
{{--															<div class="form-group">--}}
{{--																<label>Skype URL:</label>--}}
{{--																<input class="form-control form-control-lg" type="text" placeholder="Paste your link here">--}}
{{--															</div>--}}
{{--															<div class="form-group">--}}
{{--																<label>Vine URL:</label>--}}
{{--																<input class="form-control form-control-lg" type="text" placeholder="Paste your link here">--}}
{{--															</div>--}}
{{--															<div class="form-group mb-0">--}}
{{--																<input type="submit" class="btn btn-primary" value="Save & Update">--}}
{{--															</div>--}}
{{--														</li>--}}
{{--													</ul>--}}
{{--												</form>--}}
{{--											</div>--}}
{{--										</div>--}}
{{--										<!-- Setting Tab End -->--}}
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>

@endsection

@section('js')
	<script src="{{ asset('assets/admin/src/plugins/switchery/switchery.min.js') }}"></script>
	<!-- bootstrap-tagsinput js -->
	<script src="{{ asset('assets/admin/src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>
	<!-- bootstrap-touchspin js -->
	<script src="{{ asset('assets/admin/src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js') }}"></script>
	<script src="{{ asset('assets/admin/vendors/scripts/advanced-components.js') }}"></script>

	<script type="text/javascript">
		$('select[name="region_id"]').change(function(){
			get_regions();
		});
		//
		// $('select[name="country_id"]').change(function(){
		// 	setTimeout(
		// 			function() {
		// 				get_regions();
		// 			}, 1000);
		// });

		$(document).ready(function(){
			get_regions();
		})
		function get_regions(){
			var old_area = '{{ old('area_id') }}';
			id = $('select[name="region_id"]').val();
			if (id != "") {
				var url = '/backoffice/get-areas/'+id;
				$.ajax({
					url: url,
					method: 'GET',
					success:function(result){
						var areas = '';
						result = JSON.parse(result);
						$.each(result , function(index, el) {
							if (old_area == el['id']) {
								areas = areas + '<option selected="true" value="'+el['id']+'">'+el['name']+'</option>';
							}
							else{
								areas = areas + '<option value="'+el['id']+'">'+el['name']+'</option>';
							}
						});
						$('select[name="area_id"]').html(areas);
					}
				})
			}
		}
	</script>

	<script type="text/javascript">

		$('select[name="country_id"]').change(function(){
			get_countrys();
		});
		$(document).ready(function(){
			get_countrys();
		});
		function get_countrys(){
			var old_region = '{{ old('region_id') }}';
			id = $('select[name="country_id"]').val();
			if (id != "") {
				var url = '/backoffice/get-regions/'+id;
				$.ajax({
					url: url,
					method: 'GET',
					success:function(result){
						var regions = '';
						result = JSON.parse(result);
												// console.log(result);

						$.each(result , function(index, el) {
							if(el['id']==15){
								// alert('ok');
$("#inputhide1").css("display", "none");
$("#inputhide2").css("display", "none");
$("#inputhideshow").css("display", "block");

							}
							else{

$("#inputhide1").css("display", "block");
$("#inputhide2").css("display", "block");
$("#inputhideshow").css("display", "none");

								regions = regions + '<option value="'+el['id']+'">'+el['name']+'</option>';
							}
						});
						$('select[name="region_id"]').html(regions);
					}
				})
			}
		}
	</script>


	<script>

		var uploadField = document.getElementById("file");

				uploadField.onchange = function() {

					if(this.files[0].size > 3145680){
					   alert("Bunday katta hajmdagi ma'lumot yuklashga ruxsat berilmagan. 5 Mb dan kichikroq fayl tanlang!");
					   this.value = "";
					$("#image_teg").attr("src","");

					};
				};
		$('input[type="file"]').each(function() {
    // get label text
    var label = $(this).parents('.form-group').find('label.lab111').text();
    label = (label) ? label : 'Tanlang';

    // wrap the file input
    $(this).wrap('<div class="input-file"></div>');
    // display label
    $(this).before('<span class="btn" style="width: 110%">'+label+'</span>');
    // we will display selected file here
    $(this).before('<span class="file-selected" style="height: 0px;"></span>');

    // file input change listener
    $(this).change(function(e){
        // Get this file input value
        var val = $(this).val();

        // Let's only show filename.
        // By default file input value is a fullpath, something like
        // C:\fakepath\Nuriootpa1.jpg depending on your browser.
        var filename = val.replace(/^.*[\\\/]/, '');

        // Display the filename
        $(this).siblings('.file-selected').text(filename);
    });
});

// Open the file browser when our custom button is clicked.
$('.input-file .btn').click(function() {
    $(this).siblings('input[type="file"]').trigger('click');
});
	</script>

@endsection
