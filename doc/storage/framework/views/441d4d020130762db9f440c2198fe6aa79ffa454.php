
<?php $__env->startSection('link'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/admin/src/plugins/jquery-steps/jquery.steps.css')); ?>">
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
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
                        <form autocomplete="off" action="<?php echo e(route('staff.update',['staff'=>$data->id])); ?>" class="tab-wizard wizard-circle wizard" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <h5>Asosiy ma`lumotlar</h5>
                            <section>
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label><span>*</span>Familiya :
                                                        <span class="error">
															<?php $__errorArgs = ['last_name'];
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
                                                    <input type="text" class="form-control" name="last_name" value="<?php if(old('last_name')): ?> <?php echo e(old('last_name')); ?> <?php else: ?>  <?php echo e($data->last_name); ?> <?php endif; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label><span>*</span>Ism :
                                                        <span class="error">
															<?php $__errorArgs = ['first_name'];
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
                                                    <input type="text" class="form-control" name="first_name" value="<?php if(old('first_name')): ?> <?php echo e(old('first_name')); ?> <?php else: ?>  <?php echo e($data->first_name); ?> <?php endif; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label><span>*</span>Sharif :
                                                        <span class="error">
															<?php $__errorArgs = ['middle_name'];
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
                                                    <input type="text" class="form-control" name="middle_name" value="<?php if(old('middle_name')): ?> <?php echo e(old('middle_name')); ?> <?php else: ?>  <?php echo e($data->middle_name); ?> <?php endif; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label><span>*</span>Davlat:
                                                        <span class="error">
															<?php $__errorArgs = ['country_id'];
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

                                                    <select class="form-control" name="country_id">
                                                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option <?php if((old('country_id') == $country->id) || $data->counrty_id == $country->id || ($country->code == "UZ")): ?> selected <?php endif; ?> value="<?php echo e($country->id); ?> e"><?php echo e($country->name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label><span>*</span>Viloyat:
                                                        <span class="error">
															<?php $__errorArgs = ['region_id'];
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

                                                    <select class="form-control" name="region_id">
                                                        <?php $__currentLoopData = $regions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $region): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option <?php if(old('region_id') == $region->id || $data->region_id == $region->id): ?> selected <?php endif; ?> value="<?php echo e($region->id); ?>"><?php echo e($region->name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label><span>*</span>Tuman:
                                                        <span class="error">
															<?php $__errorArgs = ['area_id'];
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
                                                    <select class="form-control" name="area_id">
                                                        <?php $__currentLoopData = $areas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($area->id == $data->area_id): ?>
                                                            <option  selected value="<?php echo e($area->id); ?>"><?php echo e($area->name); ?></option>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="col-md-3" >
                                            <div class="form-group">
                                                <label>Rasm :
                                                    <span class="error">
													<?php $__errorArgs = ['image'];
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
                                                <div class="img-select-image ">
                                                    <img src="<?php if(old('image')): ?> <?php echo e(old('image')); ?> <?php else: ?>  <?php echo e($data->image); ?> <?php endif; ?>" class="selected-image image"  src="">
                                                    <button type="button" class="btn btn-light img-select-button" data-select="image"><i class="icon-copy fa fa-pencil" aria-hidden="true"></i></button>
                                                </div>
                                                <input type="file" id="image" class="form-control img-input exampleInputFile" hidden="true" name="image">
                                            </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label><span>*</span>Manzil:
                                                <span class="error">
															<?php $__errorArgs = ['address'];
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
                                            <input type="text" class="form-control" name="address" value="<?php if(old('address')): ?> <?php echo e(old('address')); ?> <?php else: ?>  <?php echo e($data->address); ?> <?php endif; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label><span>*</span>Asosiy telefon :
                                                <span class="error">
															<?php $__errorArgs = ['phone'];
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
                                            <input type="text" onkeypress="return /[0-9]/i.test(event.key)"  class="form-control phone" maxlength="10" placeholder="99 9999999" name="phone" value="<?php if(old('phone')): ?> <?php echo e(old('phone')); ?> <?php else: ?>  <?php echo e($data->phone); ?> <?php endif; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Qo'shimcha telefon :
                                                <span class="error">
															<?php $__errorArgs = ['phone1'];
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
                                            <input type="text" onkeypress="return /[0-9]/i.test(event.key)"  class="form-control phone"  max="9"  placeholder="99 9999999" name="phone1" value="<?php if(old('phone1')): ?> <?php echo e(old('phone1')); ?> <?php else: ?>  <?php echo e($data->phone1); ?> <?php endif; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Uy telefon :
                                                <span class="error">
															<?php $__errorArgs = ['phone_home'];
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
                                            <input type="test" onkeypress="return /[0-9]/i.test(event.key)"  class="form-control phone"  max="9"  placeholder="99 9999999" name="phone_home" value="<?php if(old('phone_home')): ?> <?php echo e(old('phone_home')); ?> <?php else: ?>  <?php echo e($data->phone_home); ?> <?php endif; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label><span>*</span>Tug'ilgan sana :
                                                <span class="error">
															<?php $__errorArgs = ['birthday'];
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
                                            <input class="form-control" name="birthday" value="<?php if(old('birthday')): ?><?php echo e(old('birthday')); ?><?php else: ?><?php echo e($data->birthday); ?><?php endif; ?>" placeholder="Sanani tanlang" type="date">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label><span>*</span>Millati :
                                                <span class="error">
															<?php $__errorArgs = ['nationality_id'];
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
                                            <select class="form-control" name="nationality_id">
                                                <?php $__currentLoopData = $nationalities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nationality): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option <?php if(old('nationality_id') == $nationality->id || $data->nationality_id == $nationality->id): ?> selected="true" <?php endif; ?> value="<?php echo e($nationality->id); ?>"><?php echo e($nationality->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label><span>*</span>Jinsi :
                                                <span class="error">
															<?php $__errorArgs = ['gender'];
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
                                            <select class="form-control" name="gender">

                                                <option value="1" <?php if($data->gender==1): ?> selected="true" <?php endif; ?>>Erkak</option>
                                                <option value="0" <?php if($data->gender==0): ?> selected="true" <?php endif; ?>>Ayol</option>


                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label><span>*</span>Tabel raqami:
                                                <span class="error">
													<?php $__errorArgs = ['table_number'];
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
                                            <input type="text"   class="form-control"  max="9"  placeholder="" name="table_number" value="<?php if(old('table_number')): ?><?php echo e(old('table_number')); ?><?php else: ?><?php echo e($data->table_number); ?><?php endif; ?>">
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
																<?php $__errorArgs = ['passport_seria'];
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
                                                        <span class="error">
															<?php $__errorArgs = ['passport_number'];
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
                                                    <div class="j-flex">

                                                        <input type="text" onkeypress="return /[A-Z]/i.test(event.key)" id="passport_seria" class="form-control " style="width: 25%;" name="passport_seria" value="<?php if(old('passport_seria')): ?><?php echo e(old('passport_seria')); ?><?php else: ?><?php echo e($data->passport_seria); ?><?php endif; ?>">
                                                        <input type="text" onkeypress="return /[0-9]/i.test(event.key)" id="passport_number" class="form-control "  style="width: 74%" name="passport_number" value="<?php if(old('passport_number')): ?><?php echo e(old('passport_number')); ?><?php else: ?><?php echo e($data->passport_number); ?><?php endif; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group" >
                                                    <label><span>*</span>Passport JSHSHIR :
                                                        <span class="error">
															<?php $__errorArgs = ['passport_jshshir'];
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
                                                    <input type="text" onkeypress="return /[0-9]/i.test(event.key)" id="passport_jshshir" class="form-control" name="passport_jshshir" value="<?php if(old('passport_jshshir')): ?><?php echo e(old('passport_jshshir')); ?><?php else: ?><?php echo e($data->passport_jshshir); ?><?php endif; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group" >
                                                    <label><span>*</span>Kim tomondan berilgan:
                                                        <span class="error">
															<?php $__errorArgs = ['passport_given_by'];
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
                                                    <input maxlength="255" type="text" class="form-control" name="passport_given_by" value="<?php if(old('passport_given_by')): ?><?php echo e(old('passport_given_by')); ?><?php else: ?><?php echo e($data->passport_given_by); ?><?php endif; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group" >
                                                    <label><span>*</span>Berilgan sana:
                                                        <span class="error">
															<?php $__errorArgs = ['passport_issued_date'];
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
                                                    <input maxlength="255" type="date" class="form-control" name="passport_issued_date" value="<?php if(old('passport_issued_date')): ?><?php echo e(old('passport_issued_date')); ?><?php else: ?><?php echo e($data->passport_issued_date); ?><?php endif; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group" >
                                                    <label><span>*</span>Amal qilish muddati:
                                                        <span class="error">
															<?php $__errorArgs = ['passport_expiration_date'];
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
                                                    <input type="date" class="form-control" name="passport_expiration_date" value="<?php if(old('passport_expiration_date')): ?><?php echo e(old('passport_expiration_date')); ?><?php else: ?><?php echo e($data->passport_expiration_date); ?><?php endif; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label><span>*</span>Ish rejimi :
                                                        <span class="error">
															<?php $__errorArgs = ['ish_rejimi_id'];
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
                                                    <select class="form-control" name="ish_rejimi_id">
                                                        <?php $__currentLoopData = $ish_rejimi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ish_rejimione): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option <?php if(old('ish_rejimi_id') == $ish_rejimione->id || $data->ish_rejimi_id ==$ish_rejimione->id ): ?> selected="true" <?php endif; ?> value="<?php echo e($ish_rejimione->id); ?>"><?php echo e($ish_rejimione->name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label><span>*</span>Stavka :
                                                        <span class="error">
															<?php $__errorArgs = ['stavka_id'];
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
                                                    <select class="form-control" name="stavka_id">
                                                        <?php $__currentLoopData = $stavka; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stavkaone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option <?php if(old('stavka_id') == $stavkaone->id || $data->stavka_id == $stavkaone->id || $stavkaone->name == 1): ?> selected="true" <?php endif; ?> value="<?php echo e($stavkaone->id); ?>"><?php echo e($stavkaone->name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                    </select>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-md-3 ">
                                        <div class="form-group">
                                            <label>Passport fayl (pdf):
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
                                                <iframe src="<?php if($data->passport_pdf): ?><?php echo e($data->passport_pdf); ?><?php endif; ?>" class="selected-image passport_image" src=""></iframe>
                                                <button type="button" class="btn btn-light img-select-button img-select-button123 " data-select="passport_image"><i class="icon-copy fa fa-pencil" aria-hidden="true"></i></button>
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
															<?php $__errorArgs = ['degree_info_id'];
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
											<select class="form-control" name="degree_info_id">
												<?php $__currentLoopData = $degree_info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $degree_info_one): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<option <?php if(old('degree_info_id') == $degree_info_one->id || $data->degree_info_id == $degree_info_one->id): ?> selected="true" <?php endif; ?> value="<?php echo e($degree_info_one->id); ?>"><?php echo e($degree_info_one->name); ?></option>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

											</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label><span>*</span>Ilmiy darajasi :
												<span class="error">
															<?php $__errorArgs = ['academic_degree_id'];
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
											<select class="form-control" name="academic_degree_id">
												<?php $__currentLoopData = $academic_degree; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $academic_degree_one): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<option <?php if(old('academic_degree_id') == $academic_degree_one->id || $data->academic_degree_id == $academic_degree_one->id): ?> selected="true" <?php endif; ?> value="<?php echo e($academic_degree_one->id); ?>"><?php echo e($academic_degree_one->name); ?></option>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

											</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label><span>*</span>Ilmiy unvoni :
												<span class="error">
															<?php $__errorArgs = ['degree_id'];
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
											<select class="form-control" name="degree_id">
												<?php $__currentLoopData = $degree; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $degree_one): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<option <?php if(old('degree_id') == $degree_one->id  || $data->degree_id == $degree_one->id): ?> selected="true" <?php endif; ?> value="<?php echo e($degree_one->id); ?>"><?php echo e($degree_one->name); ?></option>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

											</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label><span>*</span>Maxsus unvoni :
												<span class="error">
															<?php $__errorArgs = ['special_degree_id'];
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
											<select class="form-control" name="special_degree_id">
												<?php $__currentLoopData = $special_degrees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $special_degrees_one): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<option <?php if(old('special_degree_id') == $special_degrees_one->id || $data->special_degree_id == $special_degrees_one->id): ?> selected="true" <?php endif; ?> value="<?php echo e($special_degrees_one->id); ?>"><?php echo e($special_degrees_one->name); ?></option>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

											</select>
										</div>
									</div>
								</div>


								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<label><span>*</span>Partiyaviyligi :
												<span class="error">
															<?php $__errorArgs = ['partiya_id'];
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
											<select class="form-control" name="partiya_id">
												<?php $__currentLoopData = $partiya; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $partiya_one): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<option <?php if(old('partiya_id') == $partiya_one->id || $data->partiya_id == $partiya_one->id): ?> selected="true" <?php endif; ?> value="<?php echo e($partiya_one->id); ?>"><?php echo e($partiya_one->name); ?></option>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

											</select>
										</div>
										<div class="form-group">
											<label><span>*</span>Qo'shimcha tillar :
												<span class="error">
															<?php $__errorArgs = ['lang'];
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
											<select  name="lang[]" class="custom-select2 form-control" multiple="multiple" style="width: 100%;">
												<optgroup label="Tillarni tanlang">
													<?php $__currentLoopData = $language; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language_one): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<option
                                                                <?php $__currentLoopData = $data->lang_id; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lOne): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php if($lOne == $language_one->id): ?> selected <?php endif; ?>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                                value="<?php echo e($language_one->id); ?>"><?php echo e($language_one->name); ?></option>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												</optgroup>
											</select>
										</div>
									</div>
									<div class="col-md-9">
										<div class="form-group">
											<label style="">Xalq deputatlari, respublika, viloyat, shahar va tuman Kengashi deputatimi yoki boshqa saylanadigan organlarning a’zosimi:
												<span class="error">
															<?php $__errorArgs = ['deputat'];
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
											<textarea style="width: 100%" name="deputat"  rows="6" cols="33"><?php echo e($data->deputat); ?></textarea>
										</div>
									</div>

								</div>
                            </section>
                            <!-- Step 3 -->


                        </form>
                    </div>
                </div>



                <!-- success Popup html Start -->
                <div class="modal fade" id="success-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-body text-center font-18">
                                <h3 class="mb-20">Form Submitted!</h3>
                                <div class="mb-30 text-center"><img src="<?php echo e(asset('assets/admin/vendors/images/success.png')); ?>"></div>
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




<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    
    <!-- bootstrap-tagsinput js -->
    
    <!-- bootstrap-touchspin js -->
    
    

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
            var tr_one = ' <tr><td class="last-td"><button class="btn btn-success add-input-2"><i class="fa fa-plus"></i></button></td><td><input class="form-control" type="text" name="input['+tartib+'][name]"></td><td> <input class="form-control" type="text" name="input['+tartib+'][name]"> </td><td class="td_date"><input class="form-control" type="date" name="input['+tartib+'][students_count]"></td>' +
                ' <td> <input class="form-control" type="text" name="input['+tartib+'][name]"></td> <td> <input class="form-control" type="text" name="input['+tartib+'][name]"></td> <td> <input class="form-control" type="text" name="input['+tartib+'][name]"></td> </tr>';
            $('.add-group-table-2').append(tr_one);
            $('.table-responsive-2').scrollTop(10000000000000000000000000);
            // $('.table-responsive').scrollTop($('.table-responsive').height);
            tartib++;

        });


    </script>
    <script type="text/javascript">
        $('select[name="region_id"]').change(function(){
            get_regions();
        });



        function get_regions(){
            var old_area = '<?php echo e(old('area_id')); ?>';
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
                                areas = areas + '<option  value="'+el['id']+'">'+el['name']+'</option>';
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



<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/kadr/resources/views/admin/pages/staff/edit.blade.php ENDPATH**/ ?>