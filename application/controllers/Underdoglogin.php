<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');
 class Underdoglogin extends CI_Controller
  {
		public function __construct()
		 {
		  parent::__construct();
		  $this->load->model('Common_model','cmodel');
		  }
		public function index()
		  {			
			 
			$this->load->view('underlogintrackview');
			  
		  }
		  public function verifyTrack()
		  {
			 $this->form_validation->set_rules('networklogin','Password','required|trim');
			 
			 if($this->form_validation->run() == FALSE)
			  {
				$this->load->view('underlogintrackview'); 
			  }
			 else
			 {
				 $network_id = trim($this->input->post('networklogin'));
				 $where = "network_id ='".$network_id."' OR uname='".$network_id."'";
				 $select = 'network_id,fname,splash_url';
				 $result = $this->cmodel->select_single_where('register',$where);
				/* echo '<pre>'; print_R($result); echo '</pre>'; */
				
				 if(is_array($result ) && count($result)>0)
				    {
						if($result['network_id']==$network_id){
						$data = array('investor_name'=>$result['fname'],
						              'network_id'=>$result['network_id'],
									  'login'=>1);
						 $resultnew = $this->cmodel->insert('track_login',$data); 
						}else{
							$data = array('investor_name'=>$result['fname'],
						              'network_id'=>$result['network_id'],
									  'login'=>1);
						}
						if($result!=FALSE)
						 {
							 
						    
							 $this->session->set_userdata('networkid',$data);
							 redirect(base_url('splash/'.$result['splash_url']));
						 }
				  }
				 else{
					 $this->session->set_flashdata('idnot_exist','Invalid Password');
					 redirect(base_url('underdoglogin'));
				 }
 
			 }
		  }
		  public function logout()
		  {
			$this->session->sess_destroy();
            redirect(base_url('underdoglogin'));			
		  }
	  
}
?>