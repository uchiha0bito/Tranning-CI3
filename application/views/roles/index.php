<div class="container">
<h3>List Role User:</h3>

<table id="roleTable" class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name Role</th>
      <th scope="col">Created At</th>
      <th scope="col">Updated At</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
  <?php foreach ($roles as $role) { ?>
    <tr>
      <th scope="row"><?php echo $role->id; ?></th>
      <td><?php echo $role->name; ?></td>
      <td><?php echo $role->created_at; ?></td>
      <td><?php echo $role->updated_at; ?></td>
			
      <td>
		<a class="btn btn-success" href="<?php echo base_url('role/edit/'.$role->id); ?>">Edit</a>
		<a class="btn btn-danger delete-link" href="<?php echo base_url('role/delete/'.$role->id); ?>" data-role-id="<?php echo $role->id; ?>">Delete</a>
	  </td>
	  <?php } ?>
    </tr>
  </tbody>
</table>
</div>

