<div class="row">
<div class="block full">

		<?php 
			if(isset($eresult['id']))
			{
           echo form_open(base_url('updategame/updateData'),array('class'=>'form-horizontal form-bordered')); ?>
					
					 <input type="hidden"  name="id" value="<?php if(isset($eresult['id'])){ echo $eresult['id']; }?>"   />
					
					 <div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-email">Game Id</label>
                        <div class="col-md-6">
           <input type="text"  name="game_id" value="<?php if(isset($eresult['game_id'])){ echo $eresult['game_id']; }?>"  class="form-control game_id"  placeholder="Enter Game Id.." required />
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-md-3 control-label"  for="example-hf-email">Bet Year</label>
                        <div class="col-md-6">
                            <input type="hidden"  name="bet_year"   value="<?php echo date('Y'); ?>" class="form-control" readonly   />
							<div style="margin-top:6px;"><?php echo date('Y'); ?></div>
                        </div>
                    </div>
                     <div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-password">Bet Day</label>
                        <div class="col-md-6">
						     
							<select name="bet_day" class="form-control getbetday"  required>
							<option value="" >--Select Bet Day--</option>
								<?php if(count($result)>0) 
								 {
								 foreach($gresult as $grow)
								 {
								 ?>	
            <option value="<?php echo $grow['bet_day'] ?>" <?php if(isset($eresult) && ($eresult['bet_day'])==$grow['bet_day']){ echo "selected='selected'";} ?>><?php  echo $grow['bet_day']; ?></option>
								<?php 	
								 } 
								 }
								?>	
							</select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-password">Game Date</label>
                        <div class="col-md-6">
							<div class="row">
								<div class="col-md-6">
								<div class="setdatetext" style="margin-top:8px;"><?php if(isset($eresult['game_date'])){ echo $eresult['game_date']; }?></div>							
		        <input type="hidden"  name="game_date" value="<?php if(isset($eresult['game_date'])){ echo $eresult['game_date']; }?>"  class="form-control setgamedate" required />
		
		</div>
								<div class="col-md-6">
		<label for="day" class="col-md-12" style="margin-top:8px;">Day &nbsp;&nbsp;&nbsp;&nbsp <span class="betday"><?php if(isset($eresult['day'])){ echo $eresult['day']; } else { echo date('D'); } ?></span></label>
       <input type="hidden" name="day" class="setbetday" value="<?php if(isset($eresult['day'])){ echo $eresult['day']; } else { echo date('D'); } ?>" />
								
								</div>
							</div>
                        </div>
                    </div>
					
					 <div class="form-group">
                        <label class="col-md-3 control-label" >Game Time</label>
                        <div class="col-md-6">
                            <input type="text"  name="game_time" value="<?php if(isset($eresult['game_time'])){ echo $eresult['game_time']; }?>"  class="form-control timepicker"  />
                        </div>
                    </div>
				<div class="form-group">
                        <label class="col-md-3 control-label">League</label>
                        <div class="col-md-9">
                            <label class="radio-inline" for="example-inline-radio1">
   <input type="radio"  name="league" checked <?php if(isset($eresult['league'])) if($eresult['league']=='nbasketball'){echo "checked='checked'";}?> value="nbasketball" class="basketball" > <span class="text_colors">NCCA Basketball</span>
                            </label>
                            <label class="radio-inline" for="example-inline-radio2">
    <input type="radio"  name="league" <?php if(isset($eresult['league'])) if($eresult['league']=='nfootball'){echo "checked='checked'";}?> value="nfootball" class="football" /> 
								<span  class="text_colors">NCCA Football</span>
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
                        <label class="col-md-3 control-label" for="example-hf-password">Away Team</label>
						
						<div class="col-md-1">
						<input type="text" name="away_teamval" value="<?php if(isset($eresult['away_team'])){ echo $eresult['away_team']; }?>" class="form-control getaway_teamval" />
						</div>
						<div class="col-md-2">
						<input type="text" name="away_teamtext" value="<?php if(isset($eresult['away_teamtext'])){ echo $eresult['away_teamtext']; }?>" class="form-control getaway_team" />
						</div>
                        <div class="col-md-3">
							<select name="away_team"  class="form-control away_team nccbb"  >
							 <option value=""></option>	
							</select>
						
						</div>
                    </div>
					
					 <div class="form-group">
                        <label class="col-md-3 control-label" >Home Team</label>
						<div class="col-md-1">
	<input type="text" name="home_teamval" value="<?php if(isset($eresult['home_team'])){ echo $eresult['home_team']; }?>"  class="form-control gethome_teamval"    />
						</div>
						<div class="col-md-2">
   <input type="text" name="home_teamtext"  value="<?php if(isset($eresult['home_teamtext'])){ echo $eresult['home_teamtext']; }?>" class="form-control gethome_team"   />
						</div>
                        <div class="col-md-3">
		<select name="home_team" class="form-control home_team nccbb" >
		<option value=""></option>
							</select>

						   
						</div>
                    </div>

					 <div class="form-group">
                        <label class="col-md-3 control-label">Our Pick</label>
						<div class="col-md-1">
	                    <input type="text" name="our_pickval" value="<?php if(isset($eresult['our_pickvalue'])){ echo $eresult['our_pickvalue']; }?>"  class="form-control getpickvalue"    />
						</div>
                        <div class="col-md-2">
                          <input type="text" name="our_picktext" class="form-control getourpick"  value="<?php if(isset($eresult['our_picktext'])){ echo $eresult['our_picktext']; }?>"   name="our_pick" >
                        </div>
                        <div class="col-md-3 changepick">
						  <select  class="form-control setpickvalue">
					  	   <option value="">Select Pick</option>
						  </select>
                        </div> 
                    </div>
					
					<div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-password">Bet Type</label>
                           <div class="col-md-9">
                            <label class="radio-inline" for="example-inline-radio1">
                                <input type="radio" name="bet_type" <?php if(isset($eresult['bet_type'])) if($eresult['bet_type']=='moneyline'){echo "checked='checked'";}?> checked value="moneyline"> <span class="text_colors">Money Line</span>
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
                        <label class="col-md-3 control-label" for="example-hf-password">Bet Value</label>
                        <div class="col-md-6">
                            <input type="text"  name="bet_value" value="<?php if(isset($eresult['bet_value'])){ echo $eresult['bet_value']; }?>" class="form-control" placeholder="Enter Bet Value.." required />
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-password">Exclude from Calcs?</label>
                        <div class="col-md-9">
                            <label class="radio-inline" for="example-inline-radio1">
                                <input type="radio" name="excals" <?php if(isset($eresult['excals'])) if($eresult['excals']=='yes'){echo "checked='checked'";}?> value="yes"> <span class="text_colors">Yes</span> 
                            </label>
                            <label class="radio-inline" for="example-inline-radio2">
                                <input type="radio"  name="excals" <?php if(isset($eresult['excals'])) if($eresult['excals']=='no'){echo "checked='checked'";}?>  value="no"> <span class="text_colors">No</span>
                            </label>
                        </div>
                    </div>
			
                    <div class="form-group form-actions">
					<div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <button type="submit" name="submit" class="btn btn-primary btn-modify">OK</button>
							</div>
						  </div>
                    </div>
					
					
					<div  style="background-color:yellow;margin:20px auto;height:200px;padding:20px;">
					<div class="form-group">
                        <label class="col-md-3 control-label" >Game In Progress Now?</label>
                        <div class="col-md-9">
                            <label class="radio-inline" for="example-inline-radio1">
                                <input type="radio" name="in_progress"   <?php if(isset($eresult['in_progress'])) if($eresult['in_progress']=='yes'){echo "checked='checked'";}?>  value="yes"> <span class="text_colors">Yes</span> 
                            </label>
                            <label class="radio-inline" for="example-inline-radio2">
                                <input type="radio"  name="in_progress"   <?php if(isset($eresult['in_progress'])) if($eresult['in_progress']=='no'){echo "checked='checked'";}?> checked  value="no"> <span class="text_colors">No</span>
                            </label>
                        </div>
                    </div>
					
					<div class="form-group">
					 <div class="row">
					 <div class="col-md-4 col-md-offset-2">
                        <label class="col-md-3 control-label" >Result</label>
                        <div class="col-md-9">
                            <label class="radio-inline" for="example-inline-radio1">
                                <input type="radio" name="game_result"  <?php if(isset($eresult['game_result'])) if($eresult['game_result']=='WON'){echo "checked='checked'";}?> value="WON"> <span class="text_colors">WON</span> 
                            </label>
                            <label class="radio-inline" for="example-inline-radio2">
                                <input type="radio"  name="game_result"  <?php if(isset($eresult['game_result'])) if($eresult['game_result']=='LOST'){echo "checked='checked'";}?>  value="LOST"> <span class="text_colors">LOST</span>
                            </label>
							<label class="radio-inline" for="example-inline-radio2">
                                <input type="radio"  name="game_result"  <?php if(isset($eresult['game_result'])) if($eresult['game_result']=='PUSH'){echo "checked='checked'";}?>  value="PUSH"> <span class="text_colors">PUSH</span>
                            </label>
                        </div>
						</div>
						<div class="col-md-4 pull-right">
						<input type="button" class="btn btn-primary"  value="RESET RESULT"/>
						</div>
						</div>
                    </div>
				
					<div class="form-group">
					 <div class="row">
                        <div class="col-md-6">
						<label class="col-md-3 col-md-offset-3 control-label">Our Pick Score</label>
						<div class="row">
						<div class="col-md-4">
		                <input type="text"  name="our_pick_score"   value="<?php if(isset($eresult['our_pick_score']))
						{ echo $eresult['our_pick_score']; } else { echo '0'; } ?>"  class="form-control"  />
						</div>
						</div>
                        </div>
						<div class="col-md-6">
						<label class="col-md-3 control-label" >Period</label>
						<div class="row">
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
						<label class="col-md-3 col-md-offset-3 control-label">opponent Score</label>
						<div class="row">
						<div class="col-md-4">
		                <input type="text"  name="opp_score"  value="<?php if(isset($eresult['opp_score']))
						{ echo $eresult['opp_score']; } else { echo '0'; } ?>"  class="form-control"  />
						</div>
						</div>
                        </div>
						<div class="col-md-6">
						<label class="col-md-3 control-label" >Time Left</label>
						<div class="row">
						<div class="col-md-4">
		                <input type="text"  name="time_left"  value="<?php if(isset($eresult['time_left']))
						{ echo $eresult['time_left'].':'.$eresult['sec_left']; } else { echo '4:00'; } ?>"  class="form-control" />
						</div>
						</div>
                        </div>
				     </div>
                    </div>
					</div>
					
                <?php echo form_close();
			    }
				?>
 <h1>Active Game Updates</h1>
