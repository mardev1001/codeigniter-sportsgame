<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');
 class Myaccount extends CI_Controller
  {
		/* public function __construct()
		{
		  parent::__construct();
		  $this->load->model('Common_model','cmodel');
		} */
		public function index()
		  {
			$this->load->view('myaccountview');
		  }
}
?>