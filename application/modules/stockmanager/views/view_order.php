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
                                   <a class="crumbs" href="<?php echo base_url(). 'index.php/stockmanager/orders'?>">Employee</a> > 
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
                            foreach ($orderdetails as $key => $value) {
                            foreach ($value as $q => $data) {
                            
                           //echo '<pre>';print_r($user);echo'</pre>';die();
                            for ($i=0; $i <= $key ; $i++) { 
                                
                            ?>
               <div>
                <label class="control-label">Order ID: <?php echo $data['order_id']; ?></label>
                </div>
                <div>
                <label class="control-label">Order No: <?php echo $data['order_no']; ?></label>
                </div>
                <div>
                <label class="control-label">Product ID: <?php echo $data['prodid']; ?></label>
                </div>
                <div>
                <label class="control-label">Product Price: <?php echo $data['prodprice']; ?></label>
                </div>
                <div>
                <label class="control-label">SubTotal: <?php echo $data['subtotal']; ?></label>
                </div>
                <div>
                <label class="control-label">Customer ID: <?php echo $data['cust_id']; ?></label>
                </div>
                
                        

                        <?php 
                             }
                         }
                        
                       }
                        ?>

                        <a href="<?php echo base_url(). 'index.php/stockmanager/orders' ?>"><button>Back</button></a>
                        <a href="<?php echo base_url().'index.php/stockmanager/vieworder/'?><?php echo $data['order_id']?>"><button>Update</button></a>
                  </div>
                </div>
                <!-- /.row -->

               

           
            <!-- /.container-fluid -->

        </div>

        </div>
        <!-- /#page-wrapper -->