<?php if(isset($cart_products)){?>
<div class="row">
        <table class="table" style="border-bottom:1px solid gray;width:100%;margin-top:0.1%;" >
          <tr>
            <th style="text-align:center;">Item</th>
            <th style="text-align:center;">Product Name</th>
            <th style="text-align:center;">Quantity</th>
            <th style="text-align:center;">Price &nbsp;&nbsp;(Kshs:)</th>
            <th style="text-align:center;">SubTotal&nbsp;&nbsp;(Kshs:)</th>
            <th style="text-align:center;">Remove</th>
          </tr>
             <?php 
             $total=0;
            foreach ($cart_products as $key => $value) {
              foreach ($value as $p => $data) {
               for ($i=0; $i <= $key ; $i++) {   ?>

               <tr>
               <form id="updatecartproduct" action="<?php echo base_url(). 'index.php/home/cartupdate/addquantity/'?><?php echo $data['Product_id']?>" name="updatecartproduct" role="form" enctype="multipart/form-data" method="POST">
               <td>
                  <div class="form-group image-profile" style="margin-left:10px;">
                    <img style="width:100px;height:100px;"src="<?php echo $data['Product_image'];?>" alt="Product pic">
                  </div>
               </td>
               <td>
                  <h5 name="productname" style="color:#968477;font-size:15px; font-family:'Montserrat:700',GEORGIA;margin:10px 20px;text-align:center;"><?php echo $data['Product_name'];?></h5>
               </td>
               <td>

                 <input name="productquantity" value="<?php echo $data['Product_quantity']?>" style="width:40px;">
                 <button type="submit" class="btn btn-default" style="width:70px;background-color:#968477;text-align:center;">Update</button>
               </td>
               <td>
                 <h5 name="productprice" style="color:#968477;font-size:15px; font-family:'Montserrat:700',GEORGIA;margin:10px 20px; text-align:center;"><?php echo number_format($data['Product_price']);?></h5>
               </td>
               <td>
                 <?php

                     $subt = $data['Product_price']*$data['Product_quantity'];
                     $total += $subt;
                     //echo number_format($subt);
                 ?>
                 <h5 name="subtotal" style="color:#968477;font-size:15px; font-family:'Montserrat:700',GEORGIA;margin:10px 20px; text-align:center;"><?php echo number_format($subt);?></h5>
               </td>
               <td>
                  <a href="<?php echo base_url().'index.php/home/cartupdate/removeproduct/'?><?php echo $data['Product_id']?>" style="text-align:center;">Remove</a>
               </td>
               </form>
               
               </tr>
                <?php }
                  }
              } 
            ?>
            <tr>
              
            </tr>
        </table>
</div>
<div class="row">
    <div class="col-md-4 total" style="margin-top:0px;float:right;">
      <h3 style="margin-right:70px;">Total &nbsp;:&nbsp;&nbsp;<?php echo number_format($total);?></h3>
    </div>
</div>
<!-- conitnue  and  checkout  button -->
  <div class="row">
    <div class="col-md-6 continue_shopping" style="float:left;margin-left:750px;">
      <a href="<?php echo base_url().'index.php/home/'?>"><button class="btn btn-default" style="width:200px;background-color:gray;">CONTINUE SHOPPING</button></a>
    </div>
    <div class=" col-md-6 payment" style="float:right;">
      <a href="<?php echo base_url().'index.php/home/payment'?>"><button class="btn btn-warning" style="width:200px;background-color:#968477;">CHECKOUT</button></a>
    </div>
  </div>
  <!-- end  of  continue and  checkout  button -->

<!-- <div class="clearfix"></div> -->
        <?php } else if(isset($empty_cart)) {?>
<div class="row">
      <table class="table-striped" style="width:100%;">
        <tr>
          <th style="text-align:center;">Item</th>
          <th style="text-align:center;">Product Name</th>
          <th style="text-align:center;">Description</th>
          <th style="text-align:center;">Quantity</th>
          <th style="text-align:center;">Price</th>
        </tr>
       </table>
</div>
<div class="row">
   <h3 style="margin-left:10px;margin-top:10px;text-align:center;"><?php echo $empty_cart;?></h3>
</div>
       
<div class="row">
  <div class="col-md-4">
    <a  href="<?php echo base_url().'index.php/home/'?>" style="background-color:gray;outline:0;text-decoration:none;font-size:15px; font-family:'Montserrat:700',GEORGIA;">CONTINUE SHOPPING</a>
  </div>
  
</div>
 <?php } ?>


