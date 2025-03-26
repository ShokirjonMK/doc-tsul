<!DOCTYPE html>
<html>
<head>


<style>
    table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
    *{
        font-size: 15px;
        font-family: TimesNewRoman;

    }
    .main{
        margin-left: 75.6px;
    }
    .b{
        font-weight: bold;
    }
    .up{
        text-transform: uppercase;
    }
    .c{
        text-align: center;
    }
    .mm{
        padding-bottom: 100px;
    }
    table.teppaa, .teppa>th, td.bbbbbb {
      border: none;
      border-collapse: collapse;
      padding-bottom: 5px;
    }
    .m-a{
        margin-left: 38px;
    }
    .page-break {
        page-break-after: always;
    }
    .p-10{
        padding: 10px;
    }
    .tamom{
        border: none;
        border-collapse: collapse;
        padding-bottom: 10px;
    }
    td {
        vertical-align: top;
        text-align: left;
        /*padding-bottom: 5px;*/

    }




</style>
</head>
<body>
    <div class="main">

        <table class="teppaa" style="width: 100%;">

            <tr class="">
                <td class="bbbbbb b up c" colspan="3" style="padding:0px !important; margin-left: 37px">
                    ma'lumotnoma
                </td>
            </tr>
            <tr class="">
                <td class="bbbbbb b c" colspan="3" style="padding:0px !important; margin-left: -37px">
                  <?php echo e($data->fio()); ?>

                </td>
            </tr>
            <tr class="">
                <td class="bbbbbb" colspan="2" style="padding:0px !important; margin-left: 37px">
                    <p class="b"> <?php echo e($data->stdep->department->name); ?> <?php echo e($data->stdep->position); ?> </p>
                </td>
                <td rowspan="3" style="width: 113.38582677px; border:none">
                    <img style="width: 113.38582677px; height: 151.18110236px" src="<?php echo e($data->image); ?>">
                </td>
            </tr>

            <tr class="">
                <td class="bbbbbb">
                    <b>Tug‘ilgan yili:</b> <br>
                    <?php echo e(date("d.m.Y", strtotime($data->birthday))); ?> <br/>
                </td>
                <td class="bbbbbb">
                    <b>Tug‘ilgan joyi:</b> <br>
                   <?php echo e($data->address); ?>

                </td>
            </tr>
            <tr>
                <td class="bbbbbb">
                    <b>Millati:</b> <br>
                    <?php echo e($data->nationality->name); ?>

                </td>
                <td class="bbbbbb">
                    <b>Partiyaviyligi:</b> <br>
                    <?php echo e($data->partiya->name); ?>

                </td>
            </tr>
            <tr>
                 <td class="bbbbbb">
                    <b>Ma’lumoti:</b> <br>
                    <?php echo e($data->degree_info->name); ?>

                </td>
                <td  class="tamom" colspan="2">
                    <b>Tamomlagan:</b> <br>
  <?php $__currentLoopData = $education; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $education_one): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <?php echo e(date("Y", strtotime($education_one->diplom_issued_date))); ?>-y. - <?php echo e($education_one->university->name); ?> <br>
     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </td>

            </tr>

            <tr>
                 <td class="bbbbbb">
                    <b>Ma'lumoti bo'yicha mutahasisligi:</b> <br>

                </td>



                <td class="bbbbbb" colspan="2">
                    <?php echo e($education_one->specialization); ?>

                </td>
            </tr>


            <tr>

                <td class="bbbbbb">
                    <b>Ilmiy darajasi:</b> <br>
                    <?php echo e($data->academic_degree->name); ?>

                </td>
                <td class="bbbbbb" colspan="2">
                    <b>Ilmiy unvoni:</b> <br>
                    <?php echo e($data->degree->name); ?>

                </td>
            </tr>
            <tr>

                <td class="bbbbbb">
                    <b>Qaysi chet tillarini biladi:</b> <br>
                    <?php
                    $langs = 'App\Models\Lang'::whereIn('id', $data->lang_id)->get();
                    ?>
                    <?php $__currentLoopData = $langs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $langOne): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e($langOne->name); ?>,
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </td>
                <td class="bbbbbb" colspan="2">
                    <b>Harbiy (maxsus) unvoni:</b> <br>
                    <?php echo e($data->special_degree->name); ?>

                </td>
            </tr>
            <tr>
                <td class="bbbbbb" colspan="3">
                    <b>Davlat mukofotlari bilan taqdirlanganmi (qanaqa):</b> <br>
                    <?php if($mukofot_all): ?>
                        <?php $__currentLoopData = $mukofot_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mukofot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e($mukofot->mukofot_type->name); ?>,
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        Mukofotlanmagan
                    <?php endif; ?>
                </td>

            </tr>
            <tr>
                <td class="bbbbbb" colspan="3">
                    <b>Xalq deputatlari, respublika, viloyat, shahar va tuman Kengashi deputatimi<br> yoki boshqa saylanadigan organlarning a’zosimi (to‘liq ko‘rsatilishi lozim):</b> <br>
                    <?php echo e($data->deputat); ?>

                </td>
            </tr>
        </table>
<br/>
        <table style="width: 100%; border:none;">
            <tr>
                <td class="c b up bbbbbb" colspan="3">
                    Mexnat faoliyati
                </td>
            </tr>


            <?php $__currentLoopData = $workplaces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $workpalce): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="bbbbbb">
                        <?php echo e(date("Y", strtotime($workpalce->start_time))); ?> - <?php echo e(date("Y", strtotime($workpalce->start_time))); ?>yy.
                    </td>
                    <td class="bbbbbb" style="text-align:center;">
                       -
                    </td>
                    <td class="bbbbbb">
                        <?php echo e($workpalce->name); ?> - <?php echo e($workpalce->position); ?>

                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </table>

        <div class="page-break"></div>

        <p class="c b"><?php echo e($data->fio()); ?>ning yaqin qarindoshlari haqida</p>
        <p class="b up c">ma'lumot</p>

         <table style="width:100%">
              <tr>
                  <th  class="p-10 c">Qarin-<br>doshligi</th>
                  <th class="p-10 c">F.I.Sh</th>
                  <th class="p-10 c">Tug'ulgan yili va joyi</th>
                  <th class="p-10 c">Ish joyi va lavozimi</th>
                  <th class="p-10 c">Turar joyi</th>
              </tr>
             <?php $__currentLoopData = $relative; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td class="c b"><?php echo e($rel->relatives_type->name1); ?></td>
                <td class="p-10 c"><?php echo e($rel->full_name); ?></td>
                <td class="p-10 c"><?php echo e($rel->birthday); ?><?php echo e($rel->region->name); ?><?php echo e($rel->area->name); ?> <?php echo e($rel->birth_address); ?> </td>
                <td class="p-10 c"><?php echo e($rel->work_rank); ?></td>
                <td class="p-10 c"><?php echo e($rel->address); ?></td>
              </tr>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

         </table>



</div>
</body>
</html>
<?php /**PATH /var/www/kadr/resources/views/admin/pages/staff/resume.blade.php ENDPATH**/ ?>