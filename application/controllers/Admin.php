<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');
 class Admin extends CI_Controller
  {
	 public function __construct()
	    {
		 parent::__construct();
		 $this->load->model('Common_model','cmodel');
	    }	 
	public function index()
	   {
		$this->load->view('template');
       }
   public function addAdmin()
	   {
		$data['content'] = 'addadminview';
		$this->load->view('template',$data);
	   }
    public function saveAdmin()
	  {
		$where = array('email'=>$this->input->post('email'));
		$result = $this->cmodel->select_where('register',$where);
		if(count($result)>0)
		{
			$data['email_error'] = 'Email Already Exists';
			$data['content'] = 'addadminview';
			$this->load->view('template',$data);
		}
		else
		 {			 
		$data = array('fname'=>$this->input->post('fname'),
		              'lname'=>$this->input->post('lname'),
					  'email'=>$this->input->post('email'),
					  'password'=>$this->input->post('password'),
					  'user_type'=>'admin');
		$this->cmodel->insert('register',$data);
        redirect(base_url('dashboard'));		
	   }}
     public function editAdmin()
	   {
		$where = array('id'=>$this->uri->segment(4));
		$data['content'] = 'editadminview';
		$data['result'] =  $this->cmodel->select_where('register',$where);
		$this->load->view('template',$data);
	   }
     public function updateAdmin()
	   {
		$where = array('id'=>$this->input->post('id'));
		$data = array('fname'=>$this->input->post('fname'),
		              'lname'=>$this->input->post('lname'),
					  'email'=>$this->input->post('email'),
					  'password'=>$this->input->post('password'),
					  'user_type'=>'admin');
		 $this->cmodel->update_where('register',$where,$data);
		 redirect(base_url('dashboard'));
	   }   
	 public function deleteAdmin()
	   {
		$where = array('id'=>$this->uri->segment(4));
		$this->cmodel->delete_where('register',$where);
        redirect(base_url('dashboard'));
	   }
  }
?>