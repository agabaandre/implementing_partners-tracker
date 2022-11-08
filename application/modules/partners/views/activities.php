<div class="card card-default" data-select2-id="32">
    <div class="card-header">
        <h3 class="card-title">Register</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>

    <?php 
    
    echo form_open_multipart('partners/create_partner'); ?>
    <div class="row">
        <div class="col-md-12 d-flex justify-content-center" style="margin-top:20px;">
            <p><?php if (!empty($msg)) {
                    echo $msg;
                } ?></p>
        </div>
    </div>
    <div class="card-body">

        <div class="row">

            <div class="col-md-6">
                <div class="form-group">
                    <label for="Oganisation">Project Name/Activity</label>
                    <input type="text" class="form-control" name="project" placeholder="Project">
                </div>

                <div class="form-group">
                    <label>Implementing Partner <?php echo required(); ?></label>
                    <select class="form-control select2" style="width: 100%;" name="partner[]" tabindex="-1" aria-hidden="true" multiple required>
                        <?php foreach ($partners as $row) : ?>
                            <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Funder(s) <?php echo required(); ?></label>
                    <select class="form-control select2" name="funder[]" style="width: 100%;" tabindex="-1" aria-hidden="true" multiple>
                        <option value="" disabled>SELECT OPTION BELOW</option>
                        <?php foreach ($funders as $row) : ?>
                            <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
                        <?php endforeach; ?>
                        <?php

                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="Oganisation">Organisation Email <?php echo required(); ?></label>
                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <label for="Oganisation">Organisation Telephone <?php echo required(); ?></label>
                    <input type="text" class="form-control" name="organisation_telephone" placeholder="Telephone" required>
                </div>
                <div class="form-group">
                    <label for="Oganisation">Postal Address </label>
                    <textarea class="form-control" name="postal_address"></textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label style="font-weight:bold;">Contact Person Details</label>
                    <div class="form-group">

                        <div id="contact" style="max-height: 600px; overflow:auto;">

                            <!-- <input type="button" value="Add More Contact Persons" class="btn btn-primary  mb-2" onclick="addContact()"> -->

                            <select class="form-control mb-2" name="person_title">
                                <option>Mr.</option>
                                <option>Mrs.</option>
                                <option>Dr.</option>
                                <option>Pr.</option>
                                <option>Ms.</option>
                                <option>Hon.</option>
                            </select>
                            <input type="text" name="name" class="form-control mb-2" placeholder="Name" class="form-group" required />
                            <input type="text" class="form-control mb-2" placeholder="Phone Number" name="phone_number" class="form-group mb-2" required />
                            <input type="text" class="form-control mb-2" name="email" placeholder="Email" class="form-group mb-2" required />
                            <input type="text" class="form-control mb-2" name="position" placeholder="Position or Job" required />
                        </div>

                    </div>

                </div>
                <div id="theme" style="max-height: 600px; overflow:auto;">
                    <button type="button" class="btnkey bg-gray-dark color-pale mb-2 addTheme" onclick="addTheme()">Add Internvention Areas</button>
                    <br>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-danger btn-sm">Save</button>
                <button type="reset" class="btn  btnkey bg-gray-dark color-pale ">Reset All</button>

            </div>
        </div>



        <script>
            var count = 0;

            function addTheme() {

                let theme_row = '<hr style="border-bottom: 1px solid #400;"><div class="form-group theme"><label>Thematic Area</label>';
                theme_row += '<select class="form-control mb-2 select2"   name="theme[]">';
                theme_row += '<?php foreach ($areas as $row) : ?>';
                theme_row += '<option value="<?php echo @$row->id; ?>"><?php echo @$row->name; ?> </option>';
                theme_row += '<?php endforeach; ?></select></div>';

                $("#theme").append(theme_row);
                count++;

            }

            function removeTheme(tag) {
                //$("#theme").find("div:last").remove();
                tag.closest('.theme').remove();
                count--;
            }

            $('.removeBtn').on('click', function() {

                console.log($(this).closest('.theme'));

                $(this).closest('.theme').remove();

            });

            function getSubthemes(val, elem_count) {
                $.ajax({
                    method: "GET",
                    url: "<?php echo base_url(); ?>data/get_subthme",
                    data: 'subtheme=' + val,
                    success: function(data) {
                        console.log(data);
                        //alert(data);
                        if (elem_count) {
                            $(".sub" + elem_count).html(data);
                        } else {
                            $(".subtheme").html(data);
                        }
                    }
                });
            }

            function getactivities(val, elem_count) {
                $.ajax({
                    method: "GET",
                    url: "<?php echo base_url(); ?>data/get_activities",
                    data: 'activities=' + val,
                    success: function(data) {
                        //alert(data);
                        if (elem_count) {
                            $(".act" + elem_count).html(data);
                        } else {
                            $(".activities").html(data);
                        }
                    }
                    //  console.log('iwioowiiwoow');
                });
            }
        </script>