<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');
 class Spreadlogin extends CI_Controller
  {
		public function __construct()
		 {
		  parent::__construct();
		  $this->load->model('Common_model','cmodel');
		  }
		public function index($name=null)
		  {			
			$data['resu']	=	$name;
			$this->load->view('login',$data);
		  }
		   public function jlogin($name=null)
		  {			
		  $data['resu']	=	$name;
			$this->load->view('jcustom',$data);
		  }
		  public function jtracking()
		  {			
		  
			$this->load->view('jtracker');
		  }
		  public function verifyTrack()
		  {
			 $this->form_validation->set_rules('spreaduser','Password','required|trim');
			 
			 if($this->form_validation->run() == FALSE)
			  {
				$this->load->view('login');  
			  }
			 else
			 {
				 $network_id = trim($this->input->post('spreaduser'));
				 $where = array('uname'=>$network_id);
				 $select = '`uname`,`id`';
				 $result = $this->cmodel->select_single_where('investor',$where);
				 if(is_array($result ) && count($result)>0)
				    {
						$data = array('uname'=>$result['uname'],
						              'id'=>$result['id'],
									  'login'=>1);
						/* $result = $this->cmodel->insert('track_login',$data); */
						
						if($result!=FALSE)
						 {
						     
							 $this->session->set_userdata('spreadid',$data);
							 redirect(base_url('spreadsheet'));
						 }
				  }
				 else{
					 $this->session->set_flashdata('idnot_exist','Invalid Password');
					 redirect(base_url('spreadlogin'));
				 }
 
			 }
		  }
		  public function logout()
		  {
			$this->session->sess_destroy();
            redirect(base_url('spreadlogin'));			
		  }
		  
		  public function newregister(){
			 
			   $firstname	 	= trim($this->input->post('firstname'));
			   $lastname	 	= trim($this->input->post('lastname'));
			   $lastname	 	= trim($this->input->post('lastname'));
			   $phone	 		= trim($this->input->post('phone'));
			   $cemail	 	 	= trim($this->input->post('cemail'));
			   $email		 	= trim($this->input->post('email'));
			   $networklogin		 	= trim($this->input->post('networklogin'));
			  if($networklogin!=''){
			  $select_where		=	array('network_id'=>$networklogin);
			  $getuser		=	 $this->cmodel->select_single_where('register', $select_where);
			  }
			   $register_date	=	date('Y-m-d h:i:s');
			   if($email!=$cemail){
				   $this->session->set_userdata('invalid','Email Address not matched'); 
				     redirect(base_url('spreadlogin/jlogin/'.$networklogin));		
			   }
			   if($getuser['email']!=''){
			   $data		=	array('parent_id'=>$getuser['network_id'],'firstname'=>$firstname,'phone'=>$phone,'lastname'=>$lastname,'email'=>$email,'register_date'=>$register_date);
			   $this->cmodel->insert('spreadusers',$data);
			   $subject		=	'New Spreadsheet Password Request';
			   $usubject	=	'We’ve received your password request.';
			   $umessage	=	'<p>You’ve successfully signed up to track your own results. Your spreadsheet login credentials will be offered to you within an hour. Thank you.</p>';
			   $amessage	=	'<p>The following person has requested to track their own results and receive a Spreadsheet password under the Manager '.$getuser['fname'].' '.$getuser['lname'].' : '.$firstname.' '.$lastname.'</p> ';
				$amessage   .=	'<p>'.$phone.'</p> ';
			   $amessage   .=	'<p>'.$email.'</p> ';
			 
			// Always set content-type when sending HTML email
			$headers  = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			// More headers
			$headers .= 'From: Underdog KINGS<no-reply@underdogkings.com>' . "\r\n";
			
			mail($email,$usubject,$umessage,$headers);
			$select_wheress		=	array('notifications'=>'Yes');
			$resultsss			=	$this->cmodel->select_where('register',$select_wheress);
			if(is_array($resultsss)){
				foreach($resultsss as $key=>$value){
					mail($value['email'],$subject,$amessage,$headers);
				}
			}
			   }
			 redirect(base_url('spreadlogin/jtracking'));	
			 
			  
			  
		  }
	  
}
?>