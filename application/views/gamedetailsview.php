<!DOCTYPE HTML>
<html lang="en-US">
<head> 
	<meta charset="UTF-8">
	<title>Underdog KINGS</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.2/css/swiper.min.css">
	<link rel="stylesheet" href="<?php echo base_url('adminassets'); ?>/css/g_style.css" />
	<style type="text/css">
	.msg_box {
		width: 304px;
		border: 2px solid #2837ef;
		text-align: left;
		font-family: sans-serif;
		font-size: 15pt;
		line-height: 130%;
		padding: 6px 6px 6px 6px;
		margin-bottom: 10px;
	}
	.msg_box p {
		margin-bottom: 10px;
	} .msg{display:none;}
	.upper-data , .snd-data,.blue,.green,.orange,.red,.new_div,.track_img {display:none;}

	</style>
</head>
<body>
	<div id="main">
        <div id="top">
            Our Picks v3.1.0
        </div>
		<input type="hidden" name="which_day" id="which_day" value="x">
		<input type="hidden" name="actual_id" id="actual_id" value="<?php if(isset($bet_details['id'])){ echo $bet_details['id']; } ?>">
		<input type="hidden" name="gameids" class="gameidss" value="<?php if(isset($bresult['id'])){ echo $bresult['id']; } ?>" />
		<div align="center" id="loading_div">
				<img src="http://underdogkings.com/Splash_files/loading.gif">
		</div>
		<div id="contentWrapper">
			
			<div id="content" class="swiper-container">
				<div class="swiper-wrapper">
				<?php if(count($bets)): ?>
					<!-- Slides -->
					<?php foreach($bets as $bet): ?>
					<div class="swiper-slide"><?php echo $bet; ?></div>
					<?php endforeach; ?>
				<?php endif; ?>
					
				
				<?php  
					if(isset($bet_details))
						$addstyle = 'display:none;';
					else
						$addstyle =	'';
				?><div class="swiper-slide">
					<?php 
					if(isset($bet_details))
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
					?>	
					
					<div class="upper-data">
						<h3><?php if(isset($bet_details['league'])){ echo $bet_details['league']; }?> Picks <span class="pull-right"><?php if(isset($bet_details['bet_year'])){ echo $show_bet_year; }?></span></h3>
						<h3><?php if(isset($bet_details['day'])){ echo $bet_details['day']; } ?>, <?php if(isset($bet_details['bet_year'])){ echo date('M',strtotime($bet_details['bet_year'])); }?> <?php if(isset($bet_details['bet_year'])){ echo date('d',strtotime($bet_details['bet_year'])); }?><span class="pull-right">Bet Day <?php if(isset($bet_details['bet_day'])){ echo $bet_details['bet_day']; } ?> </span></h3>
						<h3>Bankroll Bet <?php if(isset($bet_details['bankroll'])){ echo $bet_details['bankroll'].'%'; } ?></h3>
						<input type="hidden" class="betid" value="<?php if(isset($bet_details['id'])){ echo $bet_details['id']; } else{ if(isset($nextbetday)) echo $nextbetday['id']; } ?>" />
                    </div>
                    <div class="snd-data">                       
					<?PHP if(count($bet_day_q)>0){
						echo '<h4 class="text-center">Active Games</h4>
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
							echo '<div class="row" style="">
				<div class="col-xs-5"> '.$our_left.'</div>
										<div class="col-xs-3">'.$data_bet_day['bet_value'].'</div>
									<div class="col-xs-4">'.$our_right.'</div>
									
				</div>';
							echo '<table width="90%" style="margin-left:30px">';
							echo '<tbody>';
							echo '<tr style="">
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
							</tr></table>';
								/* echo '<pre>';print_r($data_bet_day);echo'</pre>'; */	
						}
					}
	  ?>			
						
                    </div>
						<!--Start of blue game-->
					<div class="blue">
						<div class="table-data">
							<h4 class="text-center padd_class">Completed <span class="blue"> Blue</span> Games</h4>
							<h4 class="text-center color">(-1000 to -10000 Moneyline Favorites)</h4>
							<table class="">
							  <tbody>
								 <tr>
									<td style="padding-left:6px;">Today</td>
									<td><?php if(isset($bwonresult)) { echo $bwonresult['WON']; } ?> Won / <?php  if(isset($blostresult)) {echo $blostresult['LOST']; } ?> Lost </td>
									<td style="width:32px;text-align:right;"><?php  if(isset($bpercentage)) { echo $bpercentage; }?>% </td>
								 </tr>
								 <tr>
									<td style="padding-left:6px;"><?PHP  $bet_year	=	date("Y",strtotime($bet_details["bet_year"]));
										$old_bet_year	=	$bet_year-1;
										echo $old_bet_year.'-'.$bet_year;
									?></td>
									<td><?php if(isset($bluewonresult_last_year)) { echo $bluewonresult_last_year; } ?> Won / <?php  if(isset($bluelostresult_last_year)) {echo $bluelostresult_last_year; } ?> Lost </td>
									<td style="width:32px;text-align:right;"><?php  if(isset($bpercentage_fix)) { echo $bpercentage_fix; }?>% </td>
								 </tr>
								  <tr>
									<td style="padding-left:6px;">Last 4+ Years</td>
									<td><?php if(isset($bluewonresult4_last_year)) { echo $bluewonresult4_last_year; } ?> Won / <?php  if(isset($bluelostresult4_last_year)) {echo $bluelostresult4_last_year; } ?> Lost </td>
									<td style="width:32px;text-align:right;"><?php  if(isset($bpercentage_fix4)) { echo $bpercentage_fix4; }?>% </td>
								 </tr>
							  </tbody>
							</table>
						</div>
						<div class="snd-table-data">
						   <table class="table-responsive">
							  <thead>
								 <tr>
									<th style="width: 100px; text-align: left;">Our&nbsp;Pick</th>
									<th style="width: 60px; text-align: center;">Line</th>
									<th style="width: 60px; text-align: left;">Opponent</th>
									<th style="width: 50px; text-align: center;">Score</th>
									<th style="width: 40px; text-align: left;">Result</th>
								 </tr>
							  </thead>
							  <tbody class="fintab" >
									<?php $opponent_t= null;
									if(isset($bresult) && count($bresult)>0)
									{

									foreach($bresult as $brow)
									{
										if($brow['our_pickvalue']==$brow['home_team']){
											$opponent_t	=	$brow['away_teamtext'];
										}else if($brow['our_pickvalue']==$brow['away_team']){
											$opponent_t	=	$brow['home_teamtext'];
										}
										if($brow['game_result']=='LOST'){
											$bg_color	=	"background:#f2647b !important;";
										}elsE if($brow['game_result']=='PUSH'){
											$bg_color	=	"background:#bdd1ff !important;";
											 
										}else{
											$bg_color	=	"background:#6ddd4e !important;";
										}
									?>
								 <tr class="completedRow" style="<?PHP echo $bg_color;?>  padding:10px 12px ;vertical-align:top;">
									<td style="width: 100px;text-align: left;padding-left:2px;padding-right:2px;text-overflow: clip;"><?php echo $brow['our_picktext']; ?></td>
									<td style="width: 60px; text-align: center; padding-left:2px; padding-right:2px;"><?php echo $brow['bet_value']; ?></td>
									<td style="width: 60px; text-align: left; padding-left:2px; padding-right:2px;"><?php echo $opponent_t; ?></td>
									<td style="width: 50px; text-align: center; "><?php echo $brow['our_pick_score']; ?>-<?php echo $brow['opp_score']; ?></td>
									<td style="width: 40px; padding-left:2px;"><?php echo $brow['game_result']; ?></td>
								 </tr>
								 <?php 
									}}
									?>
							  </tbody>
						   </table>
						</div>
                    </div>	
					    <!--End of blue game-->
						<!--Start of green game-->
					<div class="green">
                        <div class="table-data">
                           <h4 class="text-center">Completed <span class="green"> Green</span> Games</h4>
                           <h4 class="text-center color">(-350 to -990 Moneyline Favorites)</h4>
                           <table class="table-responsive">
                              <tbody>
                                 <tr>
                                    <td style="padding-left:6px;">Today</td>
                                   <td><?php if(isset($gwonresult)) { echo $gwonresult['WON']; } ?> Won / <?php  if(isset($glostresult)) {echo $glostresult['LOST']; } ?> Lost </td>
                                    <td style="width:32px;text-align:right;"><?php  if(isset($gpercentage)) { echo $gpercentage; }?>% </td>
                                 </tr>
								 <tr>
                                    <td style="padding-left:6px;"><?PHP $bet_year	=	date("Y",strtotime($bet_details["bet_year"]));
										$old_bet_year	=	$bet_year-1;
										echo $old_bet_year.'-'.$bet_year;?></td>
                                    <td><?php if(isset($greenwonresult_last_year)) { echo $greenwonresult_last_year; } ?> Won / <?php  if(isset($greenlostresult_last_year)) {echo $greenlostresult_last_year; } ?> Lost </td>
                                    <td style="width:32px;text-align:right;"><?php  if(isset($greenpercentage_fix)) { echo $greenpercentage_fix; }?>% </td>
                                 </tr>
								 <tr>
                                    <td style="padding-left:6px;">Last 4+ Years</td>
                                    <td><?php if(isset($greenwonresult4_last_year)) { echo $greenwonresult4_last_year; } ?> Won / <?php  if(isset($greenlostresult4_last_year)) {echo $greenlostresult4_last_year; } ?> Lost </td>
                                    <td style="width:32px;text-align:right;"><?php  if(isset($greenpercentage_fix4)) { echo $greenpercentage_fix4; }?>% </td>
                                 </tr>
                               </tbody>
                           </table>
                        </div>
                        <div class="snd-table-data">
                           <table class="table-responsive">
                              <thead>
                                 <tr>
                                    <th style="width: 100px; text-align: left;">Our&nbsp;Pick</th>
									<th style="width: 60px; text-align: center;">Line</th>
									<th style="width: 60px; text-align: left;">Opponent</th>
									<th style="width: 50px; text-align: center;">Score</th>
									<th style="width: 40px; text-align: left;">Result</th>
                                 </tr>
                              </thead>
                              <tbody class="fintab" >
								  <?php $opponent_t= null;
								  if(isset($gresult) && count($gresult)>0)
									{
									foreach($gresult as $grow)
									{
										if($grow['our_pickvalue']==$grow['home_team']){
											$opponent_t	=	$grow['away_teamtext'];
										}else if($grow['our_pickvalue']==$grow['away_team']){
											$opponent_t	=	$grow['home_teamtext'];
										}if($grow['game_result']=='LOST'){
											$bg_color	=	"background:#f2647b !important;";
										}elsE if($grow['game_result']=='PUSH'){
											$bg_color	=	"background:#bdd1ff !important;";
											 
										}else{
											$bg_color	=	"background:#6ddd4e !important;";
										}
									?>
                                 <tr class="completedRow" style="<?PHP echo $bg_color;?> vertical-align:top; ">
                                    <td style="width: 100px;text-align: left;padding-left:2px;padding-right:2px;text-overflow: clip;"><?php echo $grow['our_picktext']; ?></td>
									<td style="width: 60px; text-align: center; padding-left:2px; padding-right:2px;"><?php echo $grow['bet_value']; ?></td>
									<td style="width: 60px; text-align: left; padding-left:2px; padding-right:2px;"><?php echo $opponent_t; ?></td>
									<td style="width: 50px; text-align: center; "><?php echo $grow['our_pick_score']; ?>-<?php echo $grow['opp_score']; ?></td>
									<td style="width: 40px; padding-left:2px;"><?php echo $grow['game_result']; ?></td>
                                 </tr>
								 <?php 
									}}
									?>
                              </tbody>
                           </table>
                        </div>
					</div>
						 <!--End of green game-->
						<!--Start of orange game-->
					<div class="orange">
                        <div class="table-data">
                           <h4 class="text-center">Completed <span class="orange"> Orange</span> Games</h4>
                           <h4 class="text-center color">(-120 to -350 Moneyline Favorites)</h4>
                           <table class="table-responsive">
                              <tbody>
                                <tr>
                                    <td style="padding-left:6px;">Today</td>
                                    <td><?php if(isset($owonresult)) { echo $owonresult['WON']; } ?> Won / <?php  if(isset($olostresult)) {echo $olostresult['LOST']; } ?> Lost </td>
                                    <td style="width:32px;text-align:right;"><?php  if(isset($opercentage)) { echo $opercentage; }?>% </td>
                                 </tr>
								 <tr>
                                    <td style="padding-left:6px;"><?PHP $bet_year	=	date("Y",strtotime($bet_details["bet_year"]));
										$old_bet_year	=	$bet_year-1;
										echo $old_bet_year.'-'.$bet_year;
										?></td>
                                    <td><?php if(isset($orangewonresult_last_year)) { echo $orangewonresult_last_year; } ?> Won / <?php  if(isset($orangelostresult_last_year)) {echo $orangelostresult_last_year; } ?> Lost </td>
                                    <td style="width:32px;text-align:right;"><?php  if(isset($orangepercentage_fix)) { echo $orangepercentage_fix; }?>% </td>
                                 </tr>
								 <tr>
                                    <td style="padding-left:6px;">Last 4+ Years</td>
                                     <td><?php if(isset($orangewonresult4_last_year)) { echo $orangewonresult4_last_year; } ?> Won / <?php  if(isset($orangelostresult4_last_year)) {echo $orangelostresult4_last_year; } ?> Lost </td>
                                    <td style="width:32px;text-align:right;"><?php  if(isset($orangepercentage_fix4)) { echo $orangepercentage_fix4; }?>% </td>
                                 </tr>
                                </tbody>
                           </table>
                        </div>
                        <div class="snd-table-data">
                           <table class="table-responsive">
                              <thead>
                                 <tr>
                                    <th style="width: 100px; text-align: left;">Our&nbsp;Pick</th>
									<th style="width: 60px; text-align: center;">Line</th>
									<th style="width: 60px; text-align: left;">Opponent</th>
									<th style="width: 50px; text-align: center;">Score</th>
									<th style="width: 40px; text-align: left;">Result</th>
                                 </tr>
                              </thead>
                              <tbody class="fintab" >
                                 <?php $opponent_t= null;
								 if(isset($oresult) && count($oresult)>0)
									{
									foreach($oresult as $orow)
									 {
										 if($orow['our_pickvalue']==$orow['home_team']){
											$opponent_t	=	$orow['away_teamtext'];
										}else if($orow['our_pickvalue']==$orow['away_team']){
											$opponent_t	=	$orow['home_teamtext'];
										}if($orow['game_result']=='LOST'){
											$bg_color	=	"background:#f2647b !important;";
										}elsE if($orow['game_result']=='PUSH'){
											$bg_color	=	"background:#bdd1ff !important;";
											 
										}else{
											$bg_color	=	"background:#6ddd4e !important;";
										}
									?>
                                <tr class="completedRow" style="<?PHP echo $bg_color;?> vertical-align:top;">
									<td style="width: 100px;text-align: left;padding-left:2px;padding-right:2px;text-overflow: clip;"><?php echo $orow['our_picktext']; ?></td>
									<td style="width: 60px; text-align: center; padding-left:2px; padding-right:2px;"><?php echo $orow['bet_value']; ?></td>
									<td style="width: 60px; text-align: left; padding-left:2px; padding-right:2px;"><?php echo $opponent_t; ?></td>
									<td style="width: 50px; text-align: center; "><?php echo $orow['our_pick_score']; ?>-<?php echo $orow['opp_score']; ?></td>
									<td style="width: 40px; padding-left:2px;"><?php echo $orow['game_result']; ?></td>
                                 </tr>
								 <?php
									}}								 
								 ?>
                              </tbody>
                           </table>
                        </div>
					</div>
						<!--End of orange game-->
						<!--Start of red game-->
					<div class="red">
                        <div class="table-data">
                           <h4 class="text-center">Completed <span class="red"> Red</span> Games</h4>
                           <h4 class="text-center color">(-110 Spreads and Moneyline Undergoes)</h4>
                           <table class="">
                              <tbody>
                                  <tr>
                                    <td style="padding-left:6px;">Today</td>
                                    <td><?php if(isset($rwonresult)) { echo $rwonresult['WON']; } ?> Won / <?php  if(isset($rlostresult)) {echo $rlostresult['LOST']; } ?> Lost </td>
                                    <td style="width:32px;text-align:right;"><?php  if(isset($rpercentage)) { echo $rpercentage; }?>% </td>
                                 </tr>
								  <tr>
                                    <td style="padding-left:6px;"><?PHP $bet_year	=	date("Y",strtotime($bet_details["bet_year"]));
										$old_bet_year	=	$bet_year-1;
										echo $old_bet_year.'-'.$bet_year;
										?></td>
                                    <td><?php if(isset($redwonresult_last_year)) { echo $redwonresult_last_year; } ?> Won / <?php  if(isset($redlostresult_last_year)) {echo $redlostresult_last_year; } ?> Lost </td>
                                    <td style="width:32px;text-align:right;"><?php  if(isset($redpercentage_fix)) { echo $redpercentage_fix; }?>% </td>
                                 </tr>
								 <tr>
                                    <td style="padding-left:6px;">Last 4+ Years</td>
                                      <td><?php if(isset($redwonresult4_last_year)) { echo $redwonresult4_last_year; } ?> Won / <?php  if(isset($redlostresult4_last_year)) {echo $redlostresult4_last_year; } ?> Lost </td>
                                    <td style="width:32px;text-align:right;"><?php  if(isset($redpercentage_fix4)) { echo $redpercentage_fix4; }?>% </td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                        <div class="snd-table-data">
                           <table class="table-responsive">
                              <thead>
                                 <tr>
                                   <th style="width: 100px; text-align: left;">Our&nbsp;Pick</th>
									<th style="width: 60px; text-align: center;">Line</th>
									<th style="width: 60px; text-align: left;">Opponent</th>
									<th style="width: 50px; text-align: center;">Score</th>
									<th style="width: 40px; text-align: left;">Result</th>
                                 </tr>
                              </thead>
                              <tbody class="fintab" >
                                 <?php 
								 if(isset($rresult) && count($rresult)>0)
									{
									foreach($rresult as $rrow)
									{
										 if($rrow['our_pickvalue']==$rrow['home_team']){
											$opponent_t	=	$rrow['away_teamtext'];
										}else if($rrow['our_pickvalue']==$rrow['away_team']){
											$opponent_t	=	$rrow['home_teamtext'];
										}if($rrow['game_result']=='LOST'){
											$bg_color	=	"background:#f2647b !important;";
										}elsE if($rrow['game_result']=='PUSH'){
											$bg_color	=	"background:#bdd1ff !important;";
											 
										}else{
											$bg_color	=	"background:#6ddd4e !important;";
										}
									?>
                                 <tr class="completedRow" style="<?PHP echo $bg_color;?> padding:10px 12px ;vertical-align:top;">
									<td style="width: 100px;text-align: left;padding-left:2px;padding-right:2px;text-overflow: clip;"><?php echo $rrow['our_picktext']; ?></td>
									<td style="width: 60px; text-align: center; padding-left:2px; padding-right:2px;"><?php echo $rrow['bet_value']; ?></td>
									<td style="width: 60px; text-align: left; padding-left:2px; padding-right:2px;"><?php echo $opponent_t; ?></td>
									<td style="width: 50px; text-align: center; "><?php echo $rrow['our_pick_score']; ?>-<?php echo $rrow['opp_score']; ?></td>
									<td style="width: 40px; padding-left:2px;"><?php echo $rrow['game_result']; ?></td>
                                 </tr>
								 <?php 
									}}
									?>
                              </tbody>
                           </table>
                        </div>
					</div>
						<!--End of red game-->
					<div class="new_div">
						<div class="category">More Picks Today</div>				
						<h3 style="margin-top: 20px; color: black;">For&nbsp;
							<select id="select_timezone" name="change_time" onChange="change_time(this.value)" >
								<option value="e" <?PHP if($timezone=='e') { echo "selected" ;} ?>>Eastern</option>
								<option value="c" <?PHP if($timezone=='c') { echo "selected" ;} ?>>Central</option>
								<option value="m" <?PHP if($timezone=='m') { echo "selected" ;} ?>>Mountain</option>
								<option value="p" <?PHP if($timezone=='p') { echo "selected" ;} ?>>Pacific</option>
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
							<tbody>
							<?php echo $morepicks; ?>
							</tbody>
						</table>
					</div>
					
					<br />
					<div class="track_img">
						<img src="http://underdogkings.com/Splash_files/track300.jpg">
					</div>
					<?php 
					} 
					else
					{
					?>
					<div class="msg">
					   <input type="hidden" class="betid" value="<?php if(isset($bet_details['id'])){ echo $bet_details['id']; } else{ if(isset($nextbetday)) echo $nextbetday['id']; } ?>" />
					  <?php 
					  if(isset($ebetday))
					  {
						  echo '<h3 style="margin-top:17px;margin-bottom:40px;font-family: "Helvetica Neue", "Roboto", "Segoe UI", sans-serif;">';
						  echo '<p style="font-weight:bold;margin-bottom:10px;">'.date('l, F d',strtotime($ebetday)).'</p>';
						  
						  if(isset($nextview_html) && !empty($nextview_html)){
							$date = date('l, F d', strtotime($nextview_html['bet_year']));
							echo "
								<p style='margin-bottom:10px;font-weight:normal;'>Next Betting Day:<br/>
									<span style='margin-left:40px;'>
										<b>$date</b>
									</span>
								</p>
							";
						  }
						  else {
							  echo '<div style="height:60px;">&nbsp;</div>';
						  }
						  echo '<p style="font-weight:normal;">First Game Starts:</p>';
						  echo '<p style="margin-left:40px;">';
						  if(isset($nextview_html['timess']) && $nextview_html['timess']!=''){
						echo '<b>'.ltrim(date('h:i A',strtotime($nextview_html['timess'])),0).' Pacific</b>';
						}else{
						echo '<b>--:--</b>';	
						}
						echo '</p>';
						  echo '</h3>';
						  echo '<p style="font-family:sans-serif;line-height:20px;margin-bottom:10px;">For Active Games and Betting History,<br/>click left arrow or swipe screen to right.</p>';
						  if($nextview_html!=''){
						  echo '<div class="msg_box">'.($nextview_html['op_message']).'</div>';
						  }
						  echo '<br/><img src="http://www.vegasfootballclub.com.php56-17.dfw3-1.websitetestlink.com/Splash_files/track300.jpg">';
					  }
					  if(false && isset($nextview_html) && !empty($nextview_html))
					  {
						  echo '<h3 style="color:#006766;font-weight:bold;">Next Betting Day</h3>';
						  echo '<h3 style="color:#006766;font-weight:bold;">'.date('l',strtotime($nextview_html['bet_year'])).'</h3>';
						  
						  echo '<h3 style="color:#006766;font-weight:bold;">First Game Starts:</h3>';
						  
						  echo '<div class="msg_box">'.$nextview_html['op_message'].'</div>';
					  }
					  ?>
					</div>
					<?php } ?>
					</div>
				<?PHP 
				if(isset($bet_details)):
				?>
				<div class="swiper-slide">
					<?PHP
						echo '<h3 style="margin-top:17px;margin-bottom:40px;font-family: "Helvetica Neue", "Roboto", "Segoe UI", sans-serif;"><p style="font-weight:bold;margin-bottom:10px;">'.date('D',strtotime($bet_details['bet_year'])).', '. date('F',strtotime($bet_details['bet_year'])). '&nbsp;'.date('d',strtotime($bet_details['bet_year'])).'</p>';
						
						echo '<p style="margin-bottom:10px;font-weight:normal;">Next Betting Day:<br>
									<span style="margin-left:40px;">';
									if(isset($nextview_html['bet_year'])){
										echo '<b>'.date('l, F d',strtotime($nextview_html['bet_year'])).'</b>';
										}else{
											if($bet_details['bet_year']==date('Y-m-d')){
							echo '<b>Today</b>';
							}
						}
									echo '</span>
								</p>';
						
						echo '<p style="font-weight:normal;">First Game Starts:</p><p style="margin-left:40px;">';
						if(isset($bet_details['timess']) && $bet_details['timess']!=''){
						echo '<b>'.ltrim(date('h:i A',strtotime($bet_details['timess'])),0).' Pacific</b>';
						}else{
						echo '<b>--:--</b>';	
						}
						echo '</p></h3>';
						
						echo '<p style="font-family:sans-serif;line-height:20px;margin-bottom:10px;">For Active Games and Betting History,<br/>click left arrow or swipe screen to right.</p>';
						echo '<div class="msg_box">'.$bet_details['op_message'].'</div>';
					?>
					
					<div class="track_img">
						<img src="http://underdogkings.com/Splash_files/track300.jpg">
					</div>						
				</div>
				<?PHP endif; ?>
				</div>
            </div>
		</div>
		 

        <div id="footer">
            <div id="controls">
				 <ul class="buttons">
					<li>
						<input type="hidden" id="c_t" value="<?php echo $timezone;?>">
						<a href="javascript:void(0)" id="previewbet"><img id="preview"  src="<?php echo base_url('adminassets') ?>/img/Button_Back_64.png" alt="#" /></a>
					</li>					
					<li><a href="javascript:void(0)" id="upbtn"><img src="<?php echo base_url('adminassets') ?>/img/Button_Up.png" alt="#"/></a></li>			
					<li><a href="javascript:void(0)" id="downbtn"><img src="<?php echo base_url('adminassets') ?>/img/Button_Down.png" alt="#"/></a></li>	
					<li>
						<a href="javascript:void(0)" id="nextbet"><img id="nextview" src="<?php echo base_url('adminassets') ?>/img/Button_Next_64.png" alt="#" /></a>
					</li>			
				 </ul>
            </div>
            <div id="footer-bottom">
				<ul>
					<li class="active"><a href="<?php echo base_url('gamedetails'); ?>"><img src="<?php echo base_url('adminassets') ?>/img/feetball.png" alt="#"/><span>Our Picks</span></a></li>
					<li><a href="<?php echo base_url('grossprofit'); ?>"><img src="<?php echo base_url('adminassets') ?>/img/DoubleDollars.png" alt="#"/><span>Gross Profit</span></a></li>
					<li><a href="<?php echo base_url('averageprofit'); ?>"><img src="<?php echo base_url('adminassets') ?>/img/signal.png" alt="#"/><span>Avg-Profit-Per-Bet</span></a></li>
					<li><a href="<?php echo base_url('Contact/index/id/'.$sess_data['network_id']); ?>"><img src="<?php echo base_url('adminassets') ?>/img/user.png" alt="#"/><br><span>Contact Us</span></a></li>
				</ul>
			</div>
        </div>		 
    </div>
	<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
	<!--<script type="text/javascript" src="<?php echo base_url('adminassets'); ?>/js/vendor/bootstrap.min.js"></script>-->
    <script src="https://code.jquery.com/jquery-1.11.0.min.js"  integrity="sha256-spTpc4lvj4dOkKjrGokIrHkJgNA0xMS98Pw9N7ir9oI="  crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.2/js/swiper.jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('adminassets/js/vendor/iscroll.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('adminassets/js/customscript.js'); ?>"></script>
	<script>
		window.mobilecheck = function() {
		  var check = false;
		  (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
		  return check;
		};
		//target the entire page, and listen for touch events
		$('html, body').on('touchmove', function(e){ 
			 //prevent native touch activity like scrolling
			 e.preventDefault(); 
		});
		$(document).ready(function () {
			

			//initialize swiper when document ready  
			swiper = new Swiper ('.swiper-container', {
				nextButton: '#nextbet',
				prevButton: '#previewbet'
			});
			swiper.slideTo(swiper.slides.length-1);
			
			swiper.on('slideChangeEnd', function (){
				if(swiper.isBeginning)
					$('img#preview').attr('src', '<?php echo base_url('adminassets') ?>/img/Button_Back_grey.png');
				else
					$('img#preview').attr('src', '<?php echo base_url('adminassets') ?>/img/Button_Back_64.png');
				if(swiper.isEnd)
					$('img#nextview').attr('src', '<?php echo base_url('adminassets') ?>/img/Button_Next_grey.png');
				else
					$('img#nextview').attr('src', '<?php echo base_url('adminassets') ?>/img/Button_Next_64.png');
			});
			
			
			if(mobilecheck()) {
				$('#controls').css('backgroundColor', '#ddd');
			}
			setTimeout( function(){ 
				 $("#loading_div").hide();
				$(".msg").show();	 
				$(".upper-data").show();	 
				$(".snd-data").show();	 
				$(".blue").show();	 
				$(".green").show();	 
				$(".orange").show();	 
				$(".red").show(function (){
					scroll = new IScroll('#contentWrapper', {
				preventDefault: false,
				scrollbars: true,
				mouseWheel: true,
				interactiveScrollbars: true,
				shrinkScrollbars: 'scale',
				fadeScrollbars: true
			});
			$('a#upbtn').click(function() {
				if(scroll.y<0)
					scroll.scrollBy(0, 300, 1500);
			});
			$('a#downbtn').click(function() {
				scroll.scrollBy(0, -300, 1500);
			});
				$('.new_div').show();
				$('.track_img').show();
				});	 
			
			}  , 2500 );
			
		});
	</script>
</body>
</html>