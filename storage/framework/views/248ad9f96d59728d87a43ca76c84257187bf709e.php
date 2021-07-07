<?php $__env->startSection('link'); ?>
<style>
    .kichraytirbutton{
        height: 39px;
    }
</style>
<?php $__env->stopSection(); ?>

<div class="pd-20 card-box">
    <div class="clearfix row mb-2">
        <div class="col-md-7">
            <div class="pull-left">
                <h4 class="text-blue h4">Maydonlarni to'ldiring!</h4>
            </div>
        </div>
        
        <div class="col-md-2">
            <div class="pull-right mr-3">
                <h5 class="h4 mt-1">Holati</h5>
            </div>
        </div>
        <div class="col-md-3 kichraytirbutton">
            
                <select class="selectpicker form-control" required name="status" data-style="btn-outline-primary">
                                           
                    <option value="1" selected >Amalda</option>
                    <option value="0">O'z kuchini yo'qotgan</option>
                </select>
            
        </div>
       
    </div>
<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>    
    
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label> Nomi :</label>
                <input type="text" name="name" value="<?php echo e(old('name')); ?>" class="form-control">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label > Raqami :</label>
                <input type="text" value="<?php echo e(old('number')); ?>" name="number" class="form-control">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label > Muddati :</label>
                <input class="form-control date-picker" name="end_date" value="<?php echo e(old('end_date')); ?>" placeholder="Select Date" type="text">
                
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>Loiha kirituvchi biriktirish</label>
                <select name="users[]" class="selectpicker form-control" data-size="5" data-style="btn-outline-success" multiple data-actions-box="true" data-selected-text-format="count">
                    <optgroup label="Xodimlar tanlang">
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($user->id); ?>"><?php echo e($user->getfio()); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </optgroup>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label> Hujjat turi :</label>
                <select class="selectpicker form-control" required name="type" data-style="btn-outline-primary">
                                           
                    <option value="1" selected >Buyruq</option>
                    <option value="0">Kengash qarori</option>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label > Hujjat ta'luqliligi :</label>
                <select class="selectpicker form-control" required name="releted_id" data-style="btn-outline-primary">
                    <?php $__currentLoopData = $releted; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $releted_one): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($releted_one->id); ?>"><?php echo e($releted_one->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label > Nazoratchi :</label>
                <select class="selectpicker form-control" required name="supervisor_id" data-style="btn-outline-primary">
                    <?php $__currentLoopData = $supervisor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supervisor_one): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($supervisor_one->id); ?>"><?php echo e($supervisor_one->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>Davomiyligi</label>
                <select class="selectpicker form-control" required name="duration" data-style="btn-outline-primary">
                                           
                    <option value="1" selected >Doimiy</option>
                    <option value="0">Muddatli</option>
                </select>
            </div>
        </div>
      
    </div>

    <div class="row element " id="div_1">
        <div class="col-md-12 col-sm-12">
            <div class="html-editor pd-20 card-box mb-30">
                
                <p>Hujjat matnini to'liq kiriting</p>
                <textarea class="textarea_editor form-control border-radius-0" id='mk_text_area_editor_1' name="word_all" placeholder="Matnni kiriting ..."></textarea>
            </div>
        </div>
    </div>
<hr>    
   <h5 class="mb-20 h5 text-blue">

        <span style="width:100%" class="bg-light-blue btn text-blue weight-500 add">
        <i class="ion-plus-round"></i> Bo'limlar bo'yicha taqsimod qo'shish </span>
    </h5>
</div>
    
<div class="form-group">
            
    <label>
        <span class="error">
        <?php $__errorArgs = ['document'];
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
    <div class="img-select mb-5">
        <button type="button" class="btn btn-light documet-select-button mb-20 w-100" data-select="document-mk">Fayl tanlang <i class="icon-copy fa fa-pencil" aria-hidden="true"></i></button>
    </div>

    <input type="file" id="document-mk" class="form-control file-input" hidden="true" name="document" accept="application/pdf" />
  

    <iframe id="iframePdf" style="display: none; width: 100%; height: 600px;" src="" class="document-mk" src=""></iframe>
