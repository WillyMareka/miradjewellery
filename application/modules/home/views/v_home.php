<div class="row">
    <!-- Sidebar Starts -->
      <div class="col-md-3 col-md-offset-1">
      <!-- Categories Links Starts -->
        <h3 class="side-heading">Categories</h3>
        <div class="list-group categories">
          <?php echo $navbarcategory;?>
        </div>
      <!-- Categories Links Ends -->
      <!-- Special Products Starts -->
        <h3 class="side-heading">Special offers</h3>
        <ul class="side-products-list">
        <!-- Special Product #1 Starts -->
        <?php foreach ($results as $result) {?>
            <li class="clearfix">
              <a href="<?php echo base_url().'index.php/home/individual_product/'?><?php echo $result->prodid;?>">
                <img src="<?php echo $result->prodimage;?>" alt="Special product" class="img-responsive img-thumbnail center-block" />
                <h5><?php echo $result->prodname;?></h5>
                <div class="price">
                  <span class="price-new">Price Kshs:<?php echo number_format($result->prodprice);?></span> 
                  <span class="price-old">Was Kshs:249.50</span>
                </div>
              </a>
          </li>
        <?php }?>
        
        </ul>
      <!-- Special Products Ends -->
      
      </div>
    <!-- Sidebar Ends --> 

    <!-- col-md-8 Starts -->
      <div class="col-md-8">
      <!-- Slider Section Starts -->
        <div class="slider">
          <div id="main-carousel" class="carousel slide" data-ride="carousel">
          <!-- Wrapper For Slides Starts -->
            <div class="carousel-inner">
              <div class="item active">
                <img src="<?php echo assets_url.'images/image4.gif'?>" alt="Slider" class="img-responsive" /> 
              </div>
              <div class="item">
                <img src="<?php echo assets_url.'images/image4.jpg'?>" alt="Slider" class="img-responsive" />
              </div>
            </div>
          <!-- Wrapper For Slides Ends -->
          <!-- Controls Starts -->
            <a class="left carousel-control" href="#main-carousel" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#main-carousel" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
          <!-- Controls Ends -->
          </div>  
        </div>
        <!-- 2 Column Banners Starts -->
          <div class="row col2-banners">
            <div class="col-md-6">
              <a href="#"><img src="<?php echo assets_url.'images/banner.png'?>" alt="banners" class="img-responsive" /></a>
            </div>
            <div class="col-md-6">
               <a href="#"><img  style="width:100%;"src="<?php echo assets_url.'images/earrings.jpg'?>" alt="banners" class="img-responsive"/></a>
            </div>
          </div>
      <!-- 2 Column Banners Ends -->
      <!-- Slider Section Ends --

        <!-- product listing -->
        <section class="products-list"> 
           <!--products heading  -->
           <div class="row">
             <h2 class="product-head"> All Jewelleries</h2>
           </div>
           <!-- end  of product heading -->
              
            <!-- start of the pagination div -->
            <div class="row">
              <h4><?php echo $links;?></h4>
            </div><!-- end  of  the pagination div -->

           <!-- looping  all the products -->
           <div class="row">
               <?php 
                foreach ($results as $result) { ?>
                    <!-- div for each product start of  the col-md-4 div-->
                    <div class="col-md-4 col-sm-6">

                    <!-- start  of  the product-col div -->
                      <div class="product-col">
                        <a href="<?php echo base_url().'index.php/home/individual_product/'?><?php echo $result->prodid;?>">
                          <div class="image">
                            <img id="zoom_08" data-zoom-image="<?php echo base_url().'assets/images/large.jpg'?>" style="width:100%;height:30%;" src="<?php echo $result->prodimage;?>" alt="<?php echo $result->prodimage;?>" class="img-responsive img-thumbnail center-block" >
                         </div><!-- end of  the image div -->
                          <div class="caption">
                            <h4><?php echo $result->prodname;?></h4>
                          </div><!--  end of the caption div -->
                        </a>
                        <div class="price">
                           <span class="price-new">Price Kshs:&nbsp;<?php echo number_format($result->prodprice);?></span> 
                        </div><!-- end  of  the price  div -->

                        <div class="cart-button">
                        <a href="<?php echo base_url().'index.php/home/addcart/'?><?php echo $result->prodid;?>">
                          <button type="submit" class="btn btn-cart">
                            Add To Cart <i class="fa fa-shopping-cart"></i>
                          </button></a>
                        </div><!-- end of the cart button  div -->

                      </div> <!-- end of the product div -->

                    </div>  <!-- end  of  the col-md-4 div -->
                    <?php   } ?>
            </div>  <!-- end  of  the  row product loop -->

            <div class="row">
              <h4><?php echo $links;?></h4>
            </div><!-- end  of  the pagination div -->

          </section><!-- end of product listing -->

       </div><!-- col-md-8 end here -->

</div> <!-- end  of  the  row div -->



     


   



