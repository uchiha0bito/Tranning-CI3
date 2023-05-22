<div class="container">
	<h2>Edit Roles for User: <?php echo $user->username; ?></h2>
	<form action="<?php echo site_url('user/roles/update'); ?>" method="POST">
		<input type="hidden" name="user_id" value="<?php echo $user->id; ?>">
		<select class="form-select" name="selected_role">
			<?php foreach ($all_roles as $role) :
			?>
				<li>
					<option value="<?php echo $role->id; ?>" <?php
																foreach ($assigned_roles as $assigned_role) {
																	if ($role->id == $assigned_role->id) {
																		echo 'selected';
																	}
																}
																?>>
						<?php echo $role->name; ?>
				</li>
			<?php endforeach; ?>
		</select>
		<button type="submit" class="btn btn-success mt-3 ">Save Roles</button>
	</form>

</div>
