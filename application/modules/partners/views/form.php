<style>
    .form-control {
        min-height: 60px;

    }

    .select2-container--default .select2-selection--single {
        border: 1px solid #ced4da;
        padding: 0.46875rem 0.75rem;
        height: 60px !important;
    }

    .select2-container--default .select2-selection--multiple {
        border: 1px solid #ced4da;
        padding: 0.46875rem 0.75rem;
        height: 60px !important;
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type=number] {
        -moz-appearance: textfield;
    }
</style>
<div class="card card-default" data-select2-id="32">
    <div class="card-header">
        <h3 class="card-title"><?php echo $uptitle; ?></h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>


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
                <?php echo form_open_multipart('partners/submit_report'); ?>

                <div class="card-footer">
                    <button type="submit" class="btn btn-info btn-outline">Save</button>
                    <button type="reset" class="btn  btnkey bg-gray-dark color-pale ">Reset All</button>

                </div>
                <thead>
                    <tr>
                        <th style="width:5%;">
                            <p>Activity date</p>
                        </th>
                        <th style="width:2%;">
                            <p>Duration (Days)</p>
                        </th>
                        <th style="width:10%;">
                            <p>Activity</p>
                        </th>
                        <th style="width:10%;">
                            <p>Sub-Activity</p>
                        </th>
                        <th style="width:15%;">
                            <p>Description</p>
                        </th>
                        <th style="width:10%;">
                            <p>Scope- coverage</p>
                        </th>

                        <th style="width:15%;">
                            <p>Number of Beneficiaries</p>

                        </th>
                        <th style="width:10%;">
                            <p>Beneficiaries Categories(Text)</p>
                        </th>
                        <th style="width:10%;">
                            <p>Budget(UGX)</p>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>

                        <td><input type="date" class="form-control" name="date[]" placeholder="Report Date"></td>
                        <td><input type="number" class="form-control" name="duration[]" placeholder=""></td>
                        <td>
                            <select class="form-control select2" name="activity[]" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                <option value="" disabled>SELECT Activity</option>
                                <?php foreach ($activities as $activity) : ?>
                                    <option value="<?php echo $activity->id; ?>"><?php echo $activity->name; ?></option>
                                <?php endforeach; ?>
                            </select>

                        </td>
                        <td class="sub_activity">

                        </td>
                        <td> <textarea class="form-control" name="description[]" rows="2"></textarea></td>
                        <td>
                            <select class="form-control select2" name="funder[]" style="width: 100%;" tabindex="-1" aria-hidden="true" multiple>
                                <option value="" disabled>SELECT SCCOPE</option>
                                <option value="" disabled>National</option>
                                <?php foreach ($districts as $district) : ?>
                                    <option value="<?php echo $district->id; ?>"><?php echo $district->name; ?></option>
                                <?php endforeach; ?>

                                <?php

                                ?>
                            </select>
                        </td>
                        <td><input type="number" class="form-control" name="no_beneficiaries[]" placeholder=""></td>
                        <td><textarea class="form-control" name="beneficiaries[]" rows="2"></textarea></td>
                        <td><input type="number" class="form-control" name="budget[]" placeholder=""></td>


                    </tr>
                    <tr>

                        <td><input type="date" class="form-control" name="date[]" placeholder="Report Date"></td>
                        <td><input type="number" class="form-control" name="duration[]" placeholder=""></td>
                        <td>
                            <select class="form-control select2" name="activity[]" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                <option value="" disabled>SELECT Activity</option>
                                <?php foreach ($activities as $activity) : ?>
                                    <option value="<?php echo $activity->id; ?>"><?php echo $activity->name; ?></option>
                                <?php endforeach; ?>
                            </select>

                        </td>
                        <td class="sub_activity">

                        </td>
                        <td> <textarea class="form-control" name="description[]" rows="2"></textarea></td>
                        <td>
                            <select class="form-control select2" name="funder[]" style="width: 100%;" tabindex="-1" aria-hidden="true" multiple>
                                <option value="" disabled>SELECT SCCOPE</option>
                                <option value="" disabled>National</option>
                                <?php foreach ($districts as $district) : ?>
                                    <option value="<?php echo $district->id; ?>"><?php echo $district->name; ?></option>
                                <?php endforeach; ?>

                                <?php

                                ?>
                            </select>
                        </td>
                        <td><input type="number" class="form-control" name="no_beneficiaries[]" placeholder=""></td>
                        <td><textarea class="form-control" name="beneficiaries[]" rows="2"></textarea></td>
                        <td><input type="number" class="form-control" name="budget[]" placeholder=""></td>


                    </tr>
                    <tr>

                        <td><input type="date" class="form-control" name="date[]" placeholder="Report Date"></td>
                        <td><input type="number" class="form-control" name="duration[]" placeholder=""></td>
                        <td>
                            <select class="form-control select2" name="activity[]" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                <option value="" disabled>SELECT Activity</option>
                                <?php foreach ($activities as $activity) : ?>
                                    <option value="<?php echo $activity->id; ?>"><?php echo $activity->name; ?></option>
                                <?php endforeach; ?>
                            </select>

                        </td>
                        <td class="sub_activity">

                        </td>
                        <td> <textarea class="form-control" name="description[]" rows="2"></textarea></td>
                        <td>
                            <select class="form-control select2" name="funder[]" style="width: 100%;" tabindex="-1" aria-hidden="true" multiple>
                                <option value="" disabled>SELECT SCCOPE</option>
                                <option value="" disabled>National</option>
                                <?php foreach ($districts as $district) : ?>
                                    <option value="<?php echo $district->id; ?>"><?php echo $district->name; ?></option>
                                <?php endforeach; ?>

                                <?php

                                ?>
                            </select>
                        </td>
                        <td><input type="number" class="form-control" name="no_beneficiaries[]" placeholder=""></td>
                        <td><textarea class="form-control" name="beneficiaries[]" rows="2"></textarea></td>
                        <td><input type="number" class="form-control" name="budget[]" placeholder=""></td>


                    </tr>
                    <tr>

                        <td><input type="date" class="form-control" name="date[]" placeholder="Report Date"></td>
                        <td><input type="number" class="form-control" name="duration[]" placeholder=""></td>
                        <td>
                            <select class="form-control select2" name="activity[]" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                <option value="" disabled>SELECT Activity</option>
                                <?php foreach ($activities as $activity) : ?>
                                    <option value="<?php echo $activity->id; ?>"><?php echo $activity->name; ?></option>
                                <?php endforeach; ?>
                            </select>

                        </td>
                        <td class="sub_activity">

                        </td>
                        <td> <textarea class="form-control" name="description[]" rows="2"></textarea></td>
                        <td>
                            <select class="form-control select2" name="funder[]" style="width: 100%;" tabindex="-1" aria-hidden="true" multiple>
                                <option value="" disabled>SELECT SCCOPE</option>
                                <option value="" disabled>National</option>
                                <?php foreach ($districts as $district) : ?>
                                    <option value="<?php echo $district->id; ?>"><?php echo $district->name; ?></option>
                                <?php endforeach; ?>

                                <?php

                                ?>
                            </select>
                        </td>
                        <td><input type="number" class="form-control" name="no_beneficiaries[]" placeholder=""></td>
                        <td><textarea class="form-control" name="beneficiaries[]" rows="2"></textarea></td>
                        <td><input type="number" class="form-control" name="budget[]" placeholder=""></td>


                    </tr>
                    <tr>

                        <td><input type="date" class="form-control" name="date[]" placeholder="Report Date"></td>
                        <td><input type="number" class="form-control" name="duration[]" placeholder=""></td>
                        <td>
                            <select class="form-control select2" name="activity[]" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                <option value="" disabled>SELECT Activity</option>
                                <?php foreach ($activities as $activity) : ?>
                                    <option value="<?php echo $activity->id; ?>"><?php echo $activity->name; ?></option>
                                <?php endforeach; ?>
                            </select>

                        </td>
                        <td class="sub_activity">

                        </td>
                        <td> <textarea class="form-control" name="description[]" rows="2"></textarea></td>
                        <td>
                            <select class="form-control select2" name="funder[]" style="width: 100%;" tabindex="-1" aria-hidden="true" multiple>
                                <option value="" disabled>SELECT SCCOPE</option>
                                <option value="" disabled>National</option>
                                <?php foreach ($districts as $district) : ?>
                                    <option value="<?php echo $district->id; ?>"><?php echo $district->name; ?></option>
                                <?php endforeach; ?>

                                <?php

                                ?>
                            </select>
                        </td>
                        <td><input type="number" class="form-control" name="no_beneficiaries[]" placeholder=""></td>
                        <td><textarea class="form-control" name="beneficiaries[]" rows="2"></textarea></td>
                        <td><input type="number" class="form-control" name="budget[]" placeholder=""></td>


                    </tr>
                    <tr>

                        <td><input type="date" class="form-control" name="date[]" placeholder="Report Date"></td>
                        <td><input type="number" class="form-control" name="duration[]" placeholder=""></td>
                        <td>
                            <select class="form-control select2" name="activity[]" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                <option value="" disabled>SELECT Activity</option>
                                <?php foreach ($activities as $activity) : ?>
                                    <option value="<?php echo $activity->id; ?>"><?php echo $activity->name; ?></option>
                                <?php endforeach; ?>
                            </select>

                        </td>
                        <td class="sub_activity">

                        </td>
                        <td> <textarea class="form-control" name="description[]" rows="2"></textarea></td>
                        <td>
                            <select class="form-control select2" name="funder[]" style="width: 100%;" tabindex="-1" aria-hidden="true" multiple>
                                <option value="" disabled>SELECT SCCOPE</option>
                                <option value="" disabled>National</option>
                                <?php foreach ($districts as $district) : ?>
                                    <option value="<?php echo $district->id; ?>"><?php echo $district->name; ?></option>
                                <?php endforeach; ?>

                                <?php

                                ?>
                            </select>
                        </td>
                        <td><input type="number" class="form-control" name="no_beneficiaries[]" placeholder=""></td>
                        <td><textarea class="form-control" name="beneficiaries[]" rows="2"></textarea></td>
                        <td><input type="number" class="form-control" name="budget[]" placeholder=""></td>


                    </tr>


                    <tr>

                        <td><input type="date" class="form-control" name="date[]" placeholder="Report Date"></td>
                        <td><input type="number" class="form-control" name="duration[]" placeholder=""></td>
                        <td>
                            <select class="form-control select2" name="activity[]" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                <option value="" disabled>SELECT Activity</option>
                                <?php foreach ($activities as $activity) : ?>
                                    <option value="<?php echo $activity->id; ?>"><?php echo $activity->name; ?></option>
                                <?php endforeach; ?>
                            </select>

                        </td>
                        <td class="sub_activity">

                        </td>
                        <td> <textarea class="form-control" name="description[]" rows="2"></textarea></td>
                        <td>
                            <select class="form-control select2" name="funder[]" style="width: 100%;" tabindex="-1" aria-hidden="true" multiple>
                                <option value="" disabled>SELECT SCCOPE</option>
                                <option value="" disabled>National</option>
                                <?php foreach ($districts as $district) : ?>
                                    <option value="<?php echo $district->id; ?>"><?php echo $district->name; ?></option>
                                <?php endforeach; ?>

                                <?php

                                ?>
                            </select>
                        </td>
                        <td><input type="number" class="form-control" name="no_beneficiaries[]" placeholder=""></td>
                        <td><textarea class="form-control" name="beneficiaries[]" rows="2"></textarea></td>
                        <td><input type="number" class="form-control" name="budget[]" placeholder=""></td>


                    </tr>


                    <tr>

                        <td><input type="date" class="form-control" name="date[]" placeholder="Report Date"></td>
                        <td><input type="number" class="form-control" name="duration[]" placeholder=""></td>
                        <td>
                            <select class="form-control select2" name="activity[]" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                <option value="" disabled>SELECT Activity</option>
                                <?php foreach ($activities as $activity) : ?>
                                    <option value="<?php echo $activity->id; ?>"><?php echo $activity->name; ?></option>
                                <?php endforeach; ?>
                            </select>

                        </td>
                        <td class="sub_activity">

                        </td>
                        <td> <textarea class="form-control" name="description[]" rows="2"></textarea></td>
                        <td>
                            <select class="form-control select2" name="funder[]" style="width: 100%;" tabindex="-1" aria-hidden="true" multiple>
                                <option value="" disabled>SELECT SCCOPE</option>
                                <option value="" disabled>National</option>
                                <?php foreach ($districts as $district) : ?>
                                    <option value="<?php echo $district->id; ?>"><?php echo $district->name; ?></option>
                                <?php endforeach; ?>

                                <?php

                                ?>
                            </select>
                        </td>
                        <td><input type="number" class="form-control" name="no_beneficiaries[]" placeholder=""></td>
                        <td><textarea class="form-control" name="beneficiaries[]" rows="2"></textarea></td>
                        <td><input type="number" class="form-control" name="budget[]" placeholder=""></td>


                    </tr>


                    <tr>

                        <td><input type="date" class="form-control" name="date[]" placeholder="Report Date"></td>
                        <td><input type="number" class="form-control" name="duration[]" placeholder=""></td>
                        <td>
                            <select class="form-control select2" name="activity[]" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                <option value="" disabled>SELECT Activity</option>
                                <?php foreach ($activities as $activity) : ?>
                                    <option value="<?php echo $activity->id; ?>"><?php echo $activity->name; ?></option>
                                <?php endforeach; ?>
                            </select>

                        </td>
                        <td class="sub_activity">

                        </td>
                        <td> <textarea class="form-control" name="description[]" rows="2"></textarea></td>
                        <td>
                            <select class="form-control select2" name="funder[]" style="width: 100%;" tabindex="-1" aria-hidden="true" multiple>
                                <option value="" disabled>SELECT SCCOPE</option>
                                <option value="" disabled>National</option>
                                <?php foreach ($districts as $district) : ?>
                                    <option value="<?php echo $district->id; ?>"><?php echo $district->name; ?></option>
                                <?php endforeach; ?>

                                <?php

                                ?>
                            </select>
                        </td>
                        <td><input type="number" class="form-control" name="no_beneficiaries[]" placeholder=""></td>
                        <td><textarea class="form-control" name="beneficiaries[]" rows="2"></textarea></td>
                        <td><input type="number" class="form-control" name="budget[]" placeholder=""></td>


                        </form>


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