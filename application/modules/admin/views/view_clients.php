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
                                   <a class="crumbs" href="<?php echo base_url(). 'admin/orders'?>">Employee</a> > -->

                                    <a class="crumbs" href="<?php echo base_url(). 'index.php/admin'?>">Manager Dashboard</a> > 
                                   <a class="crumbs" href="<?php echo base_url(). 'index.php/admin/clients'?>">Client</a> > 
                                   <a class="crumbs" href="#'?>"><?php echo $admin_subtitle?></a>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                

                  <?php 
                           // categorydetails acquired from the controller admin, in the function called viewcategory()
                            foreach ($customerdetails as $key => $value) {
                            foreach ($value as $q => $data) {
                            
                           //echo '<pre>';print_r($user);echo'</pre>';die();
                            for ($i=0; $i <= $key ; $i++) { 
                                
                            ?>
                            <div class="row ">
                           
                            <div class="col-sm-3">
                            <div>
                            <?php 
                                if(!(isset($data['cust_picture']))){
                                  if(($data['title_id']==1)||($data['title_id']==5)||($data['title_id']==6)){
                                    ?>
                                    <img style="width:250px;height:250px;" src="<?php echo assets_url. 'images/no_user_male.jpg' ?>" alt="Male Profile pic">
                                    <?php
                                      
                                  }elseif(($data['title_id']==2)||($data['title_id']==3)||($data['title_id']==4)){

                                    ?>
                                   <img style="width:250px;height:250px;" src="<?php echo assets_url. 'images/no_user_female.jpg' ?>" alt="Profile pic">
                                    <?php
                                      
                                  }
                                }else{
                            ?>
                                  <img style="width:250px;height:250px;" src="<?php echo $data['cust_picture']; ?>" alt="Profile pic">
                            <?php
                              }
                            ?>
                            </div>
                            </div>
                            <div class="col-sm-9">
               <div>
                <label class="control-label">Customer ID: <?php echo $data['cust_id']; ?></label>
                </div>
                <div>
                <label class="control-label">Customer Name: <?php echo $data['cust_name']; ?></label>
                </div>
                <div>
                <label class="control-label">Customer Email: <?php echo $data['cust_email']; ?></label>
                </div>
                <div>
                  <?php if($data['cust_status']==1){?>
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

                        <a href="<?php echo base_url(). 'index.php/admin/clients' ?>"><button class="view-back">Back</button></a>
                        <a href="<?php echo base_url().'index.php/admin/viewclient/'?><?php echo $data['cust_id']?>"><button class="view-update">Update</button></a>
                  </div>
                </div>
                <!-- /.row -->

               

           
            <!-- /.container-fluid -->

        </div>

        </div>
        <!-- /#page-wrapper -->