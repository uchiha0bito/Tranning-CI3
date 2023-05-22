<div class="container">
<h3>Add Permisson:</h3>
<form action="<?php echo base_url('permission/store'); ?>" method="POST">
  <div class="mb-3">
    <label for="name" class="form-label">Name Permission:</label>
    <input type="text" class="form-control" id="name" name="name"  aria-describedby="emailHelp">
  </div>
  <button type="submit" class="btn btn-primary">Add Permissions</button>
</form>

</div>
