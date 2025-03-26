
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
                            <form autocomplete="off" id="diplom_form" action="<?php echo e(route('staff.diplom')); ?>" method="post" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                
                                <input type="hidden" name="id" value="
                                <div class="form-group row">
                                    <label class="col-md-3">Universitet</label>
                                    <div class="col-md-9">
                                        <select class="selectpicker form-control" required name="university_id" title="Tanlang" data-style="btn-outline-primary">
                                        
                                            
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

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"> <span class="icon-copy ti-close"></span>  Yopish</button>
                <button type="submit" form="diplom_form" class="btn btn-primary"><i class="icon-copy fa fa-save" aria-hidden="true"></i> Saqlash</button>
            </div>
        </div>
    <?php /**PATH C:\wamp64\www\doc-tsul\resources\views/mk/new.blade.php ENDPATH**/ ?>