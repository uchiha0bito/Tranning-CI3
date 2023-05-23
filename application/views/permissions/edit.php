<div class="container">

<form action="<?php echo base_url('permission/update/'.$permission->id); ?>" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name Permission:</label>
    <input type="text" class="form-control slug" id="name" name="name"  value="<?php echo $permission->name; ?>" required  aria-describedby="emailHelp">
  </div>


  <button type="submit" class="btn btn-primary">Update Permission</button>
</form>
</div>

