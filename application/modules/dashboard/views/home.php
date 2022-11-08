<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<section class="content">
  <div class="container-fluid">
    <!-- Main row -->

    <?php
    $permissions = $this->session->userdata('user')->permissions;
    //  print_r($permissions);
    if (in_array('33', $permissions)) {
      $display = "active";
    } else {
      $display = "none";
    }

    ?>


    <div class="row">
      <!-- /.info-box -->
      <div class="col-md-3">
        <div class="info-box mb-3 bg-cyan ">
          <span class="info-box-icon"><i class="fas fa-users"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Total Monthly Report Submissions</span>
            <span class="info-box-number" id="partners"></span>
          </div>
          <!-- /.info-box-content-->
        </div>
        <!-- /.info-box -->


      </div>

      <!-- /.info-box -->
      <div class="col-md-3">
        <div class="info-box mb-3 bg-green">
          <span class="info-box-icon"><i class="far fa-user"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Total Active Partners</span>
            <span class="info-box-number" id="partners"></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>

      <!-- /.info-box -->
      <div class="col-md-3">
        <div class="info-box mb-3 bg-danger">
          <span class="info-box-icon"><i class="fas fa-clock"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Locations</span>
            <span class="info-box-number" id="locations"></span>
          </div>
          <!-- /.info-box-content -->
        </div>
      </div>

      <!-- /.info-box -->
      <div class="col-md-3">
        <div class="info-box mb-3 bg-yellow" style="color:#FFF;">
          <span class="info-box-icon"><i class="fas fa-tasks"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Areas of Service</span>
            <span class="info-box-number" id="work_areas"></span>


          </div>
          <!-- /.info-box-content-->
        </div>



      </div>
    </div>

  </div>
  <!-- <section class="col-lg-12 connectedSortable">
     
     <div class="card">

       <div class="card-body">
         <div id="theme_status"></div>

       </div>
     </div>
  


   </section> -->



  <section class="col-lg-12 connectedSortable">
    <!-- Custom tabs (Charts with tabs)-->
    <div class="card ">
      <div class="card-header">
        <h6>Data Implementation Area</h6>
        <div class="card-tools">

          <ul class="nav nav-pills ml-auto">


          </ul>
        </div>
      </div><!-- /.card-header -->
      <div class="card-body">

        <table id="vuetable2" class="table table-striped table-bordered nowrap" style="width:100%">
          <thead>
            <tr>
              <th>#</th>
              <th>Implementation Area</th>
              <th>Partners</th>
            </tr>
          </thead>
          <tbody>

            <tr v-for='district in districts'>
              <td>{{district.id}}</td>
              <td>{{district.name}}</td>
              <td>{{district.count.count}}</td>


            </tr>

          </tbody>
        </table>
      </div>
    </div><!-- /.card-body -->

    <!-- /.card -->
    </div>


  </section>






  </div>
  </div>







  <!-- Info Boxes Style 2 -->






  </div>
  <!-- /.row (main row) -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<script src="<?php echo base_url() ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url() ?>assets/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
<script type="text/javascript">
  Highcharts.setOptions({
    colors: ['#28a745', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4']
  });

  function renderGraph(data) {

    Highcharts.chart('record_breakdown', {


      chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
      },
      title: {
        text: 'Partners by Area of Intervention'
      },
      tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
      },
      accessibility: {
        point: {
          valueSuffix: '%'
        }
      },
      plotOptions: {
        pie: {
          allowPointSelect: true,
          cursor: 'pointer',
          dataLabels: {
            enabled: true,
            format: '<b>{point.name}</b>: {point.percentage:.1f} %'
          }
        }
      },

      series: [{
        name: 'Health Worker Types',
        colorByPoint: true,

        data: [{
            name: 'Community Health Workers',
            y: data.chwdata,
          },

          {
            name: 'Ministry Health Workers',
            y: data.mhwdata
          }

        ]
      }],
      credits: {
        enabled: false
      }

    });
    //console.log(data.mhwdata);
  }



  //get data for districts
  var app = new Vue({
    el: '#app',
    data: {
      districts: "",
      $dashboards: ""

    },
    mounted: function() {

      this.dists()
      this.stats()

    },
    methods: {
      dists: function() {

        axios.get('<?php echo base_url() ?>dashboard/theme_partners')
          .then(function(response) {
            app.districts = response.data;
            //console.log(response.data);
            setTimeout(() => {
              $('#vuetable2').DataTable(

                {
                  dom: 'Bfrtip',
                  "paging": true,
                  "lengthChange": true,
                  "searching": true,
                  "ordering": true,
                  "info": true,
                  "autoWidth": false,
                  "responsive": true,
                  lengthMenu: [
                    [25, 50, 100, 150, -1],
                    ['25', '50', '100', '150', '200', 'Show all']
                  ],

                  buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pageLength',


                  ]
                }

              );
            }, 4000);

          })
          .catch(function(error) {
            //console.log(error);
          });
      },
      stats: function() {

        axios.get('<?php echo base_url() ?>dashboard/dashboardData')
          .then(function(response) {
            app.dashboards = response.data;
            data = response.data
            //console.log(response.data.locations);
            $('#total_records').text(data.total_records);
            $('#monthly_submissions').text(data.monthly_submissions);
            $('#partners').text(data.partners);
            $('#locations').text(data.locations);
            $('#work_areas').text(data.work_areas);
            $('#sub_work_areas').text(data.sub_work_areas);

            theme_status_column_graph(data)

          })
          .catch(function(error) {
            //  /console.log(error);
          });
      }


    }
  })

  function theme_status_column_graph(gdata) {

    // Set up the chart
    const chart = new Highcharts.Chart({
      chart: {
        renderTo: 'themes_status',
        type: 'column',
        options3d: {
          enabled: true,
          alpha: 15,
          beta: 15,
          depth: 50,
          viewDistance: 25
        }
      },
      xAxis: {
        categories: gdata.keys
      },
      yAxis: {
        title: {
          enabled: false
        }
      },
      tooltip: {
        headerFormat: '<b>{point.key}</b><br>',
        pointFormat: 'Records: {point.y}'
      },
      title: {
        text: 'Data Status'
      },
      subtitle: {
        text: 'Source: ' +
          '<a href="<?php echo base_url() ?>"' +
          'target="_blank">Digital Finance Databank</a>'
      },
      legend: {
        enabled: false
      },
      plotOptions: {
        column: {
          depth: 25
        }
      },
      series: [{
        data: gdata.values,
        colorByPoint: true
      }],
      credits: {
        enabled: false
      }
    });
  }
</script>