<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

error_reporting(1);
class Home extends MY_Controller {

  //public $logged_in;

     /* class constructor
    ____________________________________________________________*/

  function __construct()
    {
        $this->load->model('home_model');
       $this->load->model('stockmanager/stockmanager_model');
        $this->load->helper(array('form', 'url','captcha'));
        $this->load->driver('session');
        $this->form_validation->set_error_delimiters('<span class="error" style="color:red;">', '</span>');

        parent::__construct();

        if ($this->session->userdata('logged_in')) {
          $this->logged_in = TRUE;
         } else {
          //$this->logged_in = FASLE;
         }
          
    }

    /* index function
    ____________________________________________________________*/

    function index($parameter=NULL)
    {
      $config=array();
      $config["base_url"]=base_url().'index.php/home/index';
      $total_row=$this->home_model->countproduct();
      $config["total_rows"]=$total_row;
      $config["per_page"]=6;
      $config["uri_segment"]=3;
      $choice = $config["total_rows"] / $config["per_page"];
      $config["num_links"] = floor($choice);

      //config for bootstrap pagination class integration
      $config['full_tag_open'] = '<ul class="pager ">';
      $config['full_tag_close'] = '</ul>';
      $config['first_link'] = false;
      $config['last_link'] = false;
      $config['first_tag_open'] = '<li>';
      $config['first_tag_close'] = '</li>';
      $config['prev_link'] = 'Prev';
      $config['prev_tag_open'] = '<li class="prev">';
      $config['prev_tag_close'] = '</li>';
      $config['next_link'] = 'Next';
      $config['next_tag_open'] = '<li>';
      $config['next_tag_close'] = '</li>';
      $config['last_tag_open'] = '<li>';
      $config['last_tag_close'] = '</li>';
      $config['cur_tag_open'] = '<li class="active"><a href="#">';
      $config['cur_tag_close'] = '</a></li>';
      $config['num_tag_open'] = '<li>';
      $config['num_tag_close'] = '</li>';


      $this->pagination->initialize($config);
      $page=($this->uri->segment(3)) ? $this->uri->segment(3) :0;
  
      $data["results"]=$this->home_model->getproducts($config["per_page"],$page);
      $data["links"]=$this->pagination->create_links();

      //echo "<pre>";print_r($data);echo "</pre>";die();


        //$products=$this->home_model->category_product($catid=NULL);
        $categ=$this->home_model->get_categories();
        if(!empty($categ)){
            foreach ($categ as $key => $cate) {
                $data['navigations'][]=$cate;
            }
        }
        

        $data['navbarcategory'] = $this->create_category_nav();
       // $data['searchresult']=$this->searchproduct();
       // $data['products']=$this->allproduct();

        $data['top_navbar1']='home/navbar_view1';
        $data['content_page']='home/v_home';
        $data['main_footer']='home/footer_view1';
        // echo "<pre>";print_r($data);die();
        $this->template->call_home_template($data);

    }
  

    /*
    function for displaying the navigation bar
    ________________________________________________________________*/

    function create_category_nav(){
        $categories=$this->home_model->get_categories();
        $data ='';
        $data.='<a href="'.base_url().'index.php/home" class="list-group-item"><i class="fa fa-chevron-right"></i>View All</a>';
        if( !empty($categories)){
            foreach ($categories as $key => $category) {
               $data.='<a href="'.base_url().'index.php/home/product_category/'.$category['Category id'].'" class="list-group-item"><i class="fa fa-chevron-right"></i>'.$category['Category Name'].'</a>';            }
        }
        return $data;
    }

    function get_titles(){
        $titles=$this->home_model->get_titles();
       $data="";
            foreach ($titles as $key => $title) {
               $data.='<option value="'.$title['Title_id'].'">';
               $data.=$title['Title_name'];
               $data.='</option>';
            }
        
        return $data;
    }

    /*dispaly of product based on the category
    _______________________________________________________*/

