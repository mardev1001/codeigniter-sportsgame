<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');
 class Financial extends CI_Controller
  {
	  public function __construct()
	  {
		  parent::__construct();
		  $this->load->model('Common_model','cmodel');
	  } 
	  public function index()
	    {
		$limit = 1;
		$orderby = '`bet_day` DESC';
		$data['betdata'] = $this->cmodel->select_orderby_limit('betgame',$orderby,$limit);
    	$where = array('user_type'=>'financialview');
		$data['countrows'] = $this->cmodel->count_where('financial',$where);
		$data['result'] = $this->cmodel->select_where('financial');
		$data['content'] = 'financialview';
		$this->load->view('template',$data);
      }
	 public function saveFinancial()
	 {
		  $id = trim($this->input->post('id'));
		  if(empty($id))
		    { 
		     
			 $transid = $this->input->post('transid');
			 //checking input value  New or Any Other
			 if($transid=='New')
			 {
				$where = '`trans_id` = "'.$transid.'"';
				$result = $this->cmodel->select_single_where('financial',$where);
				$transid_exists = $result['trans_id'];
				 if(!empty($transid_exists))
				     {
					 $this->session->set_flashdata('trans_exists','Transid Alreay Exists');
					 redirect(base_url('financial'));
				     }
					else
					  {
						$limit = 1;
				        $orderby = '`trans_id` DESC';
		                $check_trans_id  = $this->cmodel->select_orderby_limit('financial',$orderby,$limit);
				        $transnew = $check_trans_id['trans_id'] + 1;  
						$data = array('trans_id'=>$transnew,
								 'fbet_day'=>$this->input->post('fbetday'),
								 'fbet_year'=>$this->input->post('fbetyear'),
								 'fbet_date'=>$this->input->post('fbetdate'),
								 'fday'=>$this->input->post('fday'),
								 'avg_profit_bet'=>$this->input->post('avgprofitbet'),
								 'avg_profit_date'=>$this->input->post('avgprofitdate'),
								 'gp_profit_bet'=>$this->input->post('gpprofitbet'),
								 'gp_profit_date'=>$this->input->post('gpprofitdate'),
								 'fleague'=>$this->input->post('fleague'),
								 'user_type'=>'financialview'
								);
					$this->cmodel->insert('financial',$data);
					redirect(base_url('financial')); 
					  }
				}
			 else //else part if transid is not new
			 {
				$where = '`trans_id` = "'.$transid.'"';
				$result = $this->cmodel->select_single_where('financial',$where);
				$transid_exists = $result['trans_id'];
				if(!empty($transid_exists))
				     {
					 $this->session->set_flashdata('trans_exists','Transid Alreay Exists');
					 redirect(base_url('financial'));
				     }
					else
					  {
						$data = array('trans_id'=>$this->input->post('transid'),
								 'fbet_day'=>$this->input->post('fbetday'),
								 'fbet_year'=>$this->input->post('fbetyear'),
								 'fbet_date'=>$this->input->post('fbetdate'),
								 'fday'=>$this->input->post('fday'),
								 'avg_profit_bet'=>$this->input->post('avgprofitbet'),
								 'avg_profit_date'=>$this->input->post('avgprofitdate'),
								 'gp_profit_bet'=>$this->input->post('gpprofitbet'),
								 'gp_profit_date'=>$this->input->post('gpprofitdate'),
								 'fleague'=>$this->input->post('fleague'),
								 'user_type'=>'financialview'
								);
					$this->cmodel->insert('financial',$data);
					redirect(base_url('financial')); 
					  }
			 }
		 }
		 else{
			 //update section code start here
			 $old_trans_id = $this->input->post('oldtransid');
             $new_trans_id = $this->input->post('transid');
             $new_trans_where = '`trans_id` = "'.$new_trans_id.'"';
			if($old_trans_id!=$new_trans_id)
			{
			  $result = $this->cmodel->select_single_where('financial',$new_trans_where);
			  $transidexists = $result['trans_id'];
			  if(!empty($transidexists))
			  {
				  $this->session->set_flashdata('utransid_exists','Transid Already Exists');
				  redirect(base_url('financial'));
			  }
			  else{
				   
				 $where = '`id`= "'.$id.'"';
		         $data = array('trans_id'=>$new_trans_id,
		                 'fbet_day'=>$this->input->post('fbetday'),
					     'fbet_year'=>$this->input->post('fbetyear'),
					     'fbet_date'=>$this->input->post('fbetdate'),
					     'fday'=>$this->input->post('fday'),
						 'avg_profit_bet'=>$this->input->post('avgprofitbet'),
						 'avg_profit_date'=>$this->input->post('avgprofitdate'),
						 'gp_profit_bet'=>$this->input->post('gpprofitbet'),
						 'gp_profit_date'=>$this->input->post('gpprofitdate'),
					     'fleague'=>$this->input->post('fleague'),
						 'user_type'=>'financialview'
						);
		    $this->cmodel->update_where('financial',$where,$data);
			redirect(base_url('financial'));  
			  }
			  
			}
			else{
				$where = '`id`= "'.$id.'"';
		        $data = array('trans_id'=>$this->input->post('transid'),
		                 'fbet_day'=>$this->input->post('fbetday'),
					     'fbet_year'=>$this->input->post('fbetyear'),
					     'fbet_date'=>$this->input->post('fbetdate'),
					     'fday'=>$this->input->post('fday'),
						 'avg_profit_bet'=>$this->input->post('avgprofitbet'),
						 'avg_profit_date'=>$this->input->post('avgprofitdate'),
						 'gp_profit_bet'=>$this->input->post('gpprofitbet'),
						 'gp_profit_date'=>$this->input->post('gpprofitdate'),
					     'fleague'=>$this->input->post('fleague'),
						 'user_type'=>'financialview'
						);
		    $this->cmodel->update_where('financial',$where,$data);
			redirect(base_url('financial')); 
			}
     	 } 
     }
	  public function editFinancial()
	   {
		  $countwhere = array('user_type'=>'financialview');
		  $data['countrows'] = $this->cmodel->count_where('financial',$countwhere);
		  /* $limit = 1;
		  $orderby = '`bet_day` DESC';
		  $data['betdata'] = $this->cmodel->select_orderby_limit('betgame',$orderby,$limit); */
		  $data['result'] = $this->cmodel->select_where('financial');
		  $id = $this->uri->segment(4);
		  $where = array('id'=>$id);
		  $data['eresult'] = $this->cmodel->select_single_where('financial',$where);
		  $data['content'] = 'financialview';
		  $this->load->view('template',$data);
		  	  
	   }
	   
	   public function fetchbetData()
	   {
		   $where = array('bet_day'=>trim($this->input->post('id')));
		   
		   $result =  $this->cmodel->select_where('betgame',$where);
		   if(is_array($result) && count($result)>0)
		   {
			 foreach($result as $row)
			 {
				 $data['success']= array('fbet_date'=>$row['bet_year'],
				                         'fday'=>$row['day']);
			 }
		   }
		   else
		   {
			   $data['nobetday'] = 'There is no Bet Day set up';
		   }
		   
		   echo json_encode($data);
	   }
	   public function deleteFinancial()
	   {
		  $id = $this->uri->segment(4);
		  $where = array('id'=>$id);
		  $this->cmodel->delete_where('financial',$where);
		  redirect(base_url('financial')); 	  
	   }
  }
?>