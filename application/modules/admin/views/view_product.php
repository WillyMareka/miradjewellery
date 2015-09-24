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
                                   <a class="crumbs" href="<?php echo base_url(). 'index.php/admin/products'?>">Product</a> > 
                                   <a class="crumbs" href="#'?>"><?php echo $admin_subtitle?></a>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                
                

                  <?php 
                           // categorydetails acquired from the controller admin, in the function called viewcategory()
                            foreach ($productdetails as $key => $value) {
                            foreach ($value as $q => $data) {
                            
                           //echo '<pre>';print_r($user);echo'</pre>';die();
                            for ($i=0; $i <= $key ; $i++) { 
                                
                            ?>
                            <div class="row ">
                           
                            <div class="col-sm-3">
                            <?php 
                                if(!(isset($data['prodimage']))){?>
                                   <img style="width:250px;height:250px;" src="<?php echo assets_url. 'images/no_user_female.jpg' ?>" alt="Profile pic">
                                    <?php }else{ ?>
                                  <img style="width:250px;height:250px;" src="<?php echo $data['prodimage']; ?>" alt="Profile pic">
                            <?php
                              }
                            ?>
                            </div>
                            <div class="col-sm-9">
                            
               <div>
                <label class="control-label">Product ID: <?php echo $data['prodid']; ?></label>
                </div>
                <div>
                <label class="control-label">Category: <?php echo $data['catid']; ?></label>
                </div>
                <div>
                <label class="control-label">Product Name: <?php echo $data['prodname']; ?></label>
                </div>
                <div>
                <label class="control-label">Price: <?php echo $data['prodprice']; ?></label>
                </div>
                <div>
                <label class="control-label">Description:<br/> <?php echo $data['proddescription']; ?></label>
                </div>
                
                <div class="control-label">Status:
                  <?php if($data['product_status']==1){?>
                       Active Product
                  <?php }else{?>
                       Inactive Product
                  <?php }?>
                </div>
                
                        

                        <?php 
                             }
                         }
                        
                       }
                        ?>

                        <a href="<?php echo base_url(). 'index.php/admin/products' ?>"><button class="view-back">Back</button></a>
                        <a href="<?php echo base_url().'index.php/admin/viewproduct/'?><?php echo $data['prodid']?>"><button class="view-update">Update</button></a>
                        </div>
                  </div>
                  
              
                <!-- /.row -->

               

           
            <!-- /.container-fluid -->

        </div>

        </div>
        <!-- /#page-wrapper -->