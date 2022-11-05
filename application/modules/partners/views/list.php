<div class="row">

    <?php foreach ($datas as $row) : ?>

        <div class="card col-lg-12">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-10">
                        <h6><?php echo $row->project; ?></h6>
                        <p><?php echo time_ago($row->start_date); ?></p>
                    </div>
                    <div class="col-lg-2">
                        <br>
                        <a href="" class="btn btn-success">View Details</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <h4 class="text-sm text-info">Partners</h4>
                        <?php foreach ($row->partners as $partner) { ?>

                            <li><?php echo $partner->name; ?></li>

                        <?php } ?>
                    </div>

                    <div class="col-lg-4">
                        <h4 class="text-sm text-info">Funders</h4>
                        <?php foreach ($row->funders as $funder) { ?>

                            <li><?php echo $funder->name; ?></li>

                        <?php } ?>
                    </div>

                    <div class="col-lg-4">
                        <h4 class="text-sm text-info">Activities</h4>
                        <?php foreach ($row->activities as $act) { ?>

                            <li><?php echo $act->name; ?></li>

                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>

    <?php endforeach; ?>

    <?php echo $links; ?>

</div>