</div>


<?php $__env->startSection('js'); ?>


<script type="text/javascript">
    var uploadField = document.getElementById("document-mk");
        uploadField.onchange = function() {
           
            if(this.files[0].size > 9437184){
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
                console.log(e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    //input o'zgarganda 
    $("#document-mk").change(function () {
        var id = $(this).attr('id');
        console.log(id);
        readURL(this , id);
        $("#iframePdf").css("display", "block");
    });

</script>

<script type="text/javascript">
var max = 5;

    $(document).ready(function(){

    // Add new element
    $(".add").click(function(){

        // Finding total number of elements added
        var total_element = $(".element").length;
        
        // last <div> with element class id
        var lastid = $(".element:last").attr("id");
        var split_id = lastid.split("_");
        var nextindex = Number(split_id[1]) + 1;

        var max = 5;
        // Check total number elements
        // if(total_element < max ){
        // Adding new div container after last occurance of element class
            $(".element:last").after("<div class='row element d-flex justify-content-between' id='div_"+ nextindex +"'></div>");
            
            // Adding element to <div>
            // $("#div_" + nextindex).append("<input type='text' placeholder='Enter your skill' id='txt_"+ nextindex +"'>&nbsp;<span id='remove_" + nextindex + "' class='remove'>X</span>");
            $("#div_" + nextindex).append(" <div class='col-md-3'> <div class='form-group'> <label > Muddati :</label> <input class='form-control date-picker' id='mk_date-picker_" + nextindex + "' name='sana[]' placeholder='Tanlanmasa asosiy olinadi' type='text'> </div>  </div> <div class='col-md-3'> <div class='form-group'> <label>Xodimlarni tanlang</label> <select id='mk_select_" + nextindex + "' name='user[]' class='custom-select2 form-control' style='width: 100%;'>  <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <option value='<?php echo e($user->id); ?>'><?php echo e($user->getfio()); ?></option> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> </select> </div> </div> <div class='col-md-3 mt-auto'> <div class='form-group'> <span id='remove_" + nextindex + "' class='remove btn btn-outline-danger w-100'> <i class='icon-copy fa fa-trash-o' aria-hidden='true'></i> O\'chirish </span></div> </div> <div class='col-md-12 col-sm-12'> <div class='html-editor pd-20 card-box mb-30'> <p>Hujjat matnini kiriting</p> <textarea class='textarea_editor form-control border-radius-0' id='mk_text_area_editor_" + nextindex + "' name='word[]' placeholder='Bo`lim matnini kiriting ...'></textarea> </div> </div>");
        // <div class="col-md-3 mt-auto"> <div class="form-group"> <span id='remove_" + nextindex + "' class='remove btn btn-outline-danger w-100'> <i class='icon-copy fa fa-trash-o' aria-hidden='true'></i> Remove </span></div> </div>
        // }

        $("#mk_text_area_editor_"+nextindex).wysihtml5({html:!0})
        $("#mk_date-picker_"+nextindex).datepicker({language:"en",autoClose:!0,dateFormat:"dd MM yyyy"})
        $("#mk_select_"+nextindex).tagsinput();
    
    });

    // $(".textarea_editor").wysihtml5({html:!0})})

    // Remove element
    $('.card-box').on('click','.remove',function(){
    
    var id = this.id;
    var split_id = id.split("_");
    var deleteindex = split_id[1];

    // Remove <div> with id
    $("#div_" + deleteindex).remove();

    }); 
    });

    // function asdasd(vaaa){
    //     $("#mk_text_area_editor_"+vaaa).wysihtml5({html:!0})
    // }
</script>
<?php $__env->stopSection(); ?><?php /**PATH C:\wamp64\www\doc-tsul\resources\views/mk/pages/doc/form.blade.php ENDPATH**/ ?>