    function product_category($catid=NULL){
        if( ! empty($catid)){
          $products=$this->home_model->category_product($catid);
        }
        else{
          redirect('index.php/home');
        }
        
        $categ=$this->home_model->get_categories();
        if(!empty($categ)){
            foreach ($categ as $key => $cate) {
                $data['navigations'][]=$cate;
            }
        }
       //echo "<pre>";print_r($product);echo "</pre>";die();
        if( is_array( $products)){
            foreach ($products as $key => $product) {
            $prod_cat['prod_category'][]=$product;
            // echo "<pre>";print_r($product);echo "</pre>";die();
            }
         
           $data['all_products']=$prod_cat;
           //echo "<pre>";print_r($prod_cat);echo "</pre>";die();
        }else{
           $data['no_product']=$products;
        }
    
        $data['navbarcategory'] = $this->create_category_nav();
        $data['top_navbar1']='home/navbar_view1';
        $data['content_page']='home/v_product_category';
        $data['main_footer']='home/footer_view1';
        //echo "<pre>";print_r($data);echo "</pre>";die();

        $this->template->call_home_template($data);
         
    }
    

    /*displaying individual products from the database
    ___________________________________________________________*/

    function individual_product($pid=NULL){
        if( ! empty($pid)){
          $sproduct=$this->home_model->getproduct($pid);
          //echo "<pre>";print_r($sproduct);echo "</pre>";die();
         //$related=$this->home_model->related_product($sproduct['category'],$pid);
        }
        else{
          redirect(base_url().'index.php/home');
        }
 
       
        $data['single_product']=$sproduct;
        //echo "<pre>";print_r($sproduct);echo "</pre>";die();
        $data['navbarcategory'] = $this->create_category_nav();
        $data['top_navbar1']='home/navbar_view1';
        $data['content_page']='home/v_product';
        $data['main_footer']='home/footer_view1';
        //echo "<pre>";print_r($data);echo "</pre>";die();
        $this->template->call_home_template($data);
    }

   

    function addcart($prodid){
        if($this->session->userdata('logged_in')){
        $custid = $this->session->userdata('cust_id');
        $result = $this->home_model->addtocart($custid, $prodid);

           if($result){
              redirect(base_url().'index.php/home/shopcart');
           }else{
              redirect(base_url());
           }

        }else{
            redirect(base_url().'index.php/home/login');
        }
    }

    function shopcart(){
        if ($this->session->userdata('logged_in')) {
            $custid = $this->session->userdata('cust_id');

            $result = $this->home_model->opencart($custid);
            $categ=$this->home_model->get_categories();
            if(!empty($categ)){
                foreach ($categ as $key => $cate) {
                    $data['navigations'][]=$cate;
                }
            }

            if(is_array($result)){
                foreach ($result as $key => $product) {
                $prod_cat['prod_details'][]=$product;
                // echo "<pre>";print_r($product);echo "</pre>";die();
                $data['cart_products']=$prod_cat;
                }
                //echo "<pre>";print_r($prod_cat);echo "</pre>";die();
            }
            else{
                 $data['empty_cart']="Your cart is empty!";
            }

        $data['navbarcategory'] = $this->create_category_nav();
        $data['top_navbar1']='home/navbar_view1';
        $data['content_page']='home/cartpage';
        $data['main_footer']='home/footer_view1';
        //echo "<pre>";print_r($data);echo "</pre>";die();
        $this->template->call_home_template($data);
       } 
       else {
          $this->login();
         }
    }
    /*function  for generating receipt
    ______________________________________________*/

    function getReceiptNumber(){
    $result = $this->home_model->generateReceipt();
          foreach ($result as $key => $value) {
            foreach ($value as $key2 => $val) {
              //generate reciept and places it in the variable -> $val
            }
          }
          return $val;
  }

    /*function  for processing  customer payment
    ___________________________________________________________*/

