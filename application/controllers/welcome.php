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
         if($this->session->userdata('is_logged_in')){
          
    	$this->load->view('shopping_cart');

         }else{
         	redirect('welcome/restricted');
         }
    }
    public function restricted(){
         
    	$this->load->view('restricted');
}
    public function login_validation(){


    	$this->load->library('form_validation');
    	$this ->form_validation->set_rules('email','Email','required|trim|xss_clean|callback_validate_credentials');
    	$this ->form_validation->set_rules('password','Password','required|md5|trim');
    
      if($this->form_validation->run()){
           $data =array(
                       'email' => $this->input->post('email'),
                        'is_logged_in' => 1
               
            	);

      	$this->form_validation->set_userdata($data);
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
    public function logout(){

    	$this->session->sess_destroy();
    	redirect('welcome/login');
    }
    public function sign_up(){
         
    	$this->load->view('sign_up');
}
     public function signup_validation(){
         
         $this->load->library('form_validation');
         $this ->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[customers.cust_email]');
         $this ->form_validation->set_rules('password','Password','required|md5|trim');
         $this ->form_validation->set_rules('cpassword','Confirm Password','required|md5|trim|matches[password]');
         //$this->form_validation->set_message('is_unique', 'Email Already Exists');
 if($this->form_validation->run()){
       $key = md5(uniqid());
       $this->load->library('email', array('mailtype'=>'html'));
      
       $this->email->from(''.'');
       $this->email->to($this->input->post('email'));
       $this->email->subject("Confirm your account");
       $message = "<p>Thank you for signing up </p>";
       $message .= "<p><a href='".baseurl()."main/register_user/key'>click here </a> to confirm your account</p>";
       $this->email->message($message);
      

       if( $this->email->send()){

            echo 'This email has been sent';
       }
       else{
       	   echo "failed";
       }
       //$this->model_users->set_active($key);

 }else{
 	 echo "Error";
 	       	 $this->load->view('sign_up');

 }
     }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */