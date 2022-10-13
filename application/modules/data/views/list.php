<section class="col-lg-12 connectedSortable">
    <div class="row">
        <div class="col-lg-12">

            <div class="card-tools">

                <form class="form-horizontal" action="<?php echo base_url() ?>data/partners_list" method="post">
                    <div class="row">


                        <?php //print_r($this->session->userdata());
                        ?>
                        <div class="form-group col-md-4">
                            <label for="aw_description">
                                District </label>
                            <select name="district" class="form-control select2 sdistrict" style="width:100%;" onChange="getFacs($(this).val());">
                                <option value="" disabled selected>DISTRICT</option>
                                <option value="">ALL</option>
                                <?php foreach ($districts as $district) :
                                ?>
                                    <option value="<?php echo $district->district; ?>" <?php if ($this->input->post('district') == $district->district) echo "selected"; ?>><?php echo $district->district; ?></option>
                                <?php endforeach; ?>
                            </select>


                        </div>

                        <div class="form-group col-md-4">
                            <label for="aw_description">
                                Worker Areas </label>
                            <select name="work_areas" class="form-control select2">
                               
                            </select>
                        </div>


                    </div>
            </div>

            <div class="row">
                <?php if ($this->input->post('district')) : ?>
                    <a href="<?php echo base_url() ?>data/pdf_data/1" class="btn bt-sm bg-gray-dark color-pale" style="width:100px;"><i class="fa fa-file" aria-hidden="true"></i>PDF</a>
                    &nbsp;&nbsp;
                    <a href="<?php echo base_url() ?>data/csv_data/1" class="btn bt-sm bg-gray-dark color-pale" style="width:100px;"><i class="fa fa-file-excel" aria-hidden="true"></i>CSV</a>
                    &nbsp;&nbsp;
                <?php endif; ?>
                <button type="submit" class="btn bt-sm bg-gray-dark color-pale" style="width:100px; left-right:4px;"><i class="fa fa-tasks" aria-hidden="true"></i>APPLY</button>
                &nbsp;&nbsp;
            </div>
            &nbsp;&nbsp;
        </div>


        </form>


        &nbsp;&nbsp;<p class="pagination"><?php echo $links; ?>

            <b> &nbsp;&nbsp;<?php $t = ($total_rows);
                            if ($t < 0) {
                                echo $t;
                            } else {
                                echo $t;
                            }
                            ' Records'; ?></b>

        <div class="table" style="overflow-x:auto;">


            <table id="example" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Project</th>
                        <th>Implementing Partner</th>
                        <th label="Contact">Telephone Contact</th>
                        <th label="Contact">Email</th>
                        <th label="Firstname">Coverage</th>
                        <th label="Othername">Contact Person </th>
                        <th label="Othername">Contact Person Mobile Number </th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;

                    foreach ($datas as $row) : ?>

                        <td label="No"><?php echo $i++ ?></td>
                        <td label="Project"><?php echo $row->project ?></td>
                        <td label="Partner"> <?php $row->partner->name; ?> </td>
                        <td label="Partner"> <?php $row->telephone; ?> </td>
                        <td label="Partner"> <?php $row->email; ?> </td>
                        <td label="Coverage"><?php $row->partner->district ?></td>
                        <td label="Contact person"><?php $row->organisation_contact_person->name; ?></td>
                        <td label="Primary Phone Number"><?php echo $row->organisation_contact_person->phone_number; ?></td>


                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- /.box -->
    </div>
    </div>
</section>
<script>
    $(document).ready(function() {
        $('.tb').DataTable({
            dom: 'Bfrtip',
            "lengthChange": true,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "responsive": false,

            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pageLength',


            ]
        });
    });
</script>