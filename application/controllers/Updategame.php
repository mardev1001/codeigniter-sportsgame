<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');
 class Updategame extends CI_Controller
  {
	   public function __construct()
	   {
		  parent::__construct();
		  $this->load->model('Common_model','cmodel');
	   }
	 public function index()
	   {
		   $today	=	date('Y-m-d');
		$data['gresult'] = $this->cmodel->select_single_where('betgame',array('bet_year'=>$today));
		$bet_day_r	= $data['gresult']['bet_day'];
/* 		echo '<pre>';print_R($data['gresult']);echo'</pre>';
 */		/* $where = array('game_date'=>date('Y-m-d')); */
		$where = '`in_progress` = "Yes"';
		$data['result'] = $this->cmodel->select_where('game',array('in_progress'=>'yes','bet_day'=>$bet_day_r));
		$data['content'] = 'updategameview';
		$this->load->view('template',$data);
       }
	   public function editData()
	   {
		 $data['gresult'] = $this->cmodel->select('betgame');
		 $where = array('game_date'=>date('Y-m-d'));
		 $data['result'] = $this->cmodel->select_where('game',$where);
		 $id = $this->uri->segment(4);
		 $where2 = array('id'=>$id);
		 $data['eresult'] = $this->cmodel->select_single_where('game',$where2);
		 $data['content'] = 'updategameview';
		 $this->load->view('template',$data);
		 
       }
	   public function updateData()
	   {
		           $where = array('id'=>$this->input->post('id'));
				   $time = explode(':',$this->input->post('time_left'));
      			   $time_left = $time[0];
				   $sec_left = $time[1];
			       $data = array('game_id'=>$this->input->post('game_id'),
		                  'bet_year'=>$this->input->post('bet_year'),
						  'bet_day'=>$this->input->post('bet_day'),
						  'day'=>$this->input->post('day'),
						  /* 'current_date'=>date('d',strtotime($this->input->post('day'))), */
						  'game_date'=>$this->input->post('game_date'),
						  'game_time'=>$this->input->post('game_time'),
						  'league'=>$this->input->post('league'),
						  'home_team'=>$this->input->post('home_teamval'),
						  'home_teamtext'=>$this->input->post('home_teamtext'),
						  'away_team'=>$this->input->post('away_teamval'),
						  'away_teamtext'=>$this->input->post('away_teamtext'),
						  'our_pickvalue'=>$this->input->post('our_pickval'),
						  'our_picktext'=>$this->input->post('our_picktext'),
						  /* 'our_pick'=>$this->input->post('our_pick'), */
						  'bet_type'=>$this->input->post('bet_type'),
						  'bet_value'=>$this->input->post('bet_value'),
						  'excals'=>$this->input->post('excals'),
						  'in_progress'=>$this->input->post('in_progress'),
						  'game_result'=>$this->input->post('game_result'),
						  'our_pick_score'=>$this->input->post('our_pick_score'),
						  'period'=>$this->input->post('period'),
						  'opp_score'=>$this->input->post('opp_score'),
						  'time_left'=>$time_left,
						  'sec_left'=>$sec_left,
							 );
							/* echo '<pre>';
							 print_r($data);
							 echo'</pre>';
							 die(); */
		     $this->cmodel->update_where('game',$where,$data);
		     redirect(base_url('updategame'));
		 
       }
	    public function updategame()
	   {
		 $where = array('id'=>$this->input->post('game_id'));
		       			     $data['eresult'] = $this->cmodel->select_single_where('game',$where);

		  if( $data['eresult']['in_progress']=='no' && $_POST['inprogress']=='yes'){
						 $_POST['results']	=	'';
			 }
		 if(isset($_POST['results'])){
			 $result	=	$_POST['results'];
		 }else{
			 $result	=	'';
		 }if(isset($_POST['inprogress'])){
			 $in_progress	=	$_POST['inprogress'];
		 }else{
			 $in_progress	=	'';
		 }if($result!=''){
							$in_progress	=	'no';
						}
		          
				   $data = array(
						  'period'=>$this->input->post('period'),
						  'time_left'=>$this->input->post('time_left'),
						  'sec_left'=>$this->input->post('sec_left'),
						  'in_progress'=>$in_progress,
						  'game_result'=>$result,
						  'our_pick_score'=>$this->input->post('our_pick'),
						  'opp_score'=>$this->input->post('opponent_score'),
						  );
					$this->cmodel->update_where('game',$where,$data);
					redirect(base_url('updategame'));
		 
       }
		

  }
?>