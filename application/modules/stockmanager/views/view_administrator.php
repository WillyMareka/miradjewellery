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
                                   <!-- <a class="crumbs" href="<?php echo base_url(). 'admin'?>">Manager Dashboard</a> > 
                                   <a class="crumbs" href="<?php echo base_url(). 'admin/employees'?>">Employee</a> > -->

                                    <a class="crumbs" href="<?php echo base_url(). 'index.php/stockmanager'?>">Manager Dashboard</a> > 
                                   <a class="crumbs" href="<?php echo base_url(). 'index.php/stockmanager/employees'?>">Employee</a> > 
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
<div class="row ">
                           
                            <div class="col-sm-3">
                       
                        <div class="form-group image-profile">
                                <img style="width:250px;height:250px;" src="<?php echo $data['emp_picture']; ?>" alt="Profile pic">
                            </div>
                            </div>
                            <div class="col-sm-9">
                                <label class="control-label">Employee ID: <?php echo $data['emp_id']; ?></label>
<div>
                            <label class="control-label">Employee Name: <?php echo $data['emp_name']; ?></label></div><div>
                            <label class="control-label">Employee Email: <?php echo $data['emp_email']; ?></label></div><div>
                            <label class="control-label">Employee Occupation: 
                            <?php 
                                if($data['level_id'] == 2){
                            ?>
                                  
                                  Manager
                                  
                            <?php
                                }elseif($data['level_id'] == 3){
                            ?>
                                 Stock Manager
                                 

                            <?php
                                }elseif($data['level_id'] == 1){
                            ?>
                                
                                Admin
                            <?php
                                }else{
                            ?>
                                No job was selected
                            <?php
                                 }
                            ?>
                            </label>
</div>
                         

                <div class="control-label">Status
                  <?php if($data['emp_status']==1){?>
                       Active Account
                  <?php }else{?>
                       Inactive Account
                  <?php }?>
                </div>

                        <?php 
                             }
                         }
                        
                       }
                        ?>

                        <a href="<?php echo base_url(). 'index.php/stockmanager/employees' ?>"><button class="view-back">Back</button></a>
                        <a href="<?php echo base_url().'index.php/stockmanager/viewemployee/'?><?php echo $data['emp_id']?>"><button class="view-update">Update</button></a>
                  </div>
                </div>
                <!-- /.row -->

               

           
            <!-- /.container-fluid -->

        </div>

        </div>
        <!-- /#page-wrapper -->