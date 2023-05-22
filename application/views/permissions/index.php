<div class="container">
<h3>List Permission :</h3>

<table id="permissionTable" class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name Permission</th>
      <th scope="col">Created At</th>
      <th scope="col">Updated At</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
  <?php foreach ($permissions as $permission) { ?>
    <tr>
      <th scope="row"><?php echo $permission->id; ?></th>
      <td><?php echo $permission->name; ?></td>
      <td><?php echo $permission->created_at; ?></td>
      <td><?php echo $permission->updated_at; ?></td>
			
      <td>
		<a class="btn btn-success" href="<?php echo base_url('permission/edit/'.$permission->id); ?>">Edit</a>
		<a class="btn btn-danger delete-link" href="<?php echo base_url('permission/delete/'.$permission->id); ?>" data-permission-id="<?php echo $permission->id; ?>">Delete</a>
	  </td>
	  <?php } ?>
    </tr>
  </tbody>
</table>
</div>

