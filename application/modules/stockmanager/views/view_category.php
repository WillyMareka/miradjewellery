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

                                    <a class="crumbs" href="<?php echo base_url(). 'index.php/stockmanager/dashboard'?>">Manager Dashboard</a> > 
                                   <a class="crumbs" href="<?php echo base_url(). 'index.php/stockmanager/categories'?>">Category</a> > 
                                   <a class="crumbs" href="#'?>"><?php echo $admin_subtitle?></a>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                

                  <?php 
                           // categorydetails acquired from the controller admin, in the function called viewcategory()
                            foreach ($categorydetails as $key => $value) {
                            foreach ($value as $q => $data) {
                            
                           //echo '<pre>';print_r($user);echo'</pre>';die();
                            for ($i=0; $i <= $key ; $i++) { 
                                
                            ?>
                            <div class="row ">
                           
                            <div class="col-sm-3">
                             <div>
                            <?php 
                                if(!(isset($data['catimage']))){?>
                                   <img style="width:250px;height:250px;" src="<?php echo assets_url. 'images/no_user_female.jpg' ?>" alt="Profile pic">
                                    <?php }else{ ?>
                                  <img style="width:250px;height:250px;" src="<?php echo $data['catimage']; ?>" alt="Profile pic">
                            <?php
                              }
                            ?>
                            </div> 
                            </div>
                            <div class="col-sm-9">
               
                <div>
                <label class="control-label">Category ID: <?php echo $data['catid']; ?></label>
                </div>
                <div>
                <label class="control-label">Category Name: <?php echo $data['catname']; ?></label>
                </div>
               
                <div class="control-label">Status
                  <?php if($data['catstatus']==1){?>
                       Active Category
                  <?php }else{?>
                       Inactive Category
                  <?php }?>
                </div>
                
                        

                        <?php 
                             }
                         }
                        
                       }
                        ?>

                        <a href="<?php echo base_url(). 'index.php/stockmanager/categories' ?>"><button class="view-back">Back</button></a>
                        <a href="<?php echo base_url().'index.php/stockmanager/viewcategory/'?><?php echo $data['catid']?>"><button class="view-update">Update</button></a>
                  </div>
                </div>
                <!-- /.row -->

               

           
            <!-- /.container-fluid -->

        </div>

        </div>
        <!-- /#page-wrapper -->