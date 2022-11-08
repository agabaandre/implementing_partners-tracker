 <!-- Main content -->
 <style>
   .info-box-main {
     box-shadow: 0 0 1px rgba(86, 76, 76, 0.13), 0 1px 3px rgba(110, 68, 68, 0.2);
     border-radius: .25rem;
     background: linear-gradient(135deg, rgb(56 54 54) 0%, rgb(11 155 206 / 78%) 100%);
     text-align: center;
     display: -ms-flexbox;
     display: flex;
     margin-bottom: 1rem;
     min-height: 90px;
     padding: .5rem;
     border-radius: 6px;
     position: relative;
     color: #FFF;
   }
 </style>

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
             <span class="info-box-number" id="total_records"><?php echo $total_partners; ?></span>
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
             <span class="info-box-number" id="chwdata"><?php echo $total_partners; ?></span>
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
             <span class="info-box-text">Districts</span>
             <span class="info-box-number" id="daily_updates"><?php echo $total_districts; ?></span>
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
             <span class="info-box-number" id="phase2_data"><?php echo $total_areas; ?></span>


           </div>
           <!-- /.info-box-content-->
         </div>



       </div>
     </div>

   </div>
   <section class="col-lg-12 connectedSortable">
     <!-- Custom tabs (Charts with tabs)-->
     <div class="card">

       <div class="card-body">
         <div id="record_breakdown"></div>

       </div><!-- /.card-body -->
     </div>
     <!-- /.card -->


   </section>



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
         <div id="app">
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
                 <td>{{district.implementation_area}}</td>>
                 <td>{{district.total}}</td>


               </tr>

             </tbody>
           </table>
         </div>
       </div><!-- /.card-body -->
     </div>
     <!-- /.card -->
     </div>


   </section>






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



   //get dashboard Data
   $(document).ready(function() {
     //  renderGraph(data);


     $.ajax({
       type: 'GET',
       url: '<?php echo base_url('dashboard/dashboardData') ?>',
       dataType: "json",
       data: '',
       success: function(data) {

         $('#total_records').text(data.total_records);
         $('#daily_updates').text(data.daily_updates);
         $('#total_enrollers').text(data.total_enrollers);
         $('#phase2_data').text(data.phase2_data);
         $('#chwdata').text(data.chwdata);
         $('#mhwdata').text(data.mhwdata);
         $('#covered_districts').text(data.covered_districts);
         $('#covered_facilities').text(data.covered_facilities);
         $('#updated_records').text(data.updated_records);
         // console.log(data);
         renderGraph(data);


       }

     });



   });

   //get data for districts
   var app = new Vue({
     el: '#app',
     data: {
       districts: "",

     },
     mounted: function() {

       this.dists()

     },
     methods: {
       dists: function() {

         axios.get('<?php echo base_url() ?>dashboard/jsondata_district')
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
             console.log(error);
           });
       },
       stats: function() {

         axios.get('<?php echo base_url() ?>dashboard/get_districts')
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
             console.log(error);
           });
       }


     }
   })
 </script>