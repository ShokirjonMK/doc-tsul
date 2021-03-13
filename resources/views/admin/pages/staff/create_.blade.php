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
<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="pd-20 card-box mb-30">
					<div class="clearfix j-flex" >
						<h4 class="text-blue h4">Xodim yaratish</h4>
					</div>
					<div class="wizard-content">
						<form class="tab-wizard wizard-circle wizard">
							<h5>Shaxsiy ma`lumotlar</h5>
							<section>
								
								<div class="row">
									<div class="col-md-9">
										<div class="row">

											<div class="col-md-4">
												<div class="form-group">
													<label >First Name :</label>
													<input type="text" class="form-control" name="first_name">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label >Last Name :</label>
													<input type="text" class="form-control" name="last_name">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>Middle name :</label>
													<input type="email" class="form-control" name="middle_name">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label >Region</label>
													<select class="form-control">
														<option>Uzbek</option>
														<option>Rus</option>
													</select>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label >Area</label>
													<select class="form-control">
														<option>Uzbek</option>
														<option>Rus</option>
													</select>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label >Address</label>
													<input type="text" class="form-control" name="">
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label>Phone Number :</label>
													<input type="text" class="form-control" name="phone">
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label>Phone Home :</label>
													<input type="text" class="form-control" name="phone_home">
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label>Birthday :</label>
													<input type="date" class="form-control" name="phone">
												</div>
											</div>
											{{-- <div class="col-md-3">
												<div class="form-group" >
													<label>Passport seria and number :</label>
													<div class="j-flex">
														<input type="text" class="form-control " style="width: 29%;">
														<input type="text" class="form-control "  style="width: 71%">
													</div>
												</div>
											</div> --}}
											<div class="col-md-3">
												<div class="form-group">
													<label >Military :</label>
													<select class="form-control">
														<option>Uzbek</option>
														<option>Rus</option>
													</select>
												</div>
											</div>
											
										</div>
									</div>
									<style type="text/css">
										.img-select{
											border-color: #d4d4d4;
											border: 1px solid #ced4da;
											border-radius: .25rem;
											width: 200px;
											height: 200px; position: relative;
										}
										.img-select-button{
											position: absolute;
											right: 0;
											bottom: 0;
										}
									</style>
									<div class="col-md-3 " >
										<div class="row" >
											<div class="form-group">
											<label>Rasm</label>
											<div class="img-select ">
												<img src="" class="selected-image image"  src="">
												<button type="button" class="btn btn-light img-select-button" data-select="image"><i class="icon-copy fa fa-pencil" aria-hidden="true"></i></button>
											</div>
											<input type="file" id="image" class="form-control img-input" hidden="true" name="">
										</div>
										</div>
									</div>
								</div>
							
							</section>
							<!-- Step 2 -->
							<h5>Passport va diplom ma`lumotlari</h5>
							<section>
								<div class="row">
									<div class="col-md-9">
										<div class="row">
											<div class="col-md-4">
												<div class="form-group" >
													<label>Passport seria and number :</label>
													<div class="j-flex">
														<input type="text" class="form-control " style="width: 29%;">
														<input type="text" class="form-control "  style="width: 71%">
													</div>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group" >
													<label>Passport JSHSHIR :</label>
													<input type="text" class="form-control" name="">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group" >
													<label>Kim tomondan berilgan</label>
													<input type="text" class="form-control" name="">
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group" >
													<label>Berilgan sana</label>
													<input type="date" class="form-control" name="">
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group" >
													<label>Amal qilish muddati</label>
													<input type="date" class="form-control" name="">
												</div>
											</div>

											
										</div>

									</div>
									
									<div class="col-md-3 " >
										<div class="row" >
											<div class="form-group">
											<label>Passport copy (jpg , png)</label>
											<div class="img-select ">
												<img src="" class="selected-image passport_image" src="">
												<button type="button" class="btn btn-light img-select-button " data-select="passport_image"><i class="icon-copy fa fa-pencil" aria-hidden="true"></i></button>
											</div>
											<input type="file" id="passport_image" class="form-control img-input" hidden="true" name="">
										</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-8">
										<div class="row">
											<div class="col-md-4">
												<div class="form-group" >
													<label>Diplom seria and number :</label>
													<div class="j-flex">
														<input type="text" class="form-control " style="width: 29%;">
														<input type="text" class="form-control "  style="width: 71%">
													</div>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group" >
													<label>Diplom type :</label>
													<select class="form-control">
														<option>Magister</option>
														<option>Bakalavr</option>
													</select>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group" >
													<label>Specialization :</label>
													<input type="text" class="form-control" name="">
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group" >
													<label>Mutaxasislik shifri</label>
													<input type="text" class="form-control" name="">
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group" >
													<label>Berilgan sana</label>
													<input type="date" class="form-control" name="">
												</div>
											</div>
									
											
										</div>

									</div>
									
									<div class="col-md-2 " >
										<div class="row" >
											<div class="form-group">
											<label>Diplom copy (jpg , png)</label>
											<div class="img-select ">
												<img src="" class="selected-image diplom_image" src="">
												<button type="button" class="btn btn-light img-select-button " data-select="diplom_image"><i class="icon-copy fa fa-pencil" aria-hidden="true"></i></button>
											</div>
											<input type="file" id="diplom_image" class="form-control img-input" hidden="true" name="">
										</div>
										</div>
									</div>
									<div class="col-md-2 " >
										<div class="row" >
											<div class="form-group">
											<label>Diplom ilova copy (jpg , png)</label>
											<div class="img-select ">
												<img src="" class="selected-image diplom_ilova_image" src="">
												<button type="button" class="btn btn-light img-select-button " data-select="diplom_ilova_image"><i class="icon-copy fa fa-pencil" aria-hidden="true"></i></button>
											</div>
											<input type="file" id="diplom_ilova_image" class="form-control img-input" hidden="true" name="">
										</div>
										</div>
									</div>
								</div>
							</section>
							<!-- Step 3 -->
							<h5>Ishlagan joylari</h5>
							<section>
								<style type="text/css">
									.sticky th{
										position: sticky;
										top: 0;
										background-color: #E1DC4B;
										border
									}
									.sticky{
										background-color: #E1DC4B;
										border: 1px solid #ced4da;
									}
								</style>
								<div class="row table-responsive" style="max-height: 500px; overflow: hidden; overflow-y: scroll;">
									 <table     class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr class="sticky">
                                                <th>#</th>
                                                <th>Ishlagan joyi</th>
                                                <th>Lavozimi</th>
                                                <th>Ishga kirgan vaqti</th>
                                                <th>Ishdan bo'shagan vaqti</th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody class="add-group-table">
                                           <tr >
	                                           	<td class="last-td ">
	                                           		<button type="button" class="btn btn-success add-input">
	                                           			<i class="fa fa-plus"></i>
	                                           		</button>
	                                           	</td>
	                                           	<td>
	                                           		<input type="text" class="form-control" name="input[1][name]">
	                                           	</td>
                                                
	                                           	<td>
	                                           		<input type="text" class="form-control" name="input[1][name]">
	                                           	</td>
	                                           	<td class="td_date">
	                                           		<input type="date" class="form-control" name="input[1][students_count]">
	                                           	</td>
	                                           	<td class="td_date">
	                                           		<input type="date" class="form-control" name="input[1][students_count]">
	                                           	</td>
                                           </tr>
                                        </tbody>

                                 
                                    </table>
								</div>
							</section>
							<!-- Step 4 -->
							<h5>Qarindoshlar</h5>
							<section>
								<style type="text/css">
									.sticky th{
										position: sticky;
										top: 0;
										background-color: #E1DC4B;
										border
									}
									.sticky{
										background-color: #E1DC4B;
										border: 1px solid #ced4da;
									}
								</style>
								<div class="row table-responsive-2" style="max-height: 500px; overflow: hidden; overflow-y: scroll;">
									 <table     class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr class="sticky">
                                                <th>#</th>
                                                <th>Turi</th>
                                                <th>F.I.SH</th>
                                                <th>Tug`ilgan sanai</th>
                                                <th>Manzili</th>
                                                <th>Ish joyi</th>
                                                <th>Lavozimi</th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        <style type="text/css">
                                        	.pad-0 td{
                                        		padding: 0px !important;
                                        	}
                                        </style>
                                        <tbody class="add-group-table-2 pad-0">
                                           <tr >
	                                           	<td class="last-td ">
	                                           		<button type="button" class="btn btn-success add-input-2">
	                                           			<i class="fa fa-plus"></i>
	                                           		</button>
	                                           	</td>
	                                           	<td>
	                                           		<input type="text" class="form-control" name="input[1][name]">
	                                           	</td>
                                                
	                                           	<td>
	                                           		<input type="text" class="form-control" name="input[1][name]">
	                                           	</td>
	                                           	<td class="td_date">
	                                           		<input type="date" class="form-control" name="input[1][students_count]">
	                                           	</td>
	                                           		<td>
	                                           		<input type="text" class="form-control" name="input[1][name]">
	                                           	</td>
	                                           	<td>
	                                           		<input type="text" class="form-control" name="input[1][name]">
	                                           	</td>
	                                           	<td>
	                                           		<input type="text" class="form-control" name="input[1][name]">
	                                           	</td>
	                                           	
                                           </tr>
                                        </tbody>

                                 
                                    </table>
								</div>
							</section>
							<h5>Qo'shimcha ma`lumotlar</h5>
							<section>
								<div class="row">
										<div class="col-md-3">
											<div class="form-group">
												<label>Ish boshlash sanasi(Buyruq)</label>
												<input type="text" class="form-control">
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>INN</label>
												<input type="text" class="form-control">
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>INPS</label>
												<input type="text" class="form-control">
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>INN copy (.pdf)</label>
												<input type="file" class="form-control">
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>IPS copy (.pdf)</label>
												<input type="file" class="form-control">
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Tavsiyanoma yoki ma`lumotnoma  (.pdf)</label>
												<input type="file" class="form-control">
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Tibbiy ma`lumotnoma  (.pdf)</label>
												<input type="file" class="form-control">
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Sudlanmaganlik haqida ma`lumotnoma  (.pdf)</label>
												<input type="file" class="form-control">
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Avtobiografiya   (.pdf)</label>
												<input type="file" class="form-control">
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Rezyume  (.pdf)</label>
												<input type="file" class="form-control">
											</div>
										</div>
										
									
								</div>
							</section>
						</form>
					</div>
				</div>

				

				<!-- success Popup html Start -->
				<div class="modal fade" id="success-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-body text-center font-18">
								<h3 class="mb-20">Form Submitted!</h3>
								<div class="mb-30 text-center"><img src="vendors/images/success.png"></div>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							</div>
							<div class="modal-footer justify-content-center">
								<button type="button" class="btn btn-primary" data-dismiss="modal">Done</button>
							</div>
						</div>
					</div>
				</div>
				<!-- success Popup html End -->
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
	<script src="{{ asset('assets/admin/src/plugins/jquery-steps/jquery.steps.js') }}"></script>
	<script src="{{ asset('assets/admin/vendors/scripts/steps-setting.js') }}"></script>
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
		var tartib = 2;
		$('body').on('click' , '.add-input' , function(){
			// alert("dfj");
			
			$('.add-input').remove();
			var tr_one = ' <tr><td class="last-td"><button class="btn btn-success add-input"><i class="fa fa-plus"></i></button></td><td><input class="form-control" type="text" name="input['+tartib+'][name]"></td><td> <input class="form-control" type="text" name="input['+tartib+'][name]"> </td><td class="td_date"><input class="form-control" type="date" name="input['+tartib+'][students_count]"></td><td class="td_date"><input type="date"  class="form-control" name="input['+tartib+'][students_count]"></td></tr>';
			$('.add-group-table').append(tr_one);
	        $('.table-responsive').scrollTop(10000000000000000000000000);
	        // $('.table-responsive').scrollTop($('.table-responsive').height);
			tartib++;

		});
	</script>
	<script type="text/javascript">
		var tartib = 2;
		$('body').on('click' , '.add-input-2' , function(){
			// alert("dfj");
			
			$('.add-input-2').remove();
			var tr_one = ' <tr><td class="last-td"><button class="btn btn-success add-input-2"><i class="fa fa-plus"></i></button></td><td><input class="form-control" type="text" name="input['+tartib+'][name]"></td><td> <input class="form-control" type="text" name="input['+tartib+'][name]"> </td><td class="td_date"><input class="form-control" type="date" name="input['+tartib+'][students_count]"></td> <td> <input class="form-control" type="text" name="input['+tartib+'][name]"></td> <td> <input class="form-control" type="text" name="input['+tartib+'][name]"></td> <td> <input class="form-control" type="text" name="input['+tartib+'][name]"></td> </tr>';
			$('.add-group-table-2').append(tr_one);
	        $('.table-responsive-2').scrollTop(10000000000000000000000000);
	        // $('.table-responsive').scrollTop($('.table-responsive').height);
			tartib++;

		});
	</script>

@endsection
