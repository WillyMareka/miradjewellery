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

                                    <a class="crumbs" href="<?php echo base_url(). 'index.php/stockmanager/dashboard'?>">Manager Dashboard</a> > 
                                   <a class="crumbs" href="<?php echo base_url(). 'index.php/stockmanager/comments'?>">Comment</a> > 
                                   <a class="crumbs" href="#'?>"><?php echo $admin_subtitle?></a>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                  <div class="col-lg-5">

                  <?php 
                           // categorydetails acquired from the controller admin, in the function called viewcategory()
                            foreach ($commentdetails as $key => $value) {
                            foreach ($value as $q => $data) {
                            
                           //echo '<pre>';print_r($user);echo'</pre>';die();
                            for ($i=0; $i <= $key ; $i++) { 
                                
                            ?>

                       
                        
                                <label class="control-label">Comment No: <?php echo $data['comm_id']; ?></label>

                            <label class="control-label">Subject: <?php echo $data['comm_subject']; ?></label>
                            <label class="control-label">Message: <?php echo $data['comm_message']; ?></label>
                            <label class="control-label">Date Sent: <?php echo $data['date_sent']; ?></label>
                            
                         

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

                        <a href="<?php echo base_url(). 'index.php/stockmanager/comments' ?>"><button>Back</button></a>
                        <a href="<?php echo base_url().'index.php/stockmanager/viewcomment/'?><?php echo $data['comm_id']?>"><button>Update</button></a>
                  </div>
                </div>
                <!-- /.row -->

               

           
            <!-- /.container-fluid -->

        </div>

        </div>
        <!-- /#page-wrapper -->