<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');
 class Dashboard extends CI_Controller
  {
	  public function __construct()
	    {
		 parent::__construct();
		 $this->load->model('Common_model','cmodel');
	    }
      public function index()
		{
			$select = ' *,COUNT(login)';
			$group_by = '`network_id`';
			$data['results'] = $this->cmodel->select_count_where('track_login',$select,$group_by);
			$where = array('user_type'=>'admin');
			$data['result'] = $this->cmodel->select_where('register',$where);
    		$data['countrows'] = $this->cmodel->count_where('register',$where);
			$data['content'] = 'dashboardview';
            $this->load->view('template',$data);			
		}
		
		public function logout()
		{
			$this->session->sess_destroy();
			redirect(base_url('adminlogin'));
		}
  }
?>