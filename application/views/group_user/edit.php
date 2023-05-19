<div class="container">

<form action="<?php echo base_url('group/update/'.$group->id); ?>" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name Group:</label>
    <input type="text" class="form-control" id="group_name" name="group_name"  value="<?php echo $group->name; ?>" required  aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Description Group:</label>
    <input type="text" class="form-control" id="group_description" value="<?php echo $group->description; ?>" name="group_description"  id="exampleInputPassword1">
  </div>

  <button type="submit" class="btn btn-primary">Update Group</button>
</form>
</div>

