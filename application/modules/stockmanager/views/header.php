<!-- Navigation -->
        <?php $username = $this->session->userdata('emp_name');?>
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Mirad Jewelries</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Deactivations <i class="fa fa-thumbs-down"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                       <li>
                            <!-- <a href="<?php echo base_url(). 'stockmanager/dorders'?>">Orders <span class="label label-danger right"><?php echo $dordernumber?></span></a> -->
                            <a href="<?php echo base_url(). 'index.php/stockmanager/dorders'?>">Orders <span class="label label-danger right"><?php echo $dordernumber?></span></a>
                        </li>
                        <li>
                            <!-- <a href="<?php echo base_url(). 'stockmanager/dcategories'?>">Categories <span class="label label-danger right"><?php echo $dcategorynumber?></span></a> -->
                            <a href="<?php echo base_url(). 'index.php/stockmanager/dcategories'?>">Categories <span class="label label-danger right"><?php echo $dcategorynumber?></span></a>
                        </li>
                        <li>
                            <!-- <a href="<?php echo base_url(). 'stockmanager/dproducts'?>">Products <span class="label label-danger right"><?php echo $dproductnumber?></span></a> -->
                            <a href="<?php echo base_url(). 'index.php/stockmanager/dproducts'?>">Products <span class="label label-danger right"><?php echo $dproductnumber?></span></a>
                        </li>
                        <li>
                            <!-- <a href="<?php echo base_url(). 'stockmanager/dcomments'?>">Comments <span class="label label-danger right"><?php echo $dcommentnumber?></span></a> -->
                            <a href="<?php echo base_url(). 'index.php/stockmanager/dcomments'?>">Comments <span class="label label-danger right"><?php echo $dcommentnumber?></span></a>
                        </li>
                        <li class="divider"></li>
                        
                    </ul>
                </li>
               
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $username ;?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo base_url(). 'index.php/stockmanager/employeedetail/'.$this->session->userdata('emp_id')?>"><i class="fa fa-fw fa-user"></i> Profile</a>
                            <!-- <a href="<?php echo base_url(). 'index.php/stockmanager/viewemployee/'.$this->session->userdata('emp_id')?>"><i class="fa fa-fw fa-user"></i> Profile</a> -->
                            
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo base_url(). 'index.php/admin/logout'?>"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                            <!-- <a href="<?php echo base_url(). 'index.php/admin/logout'?>"><i class="fa fa-fw fa-power-off"></i> Log Out</a> -->
                        </li>
                    </ul>
                </li>
            </ul>
            