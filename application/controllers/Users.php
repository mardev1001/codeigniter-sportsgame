<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');
 class Users extends CI_Controller
  {
	  public function __construct()
	  {
		  parent::__construct();
		  $this->load->model('Common_model','cmodel');
	  }
	 public function index()
	   {
		$data['id'] = $this->session->userdata('logged_in');
		$data['uresult'] = $this->cmodel->select('user_type');
		$where = array('user_type'=>'user');   
		//$data['countrows'] = $this->cmodel->count_where('register',$where);
		$where_in = array('user_type',array("admin","gamers"));
		$data['result'] = $this->cmodel->select_where_in('register',$where_in);

		$data['content'] = 'usersview';
		$this->load->view('template',$data);
       }
		  public function saveUsers()
	        {
			 $id = trim($this->input->post('id'));
		     if(empty($id))
		        {
				$where = array('email'=>trim($this->input->post('useremail')));
				$result = $this->cmodel->select_single_where('register',$where);
                 if(count($result)>0)
				 {
					$this->session->set_flashdata('email_exists','Email Already Exists');
					redirect(base_url('users'));
				 }	
                 else
				 {
				$to_email = trim($this->input->post('useremail'));
				$rights = $this->input->post('rights');
				$notify	=	$this->input->post('receive');
				if(isset($notify))
				{
					$notifications	=	$notify;	
				}else{
					$notifications	=	'';	
				}
				if(is_array($rights))
				{
					
					$data = array('fname'=>trim($this->input->post('fname')),
			                  'lname'=>trim($this->input->post('lname')),
					          'uname'=>trim($this->input->post('username')),
			                  'email'=>trim($this->input->post('useremail')),
							  'notifications'=>trim($notifications),
							  'password'=>trim($this->input->post('password')),
						      'user_type'=>trim($this->input->post('usertype')),
						      'rights'=>implode(',',$this->input->post('rights')),
							  'parent'=>trim($this->input->post('userid'))
						  );
				}
				else{
					$data = array(
					          'fname'=>trim($this->input->post('fname')),
			                  'lname'=>trim($this->input->post('lname')),
							   'notifications'=>trim($notifications),
					          'uname'=>trim($this->input->post('username')),
			                  'email'=>trim($this->input->post('useremail')),
							  'password'=>trim($this->input->post('password')),
						      'user_type'=>trim($this->input->post('usertype')),
							  'parent'=>trim($this->input->post('userid'))
						  );
				}
		  $result = $this->cmodel->insert('register',$data);
		  
  
			  if($result!='')
					{ 
						$rdata = array('user_id'=>$result);						
						$this->cmodel->delete_where('rights',$rdata);
						if(is_array($rights))
						{
						foreach($rights as $right){
							    $rdata[$right] = 1;
						}
                                								
						}
						$this->cmodel->insert('rights',$rdata);
						$this->email->from('vrana@vtaurus.com', 'Vikas Rana');
						$this->email->to($to_email);
						$this->email->subject('Email Test');
						$this->email->message('Testing the email class.');
						if($this->email->send())
						{
							$this->session->set_flashdata('success_email','Mail Successfully Sent');
						}
					}
			  redirect(base_url('users'));
				} 
				
				} 
		     else
		        {
     		   $where = array('id'=>$this->input->post('id'));
               $rights = $this->input->post('rights');
			   $notify	=	$this->input->post('receive');
				if(isset($notify))
				{
					$notifications	=	$notify;	
				}else{
					$notifications	=	'';	
				}
				if(is_array($rights))
				{
					$data = array(
					          'fname'=>trim($this->input->post('fname')),
			                  'lname'=>trim($this->input->post('lname')),
					          'uname'=>trim($this->input->post('username')),
							   'notifications'=>trim($notifications),
			                  'email'=>trim($this->input->post('useremail')),
							  'password'=>trim($this->input->post('password')),
						      'user_type'=>trim($this->input->post('usertype')),
						      'rights'=>implode(',',$this->input->post('rights'))
						  );
				}
				else{
					$data = array('fname'=>trim($this->input->post('fname')),
			                  'lname'=>trim($this->input->post('lname')),
							  'uname'=>trim($this->input->post('username')),
							   'notifications'=>trim($notifications),
			                  'email'=>trim($this->input->post('useremail')),
							  'password'=>trim($this->input->post('password')),
						      'user_type'=>trim($this->input->post('usertype'))
						  );
				}
			   $this->cmodel->update_where('register',$where,$data);
			   $rdata = array('user_id'=>$id );						
				$this->cmodel->delete_where('rights',$rdata);
				if(is_array($rights))
					{
					foreach($rights as $right){
						$rdata[$right] = 1;							
					}
					$this->cmodel->insert('rights',$rdata);
				}
				
			   redirect(base_url('users'));
		     } 
         } 
		
		public function editUsers()
	       {
			 $data['id'] = $this->session->userdata('logged_in');
			 $data['uresult'] = $this->cmodel->select('user_type');
		     //$where2 = array('user_type'=>'user');   
		     //$data['countrows'] = $this->cmodel->count_where('register',$where2);
			 $where_in = array('user_type',array("admin","gamers"));
		     $data['result'] = $this->cmodel->select_where_in('register',$where_in);
			 $data['role'] = $this->cmodel->select('user_type');
			 $where = array('id'=>$this->uri->segment(4));
			 $data['eresult'] = $this->cmodel->select_single_where('register',$where);
			 $whererights = array('user_id'=>$this->uri->segment(4));
			 $data['getrights'] = $this->cmodel->select_single_where('rights',$whererights);
			 $data['content'] = 'usersview';
			 $this->load->view('template',$data);
           }
		public function deleteUsers()
	     {
			 $where = array('id'=>$this->uri->segment(4));
		     $this->cmodel->delete_where('register',$where);
		     redirect(base_url('users'));
        }
}
?>