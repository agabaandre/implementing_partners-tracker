</div>
<!-- /.content-wrapper -->

<footer class="footer">

    <div class="col-md-3">
        <img src="https://upload.wikimedia.org/wikipedia/commons/1/17/USAID-Identity.svg" style="width:100px; height:20px; ">
        <div>
            <div class="col-md-5">
                <p style="font-size:8px; margin:0 auto;">&copy; <?php echo date('Y'); ?>, Ministry of Health -Uganda. <strong>All Rights Reserved</strong></p>

            </div>
            <div class="col-md-3">
                <a href="http://health.go.ug" target="_blank"> <img src="https://upload.wikimedia.org/wikipedia/commons/7/7c/Coat_of_arms_of_Uganda.svg" style="width:50px; height:30px; "> </a>
            </div>



</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
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
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>


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

        $('#status').delay(2000).fadeOut(2000); // will first fade out the loading animation
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
</script>


<script type="text/javascript">
    $(document).ready(function() {

        // $.notify("Hello","success");

        var isPassChanged = "1";

        if (isPassChanged != 1) {

            $('#changepass').modal('show');
        }

        var url = "<?php echo $this->uri->segment(2); ?>";

        if (url == "tabular" || url == "actuals" || url == "fetch_report" || url == "actualsreport" || url == "tabular#" || url == "timesheet" || url == "attfrom_report") {

            $('body').addClass('sidebar-collapse');
            $('#sidebar').toggleClass('active');

        };


    });
</script>

<script>

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
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
<script>
    $(function() {
        $('.select2').select2()
        $('.select2dist').select2({
            dropdownParent: "#switch"
        });
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    });
</script>

<script>
    $("document").ready(function() {
        $(".sdistrict").change();
        //$(".sfacility").change();

        // console.log(time);

    });

    function getFacs(val) {

        $.ajax({
            method: "GET",
            url: "<?php echo base_url(); ?>auth/get_facilities",
            data: 'dist_data=' + val,
            success: function(data) {
                //alert(data);
                $(".sfacility").html(data);
            }
        });
    }
</script>


<script>
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

        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', {
            'placeholder': 'dd/mm/yyyy'
        });
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', {
            'placeholder': 'mm/dd/yyyy'
        });



        //Date and time picker
        $('#reservationdatetime').datetimepicker({
            icons: {
                time: 'far fa-clock'
            }
        });

        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
                format: 'MM/DD/YYYY hh:mm A'
            }
        })
        //Date range as a button
        $('#daterange-btn').daterangepicker({
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate: moment()
            },
            function(start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
            }
        )

        //Timepicker
        $('#timepicker').datetimepicker({
            format: 'LT'
        })

        //Bootstrap Duallistbox
        $('.duallistbox').bootstrapDualListbox()

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        $('.my-colorpicker2').on('colorpickerChange', function(event) {
            $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        })

        $("input[data-bootstrap-switch]").each(function() {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        })

    })
    // BS-Stepper Init
    document.addEventListener('DOMContentLoaded', function() {
        window.stepper = new Stepper(document.querySelector('.bs-stepper'))
    })

    // DropzoneJS Demo Code Start
    Dropzone.autoDiscover = false

    // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
    var previewNode = document.querySelector("#template")
    previewNode.id = ""
    var previewTemplate = previewNode.parentNode.innerHTML
    previewNode.parentNode.removeChild(previewNode)

    var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
        url: "/target-url", // Set the url
        thumbnailWidth: 80,
        thumbnailHeight: 80,
        parallelUploads: 20,
        previewTemplate: previewTemplate,
        autoQueue: false, // Make sure the files aren't queued until manually added
        previewsContainer: "#previews", // Define the container to display the previews
        clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
    })

    myDropzone.on("addedfile", function(file) {
        // Hookup the start button
        file.previewElement.querySelector(".start").onclick = function() {
            myDropzone.enqueueFile(file)
        }
    })

    // Update the total progress bar
    myDropzone.on("totaluploadprogress", function(progress) {
        document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
    })

    myDropzone.on("sending", function(file) {
        // Show the total progress bar when upload starts
        document.querySelector("#total-progress").style.opacity = "1"
        // And disable the start button
        file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
    })

    // Hide the total progress bar when nothing's uploading anymore
    myDropzone.on("queuecomplete", function(progress) {
        document.querySelector("#total-progress").style.opacity = "0"
    })

    // Setup the buttons for all transfers
    // The "add files" button doesn't need to be setup because the config
    // `clickable` has already been specified.
    document.querySelector("#actions .start").onclick = function() {
        myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
    }
    document.querySelector("#actions .cancel").onclick = function() {
        myDropzone.removeAllFiles(true)
    }
    // DropzoneJS Demo Code End
</script>