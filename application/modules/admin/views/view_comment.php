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

                                    <a class="crumbs" href="<?php echo base_url(). 'index.php/admin'?>">Manager Dashboard</a> > 
                                   <a class="crumbs" href="<?php echo base_url(). 'index.php/admin/comments'?>">Comment</a> > 
                                   <a class="crumbs" href="#'?>"><?php echo $admin_subtitle?></a>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->


                  <?php 
                           // categorydetails acquired from the controller admin, in the function called viewcategory()
                            foreach ($commentdetails as $key => $value) {
                            foreach ($value as $q => $data) {
                            
                           //echo '<pre>';print_r($user);echo'</pre>';die();
                            for ($i=0; $i <= $key ; $i++) { 
                                
                            ?>

                       <div class="row ">
                           
                            <div class="col-sm-6">
                        <div>
                                <label class="control-label">Comment No: <?php echo $data['comm_id']; ?></label>
</div><div>
                            <label class="control-label">Subject: <?php echo $data['comm_email']; ?></label>
                            </div><div><label class="control-label">Message: <?php echo $data['comm_message']; ?></label>
                            </div><div><label class="control-label">Date Sent: <?php echo $data['date_sent']; ?></label>
                            
                         </div>

                <div class="control-label">Status
                  <?php if($data['comm_status']==1){?>
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

                        <a href="<?php echo base_url(). 'index.php/admin/comments' ?>"><button class="view-back">Back</button></a>
                        <a href="<?php echo base_url().'index.php/admin/viewcomment/'?><?php echo $data['comm_id']?>"><button class="view-update">Update</button></a>
                  </div>
                </div>
                <!-- /.row -->

               

           
            <!-- /.container-fluid -->

        </div>

        </div>
        <!-- /#page-wrapper -->