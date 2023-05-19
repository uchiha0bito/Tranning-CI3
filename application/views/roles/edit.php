<div class="container">

<form action="<?php echo base_url('role/update/'.$role->id); ?>" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name Role:</label>
    <input type="text" class="form-control" id="role_name" name="role_name"  value="<?php echo $role->name; ?>" required  aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Description role:</label>
    <input type="text" class="form-control" id="role_description" value="<?php echo $role->description; ?>" name="role_description"  id="exampleInputPassword1">
  </div>

  <button type="submit" class="btn btn-primary">Update Role</button>
</form>
</div>

