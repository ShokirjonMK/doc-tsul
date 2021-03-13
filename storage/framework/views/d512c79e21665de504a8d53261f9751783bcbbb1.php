
		<div class="modal fade bs-example-modal-lg" id="editmodal<?php echo e($item->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title" id="myLargeModalLabel">University qo'shish</h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="close">&times;</span></button>

						</div>
						<div class="modal-body">
							<form action="<?php echo e(route('university.tahrir')); ?>" method="post" enctype="multipart/form-data">
								 <?php echo csrf_field(); ?>
								 <input type="hidden" name="id" value="<?php echo e($item->id); ?>">

								<div class="form-group row">
									<label class="col-sm-12 col-md-2 col-form-label">Nomi</label>
									<div class="col-sm-12 col-md-10">
										<input  required="true" class="form-control" type="text"  name="name"  value="<?php echo e($item->name); ?>" placeholder="Nomini kiriting...">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-12 col-md-2 col-form-label">Qisqa nomi</label>
									<div class="col-sm-12 col-md-10">
										<input  required="true" class="form-control"  name="name_short"  value="<?php echo e($item->name_short); ?>" placeholder="Kiriting..." type="text">
									</div>
								</div>

								<div class="form-group row">
									<label class="col-sm-12 col-md-2 col-form-label">Holati</label>
									<div class="col-sm-12 col-md-10">
										<select class=" form-control" name="status" data-style="btn-outline-primary">
										
											<option <?php if($item->status==1): ?> selected <?php endif; ?> value="1">Faol</option>
											<option <?php if($item->status==2): ?> selected <?php endif; ?> value="2">Nofaol</option>
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
<?php $__env->stopSection(); ?><?php /**PATH /var/www/kadr/resources/views/admin/pages/university/editmodal.blade.php ENDPATH**/ ?>