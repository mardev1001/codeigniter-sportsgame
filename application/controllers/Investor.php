<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');
 class Investor extends CI_Controller
  {
	  public function __construct()
	  {
		  parent::__construct();
		  $this->load->model('Common_model','cmodel');
	  }
	 public function index()
	   {
		$where = array('user_type'=>'investor');   
		$data['countrows'] = $this->cmodel->count_where('investor',$where);
		$data['result'] = $this->cmodel->select('investor');
		$data['content'] = 'investorview';
		$this->load->view('template',$data);
       }
		public function saveInvestor()
	    {
			
			$id = trim($this->input->post('id'));
			if(empty($id))
			{
			  $data = array('uname'=>$this->input->post('uname'),
			  'target'=>$this->input->post('target'),
			  'notes'=>strip_tags($this->input->post('notes')),
			  'fina_form'=>$this->input->post('finaform'),
			  'capvalue'=>$this->input->post('capvalue'),
			  'user_type'=>'investor'
			  );
			$result = $this->cmodel->insert('investor',$data);
			$nid = $result;
			$sid=$this->input->post('sid');
  			$splitpc=$this->input->post('splitpc');
			$splitdate=$this->input->post('splitdate');
			$tmoney=$this->input->post('tmoney');
			$amount=$this->input->post('amount');
			$betting_year=$this->input->post('betting_year');
			$betting_day=$this->input->post('betting_day');
			$betting_date=$this->input->post('betting_date');
			$lcarry=$this->input->post('lcarry');
			if($result!=FALSE)
			{
				$i = 0;
				foreach($splitpc as $ss)
				   {
					 $sdata = array(
					 'nid'=>$nid,
					 'sid'=>$sid[$i],
					 'splitpc'=>$splitpc[$i],
					 'splitdate'=>$splitdate[$i]);
                     $this->cmodel->insert('split',$sdata);
					 $i++;
			       }
				$i = 0;
				foreach($tmoney as $tt)
				  {
					$tdata = array(
					           'nid'=>$nid,
							   'tmoney'=>$tmoney[$i],
							   'amount'=>$amount[$i],
							   'betting_year'=>$betting_year[$i],
							   'betting_day'=>$betting_day[$i],
							   'betting_date'=>$betting_date[$i],
							   'lcarry'=>$betting_date[$i]
							  );
					$i++;
					 $this->cmodel->insert('transactions',$tdata);
				  }
	 
	    } 
		redirect(base_url('investor'));
		}
		else
		{
            $this->deletebeforeupdateInvestor($this->input->post('id'));
			
			$where = array('id'=>$this->input->post('id'));
            $data = array('uname'=>$this->input->post('uname'),
						  'target'=>$this->input->post('target'),
						  'notes'=>$this->input->post('notes'),
						  'fina_form'=>$this->input->post('finaform'),
						  'capvalue'=>$this->input->post('capvalue'),
     					  'user_type'=>'investor'
						  );
			$this->cmodel->update_where('investor',$where,$data);
			
			$sid=$this->input->post('sid');
  			$splitpc=$this->input->post('splitpc');
			$splitdate=$this->input->post('splitdate');
			$tmoney=$this->input->post('tmoney');
			$amount=$this->input->post('amount');
			$betting_year=$this->input->post('betting_year');
			$betting_day=$this->input->post('betting_day');
			$betting_date=$this->input->post('betting_date');
			$lcarry=$this->input->post('lcarry');

			
			    $i = 0;
				if(count($splitpc)>0)
				{
				foreach($splitpc as $ss)
				{
					 $sdata = array(
					 'nid'=>$this->input->post('id'),
					 'sid'=>$sid[$i],
					 'splitpc'=>$splitpc[$i],
					 'splitdate'=>$splitdate[$i]);
					  $this->cmodel->insert('split',$sdata);
					  $i++;
				}
				}
				$j= 0;
				 if(count($betting_year)>0)
				   {
				 foreach($betting_year as $tt)
				  {
					$tdata = array(
					            'nid'=>$this->input->post('id'),
							    'tmoney'=>$tmoney[$j],
							    'amount'=>$amount[$j],
							    'betting_year'=>$betting_year[$j],
							    'betting_day'=>$betting_day[$j],
							    'betting_date'=>$betting_date[$j],
							    'lcarry'=>$betting_date[$j]
							  );
					 $this->cmodel->insert('transactions',$tdata);
					 $j++;
				  } 
				 }
		redirect(base_url('investor')); 
		}
       }
	    public function editInvestor()
	     {
		 $where2 = array('user_type'=>'investor');   
		 $data['countrows'] = $this->cmodel->count_where('investor',$where2);
		 $data['result'] = $this->cmodel->select('investor');
		 $where = array('id'=>$this->uri->segment(4));
		 $data['resultn'] = $this->cmodel->select_single_where('investor',$where);
    	 $where3 = array('nid'=>$this->uri->segment(4));
		 $order_by = "`sid` ASC";
    	 $data['results'] = $this->cmodel->select_where_orderby('split',$where3,$order_by);
		 $data['resultt'] = $this->cmodel->select_where('transactions',$where3);
		 $data['content'] = 'investorview';
		 $this->load->view('template',$data);
	      }
 public function deleteInvestor()
	   {
		 $where = array('id'=>$this->uri->segment(4));
		 $this->cmodel->delete_where('investor',$where);
		 $where2 = array('nid'=>$this->uri->segment(4));
		 $this->cmodel->delete_where('split',$where2);
		 $this->cmodel->delete_where('transactions',$where2);
		 redirect(base_url('investor'));
	   }
	   
public function deletebeforeupdateInvestor($id)
	   {
		 $where = array('nid'=>$id);
		 $this->cmodel->delete_where('split',$where);
		 $this->cmodel->delete_where('transactions',$where);
		// redirect(base_url('investor'));
	   }
	   
	   
	   public function fetchbetData()
	    {
		  $bet_day = trim($this->input->post('id')); 
		  $where = array('bet_day'=>$bet_day);
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

  }
?>