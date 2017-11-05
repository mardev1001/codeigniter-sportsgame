<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');
 class Splash extends CI_Controller
  {
		public function __construct()
		{
		  parent::__construct();
		  $this->load->model('Common_model','cmodel');
		}
		public function index()
		  {
			$url = $this->uri->segment(3);
			$where =  array('splash_url'=>$url);
			if(isset($url) && !empty($url))
			  {
				$data['result'] = $this->cmodel->select_single_where('register',$where);
		
				if(count($data['result'])>0)
				{
				 $this->load->view('splashview',$data);	
				}
				else
				{
					$data['nourl_defined'] = 'No Network Found';
					$this->load->view('splashview',$data);	
				}
			  }
		  }
		  
		 public function popup(){ 
		
			 	$this->load->view('splashpopup');	
		 } 
		  
		 public function openmobile(){
				$data['networkid']	=	$_SESSION['networkid']['network_id'];
			 	$this->load->view('openmobile',$data);
		 }
}
?>