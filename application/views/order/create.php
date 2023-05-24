<!-- Form tạo order -->
<div class="container">
	<form action="<?php echo base_url('order/store'); ?>" method="post">
		<!-- Các trường dữ liệu customer -->
		<div class="mb-3">
			<label for="name" class="form-label">First name:</label>
			<input type="text" class="form-control" name="first_name" placeholder="Enter First Name" required>
		</div>

		<div class="mb-3">
			<label for="name" class="form-label">Last name:</label>
			<input type="text" class="form-control" name="last_name" placeholder="Enter Last Name" required>
		</div>

		<div class="mb-3">
			<label for="name" class="form-label">Email:</label>
			<input type="email" class="form-control" name="email" placeholder="Enter Email" required>
		</div>


		<div class="mb-3">
			<label for="name" class="form-label">Phone number:</label>
			<input type="text" class="form-control" name="phone_number" placeholder="Enter Phone Number" required>
		</div>

		<div class="mb-3">
			<label for="name" class="form-label">Address:</label>
			<input type="text" class="form-control" name="address" placeholder="Enter Address" required>
		</div>

		<div class="mb-3">
			<label for="name" class="form-label">Order Date:</label>
			<input type="date" class="form-control" name="order_date" required>
		</div>

		<div class="mb-3">
			<label for="name" class="form-label">Status:</label>
			<input type="text" class="form-control" name="status" placeholder="Enter Status" required>
		</div>

		<div class="mb-3">
			<label for="name" class="form-label">Product:</label>
			<input type="text" class="form-control" name="product_id" placeholder="Enter Product ID" required>

		</div>

		<div class="mb-3">
			<label for="name" class="form-label">Quantity:</label>
			<input type="text" class="form-control" name="quantity" placeholder="Enter Quantity" required>
		</div>

		<button class="btn btn-success" type="submit">Create Order</button>
	</form>

</div>
