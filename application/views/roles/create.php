<div class="container">
<h3>Add Role User:</h3>
<form action="<?php echo base_url('role/store'); ?>" method="POST">
  <div class="mb-3">
    <label for="name" class="form-label">Name Role:</label>
    <input type="text" class="form-control" id="name" name="name"  aria-describedby="emailHelp">
  </div>
  <button type="submit" class="btn btn-primary">Add Role</button>
</form>

</div>
