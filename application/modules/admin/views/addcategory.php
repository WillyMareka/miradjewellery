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
                                   <a class="crumbs" href="<?php echo base_url(). 'admin/categories'?>">Category</a> > 
                                   <a class="crumbs" href="<?php echo base_url(). 'admin/addcategory'?>"><?php echo $admin_subtitle?></a> -->

                                    <a class="crumbs" href="<?php echo base_url(). 'index.php/admin'?>">Manager Dashboard</a> > 
                                   <a class="crumbs" href="<?php echo base_url(). 'index.php/admin/categories'?>">Category</a> > 
                                   <a class="crumbs" href="<?php echo base_url(). 'index.php/admin/addcategory'?>"><?php echo $admin_subtitle?></a>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                  <div class="col-lg-5">
                  
                  <!-- The form that adds a new category into database. It uses admin.js into a function with form ID -> #formaddcategory -->
                     <form id="formaddcategory" name="formaddcategory" role="form" enctype="multipart/form-data" method="POST">

                            <div class="form-group">
                                <label>Category Name</label>
                                <input id="categoryname" name="categoryname" required class="form-control validate[required]">
                            </div>

                            <div class="form-group">
                                <label>Category Image</label>
                                <input type="file" class="form-control" id="categorypicture" name="categorypicture">
                            </div>

                            <div class="form-group">
                                <label>Category Status</label>
                                <select id="categorystatus" name="categorystatus" class="form-control validate[required]">
                                    <option selected value="1">Activate</option>
                                    <option value="0">Deactivate</option>
                                </select>
                            </div>


                            <button type="submit" class="btn btn-success">Add Category</button>
                            <button type="reset" class="btn btn-warning">Reset Form</button>
                            <!-- <a class="adminback" href="<?php echo base_url(). 'admin/categories'?>">Back</a> -->
                            <a class="adminback" href="<?php echo base_url(). 'index.php/admin/categories'?>">Back</a>

                        </form>
                  </div>
                </div>
                <!-- /.row -->

               

           
            <!-- /.container-fluid -->

        </div>

        </div>
        <!-- /#page-wrapper -->