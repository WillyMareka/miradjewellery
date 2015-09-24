<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <?php echo $admin_title?> <small><?php echo $admin_subtitle?></small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                 <i class="fa fa-dashboard"></i>
                                   <!-- <a class="crumbs" href="<?php echo base_url(). 'stockmanager/dashboard'?>">Stock Manager Dashboard</a> > -->

                                    <a class="crumbs" href="<?php echo base_url(). 'index.php/stockmanager/dashboard'?>">Manager Dashboard</a> >
                                   <a class="crumbs" href="#'?>"><?php echo $admin_subtitle?></a>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                

                  <?php 
                           // categorydetails acquired from the controller admin, in the function called viewcategory()
                            foreach ($employeedetails as $key => $value) {
                            foreach ($value as $q => $data) {
                            
                           //echo '<pre>';print_r($user);echo'</pre>';die();
                            for ($i=0; $i <= $key ; $i++) { 
                                
                            ?>
<div class="row">
                <!-- The form that allows viewing and editing of category It uses admin.js into a function with form ID -> #categoryediting -->
                        <form id="employeeediting" name="employeeediting" role="form" enctype="multipart/form-data" method="POST">
                       <div class="col-sm-3">
                        <div class="control-group">
                                <label class="control-label">Employee ID: <?php echo $data['emp_id']; ?></label>

                                <div class="controls">
                                    <input name="editemployeeid" type="hidden" required value="<?php echo $data['emp_id']; ?>" class="span6 m-wrap form-control"/>
                                </div>
                                <div class="controls">
                                    <input id="employeepassword" name="employeepassword" type="hidden" required value="<?php echo $data['emp_password']; ?>" class="span6 m-wrap form-control "/>
                                </div> 
                            </div>

                            <div class="form-group image-profile">
                                <img style="width:250px;height:250px;" src="<?php echo $data['emp_picture']; ?>" alt="Profile pic">
                            </div>
</div>
                        <div class="col-sm-9">
                            <div class="form-group">
                                <label>Employee Name</label>
                                <input id="editemployeename" name="editemployeename"  required value="<?php echo $data['emp_name']; ?>"class="form-control validate[required]">
                            </div>

                            <div class="form-group">
                                <label>Employee Email</label>
                                <input id="editemployeeemail" name="editemployeeemail"  required type="email" value="<?php echo $data['emp_email']; ?>"class="form-control validate[required, custom[email]]">
                            </div>

                          
                             
                                     
                              <div class="form-group passpanel">
                               <p class="help-block animated flash red passwordinfo">Please change your password</p>
                                <label>Password</label>
                                <input id="editemployeepassword" required name="editemployeepassword" type="password" placeholder="Enter New Password" class="form-control validate[required]">
                              </div>

                              <div class="form-group passpanel">
                                <label>Confirm Password</label>
                                <input id="editemployeecpassword" required name="editemployeecpassword" type="password" placeholder="Confirm Password" class="form-control validate[required, equals[editemployeepassword]]">
                              </div>
                            

                                

                           


                            <div class="form-group">
                                <label>Employee Occupation</label>
                                <select id="editemployeeoccupation" disabled required name="editemployeeoccupation" class="form-control validate[required]">

                            <?php 
                                if($data['level_id'] == 2){
                            ?>
                                  <option value="3">Stock Manager</option>
                                  <option selected value="2">Manager</option>
                                  <option value="1">Admin</option>
                            <?php
                                }elseif($data['level_id'] == 3){
                            ?>
                                  <option selected value="3">Stock Manager</option>
                                  <option  value="2">Manager</option>
                                  <option value="1">Admin</option>

                            <?php
                                }elseif($data['level_id'] == 1){
                            ?>
                                <option  value="3">Stock Manager</option>
                                <option  value="2">Manager</option>
                                <option selected value="1">Admin</option>
                            <?php
                                }else{
                            ?>
                                 <option selected value="0">No job was selected</option>
                            <?php
                                 }
                            ?>
   
                                </select>
                            </div>

                          

                            <button type="submit" class="btn btn-success">Edit Employee</button>
                            <!-- <a href="<?php echo base_url(). 'stockmanager/dashboard'?>" class="btn btn-warning">Dashboard</a> -->
                            <a href="<?php echo base_url(). 'index.php/stockmanager/dashboard'?>" class="btn btn-warning">Back</a>
                            
                            <!-- <button type="reset" class="btn btn-warning">Reset Button</button> -->
</div>
                        </form>
</div>
                        <?php 
                             }
                         }
                        
                       }
                        ?>
                  </div>
                </div>
                <!-- /.row -->

               

           
            <!-- /.container-fluid -->

        </div>

        </div>
        <!-- /#page-wrapper -->