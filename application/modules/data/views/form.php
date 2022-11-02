<style>
    .form-control {
        min-height: 100px;

    }
</style>
<div class="card card-default" data-select2-id="32">
    <div class="card-header">
        <h3 class="card-title">Reporting</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>

    <?php echo form_open_multipart('data/create_partner'); ?>
    <div class="row">
        <div class="col-md-12 d-flex justify-content-center" style="margin-top:20px;">
            <p><?php if (!empty($msg)) {
                    echo $msg;
                } ?></p>
        </div>
    </div>
    <div class="card-body">
        <div class="col-md-12">

            <table>
                <div class="card-footer">
                    <button type="submit" class="btn btn-warning btn-outline">Save</button>
                    <button type="reset" class="btn  btnkey bg-gray-dark color-pale ">Reset All</button>

                </div>
                <thead>
                    <tr>
                        <th>
                            <p>Activity date</p>
                        </th>
                        <th>
                            <p>Duration</p>
                        </th>
                        <th>
                            <p>Activity</p>
                        </th>
                        <th>
                            <p>Sub-Activity</p>
                        </th>
                        <th>
                            <p>Description</p>
                        </th>
                        <th>
                            <p>Scope- coverage</p>
                        </th>
                        <th>
                            <p>District</p>
                        </th>
                        <th>
                            <p>Number of Beneficiaries</p>

                        </th>
                        <th>
                            <p>Beneficiaries Categories(Text)</p>
                        </th>
                        <th>
                            <p>Budget(UGX)</p>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>

                        <td><input type="date" class="form-control" name="" placeholder="Report Date"></td>
                        <td><input type="number" class="form-control" name="" placeholder=""></td>
                        <td>
                            <select class="form-control select2" name="district[]" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                <option value="" disabled>SELECT OPTION BELOW</option>
                                <option vale="National">National</option>
                                <?php foreach ($districts as $row) : ?>
                                    <option value="<?php echo $row->district_id; ?>"><?php echo $row->district; ?></option>
                                <?php endforeach; ?>
                            </select>

                        </td>
                        <td>

                            <select class="form-control select2" name="funder[]" style="width: 100%;" tabindex="-1" aria-hidden="true" multiple>
                                <option value="" disabled>SELECT OPTION BELOW</option>
                                <?php foreach ($funders as $row) : ?>
                                    <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
                                <?php endforeach; ?>

                                <?php

                                ?>
                            </select>

                        </td>
                        <td> <textarea class="form-control" name="beneficiaries" rows="5"></textarea></td>
                        <td> <select class="form-control select2" name="funder[]" style="width: 100%;" tabindex="-1" aria-hidden="true" multiple>
                                <option value="" disabled>SELECT SCCOPE</option>
                                <?php foreach ($funders as $row) : ?>
                                    <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
                                <?php endforeach; ?>

                                <?php

                                ?>
                            </select></td>
                        <td> <select class="form-control select2" name="funder[]" style="width: 100%;" tabindex="-1" aria-hidden="true" multiple>
                                <option value="" disabled>SELECT DISTRICT BELOW</option>
                                <?php foreach ($funders as $row) : ?>
                                    <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
                                <?php endforeach; ?>

                                <?php

                                ?>
                            </select></td>
                        <td><input type="number" class="form-control" name="" placeholder=""></td>
                        <td><textarea class="form-control" name="beneficiaries" rows="5"></textarea></td>
                        <td><input type="number" class="form-control" name="" placeholder=""></td>


                    </tr>
                </tbody>
            </table>
        </div>

    </div>






    <script>
        var count = 0;

        function addContact() {

            let contact_row = '<div class="form-group person"><p>Contact Person</p>';
            contact_row += '<select class="form-control mb-2" name="person_title">';
            contact_row += '<option>Mr.</option>';
            contact_row += '<option>Mrs.</option>';
            contact_row += '<option>Dr.</option>';
            contact_row += '<option>Pr.</option>';
            contact_row += '<option>Ms.</option>';
            contact_row += '<option>Hon.</option></select>';
            contact_row += '<input type="text" name="name[]" class="form-control mb-2" placeholder="Name" class="form-group" required>';
            contact_row += '<input type="text" class="form-control mb-2" placeholder="Phone Number" name="phone[]" class="form-group mb-2" required/>';
            contact_row += '<input type="text"  class="form-control mb-2" name="email[]" placeholder="Email" class="form-group mb-2" required/>';
            contact_row += '<input type="text"  class="form-control" name="position[]" placeholder="Position or Job" class="form-group mb-2" required/>';
            contact_row += '<input type="button" value="Remove Contact Person" class="btn btn-primary   btn-sm  mb-2"  onclick="removeContact($(this))" ></div>'

            $("#contact").append(contact_row);
        }

        function removeContact(elem) {
            //$("#contact").find("div:last").remove();
            elem.closest('.person').remove();
        }

        $('.removeBtn').on('click', function() {

            console.log($(this).closest('.person'));

            $(this).closest('.person').remove();

        });



        function addTheme() {

            let theme_row = '<hr style="border-bottom: 1px solid #400;"><div class="form-group theme"><label>Thematic Area</label>';
            theme_row += '<select class="form-control mb-2 select2" name="theme[]">';
            theme_row += '<?php foreach ($areas as $row) : ?>';
            theme_row += '<option value="<?php echo $row->id; ?>"><?php echo $row->name; ?> </option>';
            theme_row += '<?php endforeach; ?></select></div>';
            theme_row += '<div class="form-group theme"><label>Sub Thematic Area</label>';
            theme_row += '<select class="form-control mb-2 select2" name="sub_theme[]">';
            theme_row += '<?php foreach ($areas as $row) : ?>';
            theme_row += '<option value="<?php echo $row->id; ?>"><?php echo $row->name; ?> </option>';
            theme_row += '<?php endforeach; ?></select></div>';
            theme_row += '<div class="form-group theme"><p>Activities</p>';
            theme_row += '<select class="form-control mb-2 select2" name="activities[]" multiple>';
            theme_row += '<?php foreach ($areas as $row) : ?>';
            theme_row += '<option value="<?php echo $row->id; ?>"><?php echo $row->name; ?> </option>';
            theme_row += '<?php endforeach; ?></select></div>';
            theme_row += '<input type="button" value="Remove Row" class="btn btn-danger   btn-sm  mb-2"  onclick="removeTheme($(this))" ></div>'


            $("#theme").append(theme_row);
            if (theme_row && theme_row.nodeName === "SELECT") {
                $(theme_row).select2();
            }

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