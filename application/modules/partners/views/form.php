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
        <br>
    </div>


    <div class="row">
        <div class="col-md-12 d-flex justify-content-center" style="margin-top:20px;">
            <p><?php if (!empty($msg)) {
                    echo $msg;
                } ?></p>
        </div>
        <div class="card-body">

            <?php
            
            if(empty($this->session->userdata('user')->profile_id)):

            echo form_open_multipart('partners/activities', ['class' => 'search_form']); ?>
            <div class="form-group col-lg-12">
                <label>Choose Profile</label>
                <select class="form-control" name="profile" style="width: 100%;" onchange="$('.search_form').submit()" tabindex="-1" aria-hidden="true">
                    <option value="" disabled>SELECT Profile</option>
                    <?php foreach ($profiles as $profile) : ?>
                        <option  <?php echo ($profile->id == $profile_id)?"selected":""; ?> value="<?php echo $profile->id; ?>"><?php echo $profile->project; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            </form>

            <?php endif; ?>

            <?php echo form_open_multipart('partners/save_report'); ?>

            <div class="row ml-2 mb-2">
                <button type="submit" class="btn btn-info btn-outline">Save</button>
                <button type="reset" class="btn  btnkey bg-gray-dark color-pale ">Reset All</button>
            </div>

            <input type="hidden" class="form-control" name="profile_id" value="<?php echo $profile_id; ?>"></td>

            <div class="col-md-12">
                <table>
                    <thead>
                        <tr>
                            <th style="width:5%;">
                                <p>Activity date</p>
                            </th>
                            <th style="width:2%;">
                                <p>Duration (Days)</p>
                            </th>
                            <th style="width:20%;">
                                <p>Activity</p>
                            </th>
                            <th style="width:10%;">
                                <p>Description</p>
                            </th>
                            <th style="width:15%;">
                                <p>Coverage</p>
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

                        <?php foreach ($activities as $act) : ?>
                            <tr>

                                <td><input type="date" class="form-control" name="date[]" placeholder="Report Date"></td>
                                <td><input type="number" class="form-control" name="duration[]" placeholder=""></td>
                                <td>
                                    <input type="hidden" class="form-control" name="activity[]" value="<?php echo @$act->id; ?>">
                                    <?php echo @$act->name; ?>
                                </td>
                                <td> <textarea class="form-control" name="description[]" rows="2"></textarea></td>
                                <td>
                                    <select class="form-control select2" name="scope[]" style="width: 100%;" tabindex="-1" aria-hidden="true" multiple>
                                        <option value="" disabled>SELECT SCCOPE</option>
                                        <option value="" disabled>National</option>
                                        <?php foreach ($districts as $district) : ?>
                                            <option value="<?php echo $district->district; ?>"><?php echo $district->district; ?></option>
                                        <?php endforeach; ?>

                                        <?php

                                        ?>
                                    </select>
                                </td>
                                <td><input type="number" class="form-control" name="no_beneficiaries[]" placeholder=""></td>
                                <td><textarea class="form-control" name="beneficiaries[]" rows="2"></textarea></td>
                                <td><input type="number" class="form-control" name="budget[]" placeholder=""></td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            </form>
        </div>

        <script>
            var count = 0;

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