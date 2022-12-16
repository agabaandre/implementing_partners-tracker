<div class="card card-default" data-select2-id="32">
    <div class="card-header">
        <h3 class="card-title"><a href=""><?php echo $uptitle; ?></a></h3>
        <br>
    </div>

    <div class="row">

        <div class="card-body">

            <?php
            // if (empty($this->session->userdata('user')->profile_id) && (($this->session->userdata('user')->group_name) != 'sadmin')) :

            echo form_open_multipart('partners/report', ['class' => 'search_form']); ?>
            <div class="row">
                <div class="form-group col-lg-4">
                    <label>Choose Profile</label>
                    <select class="form-control" name="profile" style="width: 100%;" onchange="$('.search_form').submit()" tabindex="-1" aria-hidden="true">
                        <option value="" disabled>SELECT Profile</option>
                        <?php foreach ($profiles as $profile) : ?>
                            <option <?php echo ($profile->id == $profile_id) ? "selected" : ""; ?> value="<?php echo $profile->id; ?>"><?php echo $profile->project; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-lg-4">
                    <label>Date From</label>
                    <input type="date" class="form-control" name="datefrom">

                </div>
                <div class="form-group col-lg-4">
                    <label>Date To</label>
                    <input type="date" class="form-control" name="dateto">

                </div>
            </div>
            </form>
            <?php //endif; 
            ?>

            <?php //print_r($this->session->userdata()); 
            ?>

            <div class="row p-3">
                <a class="btn btn-dark" href="<?php echo base_url(); ?>partners/report?csv=1">Export to CSV</a>
            </div>
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Activity</th>
                            <th>Partner</th>
                            <th>Budget</th>
                            <th>Duration</th>
                            <th>Beneficiaries</th>
                            <th>Location</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($records as $act) : ?>
                            <tr>
                                <td><?php echo $act->date; ?></td>
                                <td><?php echo $act->activity->name; ?></td>
                                <td><?php echo $act->profile->project; ?></td>
                                <td><?php echo $act->budget; ?></td>
                                <td><?php echo $act->duration; ?> days</td>
                                <td><?php echo $act->beneficiaries; ?></td>
                                <td><?php echo $act->location; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            </form>
        </div>