    function payment(){
          $cust_id = $this->session->userdata('cust_id');
          $receipt = $this->getReceiptNumber();
          $receipt_no = 'MI';
          $receipt_no .= mt_rand(10,90);
          $receipt_no .= $receipt;
          $receipt_no .= mt_rand(10,90);
          $receipt_no .= 'RAD';

          $categ=$this->home_model->get_categories();
      if(!empty($categ)){
          foreach ($categ as $key => $cate) {
              $data['navigations'][]=$cate;
          }
      }
          //echo "<pre>";print_r($result);echo"</pre>";die();
          //
          if($cust_id){
             $products1 = $this->home_model->get_cart($cust_id);
             
           foreach ($products1 as $key => $product1) {
              $prodid=$product1['prod_id'];
             
             


              $products = $this->home_model->get_price($prodid);
              foreach ($products as $key => $order) {
                 $prod_det['product'][] = $order;
                 $data['product_details']=$prod_det;
              }
             
           }
           //
           $result = $this->home_model->generate_order($cust_id,$receipt_no);

            foreach ($products as $key => $product) {
              $orders = $this->home_model->get_orders($cust_id);
                foreach ($orders as $key => $order) {
                   $order_det['order'][] = $order;
                   $data['order_details']=$order_det;
                }
            }
              
               $data['top_navbar1']='home/navbar_view1';
               $data['content_page']='home/v_order';
               $data['main_footer']='home/footer_view1';
                //echo "<pre>";print_r($data);echo"</pre>";die();
               $this->template->call_home_template($data);

          }else{

               echo "Order and Purchase failed...Contact Administrator";
               $data['top_navbar1']='home/navbar_view1';
               $data['content_page']='home/cartpage';
               $data['main_footer']='home/footer_view1';
                //echo "<pre>";print_r($data);echo"</pre>";die();
              $this->template->call_home_template($data);
          
          }
}

    /* search function
    _____________________________________________________________*/

    function searchproduct ($search=Null){
        $search_term=trim($this->input->post('search'));

        if(empty($search_term)){
          redirect('index.php/home');
        }
        else { 
          //redirect('index.php/home/searchproduct/'.$search_term);
          $data['search_result']=$this->home_model->get_results($search_term);
        }

        $categ=$this->home_model->get_categories();
        if(!empty($categ)){
            foreach ($categ as $key => $cate) {
                $data['navigations'][]=$cate;
            }
        }
        

        $data['navbarcategory'] = $this->create_category_nav();
       // $data['searchresult']=$this->searchproduct();
       // $data['products']=$this->allproduct();

        $data['top_navbar1']='home/navbar_view1';
        $data['content_page']='home/v_search';
        $data['main_footer']='home/footer_view1';
        // echo "<pre>";print_r($data);die();
        $this->template->call_home_template($data);

       
    }
   
    /* login function
    ____________________________________________________________*/

    function login(){
        $data['titles'] = $this->get_titles();

        $data['navbarcategory'] = $this->create_category_nav();

       // $data['products']=$this->allproduct();
        $data['top_navbar1']='home/navbar_view1';
        $data['content_page']='home/v_login';
        $data['main_footer']='home/footer_view1';

        $this->template->call_home_template($data);
    }

    function logout()
    {
        $sess_log = $this->session->userdata('session_id');
        $this->home_model->logoutuser($sess_log);

        $this->session->sess_destroy();
        redirect(base_url().'index.php/home');
        //redirect(base_url().'index.php/admin');
    }

    function log_check(){
      if($this->session->userdata('logged_in') == 0){

          redirect(base_url().'index.php/home');
          //redirect(base_url().'index.php/admin');
      }else{
        return "logged_in";
      }
   }

    /* user login
    ____________________________________________________________*/
    function user_login(){
         $cname = $this->input->post('customer_email');
         $cpass = md5($this->input->post('customer_pass'));
         $insert = $this->home_model->user_login($cname,$cpass);
         switch($insert){

                case 'logged_in':
                    
                   redirect(base_url());

                break;

                case 'incorrect_password':
                   echo "<pre>";print_r("Incorrect Username or Password");echo "</pre>";die();
                break;

                case 'not_activated':
                echo "<pre>";print_r("Your Account had been deactivated");echo "</pre>";die();
                break;

                default:
                    // echo '';
                break;
            }   

    }

