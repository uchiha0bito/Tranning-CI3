<div class="container">
	<h3>Edit User:</h3>

	<form action="<?php echo base_url('users/update/' . $user->id); ?>" method="POST">
		<div class="mb-3">
			<label for="username" class="form-label">Username:</label>
			<input type="text" class="form-control" id="username" name="username" value="<?php echo $user->username; ?>" required>
		</div>
		<div class="mb-3">
			<label for="username" class="form-label">Email:</label>
			<input type="text" class="form-control" id="email" name="email" value="<?php echo $user->email; ?>" required>
		</div>
		<div class="mb-3">
			<label for="password" class="form-label">Password:</label>
			<input type="text" class="form-control" id="password" name="password" >
		</div>

		<div class="mb-3">
			<label for="re_password" class="form-label">Re Password:</label>
			<input type="text" class="form-control" id="re_password" name="re_password" >
		</div>
		<div class="mb-3">
			<label for="status" class="form-label">Status:</label>
			<select name="status" class="form-select" id="status">
				<option value="1" <?php echo ($user->status == 1) ? 'selected' : '' ?>>Active</option>
				<option value="0" <?php echo ($user->status == 0) ? 'selected' : '' ?>>Not Active</option>
			</select>
		</div>
		<button type="submit" class="btn btn-primary">Update User</button>
	</form>
</div>
