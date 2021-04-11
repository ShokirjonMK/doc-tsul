<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left">
            <h4 class="text-blue h4">Maydonlarni to'ldiring!</h4>
            
        </div>
    </div>

    
<div>
    <div>
        <input type="text" id="tbTableName" placeholder="Enter Table Name" />
        <input type="button" id="btAdd" value="Add Field" class="bt" />
    </div>

    <%--THE CONTAINER TO HOLD THE DYNAMICALLY CREATED ELEMENTS.--%>
    <div id="main"></div>
</div>




    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label > Nomi :</label>
                <input type="text" name="name" value="<?php echo e(old('name')); ?>" class="form-control">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label > Raqami :</label>
                <input type="number" value="<?php echo e(old('raqami')); ?>" name="raqami" class="form-control">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label > Muddati :</label>
                <input class="form-control date-picker" name="sanasi" value="<?php echo e(old('sanasi')); ?>" placeholder="Select Date" type="text">
                
            </div>
        </div>
        <div class="col-md-3 ">
            <div class="form-group">
                <label>Ko'rishi kerak bo'lganlarni belgilang    </label>
                <select name="users[]" class="selectpicker form-control" data-size="5" data-style="btn-outline-success" multiple data-actions-box="true" data-selected-text-format="count">
                    <optgroup label="Xodimlar tanlang">
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </optgroup>
                </select>
            </div>
        </div>
    </div>

    <div class="row" >
        <div class="col-md-12 col-sm-12">
            <div class="html-editor pd-20 card-box mb-30">
                
                <p>Hujjat matnini kiriting</p>
                <textarea class="textarea_editor form-control border-radius-0" name="word" placeholder="Enter text ..."></textarea>
            </div>
        </div>
    </div>
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
    <div class="img-select ">
        <button type="button" class="btn btn-light documet-select-button" data-select="document-mk">Fayl tanlang <i class="icon-copy fa fa-pencil" aria-hidden="true"></i></button>
    </div>
    <input type="file" id="document-mk" class="form-control" hidden="true" name="document" accept="application/pdf" />
</div>



        <iframe id="iframePdf" style="display: none; width: 100%; height: 600px;" src="" class="document-mk" src=""></iframe>
        
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

<script>
    $(document).ready(function () {
        BindControls();
    });

    function BindControls() {

        var itxtCnt = 0;    // COUNTER TO SET ELEMENT IDs.

        // CREATE A DIV DYNAMICALLY TO SERVE A CONTAINER TO THE ELEMENTS.
        var container = $(document.createElement('div')).css({
            width: '100%',
            clear: 'both',
            'margin-top': '10px',
            'margin-bottom': '10px'
        });

        // CREATE THE ELEMENTS.
        $('#btAdd').click(function () {
            itxtCnt = itxtCnt + 1;

            $(container).append('<input type="text"' +
                'placeholder="Field Name" class="input" id=tb' + itxtCnt + ' value="" />');

            if (itxtCnt == 1) {
                var divSubmit = $(document.createElement('div'));
                $(divSubmit).append('<input type="button" id="btSubmit" value="Submit" class="bt"' +
                    'onclick="getTextValue()" />');
            }

            // ADD EVERY ELEMENT TO THE MAIN CONTAINER.
            $('#main').after(container, divSubmit);
        });
    }

    // THE FUNCTION TO EXTRACT VALUES FROM TEXTBOXES AND POST THE VALUES (TO A WEB METHOD) USING AJAX.
    var values = new Array();
    function getTextValue() {
        $('.input').each(function () {
            if (this.value != '')
                values.push(this.value);
        });

        if (values != '') {
            // NOW CALL THE WEB METHOD WITH THE PARAMETERS USING AJAX.
            $.ajax({
                type: 'POST',
                url: 'default.aspx/loadFields',
                data: "{'fields':'" + values + "', 'table': '" + $('#tbTableName').val() + "'}",
                dataType: 'json',
                headers: { "Content-Type": "application/json" },
                success: function (response) {
                    values = [];    // EMPTY THE ARRAY.
                    alert(response.d);
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
        }
        else { alert("Fields cannot be empty.") }
    }
</script>

<?php $__env->stopSection(); ?><?php /**PATH C:\wamp64\www\doc-tsul\resources\views/mk/pages/doc/form.blade.php ENDPATH**/ ?>