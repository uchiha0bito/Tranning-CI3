<div class="container-fluid">
	<div class="card shadow mb-4">

		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">All Products</h6>
		</div>
		<div class="card-body">

			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th scope="col">ID</th>
							<th scope="col">Name Product</th>
							<th scope="col">Image Product</th>
							<th scope="col">Description</th>
							<th scope="col">Price</th>
							<th scope="col">Other Details</th>
							<th scope="col">Created At</th>
							<th scope="col">Updated At</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody>

						<?php foreach ($products as $product) { ?>
							<tr>

								<th><?php echo $product->product_id; ?></th>
								<td><?php echo $product->name; ?></td>
								<td>
									<img width="100" src="<?php echo base_url('uploads/' . $product->image); ?>" alt="">
								</td>
								<td><?php echo $product->description; ?></td>
								<td><?php echo $product->price; ?></td>
								<td><?php echo $product->other_details; ?></td>
								<td><?php echo $product->created_at; ?></td>
								<td><?php echo $product->updated_at; ?></td>
								<td class="text-center">
									<a class="btn btn-success" href="<?php echo site_url('products/edit/' . $product->product_id); ?>">Edit</a>
									<a class="btn btn-danger" href="<?php echo site_url('products/delete/' . $product->product_id); ?>">Delete</a>
								</td>
							</tr>

						<?php } ?>
					</tbody>
				</table>
			</div>
			<form action="<?= base_url('products/import') ?>" method="post" enctype="multipart/form-data">
				<input type="file" class="form-control mt-4 col-2" name="excel_file">
				<button class="mt-4 d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
					<i class="fas fa-download fa-sm text-white-50"></i> Import Excel</button>
			</form>
			<a href="<?= base_url('products/export') ?>" class="mt-4 d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
				<i class="fas fa-download fa-sm text-white-50"></i> Export Excel</a>
		</div>
	</div>
</div>
