    <?php echo "<pre>THIS ";print_r($all_products);echo "</pre>";exit; ?>
      <div class="row">
    <!-- Sidebar Starts -->
      <div class="col-md-3 col-md-offset-1">
      <!-- Categories Links Starts -->
        <h3 class="side-heading">Categories</h3>
        <div class="list-group categories">
          <?php echo $navbarcategory;?>
        </div>
      </div>
    <!-- Sidebar Ends -->   
    <!-- Primary Content Starts -->
      <div class="col-md-8">
      <!-- Slider Section Starts -->
        <div class="slider">
          <div id="main-carousel" class="carousel slide" data-ride="carousel">
          <!-- Wrapper For Slides Starts -->
            <div class="carousel-inner">
              <div class="item active">
                <img style="width:100%;height:50%;" src="" alt="Slider" class="img-responsive" />
              </div>
            </div>
          <!-- Wrapper For Slides Ends -->
          </div>  
        </div>
      <!-- Slider Section Ends -->
        <hr> 
        <section class="products-list">     
        <!-- Heading Starts -->
        <!--   <h2 class="product-head"> All Jewellery</h2> -->
        <!-- Heading Ends -->
        <!-- Products Row Starts -->
          <div class="row">
          <!-- Product #1 Starts -->
      <?php 
          foreach ($all_products as $key => $product) {?>
               <div class="col-md-4 col-sm-6">
                  <div class="product-col">
                     <a href="<?php echo base_url().'index.php/home/individual_product/'?><?php echo $product['prodid'];?>">
                    <div class="image">
                      <img style="width:100%;"src="<?php echo $product['prodimage'];?>" alt="product" class="img-responsive img-thumbnail" />
                    </div>
                    <div class="caption">
                        <h4><?php echo $product['prodname'];?></h4>
                    </div><!-- end  of the  caption div -->

                    <div class="price">
                      <span class="price-new">Price Kshs:&nbsp;<?php echo number_format($product['prodprice'];?></span> 
                    </div><!--  end  of  the price  div -->

                   </a><!--  end  of  the href link -->
                  <div class="cart-button">
                    <a href="<?php echo base_url().'index.php/home/addcart/'?><?php echo $product['prodid'];?>">
                      <button type="submit" class="btn btn-cart">
                        Add To Cart<i class="fa fa-shopping-cart"></i>
                      </button>
                      </a>
                  </div><!--  end  of  the  cart button div -->

                    
                  </div><!-- end  of the product col div -->
             </div><!--  end of  the  col-md-4 div -->
          <?php  }?>
          </div>
        <!-- Products Row Ends -->
        </section>
      <!-- Specials Products Ends -->
      </div>
    <!-- Primary Content Ends -->
    </div>



   




