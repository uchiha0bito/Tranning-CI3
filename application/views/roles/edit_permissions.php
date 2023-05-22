<div class="container">
	<h2>Edit Permissions for Role: <?php echo $role_name; ?></h2>
	<form action="<?php echo base_url('role/permissions/update'); ?>" method="POST">
		<input type="hidden" name="role_id" value="<?php echo $role_id; ?>">
		<ul>
			<div class="form-check">
				<?php foreach ($permissions as $permission) : ?>
					<li>
						<input class="form-check-input" type="checkbox" name="selected_permissions[]" value="<?php echo $permission->id; ?>" <?php
						foreach ($assigned_permissions as $assigned_permission) {
							if ($permission->id == $assigned_permission->id) {
								echo 'checked';
							}
						}
						?>>
						<?php echo $permission->name; ?>
					</li>
				<?php endforeach; ?>
			</div>
		</ul>


		<button type="submit " class="btn btn-success">Save Permissions</button>
	</form>
</div>
