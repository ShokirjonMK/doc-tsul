<script src="https://code.highcharts.com/maps/highmaps.js"></script>
<?php $__env->startSection('content'); ?>
    <div class="main-container">
        <div class="xs-pd-20-10 pd-ltr-20">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Asosiy</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo e(route('admin')); ?>">Bosh</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Statistika</li>
                            </ol>
                        </nav>
                    </div>












                </div>
            </div>
            <div class="row clearfix progress-box">
                <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
                    <div class="card-box pd-30 height-100-p">
                        <div class="progress-box text-center">
                            <input type="text" class="knob dial1" value="<?php echo e($jami_xodimlar); ?>" data-width="100" data-height="100" data-linecap="round" data-thickness="0.12" data-bgColor="#fff" data-fgColor="#1b00ff" data-angleOffset="180" readonly>
                            <h5 class="text-blue padding-top-10 h5">Jami xodimlar</h5>
                            <span class="d-block"> <?php if($shatat_count>0): ?><?php echo e($all_staff); ?><?php endif; ?>  <i class="fa fa-line-chart text-blue"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
                    <div class="card-box pd-30 height-100-p">
                        <div class="progress-box text-center">
                            <input type="text" class="knob dial2" value="<?php echo e($teacher_xodimlar); ?>" data-width="100" data-height="100" data-linecap="round" data-thickness="0.12" data-bgColor="#fff" data-fgColor="#00e091" data-angleOffset="180" readonly>
                            <h5 class="text-light-green padding-top-10 h5">O'qituvchilar</h5>
                            <span class="d-block"> <?php echo e($all_teacher); ?> <i class="fa text-light-green fa-line-chart"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
                    <div class="card-box pd-30 height-100-p">
                        <div class="progress-box text-center">
                            <input type="text" class="knob dial3" value="<?php echo e($free_shtat_f); ?>" data-width="100" data-height="100" data-linecap="round" data-thickness="0.12" data-bgColor="#fff" data-fgColor="#f56767" data-angleOffset="180" readonly>
                            <h5 class="text-light-orange padding-top-10 h5">Bo'sh ish o'rinlari</h5>
                            <span class="d-block"> <?php echo e($free_shtat); ?> <i class="fa text-light-orange fa-line-chart"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
                    <div class="card-box pd-30 height-100-p">
                        <div class="progress-box text-center">
                            <input type="text" class="knob dial4" value="<?php echo e($inner_shtat_f); ?>" data-width="100" data-height="100" data-linecap="round" data-thickness="0.12" data-bgColor="#fff" data-fgColor="#a683eb" data-angleOffset="180" readonly>
                            <h5 class="text-light-purple padding-top-10 h5"> O'rindoshlar ( ichki | tashqi ) </h5>
                            <span class="d-block"> <?php echo e($inner_shtat); ?> | <?php echo e($outer_shtat); ?> <i class="fa text-light-purple fa-line-chart"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12 mb-30">
                    <div class="card-box pd-30 pt-10 height-100-p">
                        <h2 class="mb-30 h4">Daraja va unvonlar statistikasi</h2>
                        <div class="browser-visits">
                            <ul>
                                <li class="d-flex flex-wrap align-items-center">
                                    <div class="icon">
                                        <i  style="color: #1b00ff;" class="icon-copy fa fa-id-badge" aria-hidden="true"></i>
                                    </div>
                                    <div class="browser-name">Professorlar | Dotsentlar soni</div>
                                    <div class="visit"><span class="badge badge-pill badge-primary"><?php echo e($prof_count); ?> | <?php echo e($dot_count); ?></span></div>
                                </li>
                                <li class="d-flex flex-wrap align-items-center">
                                    <div class="icon">
                                        <i style="color: #1b00ff;" class="icon-copy fa fa-user-circle-o" aria-hidden="true"></i>
                                    </div>
                                    <div class="browser-name">Fan nomzod | doktorlari soni</div>
                                    <div class="visit"><span class="badge badge-pill badge-secondary"><?php echo e($cond_count); ?> | <?php echo e($doc_count); ?></span></div>
                                </li>
                                <li class="d-flex flex-wrap align-items-center">
                                    <div class="icon">
                                        <i style="color: #1b00ff;" class="icon-copy fa fa-star-half-empty" aria-hidden="true"></i>
                                    </div>
                                    <div class="browser-name">Darajasizlar soni</div>
                                    <div class="visit"><span class="badge badge-pill badge-success"><?php echo e($darajasiz_count); ?> | <?php echo e($darajasiz_count1); ?></span></div>
                                </li>
                                <hr>
                                <li class="d-flex flex-wrap align-items-center">
                                    <div class="icon">
                                        <i style="color: #1b00ff;" class="icon-copy fa fa-dot-circle-o" aria-hidden="true"></i>
                                    </div>
                                    <div class="browser-name">Davlat adliya maslahatchisi</div>
                                    <div class="visit"><span class="badge badge-pill badge-warning"><?php echo e($adliya_count); ?></span></div>
                                </li>
                                <li class="d-flex flex-wrap align-items-center">
                                    <div class="icon">
                                        <i style="color: #1b00ff;" class="icon-copy ion-ionic"></i>
                                    </div>
                                    <div class="browser-name">Unvonlilar soni</div>
                                    <div class="visit"><span class="badge badge-pill badge-info"><?php echo e($unvonli_count); ?></span></div>
                                </li>
                                <li class="d-flex flex-wrap align-items-center">
                                    <div class="icon">
                                        <i style="color: #1b00ff;" class="icon-copy ion-ionic"></i>
                                    </div>
                                    <div class="browser-name">Unvonsizlar soni</div>
                                    <div class="visit"><span class="badge badge-pill badge-info"><?php echo e($unvonsiz_count); ?></span></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-6 col-sm-12 mb-30">
                    <div class="card-box pd-30 pt-10 height-100-p">
                        <h2 class="mb-30 h4">O'zbekiston xaritasi</h2>

                       <div id="container"></div>
                    </div>
                </div>
            </div>














            <div class="footer-wrap pd-20 mb-20 card-box">
                ShokirjonMK <a href="https://t.me/ShokirjonMK" target="_blank">Bog'lanish</a>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection("js"); ?>
    <script src="https://code.highcharts.com/maps/highmaps.js"></script>

   	<script src="<?php echo e(asset('js/uzbekistan_chart.js')); ?>"></script>


 <script>
        // Prepare demo data
