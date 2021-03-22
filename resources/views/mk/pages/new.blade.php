@extends('admin.layouts.master')
@section('link')
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/src/plugins/jquery-steps/jquery.steps.css') }}">
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>

@endsection
@section('content')
	<style type="text/css">
		.last-td{
			width: 1px;
			padding-left: 3px !important;
			padding-right: 3px !important;
			text-align: center;
		}
		.td_date{
			width: 1px;
		}
	</style>
	<style type="text/css">
		.img-select-image{
			border-color: #d4d4d4;
			border: 1px solid #ced4da;
			border-radius: .25rem;
			width: 113.385826772px;
			height: 151.181102362px; position: relative;
		}
		.img-select{
			border-color: #d4d4d4;
			/*border: 1px solid #ced4da;*/
			border-radius: .25rem;

			position: relative;
		}
		.img-select > iframe{
			width: 100%;
		}
		.img-select-button{
			position: absolute;
			right: 0;
			bottom: 0;
		}
		.img-select-button123{
			position: absolute;
			right: 2px;
			bottom: 7px;
		}
		div>label>span{
			color: #d61a1c;
			margin-right: 6px;
		}
	</style>
	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="pd-20 card-box mb-30">
					<div class="clearfix j-flex" >
						<h4 class="text-blue h4">Xodim qo'shish</h4>
					</div>
					<div class="wizard-content">
						<form autocomplete="off" action="{{ route('staff.store') }}" class="tab-wizard wizard-circle wizard" method="post" enctype="multipart/form-data">
							@csrf
							<h5>Asosiy ma`lumotlar</h5>
							<section>
								<div class="row">
									<div class="col-md-9">
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
													<input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}">
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
													<input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}">
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
													<input type="text" class="form-control" name="middle_name" value="{{ old('middle_name') }}">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label><span>*</span>Davlat:
														<span class="error">
															@error('country_id')
															{{ $message }}
															@enderror
														</span>
													</label>

													<select class="form-control" name="country_id">
														@foreach($countries as $country)
															<option @if((old('country_id') == $country->id) || ($country->code == "UZ")) selected @endif value="{{ $country->id }}">{{ $country->name }}</option>
														@endforeach
													</select>
												</div>
											</div>

											<div class="col-md-4">
												<div class="form-group">
													<label><span>*</span>Viloyat:
														<span class="error">
															@error('region_id')
															{{ $message }}
															@enderror
														</span>
													</label>

													<select class="form-control" name="region_id">
														@foreach($regions as $region)
															<option @if(old('region_id') == $region->id) selected @endif value="{{ $region->id }}">{{ $region->name }}</option>
														@endforeach
													</select>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label><span>*</span>Tuman:
														<span class="error">
															@error('area_id')
															{{ $message }}
															@enderror
														</span>
													</label>
													<select class="form-control" name="area_id">

													</select>
												</div>
											</div>


										</div>
									</div>
									<div class="col-md-3" >

											<div class="form-group">
												<label>Rasm (< 3 Mb):
													<span class="error">
													@error('image')
														{{ $message }}
														@enderror
												</span>
												</label>
												<div class="img-select-image ">
													<img src="" id="image_teg" class="selected-image image"  >
													<button type="button" id="InputFileToTheServer_MK" class="btn btn-light img-select-button" data-select="image"><i class="icon-copy fa fa-pencil" aria-hidden="true"></i></button>
												</div>
												<input type="file" id="image" class="form-control img-input exampleInputFile" hidden="true" name="image">
											</div>

									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label><span>*</span>Manzil:
												<span class="error">
															@error('address')
													{{ $message }}
													@enderror
														</span>
											</label>
											<input type="text" class="form-control" name="address" value="{{ old('address') }}">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label><span>*</span>Asosiy telefon :
												<span class="error">
															@error('phone')
													{{ $message }}
													@enderror
														</span>
											</label>
											<input type="text" class="form-control phone" maxlength="10" placeholder="99 9999999" name="phone" value="{{ old('phone') }}">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Qo'shimcha telefon :
												<span class="error">
															@error('phone1')
													{{ $message }}
													@enderror
														</span>
											</label>
											<input type="text" class="form-control phone"  max="9"  placeholder="99 9999999" name="phone1" value="{{ old('phone1') }}">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Uy telefon :
												<span class="error">
															@error('phone_home')
													{{ $message }}
													@enderror
														</span>
											</label>
											<input type="text" class="form-control phone"  max="9"  placeholder="99 9999999" name="phone_home" value="{{ old('phone_home') }}">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label><span>*</span>Tug'ilgan sana :
												<span class="error">
															@error('birthday')
													{{ $message }}
													@enderror
														</span>
											</label>
											<input class="form-control" name="birthday" max="{{$date18}}" min="{{$date80}}" value="{{ old('birthday') }}" placeholder="Sanani tanlang" type="date">
										</div>
									</div>

									<div class="col-md-3">
										<div class="form-group">
											<label><span>*</span>Millati :
												<span class="error">
															@error('nationality_id')
													{{ $message }}
													@enderror
														</span>
											</label>
											<select class="form-control" name="nationality_id">
												@foreach($nationalities as $nationality)
													<option @if(old('nationality_id') == $nationality->id) selected="true" @endif value="{{ $nationality->id }}">{{ $nationality->name }}</option>
												@endforeach

											</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label><span>*</span>Jinsi :
												<span class="error">
															@error('gender')
													{{ $message }}
													@enderror
														</span>
											</label>
											<select class="form-control" name="gender">

												<option value="1" selected="true">Erkak</option>
												<option value="0">Ayol</option>


											</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Tabel raqami:
												<span class="error">
													@error('table_number')
													{{ $message }}
													@enderror
														</span>
											</label>
											<input  onkeypress="return /[0-9]/i.test(event.key)" type="text" class="form-control"  max="9"  placeholder="" name="table_number" value="{{ old('table_number') }}">
										</div>
									</div>
								</div>
							</section>
							<!-- Step 2 -->
							<h5>Qo'shimcha ma`lumotlari</h5>
							<section>
								<div class="row">
									<div class="col-md-9">
										<div class="row">
											<div class="col-md-4">
												<div class="form-group" >
													<label><span>*</span>Passport seriya va raqam:
														<span class="error">
																@error('passport_seria')
															{{ $message }}
															@enderror
														</span>
														<span class="error">
															@error('passport_number')
															{{ $message }}
															@enderror
														</span>
													</label>
													<div class="j-flex">

														<input type="text" onkeypress="return /[A-Z]/i.test(event.key)" id="passport_seria" class="form-control " style="width: 25%;" name="passport_seria" value="{{ old('passport_seria') }}">
														<input type="text" onkeypress="return /[0-9]/i.test(event.key)" id="passport_number" class="form-control "  style="width: 74%" name="passport_number" value="{{ old('passport_number') }}">
													</div>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group" >
													<label><span>*</span>Passport JSHSHIR :
														<span class="error">
															@error('passport_jshshir')
															{{ $message }}
															@enderror
														</span>
													</label>
													<input type="text" onkeypress="return /[0-9]/i.test(event.key)" id="passport_jshshir" class="form-control" name="passport_jshshir" value="{{ old('passport_jshshir') }}">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group" >
													<label><span>*</span>Kim tomondan berilgan:
														<span class="error">
															@error('passport_given_by')
															{{ $message }}
															@enderror
														</span>
													</label>
													<input maxlength="255" type="text" class="form-control" name="passport_given_by" value="{{ old('passport_given_by') }}">
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group" >
													<label><span>*</span>Berilgan sana:
														<span class="error">
															@error('passport_issued_date')
															{{ $message }}
															@enderror
														</span>
													</label>
													<input maxlength="255" type="date" class="form-control" min="{{$minpassportdate}}" max="{{$yesterday}}" name="passport_issued_date" value="{{ old('passport_issued_date') }}">
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group" >
													<label><span>*</span>Amal qilish muddati:
														<span class="error">
															@error('passport_expiration_date')
															{{ $message }}
															@enderror
														</span>
													</label>
													<input type="date" class="form-control" name="passport_expiration_date" value="{{ old('passport_expiration_date') }}">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label><span>*</span>Ish rejimi :
														<span class="error">
															@error('ish_rejimi_id')
															{{ $message }}
															@enderror
														</span>
													</label>
													<select class="form-control" name="ish_rejimi_id">
														@foreach($ish_rejimi as $ish_rejimione)
															<option @if(old('ish_rejimi_id') == $ish_rejimione->id ) selected="true" @endif value="{{ $ish_rejimione->id }}">{{ $ish_rejimione->name }}</option>
														@endforeach

													</select>
												</div>
											</div>
											<div class="col-md-2">
												<div class="form-group">
													<label><span>*</span>Stavka :
														<span class="error">
															@error('stavka_id')
															{{ $message }}
															@enderror
														</span>
													</label>
													<select class="form-control" name="stavka_id">
														@foreach($stavka as $stavkaone)
															<option @if(old('stavka_id') == $stavkaone->id || $stavkaone->name == 1) selected="true" @endif value="{{ $stavkaone->id }}">{{ $stavkaone->name }}</option>
														@endforeach

													</select>
												</div>
											</div>

										</div>

									</div>

									<div class="col-md-3 ">
											<div class="form-group">
												<label>Passport fayl (pdf < 5 Mb):
													<span class="error">
													@error('passport_pdf')
														{{ $message }}
														@enderror
												</span>
												</label>
												<div class="img-select ">
													<iframe id="iframePdf" src="" class="selected-image passport_image" src=""></iframe>
													<button type="button" class="btn btn-light img-select-button img-select-button123" data-select="passport_image"><i class="icon-copy fa fa-pencil" aria-hidden="true"></i></button>
												</div>
												<input type="file" id="passport_image" class="form-control img-input" hidden="true" name="passport_pdf" accept="application/pdf" />
											</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<label><span>*</span>Ma'lumoti :
												<span class="error">
															@error('degree_info_id')
													{{ $message }}
													@enderror
														</span>
											</label>
											<select class="form-control" name="degree_info_id">
												@foreach($degree_info as $degree_info_one)
													<option @if(old('degree_info_id') == $degree_info_one->id ) selected="true" @endif value="{{ $degree_info_one->id }}">{{ $degree_info_one->name }}</option>
												@endforeach

											</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label><span>*</span>Ilmiy darajasi :
												<span class="error">
															@error('academic_degree_id')
													{{ $message }}
													@enderror
														</span>
											</label>
											<select class="form-control" name="academic_degree_id">
												@foreach($academic_degree as $academic_degree_one)
													<option @if(old('academic_degree_id') == $academic_degree_one->id ) selected="true" @endif value="{{ $academic_degree_one->id }}">{{ $academic_degree_one->name }}</option>
												@endforeach

											</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label><span>*</span>Ilmiy unvoni :
												<span class="error">
															@error('degree_id')
													{{ $message }}
													@enderror
														</span>
											</label>
											<select class="form-control" name="degree_id">
												@foreach($degree as $degree_one)
													<option @if(old('degree_id') == $degree_one->id ) selected="true" @endif value="{{ $degree_one->id }}">{{ $degree_one->name }}</option>
												@endforeach

											</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label><span>*</span>Maxsus unvoni :
												<span class="error">
															@error('special_degree_id')
													{{ $message }}
													@enderror
														</span>
											</label>
											<select class="form-control" name="special_degree_id">
												@foreach($special_degrees as $special_degrees_one)
													<option @if(old('special_degree_id') == $special_degrees_one->id ) selected="true" @endif value="{{ $special_degrees_one->id }}">{{ $special_degrees_one->name }}</option>
												@endforeach

											</select>
										</div>
									</div>
								</div>


								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<label><span>*</span>Partiyaviyligi :
												<span class="error">
															@error('partiya_id')
													{{ $message }}
													@enderror
														</span>
											</label>
											<select class="form-control" name="partiya_id">
												@foreach($partiya as $partiya_one)
													<option @if(old('partiya_id') == $partiya_one->id ) selected="true" @endif value="{{ $partiya_one->id }}">{{ $partiya_one->name }}</option>
												@endforeach

											</select>
										</div>
										<div class="form-group">
											<label><span>*</span>Qo'shimcha tillar :
												<span class="error">
															@error('lang_id')
													{{ $message }}
													@enderror
												</span>
											</label>
											<select  name="lang[]" class="custom-select2 form-control" multiple="multiple" style="width: 100%;">
												<optgroup label="Tillarni tanlang">
													@foreach($language as $language_one)
														<option value="{{$language_one->id}}">{{$language_one->name}}</option>
													@endforeach
												</optgroup>
											</select>
										</div>
									</div>
									<div class="col-md-9">
										<div class="form-group">
											<label style="">Xalq deputatlari, respublika, viloyat, shahar va tuman Kengashi deputatimi yoki boshqa saylanadigan organlarning a’zosimi:
												<span class="error">
															@error('deputat')
													{{ $message }}
													@enderror
														</span>
											</label>
											<textarea style="width: 100%" name="deputat"  rows="6" cols="33"></textarea>
										</div>
									</div>

								</div>


							</section>
							<!-- Step 3 -->


						</form>
					</div>
				</div>


