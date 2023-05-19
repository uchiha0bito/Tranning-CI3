<div class="container">

	<form action="<?php echo base_url('users/update/' . $user->id); ?>" method="post">
		<div class="mb-3">
			<label for="exampleInputEmail1" class="form-label">Username:</label>
			<input type="text" class="form-control" id="username" name="username" value="<?php echo $user->username; ?>" required aria-describedby="emailHelp">
		</div>
		<div class="mb-3">
			<label for="exampleInputPassword1" class="form-label">Password:</label>
			<input type="text" class="form-control" id="password" name="password" id="exampleInputPassword1">
		</div>

		<div class="mb-3">
			<label for="exampleInputPassword1" class="form-label">Re Password:</label>
			<input type="text" class="form-control" id="re_password" name="re_password" id="exampleInputPassword1">
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
