<div class="row">

	<div class="card col-lg-12">
		<div class="card-header text-left">
			<h3 class="card-title float-left"><?php echo $title; ?></h3>
			<a href="#create-modal" data-toggle="modal" class="float-right"><i class="fa fa-plus"></i> Add <?php echo $label; ?></a>
		</div>

		<?php include 'includes/modal.php'; ?>

		<div class="card-body text-left">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th><?php echo $label; ?></th>
						<th>Edit</th>

					</tr>
				</thead>

				<?php
				$i = 1;
				foreach ($partners as $row) : ?>
					<tr>
						<td width="5%"><?php echo $i++; ?></td>
						<td><?php echo $row->name; ?></td>
						<td><a href="#edit<?php echo $row->id; ?>"><i class="fa fa-edit"></i> Edit</td>
					</tr>
				<?php endforeach; ?>
			</table>


		</div>
	</div>

</div>