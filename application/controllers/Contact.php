<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');
 class Contact extends CI_Controller
  {
		public function __construct()
		{
		  parent::__construct();
		  $this->load->model('Common_model','cmodel');
		}
		public function index()
		  {
			  if($this->session->has_userdata('networkid'))
			     {
				 $id = $this->uri->segment(4);
				 $where  = array('network_id'=>$id);
			     $data['sess_data'] = $this->session->userdata('networkid');
				 $data['result'] = $this->cmodel->select_single_where('register',$where);
				 $this->load->view('contactview',$data);
				}
				 else{
			  redirect(base_url('logintrack/logout'));
		            }
		  }
}
?>