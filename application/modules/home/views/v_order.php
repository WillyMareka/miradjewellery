         <?php 
             $total=0;
            foreach ($product_details as $key => $value) {
              foreach ($value as $p => $data1) {
               for ($i=0; $i <= $key ; $i++) {   ?>

               <div>
                 Product Image : <?php echo $data1['prodimage'];?>
                 Product Name : <?php echo $data1['prodname'];?>
               </div>
                <?php }
                  }
              } 
            ?>
             <?php 
             $total=0;
            foreach ($order_details as $key => $value1) {
              foreach ($value1 as $p1 => $data) {
               for ($i=0; $i <= $key ; $i++) {   ?>

               <div>
                 Receipt No :<?php echo $data['order_no'];?>
                 Product Price : <?php echo $data['prodprice'];?>
                 Product Quantity : <?php echo $data['quantity'];?>
                 Product Subtotal : <?php echo $data['subtotal'];?>
                 Total : <?php 
                               $subtt = $data['quantity'] * $data['subtotal'];
                              $total += $subtt;
                              echo $total;
                         ?>
               </div>
                <?php }
                  }
              } 
            ?>
            