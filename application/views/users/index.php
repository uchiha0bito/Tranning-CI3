

<!-- DataTales Example -->
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
							<th scope="col">Username</th>
							<th scope="col">Email</th>
							<th scope="col">Status</th>
							<th scope="col">Created At</th>
							<th scope="col">Updated At</th>
							<th scope="col">Action</th>
						</tr>
					</thead>

					<tbody>
						<?php foreach ($users as $user) { ?>
							<tr>
								<td><?php echo $user->id; ?></td>
								<td><?php echo $user->username; ?></td>
								<td><?php echo $user->email; ?></td>
								<td>
									<?php if ($user->status == 1) : ?>
										<span class="badge bg-success">Active</span>
									<?php else : ?>
										<span class="badge bg-danger">Not Active</span>
									<?php endif; ?>
								</td>
								<td><?php echo $user->created_at; ?></td>
								<td><?php echo $user->updated_at; ?></td>
								<td class="text-center">
									<a class="btn btn-warning" href="<?php echo base_url('user/edit_roles/' . $user->id); ?>">Manage Roles</a>
									<a class="btn btn-success" href="<?php echo base_url('users/edit/' . $user->id); ?>">Edit</a>
									<a class="btn btn-danger delete-link" href="<?php echo base_url('users/delete/' . $user->id); ?>" data-user-id="<?php echo $user->id; ?>">Delete</a>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
