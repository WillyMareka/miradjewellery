<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends MY_Model {

	function __construct()
    {
    	
        // Call the Model constructor
        parent::__construct();

    }
    
    /* get all active  categories from  the  database
    _______________________________________________________*/


    public function get_categories(){

        $data=array();
            $stmt="SELECT 
            catid AS 'Category id',
            catname AS 'Category Name'
            FROM 
            `category`
            WHERE catstatus=1 ORDER BY catname DESC";

            $result = $this->db->query($stmt);
            if($result->num_rows > 0){
                $data=$result;
            }
        
    	return $data->result_array();
    }

    public function get_titles(){

        $data=array();
            $stmt="SELECT 
            title_id AS 'Title_id',
            title_name AS 'Title_name'
            FROM 
            `title`";

            $result = $this->db->query($stmt);
            if($result->num_rows > 0){
                $data=$result;
            }
        
        return $data->result_array();
    }

    /*getting the count of all product
    _____________________________________________*/
    
    public function countproduct(){
      return $this->db->count_all("products");
    }

    /*getting products based on page limit
    _____________________________________________*/
    public function getproducts($limit,$offset){
        $this->db->limit($limit,$offset);
        $products=$this->db->get("products");
        if($products->num_rows()>0){
            foreach ($products->result() as $product) {
              $data[]=$product;
            }
            return $data;
        }
        
        return false;
    }

    /*getting  products  that belongs  to a given category
    _______________________________________________________*/

    public function category_product($catid){
        $sql="SELECT 
            p.prodid, 
            p.prodname,
            p.proddescription, 
            p.prodprice,
            p.prodimage, 
            c.catimage 
          FROM  products p 
          INNER JOIN category c
          ON p.catid= c.catid AND c.catid ='$catid'";

             $results=$this->db->query($sql);
            return $results->result_array();
            /*  if($results->num_rows()> 0){
                foreach ($results->result() as $result) {
                          $data[]=$result;
                        }
                  return $data;
                 }
          return false;*/
    }
    
    /* search for product from the  database
    _____________________________________________________*/

    public function get_results($search){

      $this->db->like('prodname',$search);
      $results  = $this->db->get('products');
      if($results ->num_rows()>0){
            foreach ($results ->result() as $result) {
              $data[]=$result;
            }
            return $data;
        }
        return false;
    }

    /* getting individual product  from the database
    ______________________________________________________*/

    public function getproduct($pid){
            $sql="SELECT 
            p.prodid AS 'Product ID',
            p.prodname AS 'Product Name',
            p.proddescription    AS 'Description',
            p.prodprice AS 'Price',
            p.catid AS 'category',
            p.prodimage AS 'Image'
            FROM products p
            INNER JOIN category c
            ON p.catid= c.catid AND p.prodid ='$pid' LIMIT 1";

            $result=$this->db->query($sql);
            if($result){
              $product_details=$result->result_array();
              return $product_details;
            }
        return false;
    }
     /* getting related product  from the database
    ______________________________________________________*/
    public function related_product($catid,$pid){
      $sql="SELECT
        p.prodname 
        p.prodprice
        p.catid
        p.prodimage AS 'Image'
        FROM products p, category c
        WHERE p.catid=$catid AND p.prodid !=$pid ORDER BY p.prodname";
        $result=$this->db->query( $sql);
        return $result->result_array();
    }

    /*inserting user comment
    ___________________________________________________*/

    public function add_comment($data){
      $insert=$this->db->insert('comments',$data);
      return $insert;
    }

    /*getting all email in the comments table
    ______________________________________________________*/
    public function get_email($em=NULL)
    {
      $emails="SELECT email FROM comments WHERE email=$em";
      return $email->result_array();
    }

    /*function for adding new customer
    ___________________________________________________*/

    public function add_customer($customer){
        $insert=$this->db->insert('customers', $customer);
       return $insert;
    }

    /*login function to user account
    _______________________________________________________*/
    public function user_login($cname,$cpass){
        
         //echo '<pre>';print_r($passw1);echo'</pre>';die;
        $sql = "SELECT * FROM customers WHERE cust_email = '". $cname ."' AND cust_password = '". $cpass ."' LIMIT 1";

        $result = $this->db->query($sql);
        
        $row = $result->row();
         // echo '<pre>';print_r($result);echo'</pre>';die;
        $sql2 = "SELECT * FROM customers WHERE cust_email = '". $cname ."' AND cust_status = 0 ";

        $result2 = $this->db->query($sql2);
        $row2 = $result->row();

        if($result->num_rows() == 1){
           if($row2->cust_status){
             if ($row->cust_password === $cpass) {
               $session_data = array(
                   'cust_id'       => $row ->cust_id , 
                   'cust_name'    => $row ->cust_name , 
                   'cust_email'      => $row ->cust_email ,
                   'title_id'      => $row ->title_id 
                   
                );

                $this -> set_session($session_data);
                return 'logged_in';
             } else {
               return "session_fail";
             }
           }else{
             return "not_activated";
           }
         }else{
          return "incorrect_password";
         }
     }



     private function set_session($session_data){
      $sql = "SELECT cust_id , cust_name, cust_email, title_id FROM customers WHERE cust_email = '". $session_data['cust_email'] ."' LIMIT 1";
      $result = $this->db->query($sql);
      $row = $result->row();
       //echo "<pre>";print_r($result);die();
       //echo $session_data['emp_id'];die();
      $setting_session = array(
                   'cust_id'       => $session_data['cust_id'] , 
                   'cust_name'    => $session_data['cust_name'] ,
                   'cust_email'       => $session_data['cust_email'] ,
                   'title_id'       => $session_data['title_id'] ,
                   'logged_in'   => 1
      ); 

      $this->session->set_userdata($setting_session);

      //echo "<pre>";print_r($setting_session);die();
      
      $details = $this->session->all_userdata();
       $sql = "INSERT INTO customer_session (`session_id`,`ip_address`,`user_agent`,`last_activity`,`user_data`,`cust_id`,`cust_name`,`cust_email`,`title_id`,`logged_in`)
               VALUES ('".$details['session_id']."', '".$details['ip_address']."','".$details['user_agent']."', '".$details['last_activity']."', 
                       '1','".$details['cust_id']."', '".$details['cust_name']."', '".$details['cust_email']."', '".$details['title_id']."', '".$details['logged_in']."') ";

    $results = $this->db->query($sql);
      //$this->db->insert_batch('ci_sessions',$session_details);
       // $details = $this->session->all_userdata();
        
    }

    public function logoutuser($sess_log){
         $data['logged_in'] = 0;

         $this->db->where('session_id', $sess_log);
         $update = $this->db->update('customer_session', $data);
     }


    public function addtocart($custid, $prodid){
           $cart=array(
            'cust_id'=>$custid,
            'prod_id'=>$prodid
        );

      $insert=$this->db->insert('cart', $cart);
      return $insert;
    }

    function generateReceipt()
  {
        $query = "SELECT MAX(order_id) FROM orders";
            try {
                $this->dataSet = $this->db->query($query);
                $this->dataSet = $this->dataSet->result_array();
            }
            catch(exception $ex) {
            }
           
            return $this->dataSet;
  }

  function generate_order($cust_id,$receipt_no){
   
        $products = $this->get_cart($cust_id);

        foreach ($products as $key => $product) {
                $prodid=$product['prod_id'];
                $quantity=$product['quantity'];
                //$prodprice=$product['prodprice'];

                $price = $this->get_price($prodid);

                foreach ($price as $key => $data) {
                 $prodprice = $data['prodprice'];

                 $subtotal = $prodprice * $quantity;
                 //echo "<pre>";print_r($subtotal);echo "</pre>";die();
                 $order=array(
                  'cust_id'=>$cust_id,
                  'order_no'=>$receipt_no,
                  'prodid'=>$prodid,
                  'prodprice'=>$prodprice,
                  'quantity'=>$quantity,
                  'subtotal'=>$subtotal
                  );
                  //echo "<pre>";print_r($order);echo "</pre>";die();
                   $insert=$this->db->insert('orders', $order);
                }
               
        }

        $sql2 = "DELETE FROM cart WHERE cust_id = $cust_id";

        $result = $this->db->query($sql2);
        return $result;
     
    
  }

  function get_cart($cust_id){
    $sql = "SELECT * FROM cart WHERE cust_id = '$cust_id'";
        $result = $this->db->query($sql);
        return $result->result_array();
  }

  

  function get_price($prodid){
    $sql = "SELECT * FROM products WHERE prodid = '$prodid' ";
        $result = $this->db->query($sql);
        return $result->result_array();
  }

  function get_orders($id) {
        $sql = "SELECT * FROM orders WHERE cust_id = '$id' ";
        $result = $this->db->query($sql);
        return $result->result_array();
    }
    
    public function opencart($custid){
      $sql="SELECT cu.cust_id as Customer_id,
       p.prodid as Product_id,
       p.catid as Category_id,
       p.prodname as Product_name,
       p.proddescription as Product_description,
       p.prodprice as Product_price,
       p.prodimage as Product_image,
       c.quantity as Product_quantity
      FROM customers cu, products p
      JOIN cart c ON p.prodid = c.prod_id 
      WHERE cu.cust_id = c.cust_id AND c.cust_id = $custid";

      $result=$this->db->query($sql);
      if($result->num_rows()>0){
        return $result->result_array();
      }
      else{
        $result="Your shopping cart is empty";
        return $result;
      }
      
    }

    public function update_product($updatetype,$prodid,$cust_id,$productquantity){
        switch ($updatetype) {
            case 'removeproduct':
                $sql = "DELETE FROM cart WHERE cust_id = $cust_id AND prod_id = $prodid";
                $results = $this->db->query($sql);
                break;

            case 'addquantity':
                $sql1 = "UPDATE cart SET quantity = '$productquantity' WHERE cust_id = $cust_id AND prod_id = $prodid";
                $results = $this->db->query($sql1);
                break;
            
            default:
                echo "Failed to update the cart"; die();
                break;
        }

    }


}