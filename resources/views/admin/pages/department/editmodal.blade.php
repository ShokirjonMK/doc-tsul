<div class="modal fade bs-example-modal-lg" id="editmodal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel{{$item->id}}" aria-hidden="true">
				<div class="modal-dialog modal-lg modal-dialog-centered">
				<form  action="{{route('department.tahrir')}}" method="post" enctype="multipart/form-data">
								 @csrf
								 <input type="hidden" name="id" value="{{ $item->id }}">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title" id="myLargeModalLabel{{$item->id}}">{{$item->name}}</h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="close">&times;</span></button>
						</div>
						<div class="modal-body">
								<div class="form-group row">
									<label class="col-sm-12 col-md-2 col-form-label">Nomi</label>
									<div class="col-sm-12 col-md-10">
										<input class="form-control" type="text"  name="name" value="{{$item->name}}" placeholder="Nomi">
									</div>
								</div>
								
								<div class="form-group row">
									<label class="col-sm-12 col-md-2 col-form-label">Bo'ysunuvchisi</label>
									<div class="col-sm-12 col-md-10">
										<select class="form-control" name="parent_id" data-style="btn-outline-primary">
											<option value="{{ $item->parent_id }}">{{$item->parent()}}</option>
											@foreach($data as $selitem)
											@if($selitem->id != $item->id && $selitem->id != $item->parent_id )
											<option @if($selitem->status !=1 ) disabled @endif
											 value="{{$selitem->id}}">{{$selitem->name}}</option>
											 @endif
											@endforeach
										</select>{{-- 
										<select class="selectpicker form-control" name="parent_id">
											@foreach($data as $selitem)
											<option @if($selitem->status !=1 || $selitem->id == $item->id ) disabled @endif
											@if($selitem->id == $item->parent_id ) selected="" @endif value="{{$selitem->id}}">{{$selitem->name}}</option>
											@endforeach
										</select> --}}
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-12 col-md-2 col-form-label">Shtat soni</label>
									<div class="col-sm-12 col-md-10">
										<input class="form-control"  name="count_workers" value="{{$item->count_workers}}" type="text">
									</div>
								</div>
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Buyruq</label>
								<div class="col-sm-12 col-md-3">
									<input  required="true" class="form-control" placeholder="Nomi"  name="order_name" value="{{$item->order_name}}"  type="search">
								</div>
								<div class="col-sm-12 col-md-3">
									<input  required="true" class="form-control" placeholder="Vaqti"  name="order_date" value="{{$item->order_date}}" type="date">
								</div>
								<div class="col-sm-12 col-md-4">
									<input type="file" class="form-control file-input" name="order_file">
								</div>
							</div>

							<div class="form-group row">
									<label class="col-sm-12 col-md-2 col-form-label">Holati</label>
									<div class="col-sm-12 col-md-10">
										<select name="status" class="custom-select col-12">
											<option @if($item->status ==1) selected="" @endif value="1">Faol</option>
											<option @if($item->status ==2) selected="" @endif value="2">Nofaol</option>
										</select>
									</div>
								</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Yopish</button>
							<button type="submit" class="btn btn-primary">Saqlash</button>
						</div>
					</div>
				</form>
				</div>
			</div>
