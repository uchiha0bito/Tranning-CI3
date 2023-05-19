<div class="container">
<h3>List Group User:</h3>

<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name Group</th>
      <th scope="col">Description</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($groups as $group) { ?>
    <tr>
      <th scope="row"><?php echo $group->id; ?></th>
      <td><?php echo $group->name; ?></td>
      <td><?php echo $group->description; ?></td>
      <td>
		<a class="btn btn-success" href="<?php echo base_url('group/edit/'.$group->id); ?>">Edit</a>
		<a class="btn btn-danger delete-link" href="<?php echo base_url('group/delete/'.$group->id); ?>" data-group-id="<?php echo $group->id; ?>">Delete</a>
	  </td>
	  <?php } ?>
    </tr>
  </tbody>
</table>
</div>