{{-- 
				<!-- success Popup html Start -->
				<div class="modal fade" id="success-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-body text-center font-18">
								<h3 class="mb-20">Form Submitted!</h3>
								<div class="mb-30 text-center"><img src="{{ asset('assets/admin/vendors/images/success.png') }}"></div>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							</div>
							<div class="modal-footer justify-content-center">
								<button type="button" class="btn btn-primary" data-dismiss="modal">Done</button>
							</div>
						</div>
					</div>
				</div>
				<!-- success Popup html End --> --}}
			</div>

		</div>
	</div>




@endsection

@section('js')
	{{-- <script src="{{ asset('assets/admin/src/plugins/switchery/switchery.min.js') }}"></script> --}}
	<!-- bootstrap-tagsinput js -->
	{{-- <script src="{{ asset('assets/admin/src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script> --}}
	<!-- bootstrap-touchspin js -->
	{{-- <script src="{{ asset('assets/admin/src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js') }}"></script> --}}
	{{-- <script src="{{ asset('assets/admin/vendors/scripts/advanced-components.js') }}"></script> --}}

	<script type="text/javascript">

$(".wizard-content .wizard .actions ul li a[href='#next']").html("Keyingi");
$(".wizard-content .wizard .actions ul li a[href='#previous']").html("Oldingi");
$(".wizard-content .wizard .actions ul li a[href='#finish']").html("Saqlash");

	</script>

	<script type="text/javascript">
			var uploadField = document.getElementById("image");

				uploadField.onchange = function() {

					if(this.files[0].size > 3145680){
					   alert("Bunday katta hajmdagi ma'lumot yuklashga ruxsat berilmagan. Kichikroq fayl tanlang!");
					   this.value = "";
					$("#image_teg").attr("src","");

					};
				};
			var uploadField = document.getElementById("passport_image");

				uploadField.onchange = function() {

					if(this.files[0].size > 5242800){
					   alert("Bunday katta hajmdagi ma'lumot yuklashga ruxsat berilmagan. Kichikroq fayl tanlang!");
					   this.value = "";
					$("#iframePdf").attr("src","");

					};
				};
	</script>
	<script type="text/javascript">
		$('.img-select-button').click(function(event) {
			var id = $(this).attr('data-select');
			$('#'+id).click();
		});
		function readURL(input , id) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function (e) {
					$('.'+id).attr('src', e.target.result);
				}

				reader.readAsDataURL(input.files[0]);
			}
		}

		$(".img-input").change(function () {
			var id = $(this).attr('id');

			readURL(this , id);
		});
	</script>

	<script type="text/javascript">
		$('select[name="region_id"]').change(function(){
			get_regions();
		});

		$('select[name="country_id"]').change(function(){
			setTimeout(
					function() {
						get_regions();
					}, 1000);
		});
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
						$.each(result , function(index, el) {
							if (old_region == el['id']) {
								regions = regions + '<option selected="true" value="'+el['id']+'">'+el['name']+'</option>';
							}
							else{
								regions = regions + '<option value="'+el['id']+'">'+el['name']+'</option>';
							}
						});
						$('select[name="region_id"]').html(regions);
					}
				})
			}
		}
	</script>
{{--<script>--}}

{{--var uploadField = document.getElementById("InputFileToTheServer_MK");--}}

{{--uploadField.onchange = function() {--}}
{{--	var fileupload = document.getElementById("image");--}}
{{--    if(fileupload.files[0].size > 5242800){--}}
{{--       alert("Bunday katta hajmdagi ma'lumot yuklashga ruxsat berilmagan. Kichikroq fayl tanlang!");--}}
{{--       fileupload.value = "";--}}
{{--    };--}}
{{--};--}}






{{--var uploadField = document.getElementById("passport_image");--}}

{{--uploadField.onchange = function() {--}}

{{--    if(this.files[0].size > 52){--}}
{{--       alert("Bunday katta hajmdagi ma'lumot yuklashga ruxsat berilmagan. Kichikroq fayl tanlang!");--}}
{{--       this.value = "";--}}
{{--    };--}}
{{--};--}}
{{--</script>--}}

@endsection