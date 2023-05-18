<style>
	* {
		margin: 0;
		padding: 0;
		box-sizing: border-box;
	}

	html,
	body {
		height: 100%;
	}

	html {
		background: linear-gradient(to right bottom, #fbdb89, #f48982);
		background-repeat: no-repeat;
		background-size: cover;
		width: 100%;
		height: 100%;
		background-attachment: fixed;
	}

	body {
		font-family: sans-serif;
		line-height: 1.4;
		display: flex;
	}

	#content {
		display: flex;
		justify-content: center;
		width: 100%;
	}

	.container {
		width: 400px;
		margin: auto;
		padding: 36px 48px 48px 48px;
		background-color: #f2efee;

		border-radius: 11px;
		box-shadow: 0 2.4rem 4.8rem rgba(0, 0, 0, 0.15);
	}

	.login-title {
		padding: 15px;
		font-size: 22px;
		font-weight: 600;
		text-align: center;
	}

	.login-form {
		display: grid;
		grid-template-columns: 1fr;
		row-gap: 16px;
	}

	.login-form label {
		display: block;
		margin-bottom: 8px;
	}

	.login-form input {
		width: 100%;
		padding: 1.2rem;
		border-radius: 9px;
		border: none;
	}

	.login-form input:focus {
		outline: none;
		box-shadow: 0 0 0 4px rgba(253, 242, 233, 0.5);
	}

	.btn--form {
		background-color: #f48982;
		color: #fdf2e9;
		align-self: end;
		padding: 8px;
	}

	.btn,
	.btn:link,
	.btn:visited {
		display: inline-block;
		text-decoration: none;
		font-size: 20px;
		font-weight: 600;
		border-radius: 9px;
		border: none;

		cursor: pointer;
		font-family: inherit;

		transition: all 0.3s;
	}

	button {
		outline: 1px solid #f48982;
	}

	.btn--form:hover {
		background-color: #fdf2e9;
		color: #f48982;
	}

	.error {
		color: red;
	}
</style>


<div class="container">

	<h2 class="text-center">Login</h2>

	<?php if ($this->session->flashdata('error')) : ?>
		<div class="alert alert-danger">
			<?php echo $this->session->flashdata('error'); ?>
		</div>
	<?php endif; ?>

	<?php if (!empty($error)) { ?>
		<div class="alert alert-danger">
			<?php echo $error; ?>
		</div>
	<?php } ?>

	<form action="<?php echo base_url('login-user') ?>" method="POST" class="login-form">
		<div>
			<label for="email">Email</label>
			<input id="email" type="email" placeholder="Enter Email" name="email" value="<?php echo set_value('email'); ?>" />
			<div class="error"><?php echo form_error('email'); ?></div>
		</div>

		<div>
			<label for="password">Password</label>
			<input id="password" type="password" placeholder="Enter Password" name="password" />
			<div class="error"><?php echo form_error('password'); ?></div>
		</div>
		<button class="btn btn--form" type="submit" value="Log in">Log in</button>
	</form>
</div>
