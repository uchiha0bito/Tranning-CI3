<div class="container">
	<h2>Create Product</h2>
	<form action="<?php echo base_url('products/store'); ?>" method="post"  enctype="multipart/form-data">
		<div class="mb-3">
			<label for="name">Name:</label>
			<input class="form-control" type="text" name="name" required>
		</div>
		<div class="mb-3">
			<label for="description">Description:</label>
			<textarea class="form-control" name="description"></textarea>
		</div>

		<div class="mb-3">
			<label for="image">Image:</label>
			<input class="form-control" type="file" name="image"></input>
		</div>

		<div class="mb-3">
			<label for="price">Price:</label>
			<input class="form-control" type="number" name="price" required>
		</div>
		<div class="mb-3">
			<label for="other_details">Other Details:</label>
			<input class="form-control" type="text" name="other_details">
		</div>

		<input type="submit" class="btn btn-success" value="Add Product">
	</form>
</div>
