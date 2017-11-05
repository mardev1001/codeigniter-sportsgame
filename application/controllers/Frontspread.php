<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');
 class Frontspread extends CI_Controller
  {
	 public function __construct()
	  {
		  parent::__construct();
		  $this->load->model('Common_model','cmodel');
	  } 
	 public function index()
	   {
		 $order_by = '`betting_day` DESC';  
		 $data['result'] = $this->cmodel->select_orderby('investor',$order_by);
		 echo '<pre>';
         print_r($data);
         echo '</pre>';
         die(); 		 
		 $this->load->view('frontspreadview',$data);
       }
  }
?>