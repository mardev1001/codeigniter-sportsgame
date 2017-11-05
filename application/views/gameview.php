<style>
	
#game_detail_ label {
  color: #65819e;
}

.form-horizontal .control-label {
  padding-left:0;
  padding-right:0;
  text-align:left !important;
   white-space: nowrap;
}

.padding_none{
	padding:0;
}

</style>


<div class="row">
<div class="block full">
			
				<?php 
					$message = $this->session->flashdata('gameid_exist');
					if(isset($message) && !empty($message))
					{
					 echo '<p class="text-center">'.$message.'</p>'; 
					}
				?>
				<?php  
		           $message = $this->session->flashdata('gameid_exists');
						if(isset($message) && !empty($message))
						{
							echo '<p class="text-center">'.$message.'</p>';
						}
		             ?>
		
               <!-- Horizontal Form Content -->
				<?php echo form_open(base_url('gamers/saveGamers'),array('class'=>'form-horizontal form-bordered','id'=>'game_detail_','onsubmit'=>'return validate_game_form()')); ?>
					
					 <input type="hidden"  name="id" value="<?php if(isset($eresult['id'])){ echo $eresult['id']; }?>"   />
					
					 <div class="form-group">
						<div class="col-md-3 padding_none">
							<label class="control-label col-md-4 pull-right" for="example-hf-email">Game ID</label>
						</div>
                        <div class="col-md-6">
						<input type="hidden" name="old_game_id" value="<?php if(isset($eresult['game_id'])){ echo $eresult['game_id']; }?>"  />
						<div style="margin-top:6px;"><?php if(isset($eresult['game_id'])){ echo $eresult['game_id']; }else{ echo 'New Game';}?></div>
           <input type="hidden"  name="game_id" value="<?php if(isset($eresult['game_id'])){ echo $eresult['game_id']; }else{ echo 'New';}?>"  class="form-control game_id"  readonly  required />
                        </div>
                    </div>
					<div class="form-group">
						<div class="col-md-3 padding_none">
                        <label class="control-label col-md-4 pull-right"  for="example-hf-email">Bet Year</label>
						</div>
                        <div class="col-md-6">
                            <input type="hidden"  name="bet_year"   value="<?php echo date('Y'); ?>" class="form-control" readonly   />
							<div style="margin-top:6px;"><?php echo date('Y'); ?></div>
                        </div>
                    </div>
                     <div class="form-group">
						<div class="col-md-3 padding_none">
                        <label class="control-label col-md-4 pull-right" for="example-hf-password">Bet Day</label>
						</div>
						
                        <div class="col-md-6">
						     
							<select name="bet_day" class="form-control getbetday"  required>
							<option value="" >--Select Bet Day--</option>
								<?php if(isset($gresult) && count($gresult)>0) 
								 {
								 foreach($gresult as $grow)
								 {
								 ?>	
								 <option value="<?php echo $grow['bet_day'] ?>" <?php if(isset($betdata) && $betdata['bet_day'] == $grow['bet_day']) { echo "selected='selected'";} ?><?php if(isset($eresult) && ($eresult['bet_day']) == $grow['bet_day']){ echo "selected='selected'";} ?>><?php  echo $grow['bet_day']; ?></option>
								<?php 	
								 } 
								 }
								?>	
							</select>
                        </div>
                    </div>
                    
                    <div class="form-group">
						<div class="col-md-3 padding_none">
							<label class="control-label col-md-4 pull-right" for="example-hf-password">Game Date</label>
						</div>
                        <div class="col-md-6">
							<div class="row">
								<div class="col-md-6">
								<!--<div class="setdatetext" style="margin-top:8px;"><?php if(isset($eresult['game_date'])){ echo $eresult['game_date']; }?></div>-->	
								 <input type="text"  name="game_date" value="<?php if(isset($eresult['game_date'])){ echo $eresult['game_date']; }?>"  class="form-control setgamedate" required placeholder="YYYY-mm-dd"/>
		                          </div>
								<div class="col-md-5">
		<label for="day" class="" style=" font-size: 20px;">Day: <span class="betday"><?php if(isset($eresult['day'])){ echo $eresult['day']; } else { echo date('D'); } ?></span></label>
       <input type="hidden" name="day" class="setbetday" value="<?php if(isset($eresult['day'])){ echo $eresult['day']; } else { echo date('D'); } ?>" />
								
								</div>
							</div>
                        </div>
                    </div>
					
					 <div class="form-group">
						<div class="col-md-3 padding_none">
							<label class="control-label col-md-4 pull-right" style="line-height: 22px;">Game Time:</label>
						</div>
                        <div class="col-md-3">
                            <input type="text"  name="game_time" value="<?php if(isset($eresult['game_time'])){ echo $eresult['game_time']; }?>"  class="form-control timepicker" style="font-size:20px;" />
							<?PHP //echo $eresult['game_time'];?>
							<input type="hidden" name="passing_time" id="passing_time" value="<?php if(isset($eresult['game_time'])){  echo date('H:i',strtotime($eresult['game_time'])); }?>">
                        </div>
						<div class="col-md-2">
                            <label for="" style="font-size: 20px; margin: 0px; line-height: 36px;">Pacific</label>
                        </div>
                    </div>
				<div class="form-group">
						<div class="col-md-3 padding_none">
                        <label class="control-label col-md-4 pull-right">League</label>
						</div>
                        <div class="col-md-9">
                            <label class="radio-inline" for="example-inline-radio1">
   <input type="radio"  name="league" <?php if(isset($eresult['league'])){ if($eresult['league']=='nbasketball'){echo "checked='checked'";}} else { echo 'checked'; }?> value="nbasketball" class="basketball" > <span class="text_colors">NCAA Basketball</span>
                            </label>
                            <label class="radio-inline" for="example-inline-radio2">
    <input type="radio"  name="league" <?php if(isset($eresult['league'])) if($eresult['league']=='nfootball'){echo "checked='checked'";}?> value="nfootball" class="football" /> 
								<span  class="text_colors">NCAA Football</span>
                            </label>
                            <label class="radio-inline" for="example-inline-radio3">
    <input type="radio"  name="league" <?php if(isset($eresult['league'])) if($eresult['league']=='nfl'){echo "checked='checked'";}?> value="nfl" class="cricket" /> 
								<span class="text_colors">NFL</span>
                            </label>
							<label class="radio-inline" for="example-inline-radio3">
    <input type="radio"  name="league" <?php if(isset($eresult['league'])) if($eresult['league']=='nba'){echo "checked='checked'";}?> value="nba" class="kabddi" /> 
								<span class="text_colors">NBA</span>
                            </label>
							<label class="radio-inline" for="example-inline-radio3">
    <input type="radio"  name="league" <?php if(isset($eresult['league'])) if($eresult['league']=='mlb'){echo "checked='checked'";}?> value="mlb" class="volleyball" /> 
								<span class="text_colors">MLB</span>
                            </label>
                        </div>
                    </div>
					
					<div class="form-group">
						<div class="col-md-3 padding_none">
                        <label class="control-label col-md-4 pull-right" for="example-hf-password">Away Team</label>
						</div>
						<div class="col-md-1">
						<input type="text" name="away_teamval" id="away_teamval" value="<?php if(isset($eresult['away_team'])){ echo $eresult['away_team']; }?>" class="form-control getaway_teamval" required="required"/>
						</div>
						<div class="col-md-2">
						<input type="text" name="away_teamtext" id="away_teamtext" value="<?php if(isset($eresult['away_teamtext'])){ echo $eresult['away_teamtext']; }?>"  required="required" class="form-control getaway_team" />
						</div>
                        <div class="col-md-3">
							<select name="away_team"  class="form-control away_team nccbb"  >
							 <option value=""></option>	
							</select>
						
						</div>
                    </div>
					
					 <div class="form-group">
						<div class="col-md-3 padding_none">
							<label class="control-label col-md-4 pull-right" >Home Team</label>
						</div>
						<div class="col-md-1">
	<input type="text" name="home_teamval" id="home_teamval" value="<?php if(isset($eresult['home_team'])){ echo $eresult['home_team']; }?>"  class="form-control gethome_teamval"   required="required" />
						</div>
						<div class="col-md-2">
   <input type="text" name="home_teamtext" id="home_teamtext" value="<?php if(isset($eresult['home_teamtext'])){ echo $eresult['home_teamtext']; }?>" class="form-control gethome_team"   required="required"/>
						</div>
                        <div class="col-md-3">
		<select name="home_team" class="form-control home_team nccbb" >
		<option value=""></option>
							</select>

						   
						</div>
                    </div>
					<?PHP if(isset($eresult['in_progress']) && $eresult['in_progress']=='yes'){
						$readit	=	'readonly';
						echo '<input type="hidden" name="in_p_hidden" id="in_p_hidden" value="y">';
						}	else{
							$readit	=	null;
							echo '<input type="hidden" id="in_p_hidden" value="n">';
						}
						?>
					 <div class="form-group">
						<div class="col-md-3 padding_none">
							<label class="control-label col-md-4 pull-right">Our Pick</label>
						</div>
						<div class="col-md-1">
	                    <input type="text" name="our_pickval" id="our_pickval" value="<?php if(isset($eresult['our_pickvalue'])){ echo $eresult['our_pickvalue']; }?>" <?PHP echo $readit;?>  class="form-control getpickvalue"  required="required"  />
						</div>
                        <div class="col-md-2">
                          <input type="text" name="our_picktext" id="our_picktext" class="form-control getourpick"  value="<?php if(isset($eresult['our_picktext'])){ echo $eresult['our_picktext']; }?>"  required="required" name="our_pick"  <?PHP echo $readit;?>>
                        </div>
                        <div class="col-md-3 changepick">
						  <select  class="form-control setpickvalue"  <?PHP echo $readit;?>>
					  	   <option value="">Select Pick</option>
						  </select>
                        </div> 
                    </div>
					
					<div class="form-group">
						<div class="col-md-3 padding_none">
							<label class="control-label col-md-4 pull-right" for="example-hf-password">Bet Type</label>
						</div>
                           <div class="col-md-9">
                            <label class="radio-inline" for="example-inline-radio1">
  <input type="radio" name="bet_type" <?php if(isset($eresult['bet_type'])) { if($eresult['bet_type']=='moneyline'){echo "checked='checked'";}  } else { echo 'checked'; }?> checked value="moneyline"> <span class="text_colors">Money Line</span>
                            </label>
                            <label class="radio-inline" for="example-inline-radio2">
                                <input type="radio"  name="bet_type" <?php if(isset($eresult['bet_type'])) if($eresult['bet_type']=='over'){echo "checked='checked'";}?> value="over"> <span class="text_colors">Over</span>
                            </label>
							  <label class="radio-inline" for="example-inline-radio2">
                                <input type="radio"  name="bet_type" <?php if(isset($eresult['bet_type'])) if($eresult['bet_type']=='under'){echo "checked='checked'";}?> value="under"> <span class="text_colors">Under</span>
                            </label>
                        </div>
                    </div>
					
					 <div class="form-group">
						<div class="col-md-3 padding_none">
							<label class="control-label col-md-4 pull-right" for="example-hf-password">Bet Value</label>
						</div>
                        <div class="col-md-6">
                            <input type="text" id="bet_value" name="bet_value" value="<?php if(isset($eresult['bet_value'])){ echo $eresult['bet_value']; }?>" class="form-control" placeholder="Enter Bet Value.." required />
                        </div>
                    </div>
					<div class="form-group">
						<div class="col-md-3 padding_none">
                        <label class="control-label col-md-4 pull-right" for="example-hf-password" style="white-space: pre-line;">Exclude from Calcs?</label>
						</div>
                        <div class="col-md-9">
                            <label class="radio-inline" for="example-inline-radio1">
                                <input type="radio" name="excals" <?php if(isset($eresult['excals'])) if($eresult['excals']=='yes'){echo "checked='checked'";}?> value="yes"> <span class="text_colors">Yes</span> 
                            </label>
                            <label class="radio-inline" for="example-inline-radio2">
                                <input type="radio"  name="excals" <?php if(isset($eresult['excals'])) { if($eresult['excals']=='no'){echo "checked='checked'";}} else{ echo 'checked'; }; ?>  value="no"> <span class="text_colors">No</span>
                            </label>
                        </div>
                    </div> 
			
                    <div class="form-group form-actions">
					<div class="row">
                        <div class="col-md-2 col-md-offset-3">
							
                            <button type="button" name="submitxs" class="btn btn-primary btn-modify" onClick="submit_form('game_detail_')">OK</button>
							</div>
							<div class="col-md-2">
							<?php if(isset($eresult['id']))
							{
							?>
							<button type="button" name="cancel" class="btn btn-primary btn-modify btn-grey redirectgameedit">Cancel</button>
                            <?php 							
							}
							else
							{
							?>
							<button type="button" name="reset" class="btn btn-primary btn-modify btn-grey">Cancel</button>
							<?php 
							}
							?>
							</div>
							<div class="col-md-3">
	                        <a href="<?php if(isset($eresult['id']))
	                  { echo base_url('gamers/deleteGames/id/').$eresult['id']; }else{ echo 'javascript:void(0)'; } ?>" class="btn btn-danger btn-modify">Delete</a>
                          </div>
						  </div>
                    </div>
					 <?php echo form_close(); ?>
					<?php  if(isset($eresult['id'])){ echo form_open(base_url('gamers/updategamers'),array('class'=>'form-horizontal form-bordered')); ?>
					 <input type="hidden"  name="id" value="<?php if(isset($eresult['id'])){ echo $eresult['id']; }?>"   />
					
					<div  style="background-color:yellow;margin:20px auto;height:200px;padding:20px 15px;">
					<div class="form-group">
					<div class="row">
						<div class="col-md-3 text-right">
							<label class="control-label" >Game In Progress Now?</label>
						 </div>
                        <div class="col-md-9">  
                            <label class="radio-inline" for="example-inline-radio1">
                                <input type="radio" name="in_progress"   <?php if(isset($eresult['in_progress'])) if($eresult['in_progress']=='yes'){echo "checked='checked'";}?>  value="yes"> <span class="text_colors">Yes</span> 
                            </label>
                            <label class="radio-inline" for="example-inline-radio2">
                                <input type="radio"  name="in_progress"   <?php if(isset($eresult['in_progress'])) if($eresult['in_progress']=='no'){echo "checked='checked'";}?>   value="no"> <span class="text_colors">No</span>
                            </label>
                        </div>
                    </div>
                    </div>
					
					<div class="form-group">
					 <div class="row">
					 <div class="col-md-4 col-md-offset-2">
						<div class="row">
						 <div class="col-md-3 text-right">
							<label class="control-label" >Result</label>
						 </div>
                        <div class="col-md-9">
                            <label class="radio-inline" for="example-inline-radio1">
							
        <input type="radio" name="game_result"  <?php if(isset($eresult['game_result'])) if($eresult['game_result']=='WON'){echo "checked='checked'";}?> value="WON"  /> <span class="text_colors">WON</span> 
                            </label>
                            <label class="radio-inline" for="example-inline-radio2">
        <input type="radio"  name="game_result"  <?php if(isset($eresult['game_result'])) if($eresult['game_result']=='LOST'){echo "checked='checked'";}?>  value="LOST" /> <span class="text_colors">LOST</span>
                            </label>
							<label class="radio-inline" for="example-inline-radio2">
        <input type="radio"  name="game_result"  <?php if(isset($eresult['game_result'])) if($eresult['game_result']=='PUSH'){echo "checked='checked'";}?>  value="PUSH"  /> <span class="text_colors">PUSH</span>
                            </label>
                        </div>
						</div>
						</div>
						<div class="col-md-4 text-right">
						 <?php if(isset($eresult)) { ?>
						<input type="submit" class="btn btn-primary resetwonlost btn-modify"  value="RESET RESULT" style="width: 170px; margin-bottom: 18px; margin-right: 31px !important;"/>
						<?php }else{ ?>
						<input type="button" class="btn btn-primary resetwonlost" onclick="check_form();" value="RESET RESULT"/>
						<?php } ?>
						</div>
						</div>
                    </div>
				
					<div class="form-group">
					 <div class="row">
                        <div class="col-md-6">
							<div class="row">
								<div class="col-md-6  text-right">
									<label class="control-label score">Our Pick Score</label>
								</div>
								<div class="col-md-4">
									<input type="text"  name="our_pick_score"    value="<?php if(isset($eresult['our_pick_score']))
									{ echo $eresult['our_pick_score']; } else { echo '0'; } ?>"  class="form-control ourpickscore"  />
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="row">
								<div class="col-md-3 text-right">
									<label class="control-label" >Period</label>
								</div>
								<div class="col-md-4">
									<input type="text"  name="period"  value="<?php if(isset($eresult['period']))
								{ echo $eresult['period']; } else { echo '1'; } ?>"  class="form-control" />
								</div>
							</div>
                        </div>
				     </div>
                    </div>
					
					<div class="form-group">
					 <div class="row">
                        <div class="col-md-6">
							<div class="row">
								<div class="col-md-6  text-right">
									<label class="control-label score">Opponent Score</label>
								</div>
								<div class="col-md-4">
									<input type="text"  name="opp_score"  value="<?php if(isset($eresult['opp_score']))
								{ echo $eresult['opp_score']; } else { echo '0'; } ?>"  class="form-control oppscore"  />
								</div>
							</div>
                        </div>
						<div class="col-md-6">
						<div class="row">
						<div class="col-md-3 text-right">
							<label class="control-label" >Time Left</label>
						</div>
						<div class="col-md-4">
		                <input type="text"  name="time_left"  value="<?php if(isset($eresult['time_left']))
						{ echo $eresult['time_left'].':'.$eresult['sec_left']; } else { echo '4:00'; } ?>"  class="form-control" />
					<input type="hidden" name="result_show" value="<?PHP if($eresult['game_result']==null && $eresult['in_progress']=='no') { echo 'Entered'; }  if($eresult['game_result']==null && $eresult['in_progress']=='yes') { echo 'In Progress'; } else{ echo $eresult['game_result']; } ?>">
						</div>
						</div>
                        </div>
				     </div>
                    </div>
					</div>
					
					<?php echo form_close(); } ?>
				
                <!-- END Horizontal Form Content -->
 
		
        
		<div id="get_bet_data">
			<h2 style="text-align:center"> Bet Day:&nbsp;<?php echo $betdata['bet_day']; ?>&nbsp;&nbsp;&nbsp;&nbsp;Picks:&nbsp;<?php if(is_array($countrows) && count($countrows)>0){ echo count($countrows);}else { echo '0';}?>&nbsp;&nbsp;&nbsp;&nbsp;
			<button class="btn btn-primary btn-modify getnextyear" style="width:20%;background-color:#1bbae1;">Show All Picks</button>	
			</h2>
		<?php if(is_array($countrows) && count($countrows)>0){?>
		<div style="width:830px; height:600px;overflow-y: scroll; margin-left: auto; margin-right: auto;">
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
                    <tbody class="loadmoredata">
					<?php
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
				    ?>
					<tr>
					<td><a  href="<?php echo base_url('gamers/editGamers/id/'.$row['id']) ?>" data-toggle="tooltip" title="" data-id="<?php echo $row['id']; ?>" class="btn btn-default big_btn" data-original-title="Edit">Edit</a></td>
						<td class="text-center"><?php echo ucfirst($row['in_progress']); ?></td>
						<td><?php echo $row['bet_year']; ?></td>
						<td><?php echo $row['bet_day']; ?></td>
						<!--td><?php echo $row['day']; ?></td-->
						<td><?php echo $row['game_date']; ?></td>
						<td><?php echo date('h : i A',strtotime($row['game_time'])); ?></td>
						<td><?php echo $row['game_id']; ?></td>
						<td><?php echo $league; ?></td>
						<td><?php echo $row['our_picktext']; ?></td>
						<td><?php echo $opponent_text; ?></td>
						<!--td><?php echo $row['game_result']; ?></td-->
						<td><?PHP if($row['game_result']==null && $row['in_progress']=='no') { echo 'Entered'; }  if($row['game_result']==null && $row['in_progress']=='yes') { echo 'In Progress'; } else{ echo $row['game_result']; }?></td>
					</tr>
					<?php
					 }						
					?>
					</tbody>
					
					</table>
					</div>
		<?php } ?>
			</div>
        </div>
    </div>
	<?PHP if(!isset($eresult)) { ?>
	<script>
		$(document).ready(function(){
			  var betday =  $('.getbetday').val();
			 var base_url = window.location.origin;
                if(betday==0)
				{
					alert('Please Select Bet Day');
					return false;
				 }
                 else{
					var bid = betday; }	
                    $.ajax({
					type:'POST',
                    url:base_url+'/gamers/fetchbetData',
					dataType:'json',
                    cache: false,					
					data:{'id':bid},
					success:function(response){
                         if(response['success']){
						  var bet_year = response['success']['bet_year'];
						  var day = response['success']['day'];
						  $('.betday').text(day);
						  $('.setbetday').val(day);
						  $('.setdatetext').text(bet_year); 
						  $('.setgamedate').val(bet_year); 
						  $('#get_bet_data').html(response.html); 
						  }
						 else{
							alert(response['nobetday']); }
					   }
				  }); 
		})
	</script>
	<?PHP } ?>