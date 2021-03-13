
<?php $__env->startSection('content'); ?>

    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="card-box mb-30">
                    <div class="pd-20" style="display: flex; justify-content: space-between;">
                        <a href="#" class="text-blue h4"  >Bo'limlar  </a>
                        <a href="#" class="pr-4 btn btn-primary" data-toggle="modal" data-target="#createmodal" ><i class="fa fa-plus"></i> Yangi </a>
                    </div>
                    <div class="pb-20">
                        
                        
                        <table class="table hover  data-table-export nowrap">
                            <thead>
                            <tr>
                                <th class="table-plus datatable-nosort">#</th>
                                <th>Nomi</th>
                                <th>Ishchilar soni</th>
                                <th>Bo'ysunuvchisi</th>
                                <th class="datatable-nosort">Amallar</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                $i=1;
                            ?>
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="<?php if($item->status==1): ?> table-success <?php else: ?> table-secondary <?php endif; ?>">
                                    <td class="table-plus"><?php echo e($i++); ?></td>
                                    <td><a href="<?php echo e(route('department.show',['department'=>$item->id])); ?>" ><?php echo e($item->name); ?> </a></td>
                                    <td ><a href="<?php echo e(route('stdep.show',['stdep'=>$item->id])); ?>" > <?php echo e($item->count_workers); ?> ko'rish/biriktirish </a></td>
                                    <td><?php echo e($item->parent()); ?></td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                <i class="dw dw-more"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                <a href="#" class="dropdown-item" data-toggle="modal" data-target="#bd-example-modal-lg<?php echo e($item->id); ?>"><i class="dw dw-eye"></i> Ko'rish </a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#editmodal<?php echo e($item->id); ?>"><i class="dw dw-edit2"></i> Tahrirlash</a>
                                                <a class="dropdown-item" type="button" data-toggle="modal" data-target="#confirmation-modal<?php echo e($item->id); ?>" href="#"><i class="dw dw-delete-3"></i> O'chirish</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php echo $__env->make('admin.pages.department.delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php echo $__env->make('admin.pages.department.modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php echo $__env->make('admin.pages.department.editmodal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <?php echo $__env->make('admin.pages.department.createmodal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/kadr/resources/views/admin/pages/department/show.blade.php ENDPATH**/ ?>