<?PHP //echo '<pre>';print_R($gresult);echo'</pre>';?>
	<h3>For Bet Day <?php if(isset($result['0']['bet_day'])) {  echo $result['0']['bet_day']; } ?>&nbsp;-&nbsp;<?php if(isset($result['0']['day'])) {  echo date('l', strtotime($gresult['day'])); } ?>&nbsp;,&nbsp;<?php if(isset($gresult['bet_year'])) {  echo $gresult['bet_year']; } ?> &nbsp;,&nbsp;<?php if(isset($result['0']['our_pick_score'])) {  echo '(&nbsp;'.count($result).'&nbsp;Picks&nbsp;)' ; } ?></h3>
	 <!--table class="table table-responsive no-border-table">
	<thead>
		<tr>
			<td style="width:90px;">In Progress</td>
			<td style="width:15px;">Result</td>
			<td style="width:15px;">Won</td>
			<td style="width:15px;">Lost</td>
			<td style="width:40px;">Push</td>
			<td style="width: 71px !important; padding-left:2px; padding-right:2px;">Game ID</td>
			<td style="width: 71px !important;padding-left:2px; padding-right:2px;">Start Time</td>
			<td style="width:90px;">Away Score</td>
			<td style="width:110px;"> Away Team</td>
			<td style="width:95px;">Home Score</td>
			<td style="width:110px;">Home Team</td>
			<td style="width:25px;">Period</td>
			<td style="width:25px;"> Mins</td>
			<td style="width:25px;"> Secs</td>
			<td></td>
		</tr>
	</thead>
	<tbody>
	<?php 
				/* foreach($result AS $row)
				{
					if($row['home_team']==$row['our_pickvalue']){
						$ourpickscore	=	$row['our_pick_score'];
						$opponent_score	=	$row['opp_score'];
					}else{
						$ourpickscore	=	$row['opp_score'];
						$opponent_score	=	$row['our_pick_score'];
					} */
				 ?>
				<?php echo form_open(base_url('Updategame/updategame'),array('id'=>'form_'.$row['id'])); ?> 
				<input type="hidden" name="game_id" value="<?php echo $row['id']; ?>">
				<tr>
				<td style="width:90px;">
					<div class="row">
					<label class="radio-inline" for="example-inline-radio1">
						<input type="radio" name="inprogress" <?php if(isset($row['in_progress'])) if($row['in_progress']=='yes'){echo "checked='checked'";}?>  value="yes"> <span class="text_colors">Yes </span>
					</label>
					<label class="radio-inline" for="example-inline-radio2">
					<input type="radio" name="inprogress" <?php if(isset($row['in_progress'])) if($row['in_progress']=='no') {echo "checked='checked'";}?> value="no"> <span class="text_colors">No</span></label>
                  </div>
				</td>
				<td  style="width:15px;"></td>
				<td style="width:15px;"><label class="radio-inline" >
			    <input type="radio" name="results"  value="WON" <?php if(isset($row['game_result'])) { if($row['game_result']=='WON') {echo "checked";}}?>> <span class="text_colors">W</span></label></td>
				<td style="width:15px;"><label class="radio-inline" >
				<input type="radio" name="results" <?php if(isset($row['game_result'])) { if($row['game_result']=='LOST') {echo "checked='checked'";}} ?> value="LOST"> <span class="text_colors">L</span></label></td>
				<td style="width:15px;"><label class="radio-inline" >
				<input type="radio" name="results" <?php if(isset($row['game_result'])){ if($row['game_result']=='PUSH') {echo "checked='checked'";}} ?> value="PUSH"> <span class="text_colors">P</span></label></td>
				<td style="width: 71px !important; padding-left:2px; padding-right:2px;"><span><?php if(isset($row['game_id'])) { echo $row['game_id']; }?></span></td>
				<td style="width: 71px !important; padding-left:2px; padding-right:2px;"><span><?php if(isset($row['game_time'])) { echo $row['game_time']; }?></span></td>
				<?php if($row['home_team']==$row['our_pickvalue']){ ?>
				<td style="width:90px;"><input type="text" class="form-control" name="opponent_score" value="<?php if(isset($opponent_score)) { echo $opponent_score; }?>" /></td>
				<td style="width:110px;"><span><?php if(isset($row['away_teamtext'])) { echo $row['away_teamtext']; }?></span></td>
				<td style="width:95px;"><input type="text" class="form-control" name="our_pick" value="<?php if(isset($ourpickscore)) {  echo $ourpickscore; }?>" /></td>
				<td style="width:110px;"> <span><?php if(isset($row['home_teamtext'])) {  echo $row['home_teamtext']; }?></span></td>
				
				<?php }else{ ?>
				<td style="width:89px;"><input type="text" class="form-control" name="opponent_score" value="<?php if(isset($ourpickscore)) {  echo $ourpickscore; }?>" /></td>
				<td style="width:110px;"><span><?php if(isset($row['away_teamtext'])) { echo $row['away_teamtext']; }?></span></td>
				<td style="width:95px;"><input type="text" class="form-control" name="our_pick" value="<?php if(isset($opponent_score)) { echo $opponent_score; }?>" /></td>
				<td style="width:110px;"><span><?php if(isset($row['home_teamtext'])) {  echo $row['home_teamtext']; }?></span></td>
				
				<?php } ?>
				<td style="width:25px;"><input type="text" class="form-control" name="period" value="<?php if(isset($row['period'])) {  echo $row['period']; }?>" /></td>
				<td style="width:25px;"> <input type="text" class="form-control" name="time_left" value="<?php if(isset($row['time_left'])) {  echo $row['time_left']; }?>" /></td>
				<td style="width:25px;"> <input type="text" class="form-control" name="sec_left" value="<?php if(isset($row['sec_left'])) {  echo $row['sec_left']; }?>" /></td>
								
				<td>Update</button><button type="button" onclick="submit_form('form_<?PHP echo $row['id'];?>')" class="btn btn-default big_btn" >Update</button></td>
			</tr>
			<?php echo form_close(); ?>
			     <?php 				 
				/* } */
			?>
	</tbody>
	</table-->
	
	
	<div class="updategame_table"> 
			<table width="100%" border="1" class="text-center table table-responsive">
				<tr>
					<th> In Progress </th>
					<th class="darkblue_bg">
						<div class="table_head">RESULT</div>
						<div class="col-md-4 col-sm-4 col-xs-4">Won</div>
						<div class="col-md-4 col-sm-4 col-xs-4">Lost</div>
						<div class="col-md-4 col-sm-4 col-xs-4">Push</div>
					</th>
					<th>
							<div class="col-md-6 col-sm-6 col-xs-6" style="padding-right:10px;">Game ID</div>
							<div class="col-md-6 col-sm-6 col-xs-6">Start Time</div>
					</th>
					<th><div class="table_head">AWAY</div>
							<div class="col-md-6 col-sm-6 col-xs-6">Away Score</div>
							<div class="col-md-6 col-sm-6 col-xs-6"> Away Team</div>
					</th>
					<th><div class="table_head">HOME</div>
							<div class="col-md-6 col-sm-6 col-xs-6">Home Score</div>
							<div class="col-md-6 col-sm-6 col-xs-6">Home Team</div>
					 </th>
					<th class="darkblue_bg"> <div class="table_head">TIME LEFT</div>
							<div class="col-md-4 col-sm-4 col-xs-4">Period</div>
							<div class="col-md-4 col-sm-4 col-xs-4 ">Mins</div>
							<div class="col-md-4 col-sm-4 col-xs-4"> Secs</div>
					 </th>
					<th> &nbsp; </th>
				</tr>
				<?php 
				foreach($result AS $row)
				{
					if($row['home_team']==$row['our_pickvalue']){
						$ourpickscore	=	$row['our_pick_score'];
						$opponent_score	=	$row['opp_score'];
					}else{
						$ourpickscore	=	$row['opp_score'];
						$opponent_score	=	$row['our_pick_score'];
					}
				 ?>
				<?php echo form_open(base_url('Updategame/updategame'),array('id'=>'form_'.$row['id'])); ?> 
				<input type="hidden" name="game_id" value="<?php echo $row['id']; ?>">
				<!----ROW 2-->
				<tr>
					<td>
							<div class="col-md-6 col-sm-6 col-xs-6"><input type="radio" name="inprogress" <?php if(isset($row['in_progress'])) if($row['in_progress']=='yes'){echo "checked='checked'";}?>  value="yes"> Yes</div>
							<div class="col-md-6 col-sm-6 col-xs-6"><input type="radio" name="inprogress" <?php if(isset($row['in_progress'])) if($row['in_progress']=='no') {echo "checked='checked'";}?> value="no"> No</div>
					</td>
					<td class="yellow_bg">
							<div class="col-md-4 col-sm-4 col-xs-4"><input type="radio" name="results"  value="WON" <?php if(isset($row['game_result'])) { if($row['game_result']=='WON') {echo "checked";}}?>> W</div>
							<div class="col-md-4 col-sm-4 col-xs-4 "><input type="radio" name="results" <?php if(isset($row['game_result'])) { if($row['game_result']=='LOST') {echo "checked='checked'";}} ?> value="LOST"> L</div>
							<div class="col-md-4 col-sm-4 col-xs-4"><input type="radio" name="results" <?php if(isset($row['game_result'])){ if($row['game_result']=='PUSH') {echo "checked='checked'";}} ?> value="PUSH"> P</div>
					</td>
					<td class="">
							<div class="col-md-6 col-sm-6 col-xs-6"><?php if(isset($row['game_id'])) { echo $row['game_id']; }?></div>
							<div class="col-md-6 col-sm-6 col-xs-6"><?php if(isset($row['game_time'])) { echo $row['game_time']; }?></div>
					</td>
					<?php if($row['home_team']==$row['our_pickvalue']){ ?>
						<td class="">
							<div class="side_border col-md-6 col-sm-6 col-xs-6">
								<input type="text" class="" size="8" name="opponent_score" value="<?php if(isset($opponent_score)) { echo $opponent_score; }?>" />
							</div>
							<div class="col-md-6 only_pad col-sm-6 col-xs-6" > <?php if(isset($row['away_teamtext'])) { echo $row['away_teamtext']; }?> </div>
						</td>
						<td class="">
							<div class="side_border col-md-6 col-sm-6 col-xs-6">
								<input type="text"  class="" size="8" name="our_pick" value="<?php if(isset($ourpickscore)) {  echo $ourpickscore; }?>" />
							</div>
							<div class="col-md-6 only_pad col-sm-6 col-xs-6"> <?php if(isset($row['home_teamtext'])) {  echo $row['home_teamtext']; }?> </div>
						</td>
					<?PHP 
					} else { 	?>
					<td class="">
							<div class="side_border col-md-6 col-sm-6 col-xs-6">
								<input type="text"  class="" size="8" name="opponent_score" value="<?php if(isset($ourpickscore)) {  echo $ourpickscore; }?>" />
							</div>
							<div class="col-md-6 col-sm-6 col-xs-6 only_pad"> <?php if(isset($row['away_teamtext'])) { echo $row['away_teamtext']; }?> </div>
						</td>
						<td class="">
							<div class="side_border col-md-6 col-sm-6 col-xs-6">
								<input type="text"  class="" size="8" name="our_pick" value="<?php if(isset($opponent_score)) { echo $opponent_score; }?>" />
							</div>
							<div class="col-md-6 col-sm-6 col-xs-6 only_pad"> <?php if(isset($row['home_teamtext'])) {  echo $row['home_teamtext']; }?> </div>
						</td>
					
					<?PHP } ?>
								<td class="time_left">
							<div class="side_border col-md-4 col-sm-4 col-xs-4"><input type="text" class="" size="3" name="period" value="<?php if(isset($row['period'])) {  echo $row['period']; }?>" /></div>
							<div class="side_border  col-md-4 col-sm-4 col-xs-4"><input type="text" class="" size="3" name="time_left" value="<?php if(isset($row['time_left'])) {  echo $row['time_left']; }?>" /> </div>
							<div class="side_border col-md-4 col-sm-4 col-xs-4"><input type="text" class="" size="3" name="sec_left" value="<?php if(isset($row['sec_left'])) {  echo $row['sec_left']; }?>" /></div>
					</td>
					<td class="">
						<button type="button" onclick="submit_form('form_<?PHP echo $row['id'];?>')" class="btn btn-default " >Update</button>
					</td>
				</tr>
							<?php echo form_close(); ?>

				<?PHP } ?>
				<!--tr>
					<td>
							<div class="col-md-6"><input type="radio"> Yes</div>
							<div class="col-md-6"><input type="radio"> No</div>
					</td>
					<td class="yellow_bg">
							<div class="col-md-4"><input type="radio"> W</div>
							<div class="col-md-4 "><input type="radio"> L</div>
							<div class="col-md-4"><input type="radio"> P</div>
					</td>
					<td class="">
							<div class="col-md-6">103 </div>
							<div class="col-md-6">4:00 PM </div>
					</td>
					<td class="">
							<div class="side_border col-md-6"> <span class="white_bg">12</span>  </div>
							<div class="col-md-6"> Alabama </div>
					</td>
					<td class="">
							<div class="side_border col-md-6"> <span class="white_bg">13</span> </div>
							<div class="col-md-6 text-left"> Appalachain State </div>
					</td>
					<td class="time_left">
							<div class="side_border col-md-4"><span class="white_bg">1</span> </div>
							<div class="side_border  col-md-4"><span class="white_bg">10</span> </div>
							<div class="side_border col-md-4"><span class="white_bg">43</span> </div>
					</td>
					<td class="">
						<button class="btn btn-default"> Update</button>
					</td>
				</tr>
				<tr>
					<td>
							<div class="col-md-6"><input type="radio"> Yes</div>
							<div class="col-md-6"><input type="radio"> No</div>
					</td>
					<td class="yellow_bg">
							<div class="col-md-4"><input type="radio"> W</div>
							<div class="col-md-4 "><input type="radio"> L</div>
							<div class="col-md-4"><input type="radio"> P</div>
					</td>
					<td class="">
							<div class="col-md-6">103 </div>
							<div class="col-md-6">4:00 PM </div>
					</td>
					<td class="">
							<div class="side_border col-md-6"> <span class="white_bg">12</span>  </div>
							<div class="col-md-6"> Alabama </div>
					</td>
					<td class="">
							<div class="side_border col-md-6"> <span class="white_bg">13</span> </div>
							<div class="col-md-6 text-left"> Appalachain State </div>
					</td>
					<td class="time_left">
							<div class="side_border col-md-4"><span class="white_bg">1</span> </div>
							<div class="side_border  col-md-4"><span class="white_bg">10</span> </div>
							<div class="side_border col-md-4"><span class="white_bg">43</span> </div>
					</td>
					<td class="">
						<button class="btn btn-default"> Update</button>
					</td>
				</tr>
				<tr>
					<td>
							<div class="col-md-6"><input type="radio"> Yes</div>
							<div class="col-md-6"><input type="radio"> No</div>
					</td>
					<td class="yellow_bg">
							<div class="col-md-4"><input type="radio"> W</div>
							<div class="col-md-4 "><input type="radio"> L</div>
							<div class="col-md-4"><input type="radio"> P</div>
					</td>
					<td class="">
							<div class="col-md-6">103 </div>
							<div class="col-md-6">4:00 PM </div>
					</td>
					<td class="">
							<div class="side_border col-md-6"> <span class="white_bg">12</span>  </div>
							<div class="col-md-6"> Alabama </div>
					</td>
					<td class="">
							<div class="side_border col-md-6"> <span class="white_bg">13</span> </div>
							<div class="col-md-6 text-left"> Appalachain State </div>
					</td>
					<td class="time_left">
							<div class="side_border col-md-4"><span class="white_bg">1</span> </div>
							<div class="side_border  col-md-4"><span class="white_bg">10</span> </div>
							<div class="side_border col-md-4"><span class="white_bg">43</span> </div>
					</td>
					<td class="">
						<button class="btn btn-default"> Update</button>
					</td>
				</tr>
				<tr>
					<td>
							<div class="col-md-6"><input type="radio"> Yes</div>
							<div class="col-md-6"><input type="radio"> No</div>
					</td>
					<td class="yellow_bg">
							<div class="col-md-4"><input type="radio"> W</div>
							<div class="col-md-4 "><input type="radio"> L</div>
							<div class="col-md-4"><input type="radio"> P</div>
					</td>
					<td class="">
							<div class="col-md-6">103 </div>
							<div class="col-md-6">4:00 PM </div>
					</td>
					<td class="">
							<div class="side_border col-md-6"> <span class="white_bg">12</span>  </div>
							<div class="col-md-6"> Alabama </div>
					</td>
					<td class="">
							<div class="side_border col-md-6"> <span class="white_bg">13</span> </div>
							<div class="col-md-6 text-left"> Appalachain State </div>
					</td>
					<td class="time_left">
							<div class="side_border col-md-4"><span class="white_bg">1</span> </div>
							<div class="side_border  col-md-4"><span class="white_bg">10</span> </div>
							<div class="side_border col-md-4"><span class="white_bg">43</span> </div>
					</td>
					<td class="">
						<button class="btn btn-default"> Update</button>
					</td>
				</tr>
				<tr>
					<td>
							<div class="col-md-6"><input type="radio"> Yes</div>
							<div class="col-md-6"><input type="radio"> No</div>
					</td>
					<td class="yellow_bg">
							<div class="col-md-4"><input type="radio"> W</div>
							<div class="col-md-4 "><input type="radio"> L</div>
							<div class="col-md-4"><input type="radio"> P</div>
					</td>
					<td class="">
							<div class="col-md-6">103 </div>
							<div class="col-md-6">4:00 PM </div>
					</td>
					<td class="">
							<div class="side_border col-md-6"> <span class="white_bg">12</span>  </div>
							<div class="col-md-6"> Alabama </div>
					</td>
					<td class="">
							<div class="side_border col-md-6"> <span class="white_bg">13</span> </div>
							<div class="col-md-6 text-left"> Appalachain State </div>
					</td>
					<td class="time_left">
							<div class="side_border col-md-4"><span class="white_bg">1</span> </div>
							<div class="side_border  col-md-4"><span class="white_bg">10</span> </div>
							<div class="side_border col-md-4"><span class="white_bg">43</span> </div>
					</td>
					<td class="">
						<button class="btn btn-default"> Update</button>
					</td>
				</tr>
				<tr>
					<td>
							<div class="col-md-6"><input type="radio"> Yes</div>
							<div class="col-md-6"><input type="radio"> No</div>
					</td>
					<td class="yellow_bg">
							<div class="col-md-4"><input type="radio"> W</div>
							<div class="col-md-4 "><input type="radio"> L</div>
							<div class="col-md-4"><input type="radio"> P</div>
					</td>
					<td class="">
							<div class="col-md-6">103 </div>
							<div class="col-md-6">4:00 PM </div>
					</td>
					<td class="">
							<div class="side_border col-md-6"> <span class="white_bg">12</span>  </div>
							<div class="col-md-6"> Alabama </div>
					</td>
					<td class="">
							<div class="side_border col-md-6"> <span class="white_bg">13</span> </div>
							<div class="col-md-6 text-left"> Appalachain State </div>
					</td>
					<td class="time_left">
							<div class="side_border col-md-4"><span class="white_bg">1</span> </div>
							<div class="side_border  col-md-4"><span class="white_bg">10</span> </div>
							<div class="side_border col-md-4"><span class="white_bg">43</span> </div>
					</td>
					<td class="">
						<button class="btn btn-default"> Update</button>
					</td>
				</tr-->
				
			</table>
		</div>
	
	
	<!--table class="table table-responsive no-border-table">
	<thead>
		<tr>
			<td>In Progress</td>
			<td>Result Won Lost Push</td>
			<td style="width: 71px !important; display:inline-block; padding-left:2px; padding-right:2px;">Game ID</td>
			<td style="width: 71px !important; display:inline-block; padding-left:2px; padding-right:2px;">Start Time</td>
			<td >Away Score Away Team</td>
			<td>Home Score Home Team</td>
			<td>Period Mins Secs</td>
			<td></td>
		</tr>
	</thead>
	 <tbody>

			<?php 
				/* foreach($result AS $row)
				{
					if($row['home_team']==$row['our_pickvalue']){
						$ourpickscore	=	$row['our_pick_score'];
						$opponent_score	=	$row['opp_score'];
					}else{
						$ourpickscore	=	$row['opp_score'];
						$opponent_score	=	$row['our_pick_score'];
					} */
				 ?>
				<?php echo form_open(base_url('Updategame/updategame')); ?> 
				<input type="hidden" name="game_id" value="<?php echo $row['id']; ?>">
				
			 <tr>
				<td>
					<div class="row">
					<label class="radio-inline" for="example-inline-radio1">
						<input type="radio" name="inprogress" <?php if(isset($row['in_progress'])) if($row['in_progress']=='yes'){echo "checked='checked'";}?>  value="yes"> <span class="text_colors">Yes </span>
					</label>
					<label class="radio-inline" for="example-inline-radio2">
					<input type="radio" name="inprogress" <?php if(isset($row['in_progress'])) if($row['in_progress']=='no') {echo "checked='checked'";}?> value="no"> <span class="text_colors">No</span></label>
                  </div>
				</td>
				<td>
				<div class="row">
			    <label class="radio-inline" >
			    <input type="radio" name="results"  value="WON" <?php if(isset($row['game_result'])) { if($row['game_result']=='WON') {echo "checked";}}?>> <span class="text_colors">W</span></label>
				<label class="radio-inline" >
				<input type="radio" name="results" <?php if(isset($row['game_result'])) { if($row['game_result']=='LOST') {echo "checked='checked'";}} ?> value="LOST"> <span class="text_colors">L</span></label>
				<label class="radio-inline" >
				<input type="radio" name="results" <?php if(isset($row['game_result'])){ if($row['game_result']=='PUSH') {echo "checked='checked'";}} ?> value="PUSH"> <span class="text_colors">P</span></label>
				</div>
				</td>
				<td style="width: 71px !important; display:inline-block; padding-left:2px; padding-right:2px;">
				<div class="row">
				<span><?php if(isset($row['game_id'])) { echo $row['game_id']; }?></span>
				</div> 
				<td style="width: 71px !important; display:inline-block; padding-left:2px; padding-right:2px;">
				<div class="row">
				<span><?php if(isset($row['game_time'])) { echo $row['game_time']; }?></span>
				</div>
				</td>
				<?php if($row['home_team']==$row['our_pickvalue']){ ?>
				<td>
				<div class="row">
				<div class="col-md-5">
				<input type="text" class="form-control" name="opponent_score" value="<?php if(isset($opponent_score)) { echo $opponent_score; }?>" />
				</div>
				<div class="col-md-2">
				<span><?php if(isset($row['away_teamtext'])) { echo $row['away_teamtext']; }?></span>
				</div>
				</td> 
				<td>
				<div class="row">
				<div class="col-md-5">
				<input type="text" class="form-control" name="our_pick" value="<?php if(isset($ourpickscore)) {  echo $ourpickscore; }?>" />
				</div>
				<div class="col-md-6">
				 <span><?php if(isset($row['home_teamtext'])) {  echo $row['home_teamtext']; }?></span>
				 </div>
				 </div>
    			</td>
				<?php }else{ ?>
				<td>
				<div class="row">
				<div class="col-md-5">
				<input type="text" class="form-control" name="opponent_score" value="<?php if(isset($ourpickscore)) {  echo $ourpickscore; }?>" />
				</div>
				<div class="col-md-2">
				<span><?php if(isset($row['away_teamtext'])) { echo $row['away_teamtext']; }?></span>
				</div>
				</td> 
				<td>
				<div class="row">
				<div class="col-md-5">
				<input type="text" class="form-control" name="our_pick" value="<?php if(isset($opponent_score)) { echo $opponent_score; }?>" />
				</div>
				<div class="col-md-6">
				 <span><?php if(isset($row['home_teamtext'])) {  echo $row['home_teamtext']; }?></span>
				 </div>
				 </div>
    			</td>
				<?php } ?>
				<td>
				<div class="row">
				<div class="col-md-4">
				<input type="text" class="form-control" name="period" value="<?php if(isset($row['period'])) {  echo $row['period']; }?>" />
				</div>
				<div class="col-md-4">
				<input type="text" class="form-control" name="time_left" value="<?php if(isset($row['time_left'])) {  echo $row['time_left']; }?>" />
				</div>
				<div class="col-md-4">
				<input type="text" class="form-control" name="sec_left" value="<?php if(isset($row['sec_left'])) {  echo $row['sec_left']; }?>" />
				</div>
				</div>
 				</td>
				
				<td><button type="submit" class="btn btn-default big_btn" >Update</button></td>
			</tr>
			<?php echo form_close(); ?>
			     <?php 				 
				/* } */
			?>
	 </tbody>
	</table-->
</div>
</div>
