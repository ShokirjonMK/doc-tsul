
<?php $__env->startSection('content'); ?>
<div class="main-container">
        <div class="pd-ltr-20">
            <div class="card-box pd-20 height-100-p mb-30">
                <div class="row align-items-center">
                    <div id='zc'></div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("js"); ?>
 <script src="https://cdn.zingchart.com/zingchart.min.js"></script>


     <script>
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "b55b025e438fa8a98e32482b5f768ff5"];
    var data = [

      {
        id: 'collegeboard',
        name: 'COLLEGE BOARD',
        parent: '',
        cls: 'bdegblue'
      },

      {
        id: 'fkn1',
        fake: true,
        name: '1',
        parent: 'collegeboard',
        sibling: 'president'
      },
      {
        id: 'president',
        name: 'President',
        parent: 'collegeboard',
        cls: 'byellow'
      },
      {
        id: 'execasspres',
        name: 'Executive Assistant to<br>the President',
        parent: 'collegeboard',
        sibling: 'president',
        cls: 'bwhite'
      },

      {
        id: 'execvicepres',
        name: 'Executive Vice<br>President/<br>Administrative<br>Services',
        parent: 'president',
        cls: 'bred'
      },
      {
        id: 'chinof',
        name: 'Chief Information Officer',
        parent: 'execvicepres',
        cls: 'bgreen'
      },
      {
        id: 'assvicepres',
        name: 'Associate Vice President',
        parent: 'execvicepres',
        cls: 'bgreen'
      },

      {
        id: 'fkn2',
        fake: true,
        name: '2',
        parent: 'president'
      },
      {
        id: 'fkn3',
        fake: true,
        name: '3',
        parent: 'fkn2'
      },

      {
        id: 'prmdir',
        name: 'Public Relations & Marketing<br>Senior Director',
        parent: 'fkn3',
        cls: 'bblue'
      },
      {
        id: 'prc',
        name: 'Public Relations<br>Coordinator',
        parent: 'prmdir',
        cls: 'bwhite'
      },
      {
        id: 'sw',
        name: 'Switchboard',
        parent: 'prmdir',
        reference: 'prc',
        cls: 'bwhite'
      },
      {
        id: 'ps',
        name: 'Publications Specialist',
        parent: 'prmdir',
        reference: 'prc',
        cls: 'bwhite'
      },
      {
        id: 'gd',
        name: 'Graphic Designer',
        parent: 'prmdir',
        reference: 'prc',
        cls: 'bwhite'
      },
      {
        id: 'ms',
        name: 'Marketing Specialist',
        parent: 'prmdir',
        reference: 'prc',
        cls: 'bwhite'
      },
      {
        id: 'wcm',
        name: 'Web Content Manager',
        parent: 'prmdir',
        reference: 'prc',
        cls: 'bwhite'
      },

      {
        id: 'fed',
        name: 'Foundation<br>Executive Director',
        parent: 'fkn3',
        cls: 'bblue'
      },
      {
        id: 'safed',
        name: 'Senior Accountant',
        parent: 'fed',
        cls: 'bwhite'
      },
      {
        id: 'dps',
        name: 'Development Program<br>Specialist',
        parent: 'fed',
        reference: 'safed',
        cls: 'bwhite'
      },

      {
        id: 'sdirsp',
        name: 'Senior Director<br>Institutional Research and<br>Strategic Planning',
        parent: 'fkn3',
        cls: 'bblue'
      },
      {
        id: 'sra',
        name: 'Senior Research Analyst',
        parent: 'sdirsp',
        cls: 'bwhite'
      },
      {
        id: 'rs',
        name: 'Research Specialist',
        parent: 'sdirsp',
        reference: 'sra',
        cls: 'bwhite'
      },

      {
        id: 'vicepresle',
        name: 'Vice President<br>for Learning',
        parent: 'president',
        cls: 'bred'
      },
      {
        id: 'assvicepresl',
        name: 'Associate Vice President',
        parent: 'vicepresle',
        cls: 'bgreen'
      },

      {
        id: 'vicepresstu',
        name: 'Vice President for<br>Student Services',
        parent: 'president',
        cls: 'bred'
      }
    ];

    var cdata = {
      type: 'tree',
      plotarea: {
        margin: 20
      },
      options: {
        aspect: 'tree-down',
        orgChart: true,
        packingFactor: 1,
        link: {
          lineColor: '#000',
          lineWidth: 2,
        },
        node: {
          borderColor: '#000',
          borderWidth: 2,
          hoverState: {
            visible: false
          },
          fillAngle: 0,
          gradientStops: '0.01 0.5 0.55 0.99',
          shadow: true,
          shadowDistance: 4,
          shadowColor: '#ccc',
          label: {
            color: '#000',
            fontSize: 10
          }
        },
        'link[parent-prmdir]': {
          aspect: 'side-before'
        },
        'link[parent-fed]': {
          aspect: 'side-before'
        },
        'link[parent-sdirsp]': {
          aspect: 'side-before'
        },
        'node[cls-byellow]': {
          type: 'box',
          width: 200,
          height: 60,
          gradientColors: '#FDDA58 #FBF4BD #FBF4BD #FDDA58',
          label: {
            fontSize: 15,
            fontWeight: 'bold'
          }
        },
        'node[cls-bred]': {
          type: 'box',
          width: 120,
          height: 70,
          gradientColors: '#A15A58 #D6B2B2 #D6B2B2 #A15A58'
        },
        'node[cls-bdegblue]': {
          type: 'box',
          width: 300,
          height: 70,
          gradientColors: '#51B7CD #C0E0EB #C0E0EB #51B7CD',
          label: {
            fontSize: 15,
            fontWeight: 'bold'
          }
        },
        'node[cls-bblue]': {
          type: 'box',
          width: 180,
          height: 65,
          backgroundColor: '#B7DDE8'
        },
        'node[cls-bgreen]': {
          type: 'box',
          width: 130,
          height: 50,
          backgroundColor: '#C3D79A'
        },
        'node[cls-bwhite]': {
          type: 'box',
          width: 140,
          height: 50,
          backgroundColor: '#fff',
          offsetX: 30
        }
      },
      series: data
    };
    zingchart.render({
      id: 'zc',
      width: 950,
      height: 950,
      output: 'svg',
      data: cdata
    });
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\tsul-document\resources\views/tree.blade.php ENDPATH**/ ?>