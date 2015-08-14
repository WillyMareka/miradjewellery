<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Shopping cart</title>

	
</head>
<body>

<div id="container">
	<h1>Shopping Cart</h1>
    <?php
         echo  "<pre>" 
         print_r( $this->session->all_userdata());
         echo  "</pre>"


    ?>
    <a href='<?php echo base_url()."welcome/logout" ?>'>logout</a>
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>