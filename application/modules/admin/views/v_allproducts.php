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
                                  <!--  <a class="crumbs" href="<?php echo base_url(). 'admin'?>">Manager Dashboard</a> > 
                                   <a class="crumbs" href="<?php echo base_url(). 'admin/products'?>"><?php echo $admin_subtitle?></a> -->

                                   <a class="crumbs" href="<?php echo base_url(). 'index.php/admin'?>">Manager Dashboard</a> > 
                                   <a class="crumbs" href="<?php echo base_url(). 'index.php/admin/products'?>"><?php echo $admin_subtitle?></a>
                                   
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">

                

                  <div class="col-lg-12">
                   <h2 class="table-title">Products</h2>
                   <div class="table-responsive">
                     <div class="table-toolbar">
                       <div class="btn-group pull-right table-buttons">

                       <!-- The add button takes you to the admin controller, into the function addcategory() -->
                       <!-- <a class="left adminadd" href="<?php echo base_url(). 'admin/addproduct'?>">Add <?php echo $admin_subtitle?></a> -->
                       
                         <button data-toggle="dropdown" class="btn dropdown-toggle right ">Download <?php echo $admin_subtitle?> <span class="caret"></span></button>
                         <ul class="dropdown-menu">
                           <!-- <li><a href="<?php echo base_url(). 'admin/allproducts/active/pdf'?>">Save as PDF</a></li>
                           <li><a href="<?php echo base_url(). 'admin/allproducts/active/excel'?>">Download <?php echo $admin_subtitle?> to Excel</a></li> -->
                           <li><a href="<?php echo base_url(). 'index.php/admin/allproducts/active/pdf'?>">Save as PDF</a></li>
                           <li><a href="<?php echo base_url(). 'index.php/admin/allproducts/active/excel'?>">Download <?php echo $admin_subtitle?> to Excel</a></li>
                         </ul>
                       </div>
                     </div>
                     <table class="table table-striped" id="product-table2"><!-- The table created in the page -->
                       <thead>
                        <tr>

                          <th>#</th>
                          <th>Product Name</th>
                          <th>Product Description</th>
                          <th>Product Price</th>
                          <th>Status</th>
                          <th>View</th>
                          <!-- <th>Edit</th> -->
                          <th>Action</th>
                        </tr>
                       </thead>
                        <?php
                          echo $all_products; // Acquires data from admin controller, provided in the function  categories() 
                        ?>
                   </table>

                     
                   </div>
                 </div>
                </div>
                <!-- /.row -->



               

           
            <!-- /.container-fluid -->

        </div>

        </div>
        <!-- /#page-wrapper -->


        <script type="text/javascript">
              $('#product-table2').dataTable();

              
            $('.dataTables_filter input').addClass('form-control').attr('placeholder','Search');
            $('.dataTables_length select').addClass('form-control');
        </script>