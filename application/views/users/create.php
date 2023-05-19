<div class="container">
	<h3>Create User:</h3>
	<form action="<?php echo base_url('users/store'); ?>" method="POST">
		<div class="mb-3">
			<label for="username" class="form-label">Username:</label>
			<input type="text" class="form-control" id="username" name="username">
		</div>

		<div class="error">
			<?php echo form_error('username'); ?>
		</div>

		<div class="mb-3">
			<label for="email" class="form-label">Email:</label>
			<input type="email" class="form-control" id="email" name="email">
		</div>

		<div class="error">
			<?php echo form_error('email'); ?>
		</div>

		<div class="mb-3">
			<label for="password" class="form-label">Password:</label>
			<input type="password" class="form-control" id="password" name="password" id="password">
		</div>
		<div class="error">
			<?php echo form_error('password'); ?>
		</div>
		<div class="mb-3">
			<label for="re_password" class="form-label">Re password:</label>
			<input type="password" class="form-control" name="re_password" id="re_password">
		</div>

		<div class="error">
			<?php echo form_error('re_password'); ?>
		</div>

		<div class="mb-3">
			<label for="status" class="form-label">Status:</label>
			<select name="status" class="form-select" id="status">
				<option selected value="1">Active</option>
				<option value="0">Not Active</option>
			</select>
		</div>

		<button type="submit" class="btn btn-primary">Add User</button>
	</form>

</div>
