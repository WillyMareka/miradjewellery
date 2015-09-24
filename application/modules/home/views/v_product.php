<div class=row>
		<div class="col-md-3 col-md-offset-1">
			<h3 class="side-heading">Categories</h3>
	        <div class="list-group categories">
	          <?php echo $navbarcategory;?>
	        </div>
		</div>
<?php 
    foreach ($single_product as $key => $value) {?>
  			<!-- start of  the product image -->
			<div class="col-md-4 thumbnail " >
				<img class="img-responsive" style="height:60%;width:100%;" src="<?php echo $value['Image']; ?>">
			</div><!-- end of the product image  -->

			<!-- start of product  details -->
	        <div class="col-md-3 product-col" style="margin-left:1%;" >
	        	<h5 style="text-align:center;border-bottom:1px solid #968477;"><?php echo $value['Product Name'];?></h5>
	        	<div class="description">
	        		<span style="font-size:20px;GEORGIA;"><?php echo $value['Description'];?></span>	
	        	</div>

				<div class="price">
                   <span class="price-new">Price Kshs:&nbsp;<?php echo number_format($value['Price']);?></span> 
                </div><!-- end  of  the price  div -->

                 <div class="cart-button">
		            <a href="<?php echo base_url().'index.php/home/addcart/'?><?php echo $value['Product ID']?>">
			              <button type="submit" class="btn btn-cart">
			                Add To Cart <i class="fa fa-shopping-cart"></i>
			              </button>
		              </a>
	            </div><!-- end of the cart button  div -->
			</div><!-- end of the product details -->
		<?php }?>

</div><!-- end  of the row div -->
<!-- <div class="row">
	<div class="col-md-12">
			 <div class="slider">
	          <div id="main-carousel" class="carousel slide" data-ride="carousel">
	          <!-- Wrapper For Slides Starts -->
	            <!-- <div class="carousel-inner">
	              <div class="item active ">
	                <img src="<?php echo assets_url.'images/image4.gif'?>" alt="Slider" class="img-responsive" /> 
	              </div>
	              <div class="item ">
	                <img src="<?php echo assets_url.'images/image4.gif'?>" alt="Slider" class="img-responsive" />
	              </div>
	            </div> -->
	          <!-- Wrapper For Slides Ends -->
	          <!-- Controls Starts -->
	            <<!-- a class="left carousel-control" href="#main-carousel" role="button" data-slide="prev">
	              <span class="glyphicon glyphicon-chevron-left"></span>
	            </a>
	            <a class="right carousel-control" href="#main-carousel" role="button" data-slide="next">
	              <span class="glyphicon glyphicon-chevron-right"></span>
	            </a> -->
	          <!-- Controls Ends -->
	          <!-- </div>  
	        </div>
		</div>
</div> -->