<div class="container">

<form action="<?php echo base_url('role/update/'.$role->id); ?>" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name Role:</label>
    <input type="text" class="form-control" id="name" name="name"  value="<?php echo $role->name; ?>" required  aria-describedby="emailHelp">
  </div>


  <button type="submit" class="btn btn-primary">Update Role</button>
</form>
</div>

