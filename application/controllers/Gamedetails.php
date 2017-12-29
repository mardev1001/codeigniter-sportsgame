<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Gamedetails extends CI_Controller
{
	public function __construct()
	{
	  parent::__construct();
	  $this->load->model('Common_model','cmodel');
	}
	public function index($select_timezone='p')
	{
		if($this->session->has_userdata('networkid'))
		{
			$data['sess_data'] = $this->session->userdata('networkid');
			$bet_where = array('bet_year'=>date('Y-m-d'));
			$check_current_date  = $this->cmodel->select_single_where('betgame',$bet_where);
			
		  	if(is_array($check_current_date) && !empty($check_current_date))
		 	{
 			    $data['bet_details']  = $check_current_date;
                $date = $check_current_date['bet_year'];
			    $bet_day	=	$check_current_date['bet_day'];
				$s__t   =	"Select `game_time` from `game` where `bet_day`='".$bet_day."'  order by `game_time` asc limit 1";
				$result_tt    =	 $this->db->query($s__t)->row_array();
				/*  echo '<pre>';print_R($result_t); echo '</pre>'; */
				$data['bet_details']['timess']	=	 $result_tt['game_time'];
			    switch($select_timezone){
					case 'p':
						$datenow = new DateTime('now', new DateTimeZone('America/Los_Angeles') );
						$curr_time = $datenow->format('H:i:s');
						$where_clause	=	'bet_day="'.$bet_day.'" AND in_progress="yes" AND game_time<= CAST("'.$curr_time.'" as time)';
					break;	
					case 'c':
						$datenow = new DateTime('now', new DateTimeZone('America/Chicago') );
						$curr_time = $datenow->format('H:i:s');
						$where_clause	=	'bet_day="'.$bet_day.'" AND in_progress="yes" AND game_time_central<= CAST("'.$curr_time.'" as time)';
					break;
					case 'm':
						$datenow = new DateTime('now', new DateTimeZone('America/Phoenix') );
						$curr_time = $datenow->format('H:i:s');
						$where_clause	=	'bet_day="'.$bet_day.'" AND in_progress="yes" AND game_time_mountain<= CAST("'.$curr_time.'" as time)';
					break;
					case 'e':
						$datenow = new DateTime('now', new DateTimeZone('America/New_York') );
						$curr_time = $datenow->format('H:i:s');
						$where_clause	=	'bet_day="'.$bet_day.'" AND in_progress="yes" AND game_time_eastern<= CAST("'.$curr_time.'" as time)';
					break;
					  
				}				
				$data['timezone'] = $select_timezone;
				
	/* 				echo $where_clause;
	 */			 $data['bet_day_q']  = $this->cmodel->select_where('game',$where_clause);
				/*   echo $this->db->last_query();  */
	/*  			 echo '<pre>';print_R($data['bet_day_q']);echo'</pre>';
	 */ 		 $countwon_result = 'COUNT(*) as WON';
				 $countlost_result = 'COUNT(*) as LOST';
				 $countpush_result = 'COUNT(*) as PUSH';
				 $counttotal_result = 'COUNT(game_result)';
				 
			
				/*blue section start*/
		
				$bluewhere  				 = 		'convert(`bet_value`,decimal)<="-1000" AND convert(`bet_value`,decimal) >="-10000" AND `bet_year` = "'.$check_current_date["year"].'" AND `bet_day` = "'.$bet_day.'" AND in_progress="no" AND (game_result IS NOT NULL) order by FIELD(game_result,"WON","PUSH","LOST")';
				$blueresult 				 = 		$this->cmodel->select_where('game',$bluewhere);
				/**  Today  ***/
				$lostbluetodayselect 		 = 		'convert(`bet_value`,decimal)<="-1000" AND convert(`bet_value`,decimal) >="-10000" AND `game_result` = "LOST" AND `bet_year` = "'.$check_current_date["year"].'" AND `bet_day` = "'.$bet_day.'"';
				$lostbluetoday				 = 			$this->cmodel->select_countwhere('game',$countlost_result,$lostbluetodayselect);
				$pushbluetodayselect		 =   'convert(`bet_value`,decimal)<="-1000" AND convert(`bet_value`,decimal) >="-10000" AND `game_result`= "PUSH" AND `bet_year` = "'.$check_current_date["year"].'" AND `bet_day` = "'.$bet_day.'"';
				$pushbluetoday 				 =     $this->cmodel->select_countwhere('game',$countpush_result,$pushbluetodayselect);
				/* $blueonewhere 				 = 'convert(`bet_value`,decimal)<="-1000" AND convert(`bet_value`,decimal) >="-10000" AND `bet_year` = "'.$check_current_date["year"].'" AND in_progress="no" AND (game_result IS NOT NULL)';
				$boneresult = $this->cmodel->select_where('game',$blueonewhere); */
				/* echo $this->db->last_query();
				echo '</br/>'; */
				$wonbluetodayselect          = 'convert(`bet_value`,decimal)<="-1000" AND convert(`bet_value`,decimal) >="-10000" AND `game_result` = "WON" AND `bet_year` = "'.$check_current_date["year"].'" AND `bet_day` = "'.$bet_day.'"';
				$wonbluetoday 				 = $this->cmodel->select_countwhere('game',$countwon_result,$wonbluetodayselect);
				$bluetotaltoday				 = 'convert(`bet_value`,decimal)<="-1000" AND convert(`bet_value`,decimal) >="-10000" AND `bet_year` = "'.$check_current_date["year"].'" AND `bet_day` = "'.$bet_day.'" AND `game_result` != "PUSH" AND `game_result` != "" ';
				$totalbluetoday 			 = $this->cmodel->select_countwhere('game',$counttotal_result,$bluetotaltoday);
				$total_blue_playedone 		=  $totalbluetoday['COUNT(game_result)'];
				if($total_blue_playedone=='0' || $total_blue_playedone==''){
					 $total_blue_playedone	=  1;
				}
				$totalbluetodaypercent = round(( $wonbluetoday['WON'] * 100)/$total_blue_playedone); 
				if(is_array($lostbluetoday))
				{ 
				$lostbluetodayresult = $lostbluetoday['LOST'];
				}else{
				$lostbluetodayresult = "";
				}
				if(is_array($pushbluetoday))
				{ 
				$pushbluetodayresult = $pushbluetoday['PUSH'];
				}else{
				$pushbluetodayresult = "";
				}
				if(is_array($wonbluetoday))
				{ 
				$wonbluetodayresult = $wonbluetoday['WON'];
				}else{
				$wonbluetodayresult = "";
				} 
				/***** End Today ****/
				/***** Blue Last Year ***/
				$lostbluewherelast_year = 'convert(`bet_value`,decimal)<="-1000" AND convert(`bet_value`,decimal) >="-10000" AND `game_result` = "LOST" AND `bet_year` = "'.$check_current_date["year"].'" AND `bet_day` <= "'.$bet_day.'"';
				$bluelostresultlast_year = $this->cmodel->select_countwhere('game',$countlost_result,$lostbluewherelast_year);
				$wonbluewherelast_year = 'convert(`bet_value`,decimal)<="-1000" AND convert(`bet_value`,decimal) >="-10000" AND `game_result` = "WON" AND `bet_day` <= "'.$bet_day.'" AND `bet_year` = "'.$check_current_date["year"].'"';
				$wonlostresultlast_year = $this->cmodel->select_countwhere('game',$countwon_result,$wonbluewherelast_year);
				if(is_array($wonlostresultlast_year))
				{ 
				$bluewonresult_last_year = $wonlostresultlast_year['WON'];
				}
				else{
				 $bluewonresult_last_year ="";
				} 
				if(is_array($bluelostresultlast_year))
				{ 
				$bluelostresult_last_year = $bluelostresultlast_year['LOST'];
				}
				else{
				 $bluelostresult_last_year ="";
				} 
				$totalbluegamelast_year  = 'convert(`bet_value`,decimal)<="-1000" AND convert(`bet_value`,decimal) >="-10000"  AND `bet_day` <= "'.$bet_day.'" AND game_result!="PUSH" AND  game_result!="" AND `bet_year` = "'.$check_current_date["year"].'"';
				$totalblueresultlast_year = $this->cmodel->select_countwhere('game',$counttotal_result,$totalbluegamelast_year);
				/* 	$total_blue_played 	   = isset($totalblue['COUNT(game_result)']); */
				$total_blue_played_fix = $totalblueresultlast_year['COUNT(game_result)'];
				if($total_blue_played_fix!='0' && $total_blue_played_fix!=''){
				$bpercentage_fix 	   = round(($bluewonresult_last_year * 100)/$total_blue_played_fix); 
				}else{
				$bpercentage_fix 	   =  "0";
				}
				/***** Blue End Last Year ***/
				/***** Blue Last 4 Year ***/
				$lostbluewherelast4_year = 'convert(`bet_value`,decimal)<="-1000" AND convert(`bet_value`,decimal) >="-10000" AND `game_result` = "LOST" AND (`bet_year` < "'.$check_current_date["year"].'" || (`bet_year` = "'.$check_current_date["year"].'" AND `bet_day` <= "'.$bet_day.'"))';
				$bluelostresultlast4_year = $this->cmodel->select_countwhere('game',$countlost_result,$lostbluewherelast4_year);
				
				$wonbluewherelast4_year = 'convert(`bet_value`,decimal)<="-1000" AND convert(`bet_value`,decimal) >="-10000" AND `game_result` = "WON" AND (`bet_year` < "'.$check_current_date["year"].'" || (`bet_year` = "'.$check_current_date["year"].'" AND `bet_day` <= "'.$bet_day.'"))';
				$wonlostresultlast4_year = $this->cmodel->select_countwhere('game',$countwon_result,$wonbluewherelast4_year);
				if(is_array($wonlostresultlast4_year))
				{ 
				$bluewonresult4_last_year = $wonlostresultlast4_year['WON'];
				}
				else{
				 $bluewonresult4_last_year ="";
				} 
				if(is_array($bluelostresultlast4_year))
				{ 
				$bluelostresult4_last_year = $bluelostresultlast4_year['LOST'];
				}
				else{
				 $bluelostresult4_last_year ="";
				} 
				
				$totalbluegamelast4_year  = 'convert(`bet_value`,decimal)<="-1000" AND convert(`bet_value`,decimal) >="-10000" AND game_result!="PUSH" AND game_result!="" AND (`bet_year` < "'.$check_current_date["year"].'" || (`bet_year` = "'.$check_current_date["year"].'" AND `bet_day` <= "'.$bet_day.'"))';
				$totalblueresultlast4_year = $this->cmodel->select_countwhere('game',$counttotal_result,$totalbluegamelast4_year);
				/* 	$total_blue_played 	   = isset($totalblue['COUNT(game_result)']); */
				$total_blue_played_fix4 = $totalblueresultlast4_year['COUNT(game_result)'];
				if($total_blue_played_fix4!='0' && $total_blue_played_fix4!=''){
				$bpercentage_fix4 	   = round(($bluewonresult4_last_year * 100)/$total_blue_played_fix4); 
				}else{
				$bpercentage_fix4 	   =  "0";
				}
				/***** Blue End Last 4 Year ***/
				$bet_year			   =	date("Y",strtotime($check_current_date["bet_year"]));
				$old_bet_year		   =	$bet_year-1;
				$show_bt			   =	 $old_bet_year.'-'.$bet_year;
				if($pushbluetodayresult!='0' && $pushbluetodayresult!=''){
				$add_push_blue	=	' / '.$pushbluetodayresult.' Push';
				}else{
				$add_push_blue	= 	null;
				}
				
				
				/*Green section start*/
				
				$greenwhere  				 = 		'convert(`bet_value`,decimal)<="-360" AND convert(`bet_value`,decimal) >="-990" AND `bet_year` = "'.$check_current_date["year"].'" AND `bet_day` = "'.$bet_day.'" AND in_progress="no" AND (game_result IS NOT NULL) order by FIELD(game_result,"WON","PUSH","LOST")';
				$greenresult 				 = 		$this->cmodel->select_where('game',$greenwhere);
				/**  Today  ***/
				$lostgreentodayselect 		 = 		'convert(`bet_value`,decimal)<="-360" AND convert(`bet_value`,decimal) >="-990" AND `game_result` = "LOST" AND `bet_year` = "'.$check_current_date["year"].'" AND `bet_day` = "'.$bet_day.'"';
				$lostgreentoday				 = 			$this->cmodel->select_countwhere('game',$countlost_result,$lostgreentodayselect);
				$pushgreentodayselect		 =   'convert(`bet_value`,decimal)<="-360" AND convert(`bet_value`,decimal) >="-990" AND `bet_year` = "'.$check_current_date["year"].'" AND `game_result`= "PUSH" AND `bet_day` = "'.$bet_day.'"';
				$pushgreentoday 				 =     $this->cmodel->select_countwhere('game',$countpush_result,$pushgreentodayselect);
				/* $blueonewhere 				 = 'convert(`bet_value`,decimal)<="-1000" AND convert(`bet_value`,decimal) >="-10000" AND `bet_year` = "'.$check_current_date["year"].'" AND in_progress="no" AND (game_result IS NOT NULL)';
				$boneresult = $this->cmodel->select_where('game',$blueonewhere); */
				/* echo $this->db->last_query();
				echo '</br/>'; */
				$wongreentodayselect          = 'convert(`bet_value`,decimal)<="-360" AND convert(`bet_value`,decimal) >="-990" AND `bet_year` = "'.$check_current_date["year"].'" AND `game_result` = "WON" AND `bet_day` = "'.$bet_day.'"';
				$wongreentoday 				 = $this->cmodel->select_countwhere('game',$countwon_result,$wongreentodayselect);
				$greentotaltoday				 = 'convert(`bet_value`,decimal)<="-360" AND convert(`bet_value`,decimal) >="-990" AND `bet_year` = "'.$check_current_date["year"].'" AND `bet_day` = "'.$bet_day.'" AND `game_result` != "PUSH" AND `game_result` != "" ';
				$totalgreentoday 			 = $this->cmodel->select_countwhere('game',$counttotal_result,$greentotaltoday);
				$total_green_playedone 		=  $totalgreentoday['COUNT(game_result)'];
				if($total_green_playedone=='0' || $total_green_playedone==''){
					 $total_green_playedone	=  1;
				}
				$totalgreentodaypercent = round(( $wongreentoday['WON'] * 100)/$total_green_playedone); 
				if(is_array($lostgreentoday))
				{ 
				$lostgreentodayresult = $lostgreentoday['LOST'];
				}else{
				$lostgreentodayresult = "";
				}
				if(is_array($pushgreentoday))
				{ 
				$pushgreentodayresult = $pushgreentoday['PUSH'];
				}else{
				$pushgreentodayresult = "";
				}
				if(is_array($wongreentoday))
				{ 
				$wongreentodayresult = $wongreentoday['WON'];
				}else{
				$wongreentodayresult = "";
				} 
				/***** End Today ****/
				/***** Green Last Year ***/
				$lostgreenwherelast_year = 'convert(`bet_value`,decimal)<="-360" AND convert(`bet_value`,decimal) >="-990" AND `game_result` = "LOST" AND `bet_year` = "'.$check_current_date["year"].'" AND `bet_day` <= "'.$bet_day.'"';
				$greenlostresultlast_year = $this->cmodel->select_countwhere('game',$countlost_result,$lostgreenwherelast_year);
				$wongreenwherelast_year = 'convert(`bet_value`,decimal)<="-360" AND convert(`bet_value`,decimal) >="-990" AND `game_result` = "WON" AND `bet_day` <= "'.$bet_day.'" AND `bet_year` = "'.$check_current_date["year"].'"';
				$greenwonlostresultlast_year = $this->cmodel->select_countwhere('game',$countwon_result,$wongreenwherelast_year);
				if(is_array($greenwonlostresultlast_year))
				{ 
				$greenwonresult_last_year = $greenwonlostresultlast_year['WON'];
				}
				else{
				 $greenwonresult_last_year ="";
				} 
				if(is_array($greenlostresultlast_year))
				{ 
				$greenlostresult_last_year = $greenlostresultlast_year['LOST'];
				}
				else{
				 $greenlostresult_last_year ="";
				} 
				$totalgreengamelast_year  = 'convert(`bet_value`,decimal)<="-360" AND convert(`bet_value`,decimal) >="-990"  AND `bet_day` <= "'.$bet_day.'" AND game_result!="PUSH" AND  game_result!="" AND `bet_year` = "'.$check_current_date["year"].'"';
				$totalgreenresultlast_year = $this->cmodel->select_countwhere('game',$counttotal_result,$totalgreengamelast_year);
				/* 	$total_blue_played 	   = isset($totalblue['COUNT(game_result)']); */
				$total_green_played_fix = $totalgreenresultlast_year['COUNT(game_result)'];
				if($total_green_played_fix!='0' && $total_green_played_fix!=''){
				$greenpercentage_fix 	   = round(($greenwonresult_last_year * 100)/$total_green_played_fix); 
				}else{
				$greenpercentage_fix 	   =  "0";
				}
				/***** Green End Last Year ***/
				/***** Green Last 4 Year ***/
				$lostgreenwherelast4_year = 'convert(`bet_value`,decimal)<="-360" AND convert(`bet_value`,decimal) >="-990" AND `game_result` = "LOST" AND (`bet_year` < "'.$check_current_date["year"].'" || (`bet_year` = "'.$check_current_date["year"].'" AND `bet_day` <= "'.$bet_day.'"))';
				$greenlostresultlast4_year = $this->cmodel->select_countwhere('game',$countlost_result,$lostgreenwherelast4_year);
				$wongreenwherelast4_year = 'convert(`bet_value`,decimal)<="-360" AND convert(`bet_value`,decimal) >="-990" AND `game_result` = "WON" AND (`bet_year` < "'.$check_current_date["year"].'" || (`bet_year` = "'.$check_current_date["year"].'" AND `bet_day` <= "'.$bet_day.'"))';
				$greenwonlostresultlast4_year = $this->cmodel->select_countwhere('game',$countwon_result,$wongreenwherelast4_year);
				if(is_array($greenwonlostresultlast4_year))
				{ 
				$greenwonresult4_last_year = $greenwonlostresultlast4_year['WON'];
				}
				else{
				$greenwonresult4_last_year ="";
				} 
				if(is_array($greenlostresultlast4_year))
				{ 
				$greenlostresult4_last_year = $greenlostresultlast4_year['LOST'];
				}
				else{
				$greenlostresult4_last_year ="";
				} 
				$totalgreengamelast4_year  = 'convert(`bet_value`,decimal)<="-360" AND convert(`bet_value`,decimal) >="-990" AND game_result!="PUSH" AND  game_result!="" AND (`bet_year` < "'.$check_current_date["year"].'" || (`bet_year` = "'.$check_current_date["year"].'" AND `bet_day` <= "'.$bet_day.'"))';
				$totalgreenresultlast4_year = $this->cmodel->select_countwhere('game',$counttotal_result,$totalgreengamelast4_year);
				/* 	$total_blue_played 	   = isset($totalblue['COUNT(game_result)']); */
				$total_green_played_fix4 = $totalgreenresultlast4_year['COUNT(game_result)'];
				if($total_green_played_fix4!='0' && $total_green_played_fix4!=''){
				$greenpercentage_fix4 	   = round(($greenwonresult4_last_year * 100)/$total_green_played_fix4); 
				}else{
				$greenpercentage_fix4 	   =  "0";
				}
				/***** Green End Last 4 Year ***/
				
				if($pushgreentodayresult!='0' && $pushgreentodayresult!=''){
				$add_push_green	=	' / '.$pushgreentodayresult.' Push';
				}else{
				$add_push_green	= 	null;
				}
				/*Green section end*/
			
				
				/*Orange section start*/
				$orangewhere  				 = 		'convert(`bet_value`,decimal)<="-120" AND convert(`bet_value`,decimal) >="-350" AND `bet_year` = "'.$check_current_date["year"].'" AND `bet_day` = "'.$bet_day.'" AND in_progress="no" AND (game_result IS NOT NULL) order by FIELD(game_result,"WON","PUSH","LOST")';
				$orangeresult 				 = 		$this->cmodel->select_where('game',$orangewhere);
				/**  Today  ***/
				$lostorangetodayselect 		 = 		'convert(`bet_value`,decimal)<="-120" AND convert(`bet_value`,decimal) >="-350" AND `game_result` = "LOST" AND `bet_year` = "'.$check_current_date["year"].'" AND `bet_day` = "'.$bet_day.'"';
				$lostorangetoday				 = 			$this->cmodel->select_countwhere('game',$countlost_result,$lostorangetodayselect);
				$pushorangetodayselect		 =   'convert(`bet_value`,decimal)<="-120" AND convert(`bet_value`,decimal) >="-350" AND `game_result`= "PUSH" AND `bet_year` = "'.$check_current_date["year"].'" AND `bet_day` = "'.$bet_day.'"';
				$pushorangetoday 				 =     $this->cmodel->select_countwhere('game',$countpush_result,$pushorangetodayselect);
				/* $blueonewhere 				 = 'convert(`bet_value`,decimal)<="-1000" AND convert(`bet_value`,decimal) >="-10000" AND `bet_year` = "'.$check_current_date["year"].'" AND in_progress="no" AND (game_result IS NOT NULL)';
				$boneresult = $this->cmodel->select_where('game',$blueonewhere); */
				/* echo $this->db->last_query();
				echo '</br/>'; */
				$wonorangetodayselect          = 'convert(`bet_value`,decimal)<="-120" AND convert(`bet_value`,decimal) >="-350" AND `game_result` = "WON" AND `bet_year` = "'.$check_current_date["year"].'" AND `bet_day` = "'.$bet_day.'"';
				$wonorangetoday 				 = $this->cmodel->select_countwhere('game',$countwon_result,$wonorangetodayselect);
				$orangetotaltoday				 = 'convert(`bet_value`,decimal)<="-120" AND convert(`bet_value`,decimal) >="-350" AND `bet_year` = "'.$check_current_date["year"].'" AND `bet_day` = "'.$bet_day.'" AND `game_result` != "PUSH" AND `game_result` != "" ';
				$totalorangetoday 			 = $this->cmodel->select_countwhere('game',$counttotal_result,$orangetotaltoday);
				$total_orange_playedone 		=  $totalorangetoday['COUNT(game_result)'];
				if($total_orange_playedone=='0' || $total_orange_playedone==''){
					 $total_orange_playedone	=  1;
				}
				$totalorangetodaypercent = round(( $wonorangetoday['WON'] * 100)/$total_orange_playedone); 
				if(is_array($lostorangetoday))
				{ 
				$lostorangetodayresult = $lostorangetoday['LOST'];
				}else{
				$lostorangetodayresult = "";
				}
				if(is_array($pushorangetoday))
				{ 
				$pushorangetodayresult = $pushorangetoday['PUSH'];
				}else{
				$pushorangetodayresult = "";
				}
				if(is_array($wonorangetoday))
				{ 
				$wonorangetodayresult = $wonorangetoday['WON'];
				}else{
				$wonorangetodayresult = "";
				} 
				/***** Orange End Today ****/
				/***** Orange Last Year ***/
				$lostorangewherelast_year = 'convert(`bet_value`,decimal)<="-120" AND convert(`bet_value`,decimal) >="-350" AND `game_result` = "LOST" AND `bet_year` = "'.$check_current_date["year"].'" AND `bet_day` <= "'.$bet_day.'"';
				$orangelostresultlast_year = $this->cmodel->select_countwhere('game',$countlost_result,$lostorangewherelast_year);
				$wonorangewherelast_year = 'convert(`bet_value`,decimal)<="-120" AND convert(`bet_value`,decimal) >="-350" AND `game_result` = "WON" AND `bet_day` <= "'.$bet_day.'" AND `bet_year` = "'.$check_current_date["year"].'"';
				$orangewonlostresultlast_year = $this->cmodel->select_countwhere('game',$countwon_result,$wonorangewherelast_year);
				if(is_array($orangewonlostresultlast_year))
				{ 
				$orangewonresult_last_year = $orangewonlostresultlast_year['WON'];
				}
				else{
				 $orangewonresult_last_year ="";
				} 
				if(is_array($orangelostresultlast_year))
				{ 
				$orangelostresult_last_year = $orangelostresultlast_year['LOST'];
				}
				else{
				 $orangelostresult_last_year ="";
				} 
				$totalorangegamelast_year  = 'convert(`bet_value`,decimal)<="-120" AND convert(`bet_value`,decimal) >="-350"  AND `bet_day` <= "'.$bet_day.'" AND game_result!="PUSH" AND  game_result!="" AND `bet_year` = "'.$check_current_date["year"].'"';
				$totalorangeresultlast_year = $this->cmodel->select_countwhere('game',$counttotal_result,$totalorangegamelast_year);
				/* 	$total_blue_played 	   = isset($totalblue['COUNT(game_result)']); */
				$total_orange_played_fix = $totalorangeresultlast_year['COUNT(game_result)'];
				if($total_orange_played_fix!='0' && $total_orange_played_fix!=''){
				$orangepercentage_fix 	   = round(($orangewonresult_last_year * 100)/$total_orange_played_fix); 
				}else{
				$orangepercentage_fix 	   =  "0";
				}
				/***** Orange End Last Year ***/
				/***** Orange Last 4 Year ***/
				$lostorangewherelast4_year = 'convert(`bet_value`,decimal)<="-120" AND convert(`bet_value`,decimal) >="-350" AND `game_result` = "LOST" AND (`bet_year` < "'.$check_current_date["year"].'" || (`bet_year` = "'.$check_current_date["year"].'" AND `bet_day` <= "'.$bet_day.'"))';
				$orangelostresultlast4_year = $this->cmodel->select_countwhere('game',$countlost_result,$lostorangewherelast4_year);
				$wonorangewherelast4_year = 'convert(`bet_value`,decimal)<="-120" AND convert(`bet_value`,decimal) >="-350" AND `game_result` = "WON" AND (`bet_year` < "'.$check_current_date["year"].'" || (`bet_year` = "'.$check_current_date["year"].'" AND `bet_day` <= "'.$bet_day.'"))';
				$orangewonlostresultlast4_year = $this->cmodel->select_countwhere('game',$countwon_result,$wonorangewherelast4_year);
				if(is_array($orangewonlostresultlast4_year))
				{ 
				$orangewonresult4_last_year = $orangewonlostresultlast4_year['WON'];
				}
				else{
				$orangewonresult4_last_year ="";
				} 
				if(is_array($orangelostresultlast4_year))
				{ 
				$orangelostresult4_last_year = $orangelostresultlast4_year['LOST'];
				}
				else{
				$orangelostresult4_last_year ="";
				} 
				$totalorangegamelast4_year  = 'convert(`bet_value`,decimal)<="-120" AND convert(`bet_value`,decimal) >="-350" AND game_result!="PUSH" AND  game_result!="" AND (`bet_year` < "'.$check_current_date["year"].'" || (`bet_year` = "'.$check_current_date["year"].'" AND `bet_day` <= "'.$bet_day.'"))';
				$totalorangeresultlast4_year = $this->cmodel->select_countwhere('game',$counttotal_result,$totalorangegamelast4_year);
				/* 	$total_blue_played 	   = isset($totalblue['COUNT(game_result)']); */
				$total_orange_played_fix4 = $totalorangeresultlast4_year['COUNT(game_result)'];
				if($total_orange_played_fix4!='0' && $total_orange_played_fix4!=''){
				$orangepercentage_fix4 	   = round(($orangewonresult4_last_year * 100)/$total_orange_played_fix4); 
				}else{
				$orangepercentage_fix4 	   =  "0";
				}
				/***** Orange End Last 4 Year ***/
				
				if($pushorangetodayresult!='0' && $pushorangetodayresult!=''){
				$add_push_orange	=	' / '.$pushorangetodayresult.' Push';
				}else{
				$add_push_orange	= 	null;
				}
				/*Orange section start*/
				
				/*Red section start*/		
				$redwhere  				 = 		'convert(`bet_value`,decimal)>="-110" AND `bet_year` = "'.$check_current_date["year"].'" AND `bet_day` = "'.$bet_day.'" AND in_progress="no" AND (game_result IS NOT NULL) order by FIELD(game_result,"WON","PUSH","LOST")';
				$redresult 				 = 		$this->cmodel->select_where('game',$redwhere);
				/**  Today  ***/
				$lostredtodayselect 		 = 	'convert(`bet_value`,decimal)>="-110" AND `game_result` = "LOST" AND `bet_year` = "'.$check_current_date["year"].'" AND `bet_day` = "'.$bet_day.'"';
				$lostredtoday				 = 			$this->cmodel->select_countwhere('game',$countlost_result,$lostredtodayselect);
				$pushredtodayselect		 =   'convert(`bet_value`,decimal)>="-110" AND `game_result`= "PUSH" AND `bet_year` = "'.$check_current_date["year"].'" AND `bet_day` = "'.$bet_day.'"';
				$pushredtoday 				 =     $this->cmodel->select_countwhere('game',$countpush_result,$pushredtodayselect);
				
				$wonredtodayselect          = 'convert(`bet_value`,decimal)>="-110" AND `game_result` = "WON" AND  `bet_year` = "'.$check_current_date["year"].'" AND `bet_day` = "'.$bet_day.'"';
				$wonredtoday 				 = $this->cmodel->select_countwhere('game',$countwon_result,$wonredtodayselect);
				$redtotaltoday				 = 'convert(`bet_value`,decimal)>="-110"  AND `bet_year` = "'.$check_current_date["year"].'" AND `bet_day` = "'.$bet_day.'" AND `game_result` != "PUSH" AND `game_result` != "" ';
				$totalredtoday 			 = $this->cmodel->select_countwhere('game',$counttotal_result,$redtotaltoday);
				$total_red_playedone 		=  $totalredtoday['COUNT(game_result)'];
				if($total_red_playedone=='0' || $total_red_playedone==''){
					 $total_red_playedone	=  1;
				}
				$totalredtodaypercent = round(( $wonredtoday['WON'] * 100)/$total_red_playedone); 
				if(is_array($lostredtoday))
				{ 
				$lostredtodayresult = $lostredtoday['LOST'];
				}else{
				$lostredtodayresult = "";
				}
				if(is_array($pushredtoday))
				{ 
				$pushredtodayresult = $pushredtoday['PUSH'];
				}else{
				$pushredtodayresult = "";
				}
				if(is_array($wonredtoday))
				{ 
				$wonredtodayresult = $wonredtoday['WON'];
				}else{
				$wonredtodayresult = "";
				} 
				/***** Red End Today ****/
				/***** Red Last Year ***/
				$lostredwherelast_year = 'convert(`bet_value`,decimal)>="-110" AND `game_result` = "LOST" AND `bet_year` = "'.$check_current_date["year"].'" AND `bet_day` <= "'.$bet_day.'"';
				$redlostresultlast_year = $this->cmodel->select_countwhere('game',$countlost_result,$lostredwherelast_year);
				$wonredwherelast_year = 'convert(`bet_value`,decimal)>="-110" AND `game_result` = "WON" AND `bet_day` <= "'.$bet_day.'" AND `bet_year` = "'.$check_current_date["year"].'"';
				$redwonlostresultlast_year = $this->cmodel->select_countwhere('game',$countwon_result,$wonredwherelast_year);
				if(is_array($redwonlostresultlast_year))
				{ 
				$redwonresult_last_year = $redwonlostresultlast_year['WON'];
				}
				else{
				 $redwonresult_last_year ="";
				} 
				if(is_array($redlostresultlast_year))
				{ 
				$redlostresult_last_year = $redlostresultlast_year['LOST'];
				}
				else{
				 $redlostresult_last_year ="";
				} 
				$totalredgamelast_year  = 'convert(`bet_value`,decimal)>="-110"  AND `bet_day` <= "'.$bet_day.'" AND game_result!="PUSH" AND  game_result!="" AND `bet_year` = "'.$check_current_date["year"].'"';
				$totalredresultlast_year = $this->cmodel->select_countwhere('game',$counttotal_result,$totalredgamelast_year);
				/* 	$total_blue_played 	   = isset($totalblue['COUNT(game_result)']); */
				$total_red_played_fix = $totalredresultlast_year['COUNT(game_result)'];
				if($total_red_played_fix!='0' && $total_red_played_fix!=''){
				$redpercentage_fix 	   = round(($redwonresult_last_year * 100)/$total_red_played_fix); 
				}else{
				$redpercentage_fix 	   =  "0";
				}
				/***** Red End Last Year ***/
				/***** Red Last 4 Year ***/
				$lostredwherelast4_year = 'convert(`bet_value`,decimal)>="-110" AND `game_result` = "LOST" AND (`bet_year` < "'.$check_current_date["year"].'" || (`bet_year` = "'.$check_current_date["year"].'" AND `bet_day` <= "'.$bet_day.'"))';
				$redlostresultlast4_year = $this->cmodel->select_countwhere('game',$countlost_result,$lostredwherelast4_year);
				$wonredwherelast4_year = 'convert(`bet_value`,decimal)>="-110" AND `game_result` = "WON" AND (`bet_year` < "'.$check_current_date["year"].'" || (`bet_year` = "'.$check_current_date["year"].'" AND `bet_day` <= "'.$bet_day.'"))';
				$redwonlostresultlast4_year = $this->cmodel->select_countwhere('game',$countwon_result,$wonredwherelast4_year);
				if(is_array($redwonlostresultlast4_year))
				{ 
				$redwonresult4_last_year = $redwonlostresultlast4_year['WON'];
				}
				else{
				$redwonresult4_last_year ="";
				} 
				if(is_array($redlostresultlast4_year))
				{ 
				$redlostresult4_last_year = $redlostresultlast4_year['LOST'];
				}
				else{
				$redlostresult4_last_year ="";
				} 
				$totalredgamelast4_year  = 'convert(`bet_value`,decimal)>="-110" AND game_result!="PUSH" AND  game_result!="" AND (`bet_year` < "'.$check_current_date["year"].'" || (`bet_year` = "'.$check_current_date["year"].'" AND `bet_day` <= "'.$bet_day.'"))';
				$totalredresultlast4_year = $this->cmodel->select_countwhere('game',$counttotal_result,$totalredgamelast4_year);
				/* 	$total_blue_played 	   = isset($totalblue['COUNT(game_result)']); */
				$total_red_played_fix4 = $totalredresultlast4_year['COUNT(game_result)'];
				if($total_red_played_fix4!='0' && $total_red_played_fix4!=''){
				$redpercentage_fix4 	   = round(($redwonresult4_last_year * 100)/$total_red_played_fix4); 
				}else{
				$redpercentage_fix4 	   =  "0";
				}
				/***** Red End Last 4 Year ***/
				
				$wherenextview_2 = '`bet_year` > "'.date('Y-m-d').'"';
				$nextview_details = $this->cmodel->select_with_limit_where('betgame',$wherenextview_2,' `bet_year` ASC  ','1');
				/* echo $this->db->last_query(); */
				if(is_array($nextview_details)){
				  $data['nextview_html'] = $nextview_details;
				 }else{
					  $data['nextview_html'] ='';
				 }
				/* 
				if(is_array($preview_details)){
				  $data['preview_html'] = $preview_details['id'];
				 }else{
				  $data['preview_html'] ='';
				 }

				$bid = $data['preview_html'];
				$bets = [];
				if(!empty($bid)) {
					$timezone = 'America/New_York';
					$time_col = 'game_time';
					$e_sel = null;
					$c_sel = null;
					$p_sel = null;
					$m_sel = null;
					switch($select_timezone){
						case 'e':
						$timezone = 'America/New_York';
						$time_col = 'game_time_eastern';
						$e_sel	=	"Selected";
						break;
						case 'c':
						$timezone = 'America/Chicago';
						$time_col = 'game_time_central';
						$c_sel	=	"Selected";
						break;
						case 'p':
						$timezone = 'America/Los_Angeles';
						$time_col = 'game_time';
						$p_sel	=	"Selected";
						break;
						case 'm':
						$timezone = 'America/Phoenix';
						$time_col = 'game_time_mountain';
						$m_sel	=	"Selected";
						break;
					}
					$datenow = new DateTime('now', new DateTimeZone($timezone) );
					$timenow = $datenow->format('H:i:s');
					$q = "Select `$time_col` as start_time, count(`$time_col`) as picks from `game` where `bet_day`=$bet_day AND `$time_col`>= CAST('$timenow' as time) group by `$time_col` order by `$time_col` ASC";
					$games = $this->db->query($q)->result();
					$games_html = '';
					foreach($games as $game) {
						$start = date('g:i a', strtotime($game->start_time));
						$listing = $this->calcListingTime($start);
						$games_html .= "<tr>
							<td style='text-align: left; padding-left: 6px;'><strong>$start</strong></td>
							<td style='text-align: left; padding-left: 6px;'><strong>$listing</strong></td>
							<td style='text-align: center;'><strong>{$game->picks}</strong></td>
						</tr>";
					}
					$data['morepicks'] = $games_html;
					
					while($bet=$this->previewbetData($bid, '')) {
						if(empty($bet['preview_html'])) break;
						$bets[] = $bet['html'];
						$bid = $bet['preview_html'];
					}
				}
				$data['bets'] = array_reverse($bets);
				*/
				
					/* $this->load->view('gamedetailsview',$data); */
				/*red section end*/
				/* echo '<pre>';print_R($data);echo '</pre>'; */
				$this->load->view('gamedetailsview',$data);
			}
			else
			{
				$wherepreview_2 = '`bet_year` < "'.date('Y-m-d').'"'; 
				$preview_details = $this->cmodel->select_with_limit_where('betgame',$wherepreview_2,' `bet_year` DESC ','1');
				$wherenextview_2 = '`bet_year` > "'.date('Y-m-d').'"'; 
				$nextview_details = $this->cmodel->select_with_limit_where('betgame',$wherenextview_2,' `bet_year` ASC  ','1');
				if(is_array($nextview_details)){
				   $s__nt   =	"Select `game_time` from `game` where `bet_day`='".$nextview_details['bet_day']."'  order by `game_time` asc limit 1";
					$result_ntt    =	 $this->db->query($s__nt)->row_array();
					/*  echo '<pre>';print_R($result_t); echo '</pre>'; */
						
				    $data['nextview_html'] = $nextview_details;
					$data['nextview_html']['timess']	=	 $result_ntt['game_time'];
				}else{
					  $data['nextview_html'] ='';
				}
				if(is_array($preview_details)){
				  $data['preview_html'] = $preview_details['id'];
				}else{
				  $data['preview_html'] ='';
				}
				$data['timezone']	=	'p';
				$data['ebetday'] = date('Y-m-d');
				
				$bid = $data['preview_html'];
				$bets = [];
				if(!empty($bid)) {
					$e_sel = '';
					$c_sel = '';
					$p_sel = '';
					$m_sel = '';
					switch($select_timezone){
						case 'e':
						$e_sel	=	"Selected";
						break;
						case 'c':
						$c_sel	=	"Selected";
						break;
						case 'p':
						$p_sel	=	"Selected";
						break;
						case 'm':
						$m_sel	=	"Selected";
						break;
					}
					$lastdiv = '<div class="new_div">
							<div class="category">More Picks Today</div>
							
								<h3 style="margin-top: 20px; color: black;">For&nbsp;
									<select id="select_timezone" name="change_time" onChange="change_time(this.value)" >
									<option '.$e_sel.' value="e" >Eastern</option>
									<option '.$c_sel.' value="c" >Central</option>
									<option '.$m_sel.' value="m" >Mountain</option>
									<option '.$p_sel.' value="p" >Pacific</option>
									</select>
									&nbsp;Time&nbsp;Zone
								</h3>
								<table class="snd-table-data" style="width: 70%; margin-top: 2px;">
									<thead>
										<tr>
											<th style="text-align: left; padding-left: 6px;">Start Time</th>
											<th style="text-align: left; padding-left: 6px;">Listing Time</th>
											<th style="text-align: center;">Picks</th>
										</tr>
									</thead>
								</table>
						 </div>
					';
					while($bet=$this->previewbetData($bid, $lastdiv)) {
						if(empty($bet['preview_html'])) break;
						$bets[] = $bet['html'];
						$bid = $bet['preview_html'];
						$lastdiv = '';
					}
				}
				$data['bets'] = array_reverse($bets);
					$this->load->view('gamedetailsview',$data);
			}
			
		}
		else{
			redirect(base_url('logintrack/logout'));
		}
 	}
	  
	public function previewbetData($ID=null, $lastdiv='')
	{
		 $id = $this->input->post('id');
		 
		 if($ID) $id = $ID;
		 $order_by = '`id` DESC'; 
		 $limit = 1;
		
         $where2 = '`id` = "'.$id.'"'; 
		 $bet_details = $this->cmodel->select_with_limit_where('betgame',$where2,$order_by,$limit);
		
		 $wherepreview_2 = '`bet_year` < "'.$bet_details['bet_year'].'"'; 
		 $preview_details = $this->cmodel->select_with_limit_where('betgame',$wherepreview_2,' `bet_year` DESC ',$limit);
		
		  $wherenext_2 = '`bet_year` > "'.$bet_details['bet_year'].'"'; 
		 $next_details = $this->cmodel->select_with_limit_where('betgame',$wherenext_2,' `bet_year` ASC ',$limit);
		
		 if(is_array($preview_details)){
		  $data['preview_html']	=	$preview_details['id'];
		 }else{
			  $data['preview_html']	=	'';
		 }
		 
		if(is_array($next_details)){
		
			 $data['nextview_html']	=	$next_details['id'];	
			
		 }else{
			  $data['nextview_html']	=	'';
		 }
		 
		 $bet_resultdate = $bet_details['bet_year'];
		 
		 $betid = $bet_details['id'];
	 
		 $data['html'] ='';
		 
		if(isset($bet_details["league"]))
		{
			$league	=	$bet_details["league"];
		}else{
			$league=	'';
		}
		if(isset($bet_details["day"]))
		{
			$day	=	$bet_details["day"];
		}else{
			$day=	'';
		}
		if(isset($bet_details["bet_year"]))
		{
			$month	=	date('M',strtotime($bet_details["bet_year"]));
			$shortdate	=	date('d',strtotime($bet_details["bet_year"]));
		}else{
			$month=	'';
			$shortdate=	'';
		}
		
		if(isset($bet_details["bet_year"]))
		{
			$bet_year	=	date("Y",strtotime($bet_details["bet_year"]));
			$m = date('m',strtotime($bet_details["bet_year"]));
			if($m>='9') {
				$show_bet_year	=	$bet_year;
				$show_bet_year	= $show_bet_year.'-'.(intval(date("y",strtotime($bet_details["bet_year"]))) + 1);
			}
			else {
				$show_bet_year	=	$bet_year-1;
				$show_bet_year	= $show_bet_year.'-'.date("y",strtotime($bet_details["bet_year"]));
			}
		}else{
			$bet_year=	'';
			$show_bet_year=	'';
		}
		if(isset($bet_details["bet_day"]))
		{
			$bet_day	=	$bet_details["bet_day"];
		}else{
			$bet_day=	'';
		}
		if(isset($bet_details["bankroll"]))
		{
			$bankroll	=	$bet_details["bankroll"];
		}else{
			$bankroll=	'';
		}

	    $date = $bet_resultdate;

	    $countwon_result = 'COUNT(*) as WON';
		$countlost_result = 'COUNT(*) as LOST';
		$countpush_result = 'COUNT(*) as PUSH';
		$counttotal_result = 'COUNT(game_result)';
		
		/*blue section start*/
		
		$bet_day	 				 =		$bet_details['bet_day'];
        $bluewhere  				 = 		'convert(`bet_value`,decimal)<="-1000" AND convert(`bet_value`,decimal) >="-10000" AND `bet_year` = "'.$bet_details["year"].'" AND `bet_day` = "'.$bet_day.'" AND in_progress="no" AND (game_result IS NOT NULL) order by FIELD(game_result,"WON","PUSH","LOST")';
		$blueresult 				 = 		$this->cmodel->select_where('game',$bluewhere);
		/**  Today  ***/
		$lostbluetodayselect 		 = 		'convert(`bet_value`,decimal)<="-1000" AND convert(`bet_value`,decimal) >="-10000" AND `game_result` = "LOST" AND `bet_year` = "'.$bet_details["year"].'" AND `bet_day` = "'.$bet_day.'"';
		$lostbluetoday				 = 			$this->cmodel->select_countwhere('game',$countlost_result,$lostbluetodayselect);
		$pushbluetodayselect		 =   'convert(`bet_value`,decimal)<="-1000" AND convert(`bet_value`,decimal) >="-10000" AND `game_result`= "PUSH" AND `bet_year` = "'.$bet_details["year"].'" AND `bet_day` = "'.$bet_day.'"';
		$pushbluetoday 				 =     $this->cmodel->select_countwhere('game',$countpush_result,$pushbluetodayselect);
		/* $blueonewhere 				 = 'convert(`bet_value`,decimal)<="-1000" AND convert(`bet_value`,decimal) >="-10000" AND `bet_year` = "'.$bet_details["year"].'" AND in_progress="no" AND (game_result IS NOT NULL)';
		$boneresult = $this->cmodel->select_where('game',$blueonewhere); */
		/* echo $this->db->last_query();
		echo '</br/>'; */
		$wonbluetodayselect          = 'convert(`bet_value`,decimal)<="-1000" AND convert(`bet_value`,decimal) >="-10000" AND `game_result` = "WON" AND `bet_year` = "'.$bet_details["year"].'" AND `bet_day` = "'.$bet_day.'"';
		$wonbluetoday 				 = $this->cmodel->select_countwhere('game',$countwon_result,$wonbluetodayselect);
		$bluetotaltoday				 = 'convert(`bet_value`,decimal)<="-1000" AND convert(`bet_value`,decimal) >="-10000" AND `bet_year` = "'.$bet_details["year"].'" AND `bet_day` = "'.$bet_day.'" AND `game_result` != "PUSH" AND `game_result` != "" ';
		$totalbluetoday 			 = $this->cmodel->select_countwhere('game',$counttotal_result,$bluetotaltoday);
		$total_blue_playedone 		=  $totalbluetoday['COUNT(game_result)'];
		if($total_blue_playedone=='0' || $total_blue_playedone==''){
			 $total_blue_playedone	=  1;
		}
		$totalbluetodaypercent = round(( $wonbluetoday['WON'] * 100)/$total_blue_playedone); 
		if(is_array($lostbluetoday))
		{ 
	    $lostbluetodayresult = $lostbluetoday['LOST'];
	    }else{
		$lostbluetodayresult = "";
		}
		if(is_array($pushbluetoday))
		{ 
	    $pushbluetodayresult = $pushbluetoday['PUSH'];
	    }else{
		$pushbluetodayresult = "";
		}
		if(is_array($wonbluetoday))
		{ 
	    $wonbluetodayresult = $wonbluetoday['WON'];
	    }else{
		$wonbluetodayresult = "";
		} 
		/***** End Today ****/
		/***** Blue Last Year ***/
		$lostbluewherelast_year = 'convert(`bet_value`,decimal)<="-1000" AND convert(`bet_value`,decimal) >="-10000" AND `game_result` = "LOST" AND `bet_year` = "'.$bet_details["year"].'" AND `bet_day` <= "'.$bet_day.'"';
		$bluelostresultlast_year = $this->cmodel->select_countwhere('game',$countlost_result,$lostbluewherelast_year);
		$wonbluewherelast_year = 'convert(`bet_value`,decimal)<="-1000" AND convert(`bet_value`,decimal) >="-10000" AND `game_result` = "WON" AND `bet_day` <= "'.$bet_day.'" AND `bet_year` = "'.$bet_details["year"].'"';
		$wonlostresultlast_year = $this->cmodel->select_countwhere('game',$countwon_result,$wonbluewherelast_year);
		if(is_array($wonlostresultlast_year))
		{ 
	    $bluewonresult_last_year = $wonlostresultlast_year['WON'];
	    }
		else{
		 $bluewonresult_last_year ="";
		} 
		if(is_array($bluelostresultlast_year))
		{ 
	    $bluelostresult_last_year = $bluelostresultlast_year['LOST'];
	    }
		else{
		 $bluelostresult_last_year ="";
		} 
		$totalbluegamelast_year  = 'convert(`bet_value`,decimal)<="-1000" AND convert(`bet_value`,decimal) >="-10000"  AND `bet_day` <= "'.$bet_day.'" AND game_result!="PUSH" AND  game_result!="" AND `bet_year` = "'.$bet_details["year"].'"';
		$totalblueresultlast_year = $this->cmodel->select_countwhere('game',$counttotal_result,$totalbluegamelast_year);
		/* 	$total_blue_played 	   = isset($totalblue['COUNT(game_result)']); */
		$total_blue_played_fix = $totalblueresultlast_year['COUNT(game_result)'];
		if($total_blue_played_fix!='0' && $total_blue_played_fix!=''){
		$bpercentage_fix 	   = round(($bluewonresult_last_year * 100)/$total_blue_played_fix); 
		}else{
		$bpercentage_fix 	   =  "0";
		}
		/***** Blue End Last Year ***/
		/***** Blue Last 4 Year ***/
		$lostbluewherelast4_year = 'convert(`bet_value`,decimal)<="-1000" AND convert(`bet_value`,decimal) >="-10000" AND `game_result` = "LOST" AND (`bet_year` < "'.$bet_details["year"].'" || (`bet_year` = "'.$bet_details["year"].'" AND `bet_day` <= "'.$bet_day.'"))';
		$bluelostresultlast4_year = $this->cmodel->select_countwhere('game',$countlost_result,$lostbluewherelast4_year);
		
		$wonbluewherelast4_year = 'convert(`bet_value`,decimal)<="-1000" AND convert(`bet_value`,decimal) >="-10000" AND `game_result` = "WON" AND (`bet_year` < "'.$bet_details["year"].'" || (`bet_year` = "'.$bet_details["year"].'" AND `bet_day` <= "'.$bet_day.'"))';
		$wonlostresultlast4_year = $this->cmodel->select_countwhere('game',$countwon_result,$wonbluewherelast4_year);
		if(is_array($wonlostresultlast4_year))
		{ 
	    $bluewonresult4_last_year = $wonlostresultlast4_year['WON'];
	    }
		else{
		 $bluewonresult4_last_year ="";
		} 
		if(is_array($bluelostresultlast4_year))
		{ 
	    $bluelostresult4_last_year = $bluelostresultlast4_year['LOST'];
	    }
		else{
		 $bluelostresult4_last_year ="";
		} 
		
		$totalbluegamelast4_year  = 'convert(`bet_value`,decimal)<="-1000" AND convert(`bet_value`,decimal) >="-10000" AND game_result!="PUSH" AND game_result!="" AND (`bet_year` < "'.$bet_details["year"].'" || (`bet_year` = "'.$bet_details["year"].'" AND `bet_day` <= "'.$bet_day.'"))';
		$totalblueresultlast4_year = $this->cmodel->select_countwhere('game',$counttotal_result,$totalbluegamelast4_year);
		/* 	$total_blue_played 	   = isset($totalblue['COUNT(game_result)']); */
		$total_blue_played_fix4 = $totalblueresultlast4_year['COUNT(game_result)'];
		if($total_blue_played_fix4!='0' && $total_blue_played_fix4!=''){
		$bpercentage_fix4 	   = round(($bluewonresult4_last_year * 100)/$total_blue_played_fix4); 
		}else{
		$bpercentage_fix4 	   =  "0";
		}
		/***** Blue End Last 4 Year ***/
		$bet_year			   =	date("Y",strtotime($bet_details["bet_year"]));
		$old_bet_year		   =	$bet_year-1;
		$show_bt			   =	 $old_bet_year.'-'.$bet_year;
		if($pushbluetodayresult!='0' && $pushbluetodayresult!=''){
		$add_push_blue	=	' / '.$pushbluetodayresult.' Push';
		}else{
		$add_push_blue	= 	null;
		}
		
		
		/*Green section start*/
		
        $greenwhere  				 = 		'convert(`bet_value`,decimal)<="-360" AND convert(`bet_value`,decimal) >="-990" AND `bet_year` = "'.$bet_details["year"].'" AND `bet_day` = "'.$bet_day.'" AND in_progress="no" AND (game_result IS NOT NULL) order by FIELD(game_result,"WON","PUSH","LOST")';
		$greenresult 				 = 		$this->cmodel->select_where('game',$greenwhere);
		/**  Today  ***/
		$lostgreentodayselect 		 = 		'convert(`bet_value`,decimal)<="-360" AND convert(`bet_value`,decimal) >="-990" AND `game_result` = "LOST" AND `bet_year` = "'.$bet_details["year"].'" AND `bet_day` = "'.$bet_day.'"';
		$lostgreentoday				 = 			$this->cmodel->select_countwhere('game',$countlost_result,$lostgreentodayselect);
		$pushgreentodayselect		 =   'convert(`bet_value`,decimal)<="-360" AND convert(`bet_value`,decimal) >="-990" AND `bet_year` = "'.$bet_details["year"].'" AND `game_result`= "PUSH" AND `bet_day` = "'.$bet_day.'"';
		$pushgreentoday 				 =     $this->cmodel->select_countwhere('game',$countpush_result,$pushgreentodayselect);
		/* $blueonewhere 				 = 'convert(`bet_value`,decimal)<="-1000" AND convert(`bet_value`,decimal) >="-10000" AND `bet_year` = "'.$bet_details["year"].'" AND in_progress="no" AND (game_result IS NOT NULL)';
		$boneresult = $this->cmodel->select_where('game',$blueonewhere); */
		/* echo $this->db->last_query();
		echo '</br/>'; */
		$wongreentodayselect          = 'convert(`bet_value`,decimal)<="-360" AND convert(`bet_value`,decimal) >="-990" AND `bet_year` = "'.$bet_details["year"].'" AND `game_result` = "WON" AND `bet_day` = "'.$bet_day.'"';
		$wongreentoday 				 = $this->cmodel->select_countwhere('game',$countwon_result,$wongreentodayselect);
		$greentotaltoday				 = 'convert(`bet_value`,decimal)<="-360" AND convert(`bet_value`,decimal) >="-990" AND `bet_year` = "'.$bet_details["year"].'" AND `bet_day` = "'.$bet_day.'" AND `game_result` != "PUSH" AND `game_result` != "" ';
		$totalgreentoday 			 = $this->cmodel->select_countwhere('game',$counttotal_result,$greentotaltoday);
		$total_green_playedone 		=  $totalgreentoday['COUNT(game_result)'];
		if($total_green_playedone=='0' || $total_green_playedone==''){
			 $total_green_playedone	=  1;
		}
		$totalgreentodaypercent = round(( $wongreentoday['WON'] * 100)/$total_green_playedone); 
		if(is_array($lostgreentoday))
		{ 
	    $lostgreentodayresult = $lostgreentoday['LOST'];
	    }else{
		$lostgreentodayresult = "";
		}
		if(is_array($pushgreentoday))
		{ 
	    $pushgreentodayresult = $pushgreentoday['PUSH'];
	    }else{
		$pushgreentodayresult = "";
		}
		if(is_array($wongreentoday))
		{ 
	    $wongreentodayresult = $wongreentoday['WON'];
	    }else{
		$wongreentodayresult = "";
		} 
		/***** End Today ****/
		/***** Green Last Year ***/
		$lostgreenwherelast_year = 'convert(`bet_value`,decimal)<="-360" AND convert(`bet_value`,decimal) >="-990" AND `game_result` = "LOST" AND `bet_year` = "'.$bet_details["year"].'" AND `bet_day` <= "'.$bet_day.'"';
		$greenlostresultlast_year = $this->cmodel->select_countwhere('game',$countlost_result,$lostgreenwherelast_year);
		$wongreenwherelast_year = 'convert(`bet_value`,decimal)<="-360" AND convert(`bet_value`,decimal) >="-990" AND `game_result` = "WON" AND `bet_day` <= "'.$bet_day.'" AND `bet_year` = "'.$bet_details["year"].'"';
		$greenwonlostresultlast_year = $this->cmodel->select_countwhere('game',$countwon_result,$wongreenwherelast_year);
		if(is_array($greenwonlostresultlast_year))
		{ 
	    $greenwonresult_last_year = $greenwonlostresultlast_year['WON'];
	    }
		else{
		 $greenwonresult_last_year ="";
		} 
		if(is_array($greenlostresultlast_year))
		{ 
	    $greenlostresult_last_year = $greenlostresultlast_year['LOST'];
	    }
		else{
		 $greenlostresult_last_year ="";
		} 
		$totalgreengamelast_year  = 'convert(`bet_value`,decimal)<="-360" AND convert(`bet_value`,decimal) >="-990"  AND `bet_day` <= "'.$bet_day.'" AND game_result!="PUSH" AND  game_result!="" AND `bet_year` = "'.$bet_details["year"].'"';
		$totalgreenresultlast_year = $this->cmodel->select_countwhere('game',$counttotal_result,$totalgreengamelast_year);
		/* 	$total_blue_played 	   = isset($totalblue['COUNT(game_result)']); */
		$total_green_played_fix = $totalgreenresultlast_year['COUNT(game_result)'];
		if($total_green_played_fix!='0' && $total_green_played_fix!=''){
		$greenpercentage_fix 	   = round(($greenwonresult_last_year * 100)/$total_green_played_fix); 
		}else{
		$greenpercentage_fix 	   =  "0";
		}
		/***** Green End Last Year ***/
		/***** Green Last 4 Year ***/
		$lostgreenwherelast4_year = 'convert(`bet_value`,decimal)<="-360" AND convert(`bet_value`,decimal) >="-990" AND `game_result` = "LOST" AND (`bet_year` < "'.$bet_details["year"].'" || (`bet_year` = "'.$bet_details["year"].'" AND `bet_day` <= "'.$bet_day.'"))';
		$greenlostresultlast4_year = $this->cmodel->select_countwhere('game',$countlost_result,$lostgreenwherelast4_year);
		$wongreenwherelast4_year = 'convert(`bet_value`,decimal)<="-360" AND convert(`bet_value`,decimal) >="-990" AND `game_result` = "WON" AND (`bet_year` < "'.$bet_details["year"].'" || (`bet_year` = "'.$bet_details["year"].'" AND `bet_day` <= "'.$bet_day.'"))';
		$greenwonlostresultlast4_year = $this->cmodel->select_countwhere('game',$countwon_result,$wongreenwherelast4_year);
		if(is_array($greenwonlostresultlast4_year))
		{ 
	    $greenwonresult4_last_year = $greenwonlostresultlast4_year['WON'];
	    }
		else{
		$greenwonresult4_last_year ="";
		} 
		if(is_array($greenlostresultlast4_year))
		{ 
	    $greenlostresult4_last_year = $greenlostresultlast4_year['LOST'];
	    }
		else{
		$greenlostresult4_last_year ="";
		} 
		$totalgreengamelast4_year  = 'convert(`bet_value`,decimal)<="-360" AND convert(`bet_value`,decimal) >="-990" AND game_result!="PUSH" AND  game_result!="" AND (`bet_year` < "'.$bet_details["year"].'" || (`bet_year` = "'.$bet_details["year"].'" AND `bet_day` <= "'.$bet_day.'"))';
		$totalgreenresultlast4_year = $this->cmodel->select_countwhere('game',$counttotal_result,$totalgreengamelast4_year);
		/* 	$total_blue_played 	   = isset($totalblue['COUNT(game_result)']); */
		$total_green_played_fix4 = $totalgreenresultlast4_year['COUNT(game_result)'];
		if($total_green_played_fix4!='0' && $total_green_played_fix4!=''){
		$greenpercentage_fix4 	   = round(($greenwonresult4_last_year * 100)/$total_green_played_fix4); 
		}else{
		$greenpercentage_fix4 	   =  "0";
		}
		/***** Green End Last 4 Year ***/
		
		if($pushgreentodayresult!='0' && $pushgreentodayresult!=''){
		$add_push_green	=	' / '.$pushgreentodayresult.' Push';
		}else{
		$add_push_green	= 	null;
		}
		/*Green section end*/
	
        
		/*Orange section start*/
		$orangewhere  				 = 		'convert(`bet_value`,decimal)<="-120" AND convert(`bet_value`,decimal) >="-350" AND `bet_year` = "'.$bet_details["year"].'" AND `bet_day` = "'.$bet_day.'" AND in_progress="no" AND (game_result IS NOT NULL) order by FIELD(game_result,"WON","PUSH","LOST")';
		$orangeresult 				 = 		$this->cmodel->select_where('game',$orangewhere);
		/**  Today  ***/
		$lostorangetodayselect 		 = 		'convert(`bet_value`,decimal)<="-120" AND convert(`bet_value`,decimal) >="-350" AND `game_result` = "LOST" AND `bet_year` = "'.$bet_details["year"].'" AND `bet_day` = "'.$bet_day.'"';
		$lostorangetoday				 = 			$this->cmodel->select_countwhere('game',$countlost_result,$lostorangetodayselect);
		$pushorangetodayselect		 =   'convert(`bet_value`,decimal)<="-120" AND convert(`bet_value`,decimal) >="-350" AND `game_result`= "PUSH" AND `bet_year` = "'.$bet_details["year"].'" AND `bet_day` = "'.$bet_day.'"';
		$pushorangetoday 				 =     $this->cmodel->select_countwhere('game',$countpush_result,$pushorangetodayselect);
		/* $blueonewhere 				 = 'convert(`bet_value`,decimal)<="-1000" AND convert(`bet_value`,decimal) >="-10000" AND `bet_year` = "'.$bet_details["year"].'" AND in_progress="no" AND (game_result IS NOT NULL)';
		$boneresult = $this->cmodel->select_where('game',$blueonewhere); */
		/* echo $this->db->last_query();
		echo '</br/>'; */
		$wonorangetodayselect          = 'convert(`bet_value`,decimal)<="-120" AND convert(`bet_value`,decimal) >="-350" AND `game_result` = "WON" AND `bet_year` = "'.$bet_details["year"].'" AND `bet_day` = "'.$bet_day.'"';
		$wonorangetoday 				 = $this->cmodel->select_countwhere('game',$countwon_result,$wonorangetodayselect);
		$orangetotaltoday				 = 'convert(`bet_value`,decimal)<="-120" AND convert(`bet_value`,decimal) >="-350" AND `bet_year` = "'.$bet_details["year"].'" AND `bet_day` = "'.$bet_day.'" AND `game_result` != "PUSH" AND `game_result` != "" ';
		$totalorangetoday 			 = $this->cmodel->select_countwhere('game',$counttotal_result,$orangetotaltoday);
		$total_orange_playedone 		=  $totalorangetoday['COUNT(game_result)'];
		if($total_orange_playedone=='0' || $total_orange_playedone==''){
			 $total_orange_playedone	=  1;
		}
		$totalorangetodaypercent = round(( $wonorangetoday['WON'] * 100)/$total_orange_playedone); 
		if(is_array($lostorangetoday))
		{ 
	    $lostorangetodayresult = $lostorangetoday['LOST'];
	    }else{
		$lostorangetodayresult = "";
		}
		if(is_array($pushorangetoday))
		{ 
	    $pushorangetodayresult = $pushorangetoday['PUSH'];
	    }else{
		$pushorangetodayresult = "";
		}
		if(is_array($wonorangetoday))
		{ 
	    $wonorangetodayresult = $wonorangetoday['WON'];
	    }else{
		$wonorangetodayresult = "";
		} 
		/***** Orange End Today ****/
		/***** Orange Last Year ***/
		$lostorangewherelast_year = 'convert(`bet_value`,decimal)<="-120" AND convert(`bet_value`,decimal) >="-350" AND `game_result` = "LOST" AND `bet_year` = "'.$bet_details["year"].'" AND `bet_day` <= "'.$bet_day.'"';
		$orangelostresultlast_year = $this->cmodel->select_countwhere('game',$countlost_result,$lostorangewherelast_year);
		$wonorangewherelast_year = 'convert(`bet_value`,decimal)<="-120" AND convert(`bet_value`,decimal) >="-350" AND `game_result` = "WON" AND `bet_day` <= "'.$bet_day.'" AND `bet_year` = "'.$bet_details["year"].'"';
		$orangewonlostresultlast_year = $this->cmodel->select_countwhere('game',$countwon_result,$wonorangewherelast_year);
		if(is_array($orangewonlostresultlast_year))
		{ 
	    $orangewonresult_last_year = $orangewonlostresultlast_year['WON'];
	    }
		else{
		 $orangewonresult_last_year ="";
		} 
		if(is_array($orangelostresultlast_year))
		{ 
	    $orangelostresult_last_year = $orangelostresultlast_year['LOST'];
	    }
		else{
		 $orangelostresult_last_year ="";
		} 
		$totalorangegamelast_year  = 'convert(`bet_value`,decimal)<="-120" AND convert(`bet_value`,decimal) >="-350"  AND `bet_day` <= "'.$bet_day.'" AND game_result!="PUSH" AND  game_result!="" AND `bet_year` = "'.$bet_details["year"].'"';
		$totalorangeresultlast_year = $this->cmodel->select_countwhere('game',$counttotal_result,$totalorangegamelast_year);
		/* 	$total_blue_played 	   = isset($totalblue['COUNT(game_result)']); */
		$total_orange_played_fix = $totalorangeresultlast_year['COUNT(game_result)'];
		if($total_orange_played_fix!='0' && $total_orange_played_fix!=''){
		$orangepercentage_fix 	   = round(($orangewonresult_last_year * 100)/$total_orange_played_fix); 
		}else{
		$orangepercentage_fix 	   =  "0";
		}
		/***** Orange End Last Year ***/
		/***** Orange Last 4 Year ***/
		$lostorangewherelast4_year = 'convert(`bet_value`,decimal)<="-120" AND convert(`bet_value`,decimal) >="-350" AND `game_result` = "LOST" AND (`bet_year` < "'.$bet_details["year"].'" || (`bet_year` = "'.$bet_details["year"].'" AND `bet_day` <= "'.$bet_day.'"))';
		$orangelostresultlast4_year = $this->cmodel->select_countwhere('game',$countlost_result,$lostorangewherelast4_year);
		$wonorangewherelast4_year = 'convert(`bet_value`,decimal)<="-120" AND convert(`bet_value`,decimal) >="-350" AND `game_result` = "WON" AND (`bet_year` < "'.$bet_details["year"].'" || (`bet_year` = "'.$bet_details["year"].'" AND `bet_day` <= "'.$bet_day.'"))';
		$orangewonlostresultlast4_year = $this->cmodel->select_countwhere('game',$countwon_result,$wonorangewherelast4_year);
		if(is_array($orangewonlostresultlast4_year))
		{ 
	    $orangewonresult4_last_year = $orangewonlostresultlast4_year['WON'];
	    }
		else{
		$orangewonresult4_last_year ="";
		} 
		if(is_array($orangelostresultlast4_year))
		{ 
	    $orangelostresult4_last_year = $orangelostresultlast4_year['LOST'];
	    }
		else{
		$orangelostresult4_last_year ="";
		} 
		$totalorangegamelast4_year  = 'convert(`bet_value`,decimal)<="-120" AND convert(`bet_value`,decimal) >="-350" AND game_result!="PUSH" AND  game_result!="" AND (`bet_year` < "'.$bet_details["year"].'" || (`bet_year` = "'.$bet_details["year"].'" AND `bet_day` <= "'.$bet_day.'"))';
		$totalorangeresultlast4_year = $this->cmodel->select_countwhere('game',$counttotal_result,$totalorangegamelast4_year);
		/* 	$total_blue_played 	   = isset($totalblue['COUNT(game_result)']); */
		$total_orange_played_fix4 = $totalorangeresultlast4_year['COUNT(game_result)'];
		if($total_orange_played_fix4!='0' && $total_orange_played_fix4!=''){
		$orangepercentage_fix4 	   = round(($orangewonresult4_last_year * 100)/$total_orange_played_fix4); 
		}else{
		$orangepercentage_fix4 	   =  "0";
		}
		/***** Orange End Last 4 Year ***/
		
		if($pushorangetodayresult!='0' && $pushorangetodayresult!=''){
		$add_push_orange	=	' / '.$pushorangetodayresult.' Push';
		}else{
		$add_push_orange	= 	null;
		}
		/*Orange section start*/
		
		/*Red section start*/		
        $redwhere  				 = 		'convert(`bet_value`,decimal)>="-110" AND `bet_year` = "'.$bet_details["year"].'" AND `bet_day` = "'.$bet_day.'" AND in_progress="no" AND (game_result IS NOT NULL) order by FIELD(game_result,"WON","PUSH","LOST")';
		$redresult 				 = 		$this->cmodel->select_where('game',$redwhere);
		/**  Today  ***/
		$lostredtodayselect 		 = 	'convert(`bet_value`,decimal)>="-110" AND `game_result` = "LOST" AND `bet_year` = "'.$bet_details["year"].'" AND `bet_day` = "'.$bet_day.'"';
		$lostredtoday				 = 			$this->cmodel->select_countwhere('game',$countlost_result,$lostredtodayselect);
		$pushredtodayselect		 =   'convert(`bet_value`,decimal)>="-110" AND `game_result`= "PUSH" AND `bet_year` = "'.$bet_details["year"].'" AND `bet_day` = "'.$bet_day.'"';
		$pushredtoday 				 =     $this->cmodel->select_countwhere('game',$countpush_result,$pushredtodayselect);
		
		$wonredtodayselect          = 'convert(`bet_value`,decimal)>="-110" AND `game_result` = "WON" AND  `bet_year` = "'.$bet_details["year"].'" AND `bet_day` = "'.$bet_day.'"';
		$wonredtoday 				 = $this->cmodel->select_countwhere('game',$countwon_result,$wonredtodayselect);
		$redtotaltoday				 = 'convert(`bet_value`,decimal)>="-110"  AND `bet_year` = "'.$bet_details["year"].'" AND `bet_day` = "'.$bet_day.'" AND `game_result` != "PUSH" AND `game_result` != "" ';
		$totalredtoday 			 = $this->cmodel->select_countwhere('game',$counttotal_result,$redtotaltoday);
		$total_red_playedone 		=  $totalredtoday['COUNT(game_result)'];
		if($total_red_playedone=='0' || $total_red_playedone==''){
			 $total_red_playedone	=  1;
		}
		$totalredtodaypercent = round(( $wonredtoday['WON'] * 100)/$total_red_playedone); 
		if(is_array($lostredtoday))
		{ 
	    $lostredtodayresult = $lostredtoday['LOST'];
	    }else{
		$lostredtodayresult = "";
		}
		if(is_array($pushredtoday))
		{ 
	    $pushredtodayresult = $pushredtoday['PUSH'];
	    }else{
		$pushredtodayresult = "";
		}
		if(is_array($wonredtoday))
		{ 
	    $wonredtodayresult = $wonredtoday['WON'];
	    }else{
		$wonredtodayresult = "";
		} 
		/***** Red End Today ****/
		/***** Red Last Year ***/
		$lostredwherelast_year = 'convert(`bet_value`,decimal)>="-110" AND `game_result` = "LOST" AND `bet_year` = "'.$bet_details["year"].'" AND `bet_day` <= "'.$bet_day.'"';
		$redlostresultlast_year = $this->cmodel->select_countwhere('game',$countlost_result,$lostredwherelast_year);
		$wonredwherelast_year = 'convert(`bet_value`,decimal)>="-110" AND `game_result` = "WON" AND `bet_day` <= "'.$bet_day.'" AND `bet_year` = "'.$bet_details["year"].'"';
		$redwonlostresultlast_year = $this->cmodel->select_countwhere('game',$countwon_result,$wonredwherelast_year);
		if(is_array($redwonlostresultlast_year))
		{ 
	    $redwonresult_last_year = $redwonlostresultlast_year['WON'];
	    }
		else{
		 $redwonresult_last_year ="";
		} 
		if(is_array($redlostresultlast_year))
		{ 
	    $redlostresult_last_year = $redlostresultlast_year['LOST'];
	    }
		else{
		 $redlostresult_last_year ="";
		} 
		$totalredgamelast_year  = 'convert(`bet_value`,decimal)>="-110"  AND `bet_day` <= "'.$bet_day.'" AND game_result!="PUSH" AND  game_result!="" AND `bet_year` = "'.$bet_details["year"].'"';
		$totalredresultlast_year = $this->cmodel->select_countwhere('game',$counttotal_result,$totalredgamelast_year);
		/* 	$total_blue_played 	   = isset($totalblue['COUNT(game_result)']); */
		$total_red_played_fix = $totalredresultlast_year['COUNT(game_result)'];
		if($total_red_played_fix!='0' && $total_red_played_fix!=''){
		$redpercentage_fix 	   = round(($redwonresult_last_year * 100)/$total_red_played_fix); 
		}else{
		$redpercentage_fix 	   =  "0";
		}
		/***** Red End Last Year ***/
		/***** Red Last 4 Year ***/
		$lostredwherelast4_year = 'convert(`bet_value`,decimal)>="-110" AND `game_result` = "LOST" AND (`bet_year` < "'.$bet_details["year"].'" || (`bet_year` = "'.$bet_details["year"].'" AND `bet_day` <= "'.$bet_day.'"))';
		$redlostresultlast4_year = $this->cmodel->select_countwhere('game',$countlost_result,$lostredwherelast4_year);
		$wonredwherelast4_year = 'convert(`bet_value`,decimal)>="-110" AND `game_result` = "WON" AND (`bet_year` < "'.$bet_details["year"].'" || (`bet_year` = "'.$bet_details["year"].'" AND `bet_day` <= "'.$bet_day.'"))';
		$redwonlostresultlast4_year = $this->cmodel->select_countwhere('game',$countwon_result,$wonredwherelast4_year);
		if(is_array($redwonlostresultlast4_year))
		{ 
	    $redwonresult4_last_year = $redwonlostresultlast4_year['WON'];
	    }
		else{
		$redwonresult4_last_year ="";
		} 
		if(is_array($redlostresultlast4_year))
		{ 
	    $redlostresult4_last_year = $redlostresultlast4_year['LOST'];
	    }
		else{
		$redlostresult4_last_year ="";
		} 
		$totalredgamelast4_year  = 'convert(`bet_value`,decimal)>="-110" AND game_result!="PUSH" AND  game_result!="" AND (`bet_year` < "'.$bet_details["year"].'" || (`bet_year` = "'.$bet_details["year"].'" AND `bet_day` <= "'.$bet_day.'"))';
		$totalredresultlast4_year = $this->cmodel->select_countwhere('game',$counttotal_result,$totalredgamelast4_year);
		/* 	$total_blue_played 	   = isset($totalblue['COUNT(game_result)']); */
		$total_red_played_fix4 = $totalredresultlast4_year['COUNT(game_result)'];
		if($total_red_played_fix4!='0' && $total_red_played_fix4!=''){
		$redpercentage_fix4 	   = round(($redwonresult4_last_year * 100)/$total_red_played_fix4); 
		}else{
		$redpercentage_fix4 	   =  "0";
		}
		/***** Red End Last 4 Year ***/
		
		if($pushredtodayresult!='0' && $pushredtodayresult!=''){
		$add_push_red	=	' / '.$pushredtodayresult.' Push';
		}else{
		$add_push_red	= 	null;
		}
	   
	 $data['html'] .= '<div class="upper-data"><h3>'.$league.' Picks 
	<span class="pull-right">'.$show_bet_year.'</span></h3>
    <h3>'.$day.', '.$month.' '.$shortdate.'<span class="pull-right">Bet Day '.$bet_day.'</span></h3><h3>Bankroll Bet '.$bankroll.'%</h3>
	<input type="hidden" class="betid" value="'.$betid.'" /> 
	</div>
	<div class="snd-data">
	';
	/* echo '<pre>';print_R($bet_details);die; */
	$bet_day_q  = $this->cmodel->select_where('game',array('bet_day'=>$bet_details['bet_day'],'in_progress'=>'yes'));
		
		/* echo '<pre>';print_R($bet_day_q);die; */
	if(count($bet_day_q)>0){
		$data['html'] .= '<h4 class="text-center">Active Games</h4>
		<div class="heading row">
		  <div class="col-xs-5">
			 <p>OUR PICK</p>
		  </div>
		  <div class="col-xs-3">
			 <p>LINE</p>
		  </div>
		  <div class="col-xs-4">
			 <p>OPPONENT</p>
		  </div>
		</div>';
		foreach($bet_day_q  as $data_bet_day) {
			
			if($data_bet_day['our_pickvalue']==$data_bet_day['home_team']) {
				if($data_bet_day['our_pick_score']==''){
					$data_bet_day['our_pick_score']= '0';
				}if($data_bet_day['opp_score']==''){
					$data_bet_day['opp_score']= '0';
				}
				$team_str	=	$data_bet_day['home_teamtext'].' '.$data_bet_day['our_pick_score'].' vs '.$data_bet_day['away_teamtext'].' '.$data_bet_day['opp_score'];
					$our_left	=	$data_bet_day['home_teamtext'];
					$our_right	=	$data_bet_day['away_teamtext'];
					
			}else if($data_bet_day['our_pickvalue']==$data_bet_day['away_team']){
				
				if($data_bet_day['our_pick_score']==''){
				$data_bet_day['our_pick_score']= '0';
				}if($data_bet_day['opp_score']==''){
					$data_bet_day['opp_score']= '0';
				}
				$team_str	=	$data_bet_day['away_teamtext'].' '.$data_bet_day['our_pick_score'].' @ '.$data_bet_day['home_teamtext'].' '.$data_bet_day['opp_score'];
				$our_left	=	$data_bet_day['away_teamtext'];
				$our_right	=	$data_bet_day['home_teamtext'];
			}
			if($data_bet_day['league']=='mlb'){
				$sho	=	'INN';
				$stt	=	"style='display:none'";
			}else{
				$sho	=	'QTR';
				$stt	=	null;
			}
			if($data_bet_day['time_left']!=''){
				$trp	='<b>'.$data_bet_day['time_left'].':'.$data_bet_day['sec_left'].' Left</b>';
			}else{
				$trp	='';
			}
			$data['html'] .='<div class="row" style="">
<div class="col-xs-5"> '.$our_left.'</div>
						<div class="col-xs-3">'.$data_bet_day['bet_value'].'</div>
					<div class="col-xs-4">'.$our_right.'</div>
					
</div>';
			$data['html'] .= '<table width="90%" style="margin-left:30px">';
			$data['html'] .= '<tbody>';
			$data['html'] .= '<tr style="">
			  <td colspan="3" class="" style="padding: 0px;">
			 <div class="arizona_content" style=" background-color: rgb(248, 174, 56);
				border: 1px solid rgb(102, 102, 102);
				float: left;
				padding: 2px 10px;
				width: 100%;"> <div class="arizona_colorado"><b>
					'.$team_str.'
				</b></div> <div class="arizona_qtr text-right" style="width:60%;float:left;">
				  '.$sho.' '.$data_bet_day['period'].'</div><span class="arizona_qtr" ' . $stt. ' style="display:block;text-align:right;">'.$trp.'</span>
				
			</div>
			  </td>
			</tr></table>'	;
				/* echo '<pre>';print_r($data_bet_day);echo'</pre>'; */	
		}
	}
	$bet_year	=	date("Y",strtotime($bet_details["bet_year"]));
	$bet_month = date('m',strtotime($bet_details["bet_year"]));
						if($bet_month>=9)
							$bet_year += 1;
						$old_bet_year	=	$bet_year-1;
						$show_bt	=	 $old_bet_year.'-'.$bet_year;
						
      $data['html'] .= '</div>';
				/***** Blue Html ****/
		$data['html'] .= '<div class="blue">
                    <div class="table-data">
                       <h4 class="text-center padd_class">Completed <span class="blue"> Blue</span> Games</h4>
                       <h4 class="text-center color">(-1000 to -10000 Moneyline Favorites)</h4>
                       <table class="">
                          <tbody>
                             <tr>
                                <td style="padding-left:6px;">Today</td>
                                <td>'.$wonbluetodayresult.' Won / Lost '.$lostbluetodayresult.$add_push_blue.' </td>
                                <td style="width:32px;text-align:right;"> '.$totalbluetodaypercent.'% </td>
                             </tr>
							
							  <tr>
                                <td style="padding-left:6px;">'.$show_bt.'</td>
                                <td>'.$bluewonresult_last_year.' Won / Lost '.$bluelostresult_last_year.' </td>
                                <td style="width:32px;text-align:right;"> '.$bpercentage_fix.'% </td>
                             </tr>
							  <tr>
                                <td style="padding-left:6px;">Last 4+ Years</td>
                                <td>'.$bluewonresult4_last_year.' Won / Lost '.$bluelostresult4_last_year.' </td>
                                <td style="width:32px;text-align:right;"> '.$bpercentage_fix4.'% </td>
                             </tr>
                          </tbody>
                       </table>
                    </div>
					<div class="snd-table-data">
                       <table>
                          <thead>
							<tr>
								<th style="width: 100px; text-align: left;">Our&nbsp;Pick</th>
								<th style="width: 60px; text-align: center;">Line</th>
								<th style="width: 60px; text-align: left;">Opponent</th>
								<th style="width: 50px; text-align: center;">Score</th>
								<th style="width: 40px; text-align: left;">Result</th>
							</tr>
                          </thead>
                          <tbody class="fintab">';
						foreach($blueresult as $brow)
		                {
							if($brow['our_pickvalue']==$brow['home_team']){
							   $bour_pick_text = $brow['home_teamtext'];
							   $baway_pick_text = $brow['away_teamtext'];
							}else{
							   $bour_pick_text = $brow['away_teamtext'];
							   $baway_pick_text = $brow['home_teamtext'];
							}
							$bbet_value = $brow['bet_value'];
							$bopp_score = $brow['opp_score'];
							$bour_pick_score = $brow['our_pick_score'];
							$bgame_result = $brow['game_result'];
							
							if($bgame_result=='LOST'){
								$bg_color	=	'background:#f2647b !important;';
							}elsE if($bgame_result=='PUSH'){
								$bg_color	=	"background:#bdd1ff !important;";
							}else{
								$bg_color	=	"background:#6ddd4e !important;";
							}
							$data['html'] .= '<tr class="completedRow" style="'.$bg_color.' vertical-align:top;">
								 <td style="width: 100px;text-align: left;padding-left:2px;padding-right:2px;text-overflow: clip;">'.$brow['our_picktext'].'</td>
								  <td style="width: 60px; text-align: center; padding-left:2px; padding-right:2px;">'.$bbet_value.'</td>
								  <td style="width: 60px; text-align: left; padding-left:2px; padding-right:2px;">'.$baway_pick_text.'</td>
								  <td style="width: 50px; text-align: center; ">'.$bour_pick_score.'-'.$bopp_score.'</td>
								 <td style="width: 40px; padding-left:2px;">'.$bgame_result.'</td>
								 </tr>';
						}
					   $data['html'] .='  </tbody>
					</table>
                    </div>
                    </div>';
					/***** Green Html ****/
		$data['html'] .= '<div class="green">
                    <div class="table-data">
                       <h4 class="text-center">Completed <span class="green"> Green</span> Games</h4>
                       <h4 class="text-center color">(-360 to -990 Moneyline Favorites)</h4>
                       <table class="">
                          <tbody>
                             <tr>
                                <td style="padding-left:6px;">Today</td>
                                <td>'.$wongreentodayresult.' Won / Lost '.$lostgreentodayresult.$add_push_green.' </td>
                                <td style="width:32px;text-align:right;"> '.$totalgreentodaypercent.'% </td>
                             </tr>
							
							  <tr>
                                <td style="padding-left:6px;">'.$show_bt.'</td>
                                <td>'.$greenwonresult_last_year.' Won / Lost '.$greenlostresult_last_year.' </td>
                                <td style="width:32px;text-align:right;"> '.$greenpercentage_fix.'% </td>
                             </tr>
							  <tr>
                                <td style="padding-left:6px;">Last 4+ Years</td>
                                <td>'.$greenwonresult4_last_year.' Won / Lost '.$greenlostresult4_last_year.' </td>
                                <td style="width:32px;text-align:right;"> '.$greenpercentage_fix4.'% </td>
                             </tr>
                          </tbody>
                       </table>
                    </div>
					<div class="snd-table-data">
                       <table>
                          <thead>
							<tr>
								<th style="width: 100px; text-align: left;">Our&nbsp;Pick</th>
								<th style="width: 60px; text-align: center;">Line</th>
								<th style="width: 60px; text-align: left;">Opponent</th>
								<th style="width: 50px; text-align: center;">Score</th>
								<th style="width: 40px; text-align: left;">Result</th>
							</tr>
                          </thead>
                          <tbody class="fintab">';
						foreach($greenresult as $grow)
		                {
							if($grow['our_pickvalue']==$grow['home_team']){
							   $bour_pick_text = $grow['home_teamtext'];
							   $baway_pick_text = $grow['away_teamtext'];
							}else{
							   $bour_pick_text = $grow['away_teamtext'];
							   $baway_pick_text = $grow['home_teamtext'];
							}
							$bbet_value = $grow['bet_value'];
							$bopp_score = $grow['opp_score'];
							$bour_pick_score = $grow['our_pick_score'];
							$bgame_result = $grow['game_result'];
							
							if($bgame_result=='LOST'){
								$bg_color	=	'background:#f2647b !important;';
							}elsE if($bgame_result=='PUSH'){
								$bg_color	=	"background:#bdd1ff !important;";
							}else{
								$bg_color	=	"background:#6ddd4e !important;";
							}
							$data['html'] .= '<tr class="completedRow" style="'.$bg_color.' vertical-align:top;">
								 <td style="width: 100px;text-align: left;padding-left:2px;padding-right:2px;text-overflow: clip;">'.$grow['our_picktext'].'</td>
								  <td style="width: 60px; text-align: center; padding-left:2px; padding-right:2px;">'.$bbet_value.'</td>
								  <td style="width: 60px; text-align: left; padding-left:2px; padding-right:2px;">'.$baway_pick_text.'</td>
								  <td style="width: 50px; text-align: center; ">'.$bour_pick_score.'-'.$bopp_score.'</td>
								 <td style="width: 40px; padding-left:2px;">'.$bgame_result.'</td>
								 </tr>';
						}
					   $data['html'] .='  </tbody>
					</table>
                    </div>
                    </div>';
				/***** End Grren Html ****/	
			
					/***** orange Html ****/
		$data['html'] .= '<div class="orange">
                    <div class="table-data">
                         <h4 class="text-center">Completed <span class="orange"> Orange</span> Games</h4>
                       <h4 class="text-center color">(-120 to -350 Moneyline Favorites)</h4>
                       <table class="">
                          <tbody>
                             <tr>
                                <td style="padding-left:6px;">Today</td>
                                <td>'.$wonorangetodayresult.' Won / Lost '.$lostorangetodayresult.$add_push_orange.' </td>
                                <td style="width:32px;text-align:right;"> '.$totalorangetodaypercent.'% </td>
                             </tr>
							
							  <tr>
                                <td style="padding-left:6px;">'.$show_bt.'</td>
                                <td>'.$orangewonresult_last_year.' Won / Lost '.$orangelostresult_last_year.' </td>
                                <td style="width:32px;text-align:right;"> '.$orangepercentage_fix.'% </td>
                             </tr>
							  <tr>
                                <td style="padding-left:6px;">Last 4+ Years</td>
                                <td>'.$orangewonresult4_last_year.' Won / Lost '.$orangelostresult4_last_year.' </td>
                                <td style="width:32px;text-align:right;"> '.$orangepercentage_fix4.'% </td>
                             </tr>
                          </tbody>
                       </table>
                    </div>
					<div class="snd-table-data">
                       <table>
                          <thead>
							<tr>
								<th style="width: 100px; text-align: left;">Our&nbsp;Pick</th>
								<th style="width: 60px; text-align: center;">Line</th>
								<th style="width: 60px; text-align: left;">Opponent</th>
								<th style="width: 50px; text-align: center;">Score</th>
								<th style="width: 40px; text-align: left;">Result</th>
							</tr>
                          </thead>
                          <tbody class="fintab">';
						foreach($orangeresult as $grow)
		                {
							if($grow['our_pickvalue']==$grow['home_team']){
							   $bour_pick_text = $grow['home_teamtext'];
							   $baway_pick_text = $grow['away_teamtext'];
							}else{
							   $bour_pick_text = $grow['away_teamtext'];
							   $baway_pick_text = $grow['home_teamtext'];
							}
							$bbet_value = $grow['bet_value'];
							$bopp_score = $grow['opp_score'];
							$bour_pick_score = $grow['our_pick_score'];
							$bgame_result = $grow['game_result'];
							
							if($bgame_result=='LOST'){
								$bg_color	=	'background:#f2647b !important;';
							}elsE if($bgame_result=='PUSH'){
								$bg_color	=	"background:#bdd1ff !important;";
							}else{
								$bg_color	=	"background:#6ddd4e !important;";
							}
							$data['html'] .= '<tr class="completedRow" style="'.$bg_color.' vertical-align:top;">
								 <td style="width: 100px;text-align: left;padding-left:2px;padding-right:2px;text-overflow: clip;">'.$grow['our_picktext'].'</td>
								  <td style="width: 60px; text-align: center; padding-left:2px; padding-right:2px;">'.$bbet_value.'</td>
								  <td style="width: 60px; text-align: left; padding-left:2px; padding-right:2px;">'.$baway_pick_text.'</td>
								  <td style="width: 50px; text-align: center; ">'.$bour_pick_score.'-'.$bopp_score.'</td>
								 <td style="width: 40px; padding-left:2px;">'.$bgame_result.'</td>
								 </tr>';
						}
					   $data['html'] .='  </tbody>
					</table>
                    </div>
                    </div>';
				/***** End Orange Html ****/	
				
					/***** red Html ****/
		$data['html'] .= '<div class="red">
                    <div class="table-data">
                      <h4 class="text-center">Completed <span class="red"> Red</span> Games</h4>
                       <h4 class="text-center color">(-110 Spreads and Moneyline Undergoes)</h4>
                       <table class="">
                          <tbody>
                             <tr>
                                <td style="padding-left:6px;">Today</td>
                                <td>'.$wonredtodayresult.' Won / Lost '.$lostredtodayresult.$add_push_red.' </td>
                                <td style="width:32px;text-align:right;"> '.$totalredtodaypercent.'% </td>
                             </tr>
							
							  <tr>
                                <td style="padding-left:6px;">'.$show_bt.'</td>
                                <td>'.$redwonresult_last_year.' Won / Lost '.$redlostresult_last_year.' </td>
                                <td style="width:32px;text-align:right;"> '.$redpercentage_fix.'% </td>
                             </tr>
							  <tr>
                                <td style="padding-left:6px;">Last 4+ Years</td>
                                <td>'.$redwonresult4_last_year.' Won / Lost '.$redlostresult4_last_year.' </td>
                                <td style="width:32px;text-align:right;"> '.$redpercentage_fix4.'% </td>
                             </tr>
                          </tbody>
                       </table>
                    </div>
					<div class="snd-table-data">
                       <table>
                          <thead>
							<tr>
								<th style="width: 100px; text-align: left;">Our&nbsp;Pick</th>
								<th style="width: 60px; text-align: center;">Line</th>
								<th style="width: 60px; text-align: left;">Opponent</th>
								<th style="width: 50px; text-align: center;">Score</th>
								<th style="width: 40px; text-align: left;">Result</th>
							</tr>
                          </thead>
                          <tbody class="fintab">';
						foreach($redresult as $grow)
		                {
							if($grow['our_pickvalue']==$grow['home_team']){
							   $bour_pick_text = $grow['home_teamtext'];
							   $baway_pick_text = $grow['away_teamtext'];
							}else{
							   $bour_pick_text = $grow['away_teamtext'];
							   $baway_pick_text = $grow['home_teamtext'];
							}
							$bbet_value = $grow['bet_value'];
							$bopp_score = $grow['opp_score'];
							$bour_pick_score = $grow['our_pick_score'];
							$bgame_result = $grow['game_result'];
							
							if($bgame_result=='LOST'){
								$bg_color	=	'background:#f2647b !important;';
							}elsE if($bgame_result=='PUSH'){
								$bg_color	=	"background:#bdd1ff !important;";
							}else{
								$bg_color	=	"background:#6ddd4e !important;";
							}
							$data['html'] .= '<tr class="completedRow" style="'.$bg_color.' vertical-align:top;">
								 <td style="width: 100px;text-align: left;padding-left:2px;padding-right:2px;text-overflow: clip;">'.$grow['our_picktext'].'</td>
								  <td style="width: 60px; text-align: center; padding-left:2px; padding-right:2px;">'.$bbet_value.'</td>
								  <td style="width: 60px; text-align: left; padding-left:2px; padding-right:2px;">'.$baway_pick_text.'</td>
								  <td style="width: 50px; text-align: center; ">'.$bour_pick_score.'-'.$bopp_score.'</td>
								 <td style="width: 40px; padding-left:2px;">'.$bgame_result.'</td>
								 </tr>';
						}
					   $data['html'] .='  </tbody>
					</table>
                    </div>
                    </div>';
				/***** End Red Html ****/	
				
					
					$data['html'] .=''.$lastdiv.'
					<br /><div class="track_img">
					<img src="http://www.vegasfootballclub.com.php56-17.dfw3-1.websitetestlink.com/Splash_files/track300.jpg">
				</div><br/><br/><br/><br/><br/>'; 
		if($ID) return $data;
		echo json_encode($data); 
	}
	
	public function calcListingTime($time) {
		$listing = date('g:30 a', strtotime($time));
		$cur_min = intval(date('i', strtotime($time)));
		
		if($cur_min <= 15)
			$listing = date('g:00 a', strtotime($listing. ' - 30 minute'));
		else if($cur_min >= 46)
			$listing = date('g:00 a', strtotime($listing. ' + 30 minute'));
		return $listing;
	}
}
?>