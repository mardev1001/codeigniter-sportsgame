<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');
 class Logintrack extends CI_Controller
  {
		public function __construct()
		 {
		  parent::__construct();
		  $this->load->model('Common_model','cmodel');
		  }
		public function index()
		  {			
			$url = $this->uri->segment(2);
			$where =  array('splash_url'=>$url);
			if(isset($url) && !empty($url))
			  {
				$data['result'] = $this->cmodel->select_single_where('register',$where);
				
				if(count($data['result'])>0)
				{
				 $this->load->view('splashview',$data);	
				}else{
					$this->load->view('logintrackview');
				}
			  }else{
					$this->load->view('logintrackview');
			  }
		  }
		  public function verifyTrack()
		  {
			 $this->form_validation->set_rules('networklogin','Password','required|trim');
			 
			 if($this->form_validation->run() == FALSE)
			  {
				$this->load->view('logintrackview'); 
			  }
			 else
			 {
				 $network_id = trim($this->input->post('networklogin'));
				 $where = "(network_id ='".$network_id."' OR uname='".$network_id."') AND site = '".NETWORK_TYPE."'";
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
							 redirect(base_url('gamedetails'));
						 }
				  }
				 else{
					 $this->session->set_flashdata('idnot_exist','You are not allowed to visit this page.');
					 redirect(base_url('logintrack'));
				 }
 
			 }
		  }
		  public function logout()
		  {
			$this->session->sess_destroy();
            redirect(base_url('logintrack'));			
		  }
	  
}
?>