<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');
 class Averageprofit extends CI_Controller
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
				 $limit = 1;
				 $order_by = '`id`  DESC';
				 $data['result'] = $this->cmodel->select_orderby('financial',$order_by); 
				 $data['singleresult'] = $this->cmodel->select_orderby_limit('financial',$order_by,$limit);
				 $this->load->view('averageprofitview',$data);
				}
				else
				{
			  redirect(base_url('logintrack/logout'));
		        }
		}
  }
?>