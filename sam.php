<?php
			/*blue section start*/
			$bet_day	 				 =		$bet_details['bet_day'];
            $bluewhere  				 = 		'convert(`bet_value`,decimal)<="-1000" AND convert(`bet_value`,decimal) >="-10000" AND `bet_day` = "'.$bet_day.'" AND in_progress="no" AND (game_result IS NOT NULL) order by FIELD(game_result,"WON","PUSH","LOST")';
			$blueresult 				 = 		$this->cmodel->select_where('game',$bluewhere);
			
			/**  Today  ***/
			$lostbluetodayselect 		 = 		'convert(`bet_value`,decimal)<="-1000" AND convert(`bet_value`,decimal) >="-10000" AND `game_result` = "LOST" AND `bet_day` = "'.$bet_day.'"';
			$lostbluetoday				 = 			$this->cmodel->select_countwhere('game',$countlost_result,$lostbluetodayselect);
			$pushbluetodayselect		 =   'convert(`bet_value`,decimal)<="-1000" AND convert(`bet_value`,decimal) >="-10000" AND `game_result`= "PUSH" AND `bet_day` = "'.$bet_day.'"';
			$pushbluetoday 				 =     $this->cmodel->select_countwhere('game',$countpush_result,$pushbluetodayselect);
			/* $blueonewhere 				 = 'convert(`bet_value`,decimal)<="-1000" AND convert(`bet_value`,decimal) >="-10000" AND `bet_year` = "'.$bet_details["year"].'" AND in_progress="no" AND (game_result IS NOT NULL)';
			$boneresult = $this->cmodel->select_where('game',$blueonewhere); */
			/* echo $this->db->last_query();
			echo '</br/>'; */
			$wonbluetodayselect          = 'convert(`bet_value`,decimal)<="-1000" AND convert(`bet_value`,decimal) >="-10000" AND `game_result` = "WON" AND `bet_day` = "'.$bet_day.'"';
			$wonbluetoday 				 = $this->cmodel->select_countwhere('game',$countwon_result,$wonbluetodayselect);
			$bluetotaltoday				 = 'convert(`bet_value`,decimal)<="-1000" AND convert(`bet_value`,decimal) >="-10000"  AND `bet_day` = "'.$bet_day.'" AND `game_result` != "PUSH" AND `game_result` != "" ';
			$totalbluetoday 			 = $this->cmodel->select_countwhere('game',$counttotal_result,$bluetotaltoday);

			$lostblueonewhere = 'convert(`bet_value`,decimal)<="-1000" AND convert(`bet_value`,decimal) >="-10000" AND `game_result` = "LOST" AND `bet_year` = "'.$bet_details["year"].'" AND `bet_day` <= "'.$bet_day.'"';
			$blostoneresult = $this->cmodel->select_countwhere('game',$countlost_result,$lostblueonewhere);
			$total_blue_playedone 		=  $totalbluetoday['COUNT(game_result)'];
			if($total_blue_playedone=='0' || $total_blue_playedone==''){
				 $total_blue_playedone	=  1;
			}
			$totaltodaypercent = round(( $wonbluetoday['WON'] * 100)/$total_blue_playedone); 

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
			$wonbluewherelast_year = 'convert(`bet_value`,decimal)<="-1000" AND convert(`bet_value`,decimal) >="-10000" AND `game_result` = "WON" AND `bet_day` <= "'.$bet_day.'" ';
			$bwonresult = $this->cmodel->select_countwhere('game',$countwon_result,$wonbluewhere);
			
			if(is_array($wonbluetoday))
			{ 
		    $bwonresult1 = $wonbluetoday['WON'];
		    }
			else{
			$bwonresult1 ="";
			} 
			
			$wonbluegame =  $bwonresult['WON'];
			
			$totalbluegame = 'convert(`bet_value`,decimal)<="-1000" AND convert(`bet_value`,decimal) >="-10000"  AND `bet_day` = "'.$bet_day.'" AND game_result!="PUSH" AND  game_result!=""';
			
			$totalblue = $this->cmodel->select_countwhere('game',$counttotal_result,$totalbluegame);

		/* 	$total_blue_played 	   = isset($totalblue['COUNT(game_result)']); */
			$total_blue_played_fix = $totalblue['COUNT(game_result)'];
			
		Q
			if($total_blue_played_fix!='0' && $total_blue_played_fix!=''){
			$bpercentage_fix 	   = round(($wonbluegame * 100)/$total_blue_played_fix); 
			}else{
			$bpercentage_fix 	   =  "0";
			}
			$bet_year			   =	date("Y",strtotime($bet_details["bet_year"]));
			$old_bet_year		   =	$bet_year-1;
			$show_bt			   =	 $old_bet_year.'-'.$bet_year;
			
			if($pushbluetodayresult!='0' && $pushbluetodayresult!=''){
			$add_push_blue	=	' / '.$pushbluetodayresult.' Push';
			}else{
			$add_push_blue	= 	null;
			}
			
			
			$data['html'] .= '</div>';
			
					$data['html'] .= '<div class="blue">
                        <div class="table-data">
                           <h4 class="text-center padd_class">Completed <span class="blue"> Blue</span> Games</h4>
                           <h4 class="text-center color">(-1000 to -10000 Moneyline Favorites)</h4>
                           <table class="">
                              <tbody>
                                 <tr>
                                    <td style="padding-left:6px;">Today</td>
                                    <td>'.$bwonresult1.' Won / Lost '.$lostbluetoday['LOST'].$add_push_blue.' </td>
                                    <td style="width:32px;text-align:right;"> '.$bpercentage_fix.'% </td>
                                 </tr>
								
								  <tr>
                                    <td style="padding-left:6px;">'.$show_bt.'</td>
                                    <td>'.$bwononeresult['WON'].' Won / Lost '.$blostoneresult['LOST'].' </td>
                                    <td style="width:32px;text-align:right;"> '.$bpercentageone.'% </td>
                                 </tr>
								  <tr>
                                    <td style="padding-left:6px;">Last 4+ Years</td>
                                    <td>'.$bwononeresult['WON'].' Won / Lost '.$blostoneresult['LOST'].' </td>
                                    <td style="width:32px;text-align:right;"> '.$bpercentageone.'% </td>
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



?>