<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left">
            <h4 class="text-blue h4">Maydonlarni to'ldiring!</h4>
            {{-- <p class="mb-30">Just add class <code>.selectpicker</code> to select</p> --}}
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label > Nomi :</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label > Raqami :</label>
                <input type="number" value="{{ old('raqami') }}" name="raqami" class="form-control">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label > Muddati :</label>
                <input class="form-control date-picker" name="sanasi" value="{{ old('sanasi') }}" placeholder="Select Date" type="text">
                
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-4 col-sm-12">
            <div class="form-group">
                <label>Ko'rishi kerak bo'lganlarni belgilang    </label>
                <select name="users[]" class="selectpicker form-control" data-size="5" data-style="btn-outline-success" multiple data-actions-box="true" data-selected-text-format="count">
                    <optgroup label="Condiments">
                        @foreach ($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </optgroup>
                </select>
            </div>
        </div>
        
    </div>

</div>
  
  
<div class="form-group">
            {{-- <label>Passport fayl (pdf < 5 Mb): --}}
    <label>
        <span class="error">
        @error('passport_pdf')
            {{ $message }}
            @enderror
    </span>
    </label>
    <div class="img-select ">
        <button type="button" class="btn btn-light documet-select-button" data-select="document-mk">Fayl tanlang <i class="icon-copy fa fa-pencil" aria-hidden="true"></i></button>
    </div>
    <input type="file" id="document-mk" class="form-control" hidden="true" name="document" accept="application/pdf" />
</div>



        <iframe id="iframePdf" style="display: none; width: 100%; height: 600px;" src="" class="document-mk" src=""></iframe>
        
@section('js')

{{-- Js fayl hajmini tekshirish --}}
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

{{-- Fyl tanlash va iframega src ni berish --}}
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
@endsection