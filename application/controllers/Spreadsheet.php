<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');
 class Spreadsheet extends CI_Controller
  {
		public function __construct()
		{
		  parent::__construct();
		  $this->load->model('Common_model','cmodel');
		}
		public function index()
		  {
			if($this->session->has_userdata('spreadid'))
			{
			$year		=	 date('Y');
			$nid	   =	 $this->session->userdata['spreadid']['id'];;	
			$s_query   =	"Select * from `transactions` where `betting_year`='".$year."' AND `nid`='".$nid."' order by id asc limit 1";
 			$result_t    =	 $this->db->query($s_query)->result();
			
			$c_query   =     "Select * from betgame where `bet_day`>='".$result_t[0]->betting_day."' order by bet_day asc ";
			$result    =	 $this->db->query($c_query)->result();
			
			$arrayss	   =	 array();
			$investor_ending_bankroll	=	'';
			$investor_loss	=	'';
			$loss_imbursement	=''; 
			$loss_carry_forward	=	0;
			$loss_carry_forwards	=	'';
			$investor_split		= '100%';
			$investor_loss_total	=	0;	
			foreach($result as $value){
			 $bet_yr	=	date('y',strtotime($value->year)).'-'.$value->bet_day;
			 $where_transact  =   array('nid'=>$nid,'betting_day'=>$value->bet_day,'betting_year'=>$value->year);		
			 $transact  =   $this->cmodel->select_single_where('transactions',$where_transact);
			 /* echo $this->db->last_query(); */
			 if($transact['tmoney']=='IN'){
					$cash_in	=		str_replace('+','',$transact['amount']);
			 }elseif($transact['tmoney']=='OUT'){
					$cash_in	=		'-'.str_replace('-','',$transact['amount']);
			 }else{
					$cash_in	=		'';
			 }
			 if($investor_ending_bankroll==''){
				$investor_staring	=	$cash_in;
			 }else{
				 $investor_staring	=	$investor_ending_bankroll;
				
				 if($cash_in!=''){
					if($transact['tmoney']=='IN'){
						$investor_staring	=	$investor_staring+$cash_in;
					}elseif($transact['tmoney']=='OUT'){
					
						$investor_staring	=	$investor_staring-str_replace('-','',$transact['amount']);
						
					}else{
						$investor_staring	=	$investor_ending_bankroll;
					}
				}
			 }
			 $date					=	date('M d',strtotime($value->bet_year));
			 $date_year					=	date('Y',strtotime($value->bet_year));
			 $day_of_week			=	$value->day;
			 $sport					=	$value->league;
			 $where_finance     	=   array('fbet_year'=>$value->year,'fbet_day'=>$value->bet_day);		
			 $financial  			=   $this->cmodel->select_single_where('financial',$where_finance);
			 if(is_array($financial)){
			 $gross_profit_percent	=	str_replace('%','',$financial['gp_profit_bet']);
			 }else{
			 $gross_profit_percent	=	'0';
			 }
			 
			 $gross_profit			=	round($investor_staring*($gross_profit_percent/100));
			 if($gross_profit_percent>0){
				 $investor_loss	=	'';
			 }else{
				 $investor_loss	=	$gross_profit;
			 }
			 if($investor_loss<0){
					$loss_carry_forward	=	$investor_loss+$loss_carry_forward;
			}else{
				 if($loss_carry_forward<0){
					$loss_carry_forward	=	$loss_carry_forward+$gross_profit;
					}else{
					$loss_carry_forward	=	''; 
					
				 }
			 }
			 if($loss_carry_forward<0){
				 $loss_carry_forwards	=	$loss_carry_forward;
				 if($gross_profit>$loss_carry_forwards){
					 if($gross_profit>0){
						$loss_imbursement	=	$gross_profit;
					 }else{
						 $loss_imbursement	=	'';
					 }
				 }else{
					$loss_imbursement		=	''; 
				 }
			 }else{
				 $loss_carry_forwards	=	'';
				 if($loss_carry_forward!=''){
				  $newimbursement		=	$gross_profit-$loss_carry_forward;
				  if( $newimbursement>0){
				   $loss_imbursement		=	$newimbursement;
				   $loss_carry_forward		=0;
				  }else{
				   $loss_imbursement		=	'';
				  }
				  }else{
				  $loss_imbursement		=	'';
				  }
				 
			 }
			 if($loss_carry_forwards<0){
				  $investor_split_profit	=	0;
			 }else{
				 if($loss_carry_forward!=''){
				 $investor_split_profit	=	$loss_carry_forward; 
				 }else{
				  $investor_split_profit	=	$gross_profit;  
				 }
			 }
			
			 $investor_cash_flow		=	$gross_profit;	
			 $investor_ending_bankroll	=	$investor_cash_flow+$investor_staring;
			 $array['bet_yr']				=	$bet_yr;
			 $array['cash_in']				=	$cash_in;
			 $array['investor_staring']			=	$investor_staring;
			 $array['date']						=	$date;
			 $array['day_of_week']				=	$day_of_week;
			 $array['sport']					=	$sport;
			 $array['gross_profit_percent']		=	$gross_profit_percent.'%';
			 $array['gross_profit']				=	$gross_profit;
			 $array['investor_loss']			=	$investor_loss;
			 $array['loss_imbursement']			=	$loss_imbursement;
			 $array['loss_carry_forward']		=	$loss_carry_forwards;
			 $array['investor_split']			=	$investor_split;
			 $array['investor_split_profit']	=	$investor_split_profit;
			 $array['investor_cash_flow']		=	$investor_cash_flow;
			 $array['investor_ending_bankroll']	=	$investor_ending_bankroll;
			 $array['date_year']				=	$date_year;
			 $arrayss[]	=	$array;
			}
			/* echo '<pre>';print_R($arrayss); echo '</pre>';
			die; */
			
			
			$c_queryx = "Select * from split WHERE nid=".$nid." order by id desc limit 1";
			$resultx = $this->db->query($c_queryx)->result(); 
			
			/* array_reverse($arrayss); */
			$data['arrayss'] = array_reverse($arrayss);
 			$data['resultx'] = $resultx;
 			
			$this->load->view('spreadsheetview',$data);
			}else{
				 redirect(base_url('spreadlogin/logout'));
			}
			
/* 			echo '<pre>';print_R($result);echo'</pre>';
 */			/* $url = $this->uri->segment(3);
			$where =  array('splash_url'=>$url);
			if(isset($url) && !empty($url))
			  {
				$data['result'] = $this->cmodel->select_single_where('register',$where);
				$this->load->view('splashview',$data);	
				if(count($data['result'])>0)
				{
				 $this->load->view('splashview',$data);	
				}
				else
				{
					$data['nourl_defined'] = 'No Network Found';
					$this->load->view('splashview',$data);	
				}
			  } */
		  }
		  
		  function investors(){
			   
			  $where = array('user_type'=>'investor');   
			  $data['countrows'] = $this->cmodel->count_where('investor',$where);
			 $data['result'] = $this->cmodel->select('investor');
		     $data['content'] = 'spreadinvestor';
		    $this->load->view('template',$data);
		  }
		   function showspreadsheet(){
			   if($this->session->has_userdata('logged_in')){
			 $year		=	 date('Y');
			$nid	   =	 $this->uri->segment(3);
			 $s_query   =	"Select * from `transactions` where `betting_year`='".$year."' AND `nid`='".$nid."' order by id asc limit 1";
 			$result_t    =	 $this->db->query($s_query)->result();
			
			$c_query   =     "Select * from betgame where `bet_day`>='".$result_t[0]->betting_day."' order by bet_day asc ";
			$result    =	 $this->db->query($c_query)->result();
			
			$arrayss	   =	 array();
			$investor_ending_bankroll	=	'';
			$investor_loss	=	'';
			$loss_imbursement	=''; 
			$loss_carry_forward	=	0;
			$loss_carry_forwards	=	'';
			$investor_split		= '100%';
			$investor_loss_total	=	0;	
			foreach($result as $value){
			 $bet_yr	=	date('y',strtotime($value->year)).'-'.$value->bet_day;
			 $where_transact  =   array('nid'=>$nid,'betting_day'=>$value->bet_day,'betting_year'=>$value->year);		
			 $transact  =   $this->cmodel->select_single_where('transactions',$where_transact);
			 /* echo $this->db->last_query(); */
			 if($transact['tmoney']=='IN'){
					$cash_in	=		str_replace('+','',$transact['amount']);
			 }elseif($transact['tmoney']=='OUT'){
					$cash_in	=		'-'.str_replace('-','',$transact['amount']);
			 }else{
					$cash_in	=		'';
			 }
			 if($investor_ending_bankroll==''){
				$investor_staring	=	$cash_in;
			 }else{
				 $investor_staring	=	$investor_ending_bankroll;
				
				 if($cash_in!=''){
					if($transact['tmoney']=='IN'){
						$investor_staring	=	$investor_staring+$cash_in;
					}elseif($transact['tmoney']=='OUT'){
					
						$investor_staring	=	$investor_staring-str_replace('-','',$transact['amount']);
						
					}else{
						$investor_staring	=	$investor_ending_bankroll;
					}
				}
			 }
			 $date					=	date('M d',strtotime($value->bet_year));
			 $date_year					=	date('Y',strtotime($value->bet_year));
			 $day_of_week			=	$value->day;
			 $sport					=	$value->league;
			 $where_finance     	=   array('fbet_year'=>$value->year,'fbet_day'=>$value->bet_day);		
			 $financial  			=   $this->cmodel->select_single_where('financial',$where_finance);
			 if(is_array($financial)){
			 $gross_profit_percent	=	str_replace('%','',$financial['gp_profit_bet']);
			 }else{
			 $gross_profit_percent	=	'0';
			 }
			 
			 $gross_profit			=	round($investor_staring*($gross_profit_percent/100));
			 if($gross_profit_percent>0){
				 $investor_loss	=	'';
			 }else{
				 $investor_loss	=	$gross_profit;
			 }
			 if($investor_loss<0){
					$loss_carry_forward	=	$investor_loss+$loss_carry_forward;
			}else{
				 if($loss_carry_forward<0){
					$loss_carry_forward	=	$loss_carry_forward+$gross_profit;
					}else{
					$loss_carry_forward	=	''; 
					
				 }
			 }
			 if($loss_carry_forward<0){
				 $loss_carry_forwards	=	$loss_carry_forward;
				 if($gross_profit>$loss_carry_forwards){
					 if($gross_profit>0){
						$loss_imbursement	=	$gross_profit;
					 }else{
						 $loss_imbursement	=	'';
					 }
				 }else{
					$loss_imbursement		=	''; 
				 }
			 }else{
				 $loss_carry_forwards	=	'';
				 if($loss_carry_forward!=''){
				  $newimbursement		=	$gross_profit-$loss_carry_forward;
				  if( $newimbursement>0){
				   $loss_imbursement		=	$newimbursement;
				   $loss_carry_forward		=0;
				  }else{
				   $loss_imbursement		=	'';
				  }
				  }else{
				  $loss_imbursement		=	'';
				  }
				 
			 }
			 if($loss_carry_forwards<0){
				  $investor_split_profit	=	0;
			 }else{
				 if($loss_carry_forward!=''){
				 $investor_split_profit	=	$loss_carry_forward; 
				 }else{
				  $investor_split_profit	=	$gross_profit;  
				 }
			 }
			
			 $investor_cash_flow		=	$gross_profit;	
			 $investor_ending_bankroll	=	$investor_cash_flow+$investor_staring;
			 $array['bet_yr']				=	$bet_yr;
			 $array['cash_in']				=	$cash_in;
			 $array['investor_staring']			=	$investor_staring;
			 $array['date']						=	$date;
			 $array['day_of_week']				=	$day_of_week;
			 $array['sport']					=	$sport;
			 $array['gross_profit_percent']		=	$gross_profit_percent.'%';
			 $array['gross_profit']				=	$gross_profit;
			 $array['investor_loss']			=	$investor_loss;
			 $array['loss_imbursement']			=	$loss_imbursement;
			 $array['loss_carry_forward']		=	$loss_carry_forwards;
			 $array['investor_split']			=	$investor_split;
			 $array['investor_split_profit']	=	$investor_split_profit;
			 $array['investor_cash_flow']		=	$investor_cash_flow;
			 $array['investor_ending_bankroll']	=	$investor_ending_bankroll;
			 $array['date_year']				=	$date_year;
			 $arrayss[]	=	$array;
			}
			/* echo '<pre>';print_R($arrayss); echo '</pre>';
			die; */
			
			
			$c_queryx = "Select * from split WHERE nid=".$nid." order by id desc limit 1";
			$resultx = $this->db->query($c_queryx)->result(); 
			
			/* array_reverse($arrayss); */
			$data['arrayss'] = array_reverse($arrayss);
 			$data['resultx'] = $resultx;
 			
			$this->load->view('spreadsheetview',$data);
			   }else{
				   redirect(base_url('adminlogin'));
			   }
		  }
		  
}
?>