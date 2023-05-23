<div class="container-fluid">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th scope="col">ID</th>
							<th scope="col">Name Permission</th>
							<th scope="col">Created At</th>
							<th scope="col">Updated At</th>
							<th scope="col">Action</th>

						</tr>
					</thead>
					<tbody>
						<?php foreach ($permissions as $permission) { ?>
							<tr>
								<th scope="row"><?php echo $permission->id; ?></th>
								<td><?php echo $permission->name; ?></td>
								<td><?php echo $permission->created_at; ?></td>
								<td><?php echo $permission->updated_at; ?></td>

								<td class="text-center">
									<a class="btn btn-success" href="<?php echo base_url('permission/edit/' . $permission->id); ?>">Edit</a>
									<a class="btn btn-danger delete-link" href="<?php echo base_url('permission/delete/' . $permission->id); ?>" data-permission-id="<?php echo $permission->id; ?>">Delete</a>
								</td>
							<?php } ?>
							</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
