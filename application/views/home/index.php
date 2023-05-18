<h2>Welcome to my website</h2>


<p>Welcome, <?php echo $this->session->userdata('userLogged')['email']; ?></p>
<a href="<?php echo base_url('logout'); ?>">Logout</a>

<p>This is the home page content.</p>
