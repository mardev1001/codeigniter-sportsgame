<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');
 class Gamers extends CI_Controller
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
		/* $select = 'COUNT(bet_day)'; */
		 $where = '`bet_day`= "'.$data['betdata']['bet_day'].'"';
		$data['countrows'] = $this->cmodel->select_where('game',$where);
	
		$order_by = '`bet_day` DESC';
		$data['gresult'] = $this->cmodel->select_orderby('betgame',$order_by);
		$current_year = '`bet_day` =  "'.$data['betdata']['bet_day'].'" order by `id` desc';
        $data['result'] = $this->cmodel->select_where('game',$current_year);
		 /* echo $this->db->last_query();  */
		$data['content'] = 'gameview';
		$this->load->view('template',$data);
		} 
		
		public function saveGamers()
		  {
            $id = trim($this->input->post('id'));
			if(empty($id))
		     { 
			$where = array('game_id'=>$this->input->post('game_id'));
			$result = $this->cmodel->select_single_where('game',$where);
			if(count($result)>0)
			{
				$this->session->set_flashdata('gameid_exist','Game Id Already Exists');
				redirect(base_url('gamers'));
			}
			else{
				
				
				
				
				$game_id	=	$this->input->post('game_id');
				$game_time = strtotime(str_replace(' ','',$this->input->post('game_time')));
				$game_time	=	 date('H:i:s',$game_time);
/* 				
 */				$mountain_time	= strtotime(str_replace(' ','',$this->input->post('game_time')))+3600; 
				$central_time	= strtotime(str_replace(' ','',$this->input->post('game_time')))+7200; 
				$eastern_time	= strtotime(str_replace(' ','',$this->input->post('game_time')))+180*60;
				 $mountain_time = date("H:i:s", $mountain_time); 
				 $central_time = date("H:i:s", $central_time);  
				 $eastern_time = date("H:i:s", $eastern_time); 
			    $data = array('game_id'=>$game_id,
		                  'bet_year'=>$this->input->post('bet_year'),
						  'bet_day'=>$this->input->post('bet_day'),
						  'day'=>$this->input->post('day'),
						  'current_date'=>date('d',strtotime($this->input->post('day'))),
						  'game_date'=>$this->input->post('game_date'),
						  'game_time'=>$game_time,
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
						  'game_time_eastern'=>$eastern_time,
						  'game_time_central'=>$central_time,
						  'game_time_mountain'=>$mountain_time,
						);
						/* echo '<pre>';print_R($data);die; */
						
		   $last_id		= $this->cmodel->insert('game',$data);
		   if($game_id=='New'){
			$data_new = array('game_id'=>$last_id);
			$where_new = array('id'=>$last_id); 
			$this->cmodel->update_where('game',$where_new,$data_new);
		  }
		  redirect(base_url('gamers'));
		  }}
		  else
		     {
				 
				  $old_game_id =$this->input->post('old_game_id');
				  $new_game_id =$this->input->post('game_id');
				   
				   if($new_game_id!=$old_game_id)
				   {
					  $where = array('game_id'=>$new_game_id);
				      $result = $this->cmodel->select_single_where('game',$where);
					  if(count($result)>0)
					  {
						  $this->session->set_flashdata('gameid_exists','Game Id Already Exists');
				          redirect(base_url('gamers'));
					  }
					  else
					  {
				   $where = array('id'=>$this->input->post('id'));
				   $game_time = strtotime(str_replace(' ','',$this->input->post('game_time')));
				$game_time	=	 date('H:i:s',$game_time);
				   $mountain_time	= strtotime(str_replace(' ','',$this->input->post('game_time')))+3600; 
				$central_time	= strtotime(str_replace(' ','',$this->input->post('game_time')))+7200; 
				$eastern_time	= strtotime(str_replace(' ','',$this->input->post('game_time')))+180*60;
				 $mountain_time = date("H:i:s", $mountain_time); 
				 $central_time = date("H:i:s", $central_time);  
				 $eastern_time = date("H:i:s", $eastern_time); 
			       $data = array('game_id'=>$new_game_id,
		                  'bet_year'=>$this->input->post('bet_year'),
						  'bet_day'=>$this->input->post('bet_day'),
						  'day'=>$this->input->post('day'),
						  'current_date'=>date('d',strtotime($this->input->post('day'))),
						  'game_date'=>$this->input->post('game_date'),
						  'game_time'=>$game_time,
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
						   'game_time_eastern'=>$eastern_time,
						  'game_time_central'=>$central_time,
						  'game_time_mountain'=>$mountain_time,
						  
							 );
							

		     $this->cmodel->update_where('game',$where,$data);
		     redirect(base_url('gamers'));  
						  
					  }
					  
				   }
				   else{
					 $where = array('id'=>$this->input->post('id'));
					 $game_time = strtotime(str_replace(' ','',$this->input->post('game_time')));
				$game_time	=	 date('H:i:s',$game_time);
				       $mountain_time	= strtotime(str_replace(' ','',$this->input->post('game_time')))+3600; 
				$central_time	= strtotime(str_replace(' ','',$this->input->post('game_time')))+7200; 
				$eastern_time	= strtotime(str_replace(' ','',$this->input->post('game_time')))+180*60;
				 $mountain_time = date("H:i:s", $mountain_time); 
				 $central_time = date("H:i:s", $central_time);  
				 $eastern_time = date("H:i:s", $eastern_time); 
			         $data = array('game_id'=>$old_game_id,
		                  'bet_year'=>$this->input->post('bet_year'),
						  'bet_day'=>$this->input->post('bet_day'),
						  'day'=>$this->input->post('day'),
						  'current_date'=>date('d',strtotime($this->input->post('day'))),
						  'game_date'=>$this->input->post('game_date'),
						  'game_time'=>$game_time,
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
						   'game_time_eastern'=>$eastern_time,
						  'game_time_central'=>$central_time,
						  'game_time_mountain'=>$mountain_time,
						  
							 );
	         $this->cmodel->update_where('game',$where,$data);
		     redirect(base_url('gamers'));  
 			   }
		 }
			
		}
		
		public function updategamers(){
					$id	=	$this->input->post('id');
					$result_show	=	 $this->input->post('result_show');
					$where = array('id'=>$id);
					if($this->input->post('time_left')!=':' && $this->input->post('time_left')!=''){
				     $time = explode(':',$this->input->post('time_left'));
					 if(is_array($time)){
					 $time_left = $time[0];
				     $sec_left = $time[1];
					 }elsE{
					 $time_left = '';
				     $sec_left = '';
					 }
					}else{
						 $time_left = '';
				     $sec_left = '';
					}
					/* echo '<pre>';print_R($_POST); */
					$period	=	 $this->input->post('period');
					$our_pick_score	=	 $this->input->post('our_pick_score');
					$opp_score	=	 $this->input->post('opp_score');
					$period	=	 $this->input->post('period');
					 $where = array('id'=>$id);
      			     $data['eresult'] = $this->cmodel->select_single_where('game',$where);
					 if($result_show=='Entered' && $_POST['in_progress']=='yes' && $this->input->post('our_pick_score')=='' && $this->input->post('opp_score')=='' && ($this->input->post('time_left')==':' || $this->input->post('time_left')=='') && !isset($_POST['game_result'])){
						$our_pick_score	= '0';
						$opp_score		= '0';
						if($data['eresult']['league']=='nbasketball'){
							$period	=	'1';
							$time_left	=	'20';
							$sec_left	=	'00';
						}if($data['eresult']['league']=='nfootball'){
							$period	=	'1';
							$time_left	=	'15';
							$sec_left	=	'00';
						}if($data['eresult']['league']=='nfl'){
							$period	=	'1';
							$time_left	=	'15';
							$sec_left	=	'00';
						}if($data['eresult']['league']=='nba'){
							$period	=	'1';
							$time_left	=	'';
							$sec_left	=	'';
						}if($data['eresult']['league']=='mlb'){
							$period	=	'1';
							$time_left	=	'';
							$sec_left	=	'';
						}
					}
					 if( $data['eresult']['in_progress']=='no' && $_POST['in_progress']=='yes'){
						 $_POST['game_result']	=	'';
					 }
					 if(isset($_POST['in_progress'])){
						$in_progress	=	$_POST['in_progress'];
					 }elsE{
						$in_progress	=	'';
					 }
					  if(isset($_POST['game_result'])){
						$game_result	=	$_POST['game_result'];
					 }elsE{
						$game_result	=	''; 
					 }
						if($game_result!=''){
							$in_progress	=	'no';
						}
			         $data = array(
						  'in_progress'=>$in_progress,
						  'game_result'=>$game_result,
						  'our_pick_score'=>$our_pick_score,
						  'period'=>$period,
						  'opp_score'=>$opp_score,
						  'time_left'=>$time_left,
						  'sec_left'=>$sec_left,
							 );
	         $this->cmodel->update_where('game',$where,$data);
			
		     redirect(base_url('gamers/editGamers/id/'.$id.''));  
		
		}
		
		public function editGamers()
		  {
			$where2 = array('user_type'=>'investor');   
			$id = $this->uri->segment(4);
			$where = array('id'=>$id);
			$data['eresult'] = $this->cmodel->select_single_where('game',$where);
			/* $limit = 1;
			$orderby = '`bet_day` DESC'; */
			$data['betdata'] = $data['eresult']; 
			/* $select = 'COUNT(bet_day)'; */
			$where = '`bet_day`= "'.$data['eresult']['bet_day'].'"';
			$data['countrows'] = $this->cmodel->select_where('game',$where);
		    /* $select = 'COUNT(bet_day)';
		    $data['countrows'] = $this->cmodel->selelct_countbet('game',$select); */
		    $order_by = '`bet_day` DESC';
		    $data['gresult'] = $this->cmodel->select_orderby('betgame',$order_by);
			
            $current_year = '`bet_day`= "'.$data['eresult']['bet_day'].'"';
            $data['result'] = $this->cmodel->select_where('game',$current_year);
			
			
			
			$data['content'] = 'gameview';
		    $this->load->view('template',$data);
 		  }
	  
	   public function fetchbetData()
	    {
		   $where = array('bet_day'=>trim($this->input->post('id')));
		   $results =  $this->cmodel->select_where('betgame',$where);
		   if(count($results)>0)
		   {
			 foreach($results as $row)
			 {
				 $data['success']= array('bet_year'=>$row['bet_year'],
				                         'day'=>$row['day']);
			 }
		   }
		   else
		   {
			   $data['nobetday'] = 'There is no Bet Day set up';
		   }
		    $current_year = '`bet_day` =  "'.trim($this->input->post('id')).'"';
			$result = $this->cmodel->select_where('game',$current_year);
			$html=	'';
			if(is_array($result) && count($result)>0){ $new_data	= count($result);}else { $new_data	= '0';}
			$html=	'<h2 style="text-align:center">Bet Day:&nbsp;'.trim($this->input->post('id')).'&nbsp;&nbsp;&nbsp;&nbsp;Picks:&nbsp;'.$new_data.'&nbsp;&nbsp;&nbsp;&nbsp; 
			<button class="btn btn-primary btn-modify getnextyear" style="width:20%;background-color:#1bbae1;">Show All Picks</button>	
			</h2>';
		if(is_array($result) && count($result)>0){
		$html .='<div style="width:830px; height:600px;overflow-y: scroll; margin-left: auto; margin-right: auto;">
			<table  class="table table-vcenter table-responsive table-condensed  table_modify">
                <thead>
                    <tr>
                        <td class="text-center"></td> 
                        <td class="text-center">In Progress</td>
                        <td>Bet Year</td>
                        <td>Bet Day</td>
						<!--td>Day</td-->
						<td>Game Date</td>
						<td>Game Time</td>
						<td>Game ID</td>
						<td>League</td>
						<td>Our Pick</td>
						<td>Opponent</td>
						<td>Result</td>
                     </tr>
                </thead>
                    <tbody class="loadmoredata">';
					
					$i=1;
					foreach($result as $row)
					{
						if($row['our_pickvalue']==$row['home_team']){
							$opponent_text	=	$row['away_teamtext'];
						}else{
							$opponent_text	=	$row['home_teamtext'];
						}
						switch($row['league']){
							case 'nbasketball':
								$league = 'NCAAB';
							break;	
							case 'nfootball':
								$league = 'NCAAF';
							break;
							case 'nfl':
								$league = 'NFL';
							break;
							case 'nba':
								$league = 'NBA';
							break;
							case 'mlb':
								$league = 'MLB';
							break;
							default:
							break;
						} $rtt	= null;	
						if(($row['game_result']==null || $row['game_result']=='') && $row['in_progress']=='no') { $rtt	= 'Entered'; /* die('xx'); */ } else if($row['game_result']==null && $row['in_progress']=='yes') { $rtt	= 'In Progress'; } else{ $rtt	= $row['game_result']; }
					$html .='<tr>
					<td><a href="'.base_url('gamers/editGamers/id/'.$row['id']).'" data-toggle="tooltip" title="" data-id="'.$row['id'].'" class="btn btn-default big_btn" data-original-title="Edit">Edit</a></td>
						<td class="text-center">'.ucfirst($row['in_progress']).'</td>
						<td>'.$row['bet_year'].'</td>
						<td>'.$row['bet_day'].'</td>
						<td>'.$row['game_date'].'</td>
						
						<td>'.date('h : i A',strtotime($row['game_time'])).'</td>
						<td>'.$row['game_id'].'</td>
						<td>'.$league.'</td>
						<td>'.$row['our_picktext'].'</td>
						<td>'.$opponent_text.'</td>
						<td>'.$rtt.'</td>
					</tr>';
					
					 }						
					
					$html .='</tbody>
					
					</table>
					</div>';
		} 
			$data['html']	=	$html;
		   echo json_encode($data);
	    }
		public function getNextYear()
		   {
			/*  $where = array('bet_day'=>trim($this->input->post('id')));
		   $results =  $this->cmodel->select_where('betgame',$where);
		   if(count($results)>0)
		   {
			 foreach($results as $row)
			 {
				 $data['success']= array('bet_year'=>$row['bet_year'],
				                         'day'=>$row['day']);
			 }
		   }
		   else
		   {
			   $data['nobetday'] = 'There is no Bet Day set up';
		   } */
		    $order_by = '`id` DESC';
			$result = $this->cmodel->select_orderby('game',$order_by);
			$html=	'';
			if(is_array($result) && count($result)>0){ $new_data	= count($result);}else { $new_data	= '0';}
			$html=	'<h2 style="text-align:center">Total Picks:&nbsp;'.$new_data.'&nbsp;&nbsp;&nbsp;&nbsp;
			<button class="btn btn-primary btn-modify getnextyear" style="width:20%;background-color:#1bbae1;">Show All Picks</button>	
			</h2>';
		if(is_array($result) && count($result)>0){
		$html .='<div style="width:830px; height:600px;overflow-y: scroll; margin-left: auto; margin-right: auto;">
			<table  class="table table-vcenter table-responsive table-condensed  table_modify">
                <thead>
                    <tr>
                       <td class="text-center"></td> 
                        <td class="text-center">In Progress</td>
                        <td>Bet Year</td>
                        <td>Bet Day</td>
						<!--td>Day</td-->
						<td>Game Date</td>
						<td>Game Time</td>
						<td>Game ID</td>
						<td>League</td>
						<td>Our Pick</td>
						<td>Opponent</td>
						<td>Result</td>
                     </tr>
                </thead>
                    <tbody class="loadmoredata">';
					
					$i=1;
					foreach($result as $row)
					{
						if($row['our_pickvalue']==$row['home_team']){
							$opponent_text	=	$row['away_teamtext'];
						}else{
							$opponent_text	=	$row['home_teamtext'];
						}
						switch($row['league']){
							case 'nbasketball':
								$league = 'NCAAB';
							break;	
							case 'nfootball':
								$league = 'NCAAF';
							break;
							case 'nfl':
								$league = 'NFL';
							break;
							case 'nba':
								$league = 'NBA';
							break;
							case 'mlb':
								$league = 'MLB';
							break;
							default:
							break;
						}
						if(($row['game_result']==null || $row['game_result']=='') && $row['in_progress']=='no') { $rtt	= 'Entered'; /* die('xx'); */ } else if($row['game_result']==null && $row['in_progress']=='yes') { $rtt	= 'In Progress'; } else{ $rtt	= $row['game_result']; }
					$html .='<tr>
					<td><a href="'.base_url('gamers/editGamers/id/'.$row['id']).'" data-toggle="tooltip" title="" data-id="'.$row['id'].'" class="btn btn-default big_btn" data-original-title="Edit">Edit</a></td>
						<td class="text-center">'.ucfirst($row['in_progress']).'</td>
						<td>'.$row['bet_year'].'</td>
						<td>'.$row['bet_day'].'</td>
						<td>'.$row['game_date'].'</td>
						<td>'.date('h : i A',strtotime($row['game_time'])).'</td>
						<td>'.$row['game_id'].'</td>
						<td>'.$league.'</td>
						<td>'.$row['our_picktext'].'</td>
						<td>'.$opponent_text.'</td>
						<td>'.$rtt.'</td>
					</tr>';
					
					 }						
					
					$html .='</tbody>
					
					</table>
					</div>';
		} 
			$data['html']	=	$html;
		   echo json_encode($data);
			
		}
		public function deleteGames()
		{
			$id = $this->uri->segment(4);
			$where = array('id'=>$id);
			$this->cmodel->delete_where('game',$where);
			redirect(base_url('gamers'));
		}
  
  }
?>