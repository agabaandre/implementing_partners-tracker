</div>
<!-- /.content-wrapper -->

<footer class="footer">
    <div class="row" style="text-align:center;">
        <div class="col-md-12">
            <p style="font-size:8px; margin:0 auto;">&copy; <?php echo date('Y'); ?>, Ministry of Health -Uganda. <strong>All Rights Reserved</strong></p>

        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <img src="https://upload.wikimedia.org/wikipedia/commons/1/17/USAID-Identity.svg" style="width:800px; height:80px;">
        </div>

        <div class="col-md-6">
            <a href="http://health.go.ug" target="_blank"> <img src="https://upload.wikimedia.org/wikipedia/commons/7/7c/Coat_of_arms_of_Uganda.svg" style="width:800px; height:80px; "> </a>
        </div>

    </div>


</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
<!-- ./wrapper -->

<!-- jQuery -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- AdminLTE App -->
<!-- Select2 -->
<script src="<?php echo base_url() ?>assets/plugins/select2/js/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>

<!-- <script src="<?php echo base_url(); ?>assets/dist/js/dashboard.js"></script> -->
<!-- AdminLTE for demo purposes
<script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
 -->

<!-- <script src="<?php echo base_url(); ?>/assets/plugins/jquery/jquery.min.js"></script> -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.3.min.js"></script>

<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url(); ?>/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- date-range-picker -->

<script src="<?php echo base_url() ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/plugins/select2/js/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/notify.min.js"></script>
<!-- fullCalendar 2.2.5 -->
<script src="<?php echo base_url() ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url() ?>assets/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>

<script src="<?php echo base_url() ?>assets/plugins/inputmask/jquery.inputmask.min.js"></script>

<script src="<?php echo base_url() ?>assets/plugins/daterangepicker/daterangepicker.js"></script>

<script src="<?php echo base_url() ?>assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>

<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<div class="control-sidebar-bg"></div>
</div>

<script>
    $(document).ready(function() {
        $.fn.datepicker.defaults.format = "yyyy-mm-dd";
        $('.datepicker').datepicker({
            todayHighlight: true,
            autoclose: true,

        });
    });
</script>
<script>
    // Radialize the colors
    $(document).ready(function() {
        Highcharts.setOptions({
            colors: Highcharts.getOptions().colors.map(function(color) {
                return {
                    radialGradient: {
                        cx: 0.5,
                        cy: 0.3,
                        r: 0.7
                    },
                    stops: [
                        [0, color],
                        [1, Highcharts.color(color).brighten(-0.3).get('rgb')] // darken
                    ]
                };
            })
        });
    });
</script>
<script>
    $(window).load(function() {

        $('#status').delay(1500).fadeOut(1500); // will first fade out the loading animation
        $('#preloader').delay(1000).fadeOut(1000); // will fade out the white div

    })
</script>

<script>
    $(document).ready(function() {
        $('.mytable').DataTable({
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
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#timelogs').DataTable({

            "paging": false,
            "lengthChange": true,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,

        });
    });

    $(document).ready(function() {

        // $.notify("Hello","success");

        var isPassChanged = "1";

        if (isPassChanged != 1) {

            $('#changepass').modal('show');
        }

    });

    $(function() {
        $('.select2').select2()
        $('.select2dist').select2({
            dropdownParent: "#switch"
        });
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    });

    var url = window.location.href;
    if (url == '<?php echo base_url(); ?>partners/activities') {
        $('.sidebar-mini').addClass('sidebar-collapse');
    }
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2();

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        });

    });
</script>



<!-- ./wrapper -->
<?php
$uri = $_SERVER['REQUEST_URI'];
$uri; // Outputs: URI

$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

$url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$linkquery = $url; // Outputs: Full URL
// Outputs: Query String
?>





<!-- change password modal at ones own wish -->
<div class="modal" id="changepassword" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="<?php echo base_url(); ?>auth/changePass">
                <div class="modal-header bg-default text-center">
                    <h5>Change Password</h5>
                    <?php echo $this->session->flashdata('msg'); ?>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label>Old Password</label>
                        <input type="password" class="form-control" name="oldpass">
                    </div>
                    <div class="form-group">
                        <label>New password</i></label>
                        <input type="password" class="form-control" name="newpass">
                    </div>



                </div>
                <div class="modal-footer">
                    <input type="submit" value="Submit" class="btn btn-primary">
                    <button type="button" class="btn  btnkey bg-gray-dark color-pale" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!--change password--modal for first logins (as a MUST)-->

<div class="modal" id="changepass" data-backdrop="true">


    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="<?php echo base_url(); ?>auth/changePass">
                <div class="modal-header bg-default text-center">
                    <h2>Change Password</h2>
                    <?php echo $this->session->flashdata('msg'); ?>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label>Old password</label>
                        <input type="password" class="form-control" name="oldpass">
                    </div>
                    <div class="form-group">
                        <label>New password></label>
                        <input type="password" class="form-control" name="newpass">
                    </div>



                </div>
                <div class="modal-footer">
                    <input type="submit" value="Submit" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /change password--modal for first logins (as a MUST)-->


</body>

</html>