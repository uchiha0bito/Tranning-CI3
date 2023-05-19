<div class="container">
	<h3>List User:</h3>

	<table class="table">
		<thead>
			<tr>
				<th scope="col">ID</th>
				<th scope="col">Username</th>
				<th scope="col">Status</th>
				<th scope="col">Created At</th>

				<th scope="col">Action</th>

			</tr>
		</thead>
		<tbody>
			<?php foreach ($users as $user) { ?>
				<tr>
					<th scope="row"><?php echo $user->id; ?></th>
					<td><?php echo $user->username; ?></td>
					<td>
						<?php if ($user->status == 1) : ?>
							<span class="badge bg-success">Active</span>
						<?php else : ?>
							<span class="badge bg-danger">Not Active</span>
						<?php endif; ?>


					</td>
					<td><?php echo $user->created_at; ?></td>
					<td>
						<a class="btn btn-success" href="<?php echo base_url('users/edit/' . $user->id); ?>">Edit</a>
						<a class="btn btn-danger delete-link" href="<?php echo base_url('users/delete/' . $user->id); ?>" data-user-id="<?php echo $user->id; ?>">Delete</a>
					</td>
				<?php } ?>
				</tr>
		</tbody>
	</table>
</div>
