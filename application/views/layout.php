<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- master_layout.php -->
<html>
<head>
    <title>Trang web của bạn</title>
    <?php $this->load->view('template/header');?>

</head>
<body>

    <div id="content">
	<?php echo $content; ?>
    </div>

    <?php $this->load->view('template/footer');?>
</body>
</html>



