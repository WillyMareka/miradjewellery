
<!-- action="<?php echo base_url() . 'admin/validate_member'?>"  -->
<!-- action="<?php echo base_url() . 'index.php/admin/validate_member'?>"  -->

<div class="container login_panel">
 <?php 
 if(isset($new_user)){
  echo $new_user;
}
else {
 $new_user="Please enter your username and  password";
 echo $new_user;
}
?>  
<form id="form_adminlog" name="form_adminlog" role="form" enctype="multipart/form-data" method="POST">
  <div class="form-group">
    <label for="username">Email Address</label>
    <input type="email" class="form-control emplogin validate[required, maxSize[50], custom[email]]" name="useremail" maxlength="50" id="useremail" placeholder="Enter Your Email Here">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control emplogin validate[required,maxSize[50]]" name="userpassword" maxlength="50" id="userpassword" placeholder="Enter Your Password Here">
  </div>
  <button type="submit" class="btn btn-success">Log In</button>
</form>
</div>
