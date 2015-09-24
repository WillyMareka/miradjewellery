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
                                   <a class="crumbs" href="<?php echo base_url(). 'admin/categories'?>">Category</a> > -->

                                   <a class="crumbs" href="<?php echo base_url(). 'index.php/admin'?>">Manager Dashboard</a> > 
                                   <a class="crumbs" href="<?php echo base_url(). 'index.php/admin/categories'?>">Category</a> > 
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
                            
                            for ($i=0; $i <= $key ; $i++) { 
                                
                            ?>
<div class="row">
                <!-- The form that allows viewing and editing of category It uses admin.js into a function with form ID -> #categoryediting -->
                        <form id="categoryediting" name="categoryediting" role="form" enctype="multipart/form-data" method="POST">
<div class="col-sm-3">
                        <div class="control-group">
                                <label class="control-label">Category ID: <?php echo $data['catid']; ?></label>

                                
                               <div class="form-group image-profile">
                                <img style="width:250px;height:250px;" src="<?php echo $data['catimage']; ?>" alt="Category pic">
                               </div>
                               </div>
</div>
                        <div class="col-sm-9">
                                <div class="controls">
                                    <input name="editcategoryid" type="hidden"  value="<?php echo $data['catid']; ?>" class="span6 m-wrap form-control "/>
                                </div>
                            

                            <div class="form-group">
                                <label>Category Name</label>
                                <input id="editcategoryname" name="editcategoryname" value="<?php echo $data['catname']; ?>" required="" class="form-control validate[required]">
                            </div>

                            <div class="form-group">
                                <label>Category Status</label>
                                <select id="editcategorystatus" name="editcategorystatus" class="form-control validate[required]">

                            <?php 
                                if($data['catstatus'] == 1){
                            ?>
                                  <option selected value="1">Activated</option>
                                   <option value="0">Deactivated</option>
                            <?php
                                }elseif($data['catstatus'] == 0){
                            ?>
                                  <option value="1">Activated</option>
                                    <option selected value="0">Deactivated</option>
                            <?php
                                }
                            ?>

                            
                                    
                                </select>
                            </div>

                            <button type="submit" class="btn btn-success">Edit Category</button>
                            <!-- <a href="<?php echo base_url(). 'admin/categories'?>" class="btn btn-warning">Back</a> -->
                            <a href="<?php echo base_url(). 'index.php/admin/categories'?>" class="btn btn-warning">Back</a>
                            
                            <!-- <button type="reset" class="btn btn-warning">Reset Button</button> -->
</div>
                        </form>
</div>
                        <?php 
                             }
                         }
                        
                       }
                        ?>
                  
                <!-- /.row -->

               

           
            <!-- /.container-fluid -->

        </div>

        </div>
        <!-- /#page-wrapper -->