// Data is joined to map using value of 'hc-key' property by default.
// See API docs for 'joinBy' for more info on linking data and map.
var data = [
    ['uz-fa', 0],
    ['uz-tk', 1],
    ['uz-an', 2],
    ['uz-ng', 3],
    ['uz-ji', 4],
    ['uz-si', 5],
    ['uz-ta', 6],
    ['uz-bu', 7],
    ['uz-kh', 8],
    ['uz-qr', 9],
    ['uz-nw', 10],
    ['uz-sa', 11],
    ['uz-qa', 12],
    ['uz-su', 13]
];

// Create the chart
Highcharts.mapChart('container', {
    chart: {
        map: 'countries/uz/uz-all'
    },

    title: {
        text: 'O\'zbekiston'
    },

    subtitle: {
        text: 'Xaritasi '
    },

    mapNavigation: {
        enabled: true,
        buttonOptions: {
            verticalAlign: 'bottom'
        }
    },

    colorAxis: {
        min: 0
    },

    series: [{
        data: data,
        name: 'Test',
        states: {
            hover: {
                color: '#BADA55'
            }
        },
        dataLabels: {
            enabled: true,
            format: '{point.name}'
        }
    }]
});

    </script>


    <script>
         $("text.highcharts-credits").empty();
    //highcharts-credits
    </script>

    <script>
        $(".dial1").knob();
        $({animatedVal: 0}).animate({animatedVal: <?php echo e($jami_xodimlar); ?>}, {
            duration: 3000,
            easing: "swing",
            step: function() {
                $(".dial1").val(Math.ceil(this.animatedVal)).trigger("change");
            }
        });

        $(".dial2").knob();
        $({animatedVal: 0}).animate({animatedVal: <?php echo e($teacher_xodimlar); ?>}, {
            duration: 3000,
            easing: "swing",
            step: function() {
                $(".dial2").val(Math.ceil(this.animatedVal)).trigger("change");
            }
        });

        $(".dial3").knob();
        $({animatedVal: 0}).animate({animatedVal: <?php echo e($free_shtat_f); ?>}, {
            duration: 3000,
            easing: "swing",
            step: function() {
                $(".dial3").val(Math.ceil(this.animatedVal)).trigger("change");
            }
        });

        $(".dial4").knob();
        $({animatedVal: 0}).animate({animatedVal: <?php echo e($inner_shtat_f); ?>}, {
            duration: 3000,
            easing: "swing",
            step: function() {
                $(".dial4").val(Math.ceil(this.animatedVal)).trigger("change");
            }
        });
    </script>


    <?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/kadr/resources/views/admin/index.blade.php ENDPATH**/ ?>