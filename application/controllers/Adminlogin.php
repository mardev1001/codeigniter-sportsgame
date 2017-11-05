<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');
 class Adminlogin extends CI_Controller
  {
		public function __construct()
		{
		  parent::__construct();
		}
		public function index()
		{
			if($this->session->has_userdata('logged_in'))
			{
				redirect(base_url('dashboard'));
			}
            $this->load->view('adminloginview');			
		}
  }
?>