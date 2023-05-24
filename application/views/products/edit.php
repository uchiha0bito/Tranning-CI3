<div class="container">
	<h2>Edit Product</h2>
	<form action="<?php echo base_url('products/update/'.$product->product_id); ?>" method="POST"  enctype="multipart/form-data">
		<input type="hidden" name="product_id" value="<?php echo $product->product_id; ?>">

		<div class="mb-3">
			<label for="name">Name:</label>
			<input class="form-control" type="text" name="name" value="<?php echo $product->name; ?>" required>
		</div>
		<div class="mb-3">
			<label for="description">Description:</label>
			<textarea class="form-control" name="description"><?php echo $product->description; ?></textarea>
		</div>

		<div class="mb-3">
			<label for="image">Image:</label>
			<input class="form-control" type="file" name="image"></input>
		</div>

		<div class="mb-3">
			<label for="price">Price:</label>
			<input class="form-control" type="number" name="price" value="<?php echo $product->price; ?>" required>
		</div>
		<div class="mb-3">
			<label for="other_details">Other Details:</label>
			<input class="form-control" type="text" name="other_details" value="<?php echo $product->other_details; ?>">
		</div>

		<input type="submit" class="btn btn-success" value="Update Product">
	</form>
</div>
