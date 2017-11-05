<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');
 class Betdays extends CI_Controller
  {
	public function __construct()
	     {
		  parent::__construct();
		  $this->load->model('Common_model','cmodel');
	     }
	  public function index()
	    {
		$select = 'MAX(bet_day)';
		$result = $this->cmodel->select_max('betgame',$select);
		$count = count($result);
		if($count>0)
		  {
			foreach($result as $row)
			{
			$data['current_dy'] = date('Y-m-d');
			$data['current_day'] = date('D');
			$data['bet_day'] =  $result['MAX(bet_day)']+1;
			}
		  }
		else
		{
		$data['current_dy'] = date('Y-m-d');
        $data['current_day'] = date('D');
		$data['bet_day'] = 1;
		} 	
		$order_by = "`bet_day` desc";	
		$data['eresult'] = $this->cmodel->select_orderby('betgame',$order_by);	
		$data['content'] = 'betdaysview';
		$this->load->view('template',$data);
        }
	
	 public function saveBetdays()
	 {
		 $id = trim($this->input->post('id'));
/* 		 echo '<pre>';print_R($_POST);die;
 */		 if(empty($id))
		 {
			$data = array('bet_day'=>$this->input->post('bet_day'),
		                 'bet_year'=>$this->input->post('bet_year'),
					     'day'=>$this->input->post('day'),
					     'year'=>$this->input->post('year'),
					     'bankroll'=>$this->input->post('bankroll'),
					     'op_message'=>$this->input->post('opmessage'),
					    'league'=>$this->input->post('league'),
						);
						
						
		    $this->cmodel->insert('betgame',$data);
			redirect(base_url('betdays')); 
		 }
		 else{
			 $where = array('id'=>$this->input->post('id'));
			 $data = array(
		              'bet_year'=>$this->input->post('bet_year'),
					  'day'=>$this->input->post('day'),
					  'year'=>$this->input->post('year'),
					  'bankroll'=>$this->input->post('bankroll'),
					  'op_message'=>$this->input->post('opmessage'),
					  'league'=>$this->input->post('league'),
						);
			
			$this->cmodel->update_where('betgame',$where,$data);
			redirect(base_url('betdays'));
		 }
     }
	 public function editBetdays()
	    {
			$delete_id  = $this->uri->segment(4);
			$where = array('id'=>$this->uri->segment(4));
			$data['results'] = $this->cmodel->select_single_where('betgame',$where);
			$order_by = '`bet_day` desc';
			$data['eresult'] = $this->cmodel->select_orderby('betgame',$order_by);
			$select = 'MAX(bet_day)';
		    $result = $this->cmodel->select_max('betgame',$select);
			
		    $count = count($result);
		       if($count>0)
				{
					foreach($result as $row)
					{
					$data['current_dy'] = date('Y-m-d');
					$data['current_day'] = date('D');
					$data['current_year'] = date('Y');
					$data['bet_day'] = $result['MAX(bet_day)']+1;
					}
				}
				else
				 {
				$data['current_dy'] = date('Y-m-d');
				$data['current_day'] = date('D');
				$data['current_year'] = date('Y');
				$data['bet_day'] = 1;
				 } 
			$data['content'] = 'betdaysview';
			$this->load->view('template',$data);
        }
		
	 public function deleteBetdays()
	 {
			$where = array('id'=>$this->uri->segment(4));
			$this->cmodel->delete_where('betgame',$where);
			redirect(base_url('betdays'));
     }
  }
?>