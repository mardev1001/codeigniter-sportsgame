<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');
 class Verifylogin extends CI_Controller
  {
	  public function __construct()
	  {
		   parent::__construct();
		   $this->load->model('Common_model','cmodel');
	  }
		public function index()
		{
			$this->form_validation->set_rules('login-email','Email','required|trim');
            $this->form_validation->set_rules('login-password','Password','required|trim');
			
			if($this->form_validation->run()==FALSE)
			{
			  $this->load->view('adminloginview');
			}
		else 
		{
			$email = $this->input->post('login-email');
			$password = $this->input->post('login-password');
			$where = array('email'=>$email,
						   'password'=>$password);
			$result = $this->cmodel->select_where('register',$where);
	
						
     		if($result!=FALSE)
			{
			  $where2 = array('user_id'=>$result['0']['id']);
			  $result2 = $this->cmodel->select_single_where('rights',$where2);
				foreach($result as $row)
				{
					$sess_data = array('id'=>$row['id'],
					                   'email'=>$row['email'],
					                   'rights'=>$row['rights'],
									   'fname'=>$row['fname'],
					                   'lname'=>$row['lname'],
									   'user_type'=>$row['user_type'],
									   'new_game'=>$result2['new_game'],
									   'update_game'=>$result2['update_game']
									   );
					$this->session->set_userdata('logged_in',$sess_data);
					if($row['user_type']=='gamers'){
						$explode	=	explode(',',$row['rights']);
						if(is_array($explode)){
						if(in_array('new_game',$explode) && in_array('update_game',$explode)){
							redirect(base_url('gamers'));
						}elseif(in_array('new_game',$explode)){
							redirect(base_url('gamers'));
						}elseif(in_array('update_game',$explode)){
							redirect(base_url('updategame'));
						}else{
							redirect(base_url('new_game'));
						}
						}else{
							redirect(base_url('dashboard'));
						}
					}
					redirect(base_url('dashboard'));
				}
			}
			else
			{
				$this->session->set_flashdata('login_message','Wrong UserName And Password');
				$this->load->view('adminloginview');
			}
		}
		}
}
?>