    /* registering new login
    ____________________________________________________________*/

    function addcustomer(){
        $this->form_validation->set_rules('customername','Name','trim|required|min_length[5]|max_length[12]|xss_clean');
        $this->form_validation->set_rules('customeremail','Email','trim|required|valid_email|is_unique[customers.cust_email]');
        $this->form_validation->set_rules('customerpassword','Password','trim|required|min_length[3]');
        $this->form_validation->set_rules('confirmpassword','Confirmation password','trim|required|matches[customerpassword]');
        // die("Valid");
        if($this->form_validation->run()==FALSE){
            $this->login();
        }
        else{
            $customer=array(
            'cust_name'=>$this->input->post('customername'),
            'title_id'=>$this->input->post('customertitle'),
            'cust_email'=>$this->input->post('customeremail'),
            'cust_password'=>md5($this->input->post('customerpassword'))
            );

            

            $insert = $this->home_model->add_customer($customer);

           // 
                //mwanzo wa email
       
          echo "<pre>";print_r("reached0");echo "</pre>"; 
                 $data['f_name']= $this->input->post('customername');
                  $data['email_address'] = $this->input->post('customeremail');
            
        $fields =  array('email_address' => $data['email_address'],
        'message' => "Hello , Please  <a href='".base_url()."home/user_registered/$hash'>Click here </a> to confirm your account</p>",
        'subject' => 'Mirad Jewellery Confirmation');
            $url = 'http://www.symatechlabs.com/chicafrique/sendmail/API_Send';
                $postvars = http_build_query($fields);

    // open connection 
    $ch = curl_init();
    
    // set the url, number of POST vars, POST data
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, count($fields));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars);

    // execute post
    $sent = curl_exec($ch);

    // close connection
    curl_close($ch);

    if($sent){
      redirect(base_url().'index.php/home/login');
           
    }
     //mwisho wa email
           
        }
    }
    /* function for redirecting to the user
    ________________________________________________________________*/

    function user_registered(){
      redirect(base_url().'index.php/home/login');
    }

    /*function for updating cart
    ___________________________________________________________________*/
    
    function cartupdate($updatetype,$prodid){

        $cust_id = $this->session->userdata('cust_id');
        $productquantity = $this->input->post('productquantity');
        $result = $this->home_model->update_product($updatetype,$prodid,$cust_id,$productquantity);

       redirect(base_url(). 'index.php/home/shopcart');
    }


     /* contact function
    ____________________________________________________________*/

    function contact(){
        $data['']='';
        $data['top_navbar1']='home/navbar_view1';
        $data['content_page']='home/v_contact';
        $data['main_footer']='home/footer_view1';

        $this->template->call_single_template($data);
    }

    function getlocation(){
        $data['top_navbar1']='home/navbar_view1';
        $data['content_page']='home/v_location';
        $data['main_footer']='home/footer_view1';
        $this->template->call_home_template($data);

    }

    /*getting user comments
    _______________________________________________________________*/
    function sendcomment(){
        $this->form_validation->set_rules('user_email','Email','trim|required|valid_email|is_unique[comments.email]');
        $this->form_validation->set_rules('message','Message','trim|required');
        // $this->form_validation->set_rules('captcha', "Captcha", 'required');
        if($this->form_validation->run()==FALSE){
             $this->contact();
        }
        else{
            $data=array(
                'email'=>$this->input->post('user_email'),
                'message'=>$this->input->post('message'),
                );
             // print_r($data)or die();    
            $insert=$this->home_model->add_comment($data);
            if($insert){
                redirect(base_url().'index.php/home/');
            }
            else{
                $this->contact();
            }
            
        }
    }

    function checkemail($em){
        $email=$this->home_model->get_email();
        if($em==$email){
             $this->form_validation->set_message('checkemail','The email entered already exists');
            return FALSE;
        }
        else{
            return TRUE;
        }
    }
  
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */