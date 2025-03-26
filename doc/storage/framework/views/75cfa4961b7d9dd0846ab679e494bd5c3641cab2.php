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

html,
body {
  width: 100%;
  height: 100%;
}

body {
  padding: 30px;
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

		</style>
		<div class="modal fade bs-example-modal-lg" id="createmodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title" id="myLargeModalLabel">Tarkibiy bo'linma/Lavozim qo'shish</h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="close">&times;</span></button>
							
						</div>
						<div class="modal-body">
							<form  action="<?php echo e(route('department.store')); ?>" method="post" enctype="multipart/form-data">
								 <?php echo csrf_field(); ?>
								<div class="form-group row">
									<label class="col-sm-12 col-md-2 col-form-label">Nomi</label>
									<div class="col-sm-12 col-md-10">
										<input  required="true" class="form-control" type="text"  name="name" value="" placeholder="Nomini kiriting...">
									</div>
								</div>

								<div class="form-group row">
									<label class="col-sm-12 col-md-2 col-form-label">Bo'ysunuvchisi</label>
									<div class="col-sm-12 col-md-10">
										<select class="selectpicker form-control" name="parent_id" data-style="btn-outline-primary">
											<option value="">Tanlang...</option>
											<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $selitem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option <?php if($selitem->status !=1 ): ?> disabled <?php endif; ?> value="<?php echo e($selitem->id); ?>"><?php echo e($selitem->name); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-12 col-md-2 col-form-label">Shtat soni</label>
									<div class="col-sm-12 col-md-10">
										<input  required="true" class="form-control"  name="count_workers" value="" type="text">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-12 col-md-2 col-form-label">Buyruq</label>
									<div class="col-sm-12 col-md-3" style="height: 44px;">
										<input  required="true" class="form-control" placeholder="Nomi"  name="order_name" value=""  type="search">
									</div>
									<div class="col-sm-12 col-md-3" style="height: 44px;">
										<input  required="true" class="form-control" placeholder="Vaqti" min="2013-01-01" max="<?php echo e($date); ?>" name="order_date" value=""  type="date">
									</div>
									<div class="col-sm-12 col-md-4" style="height: 44px;">
										<div class="wrap">
											<div class="valign-middle">
												<div class="form-group">
													<label for="file" class="sr-only"> faylini yuklang</label>
													<input required="true" type="file" id="file" class="form-control file-input" name="order_file" accept="application/pdf">
												</div>
											</div>
										</div>

									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-12 col-md-2 col-form-label">Holati</label>
									<div class="col-sm-12 col-md-10">
										<select class="selectpicker form-control" required name="status" data-style="btn-outline-primary">
										
											<option value="1">Faol</option>
											<option value="2">Nofaol</option>
										</select>
									</div>
								</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Yopish</button>
							<button type="submit" class="btn btn-primary">Saqlash</button>
						</div>
					</form>		
					</div>
				</div>
			</div>

<?php $__env->startSection("js"); ?>
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
    var label = $(this).parents('.form-group').find('label').text();
    label = (label) ? label : 'Upload File';

    // wrap the file input
    $(this).wrap('<div class="input-file"></div>');
    // display label
    $(this).before('<span class="btn">'+label+'</span>');
    // we will display selected file here
    $(this).before('<span class="file-selected"></span>');

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
<?php $__env->stopSection(); ?><?php /**PATH /var/www/kadr/resources/views/admin/pages/department/createmodal.blade.php ENDPATH**/ ?>