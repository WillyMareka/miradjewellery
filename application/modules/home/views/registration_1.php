<?php
include('includes/header.php');
include('regprocess_2.php');
?>

 <div class="container">
  <div class="row">
  <div class="box">
  <div class="col-md-8">

 <!--    <div class="col-sm-6 col-md-12 col-md-offset-3"> 
        <div class="panel panel-default panel-list"> -->
          <div class="panel-heading panel-heading-dark">
            
          </div>
          <div class="panel-body">


             <div class="panel_yapili">
                 <form name="registration"  role="form" method="POST" onSubmit=" validate.php" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div class="form-group">
                      <h1 class="text-center login-title">Sign up</h1>
                      <label>Username</label>
                      <input type="text" class="form-control" name="username" placeholder="Create username" value="<?php echo $username;?>" >
                      <span class="error">* <?php echo $usernameErr;?></span>
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <input type="text" class="form-control" name="email" placeholder="Enter Email Address" value="<?php echo $email;?>" >
                      <span class="error">* <?php echo $emailErr;?></span>
                    </div>
              
                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" class="form-control" name="password" placeholder="Create Password"  value="<?php echo $password;?>" >
                      <span class="error">* <?php echo $passwordErr;?></span>
                    </div>
                    <div class="form-group">
                      <label>Confirm Password</label>
                      <input type="password" class="form-control" name="confirmpassword" placeholder="Confirm Password">
                      <span class="error">* <?php echo $confirmpasswordErr;?></span>
                    </div>
                    

              <button class="btn btn-primary"name="submit">Register</button>

            </form>
        </div>
            </div>
          <!--  <a href="login.php" class="text-center new-account">Already have an account</a> -->
        </div>
        </div>
      </div>
    </div>


     





    </div>
  </div>
</div>
   

