  <div class="form-group">
            
            <label>
                <span class="error">
                <?php $__errorArgs = ['passport_pdf'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <?php echo e($message); ?>

                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </span>
            </label>
            <div class="img-select ">
                <button type="button" class="btn btn-light documet-select-button" data-select="document-mk">Fayl tanlang <i class="icon-copy fa fa-pencil" aria-hidden="true"></i></button>
            </div>
            <input type="file" id="document-mk" class="form-control" hidden="true" name="document" accept="application/pdf" />
        </div>



        <iframe id="iframePdf" style="display: none; width: 100%"; height="600px;" src="" class="document-mk" src=""></iframe>
        
<?php $__env->startSection('js'); ?>


<script type="text/javascript">
    var uploadField = document.getElementById("document-mk");
        uploadField.onchange = function() {
           
            if(this.files[0].size > 5242800){
                alert("Bunday katta hajmdagi ma'lumot yuklashga ruxsat berilmagan. Kichikroq fayl tanlang!");
                this.value = "";
                $("#iframePdf").attr("src","");
            };
        };
</script>


<script type="text/javascript">
    
    // button bosish bilan input ni bosish
    $('.documet-select-button').click(function(event) {
        var id = $(this).attr('data-select');
        $('#'+id).click();
    });
    
    // funksiya scr ga ma'lumot uzatadigon
    function readURL(input , id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('.'+id).attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    //input o'zgarganda 
    $("#document-mk").change(function () {
        var id = $(this).attr('id');
        readURL(this , id);
        $("#iframePdf").css("display", "block");
    });

</script>
<?php $__env->stopSection(); ?><?php /**PATH C:\wamp64\www\doc-tsul\resources\views/mk/pages/doc/form.blade.php ENDPATH**/ ?>