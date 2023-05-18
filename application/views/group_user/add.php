<div class="container">
<h3>Add Group User:</h3>
<form action="<?php echo base_url('group/create'); ?>" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name Group:</label>
    <input type="text" class="form-control" id="group_name" name="group_name"  aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Description Group:</label>
    <input type="text" class="form-control" id="group_description" name="group_description"  id="exampleInputPassword1">
  </div>

  <button type="submit" class="btn btn-primary">Add Group</button>
</form>

</div>
