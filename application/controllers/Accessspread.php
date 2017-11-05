<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');
 class Accessspread extends CI_Controller
  {
	 /* public function __construct()
	  {
		  parent::__construct();
		  $this->load->model('Common_model','cmodel');
	  }  */
	 public function index()
	   {
		 $this->load->view('accessspreadview');
       }
	   
	   public function verifyLogin()
	   {
		 $this->form_validation->set_rules('login','Password','required|trim');

		 if ($this->form_validation->run() == FALSE)
		    {
			$this->load->view('accessspreadview');
		    }
		else
		   {
			$login = trim($this->input->post('login'));
			$where = array('password'=>$login);
			$data['result'] = $this->cmodel->select_single_where('register',$where);
			echo '<pre>';
			print_r($data);
			echo '</pre>';
			
			
		   }	
	   }
  }
?>