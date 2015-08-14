<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *  
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->login();
	}
    public function login(){

       $this->load->view('login');

    }
    public function shopping_cart(){

    	$this->load->view('shopping_cart');
    }
    public function login_validation(){


    	$this->load->library('form_validation');
    	$this ->form_validation->set_rules('email','Email','required|trim|xss_clean|callback_validate_credentials');
    	$this ->form_validation->set_rules('password','Password','required|md5|trim');
    
      if($this->form_validation->run()){
      	  redirect('welcome/shopping_cart');
      }else{

      	 $this->load->view('login');

      }
    }
    public function validate_credentials(){
         $this->load->model('model_users');	 
         if($this->model_users->can_log_in()){

         	return true;
         }
         else {
         	$this->form_validation->set_message('validate_credentials', 'Incorrect user name or password');
            return false;
         }
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */