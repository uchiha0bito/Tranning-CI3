<div class="container-fluid">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th scope="col">ID Order</th>
							<th scope="col">Customer ID</th>
							<th scope="col">Created At</th>
							<th scope="col">Updated At</th>
							<th scope="col">Action</th>

						</tr>
					</thead>
					<tbody>
						<?php foreach ($orders as $order) { ?>
							<tr>
								<th scope="row"><?php echo $order->order_id; ?></th>
								<td><?php echo $order->customer_id; ?></td>
								<td><?php echo $order->created_at; ?></td>
								<td><?php echo $order->updated_at; ?></td>

								<td class="text-center">
									<a class="btn btn-success" href="<?php echo base_url('order/edit/' . $order->order_id); ?>">Edit</a>
									<a class="btn btn-danger delete-link" href="<?php echo base_url('order/delete/' . $order->order_id); ?>" data-order-id="<?php echo $order->order_id; ?>">Delete</a>
								</td>
							<?php } ?>
							</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
