<?php
class Model_users extends CI_Model{


public function can_log_in(){

   $this->db->where('cust_email',$this->input->post('email'));
   $this->db->where('cust_password',md5($this->input->post('password')));
   	$query = $this->db->get('customers');


    if($query->num_rows()==1){
    
       return true;
}
    else{

    	return false;
    }

}
   public function set_active($key){

     $this->db->where('cust_email',$this->input->post('email'));
     $this->db->where('cust_status',$this->db->insert(1));
     

   }
}
?>