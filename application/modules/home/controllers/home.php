<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {

	public $logged_in;

     /* class constructor
    ____________________________________________________________*/

	function __construct()
    {

        
        
        $this->load->model('category_model');
        $this->load->model('product_model');

        $this->load->library('form_validation');

        parent::__construct();

        if ($this->session->userdata('logged_in')) {
          $this->logged_in = TRUE;
         } else {
          //$this->logged_in = FASLE;
         }
          
    }

    /* index function
    ____________________________________________________________*/


    function index()
    {
        // $data['navbarcategory'] = $this->create_category_nav();

        // //$data['products']=$this->allproduct();

        // $data['top_navbar1']='home/navbar_view1';
        // $data['content_page']='home/v_home';
        // $data['main_footer']='home/footer_view1';
        $this->product_category();

        // $this->template->call_home_template($data);

    }
    

    /*
    function for displaying the navigation bar
    ________________________________________________________________*/

    public function create_category_nav(){
        $categories=$this->category_model->get_categories();
        $data ='';
        $data.='<li>';
        $data.='<a href="'.base_url().'home/product_category">View All</a></li>';
        if( !empty($categories)){
            foreach ($categories as $key => $category) {
               $data.='<li><a href="'.base_url().'home/product_category/'.$category['Category id'].'">'.$category['Category Name'].'</a></li>';
            }
        }
        return $data;
    }

    /*dispaly of product based on the category
    _______________________________________________________*/

    public function product_category($catid=Null){
        
        $products=$this->category_model->category_product($catid);
       //echo "<pre>";print_r($products);echo "</pre>";die();
        if( !empty( $products)){
            foreach ($products as $key => $product) {
            $prod_cat['prod_category'][]=$product;
            // echo "<pre>";print_r($product);echo "</pre>";die();
            }
         
           $data['all_product_category']=$prod_cat;
           //echo "<pre>";print_r($prod_cat);echo "</pre>";die();
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

    public function individual_product($pid=NULL){
        $sproduct=$this->product_model->getproduct($pid);
        echo "<pre>";print_r($sproduct);echo "</pre>";die();
        $data['single_product']=$sproduct;
        $data='';
        $data['navbarcategory'] = $this->create_category_nav();
        $data['top_navbar1']='home/navbar_view1';
        $data['content_page']='home/v_product';
        $data['main_footer']='home/footer_view1';

        $this->template->call_home_template($data);
    }

   

   
    /* login function
    ____________________________________________________________*/

    function login(){
        $data['']='';
        $data['top_navbar1']='home/navbar_view1';
        $data['content_page']='home/v_login';
        $data['main_footer']='home/footer_view1';

        $this->template->call_home_template($data);
    }

     /* contact function
    ____________________________________________________________*/

    function contact(){
        $data['']='';
        $data['top_navbar1']='home/navbar_view1';
        $data['content_page']='home/v_contact';
        $data['main_footer']='home/footer_view1';

        $this->template->call_home_template($data);
    }

    /* register function
    ____________________________________________________________*/
	
    function register(){
        $data['']='';
        $data['top_navbar1']='home/navbar_view1';
        $data['content_page']='home/v_register';
        $data['main_footer']='home/footer_view1';

        $this->template->call_home_template($data);
    }

	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */