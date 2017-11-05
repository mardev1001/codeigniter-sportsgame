<div class="row">
<div class="block full">

		<?php echo form_open(base_url('betdays/saveBetdays'),array('class'=>'form-horizontal form-bordered')); ?>
					
		<input type="hidden" id="id" name="id" value="<?php  if(isset($results['id'])){ echo $results['id']; }?>" />
		         <div class="form-group">
				 <div class="row">
			    <div class="col-md-5 col-md-offset-1">
			<label class="col-md-5 control-label" for="betday" style="font-size: 20px;">Bet Day:
			<?php if(isset($results['bet_day'])){ 
			
			$style			=	 'style="display:inline-block"';
			$afterday		=	'style="display:inline-block"';
			$beforeday		=	'style="display:none;"';
			} else { 
			$beforeday		=	'style="display:inline-block"';
			$afterday		=	'style="display:none;"';
			$style	=	'style="display:none;"'; }  ?>     
			</label>
			
			<div class="col-md-6">
				<span class="nextbetday"  style="line-height: 43px; font-size: 20px;" <?php echo $style;?> >
				<span id="after_update" <?php echo $afterday; ?>><?php  echo $results['bet_day']; ?></span>
				<span id="before_update" <?php echo $beforeday; ?>><?php  echo $bet_day; ?></span>
				</span>
			</div>
			
			<input type="hidden" name="bet_day" value="<?php if(isset($bet_day)){ echo $bet_day; }  ?>" />
			</div>
			<div class="col-md-5">
				 <div class="col-md-7 text-right">
				 <?php if(isset($results['id'])){ ?>
				 <input type="button" class="btn btn-info newbetdayday btn-modify" value="New Bet Day" style="width: 175px;"/>
				 <?php }else{ ?>
				 <input type="button" class="btn btn-info newbetday btn-modify" value="New Bet Day" style="width: 175px;"/>
				 <?php } ?>
				 </div>
			</div>
              
			  </div>	
					 </div>
					 
					 
					<div class="form-group" style=" margin-top: 10px;">
					 <div class="row">
					    <div class="col-md-3 col-md-offset-2">
						
                        <label class="col-md-4 control-label" for="example-hf-email">Date</label>
                        <div class="col-md-8">
			<input type="hidden"   value="<?php  if(isset($current_dy)){ echo $current_dy; }  ?>" class="currentdate" />
			
             <input type="text" name="bet_year"  class="form-control showcurrentday datepicker" value="<?php if(isset($results['bet_year'])){ echo $results['bet_year']; }?>" placeholder="YYYY-MM-DD" required />
                        </div>
						
						</div>
						<div class="col-md-6">
						<div class="row">
                           <div class="col-md-3">
		<label for="" class="col-md-12" style="font-size: 20px;">Day: <span class="currentd"  <?php echo $style;?>>
		<span id="after_updates" <?php echo $afterday; ?>><?php  echo $results['day']; ?></span>
			<span id="before_updates" <?php echo $beforeday; ?>><?php  echo $current_day; ?></span>
			</span>
		</label>
		
		<input type="hidden" name="day" value="<?php  if(isset($current_day)){ echo $current_day; }  ?>" class="currentday" />
						   </div>
	    <div class="col-md-6">
			<label for="" class="col-md-12" style="font-size: 20px;">Bet Year: <span class="currenty"><?php echo date('Y')  ?></span></label>
			<input type="hidden" name="year"  value="<?php echo date('Y')  ?>" class="currentyear" />
		   </div>
						   </div>
                        </div>
						</div>
                    </div>
					
                     <div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-password">Bankroll Pct%</label>
                        <div class="col-md-6">
                            <input type="text"  name="bankroll" value="<?php  if(isset($results['bankroll'])){ echo $results['bankroll']; }else { echo '0'; } ?>" class="form-control bankroll" placeholder="Enter Bet Day.." required />
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-password">Opening Message</label>
                        <div class="col-md-6">
                            <textarea name="opmessage" id="opmessage" class="form-control" cols="30" rows="7"><?php  if(isset($results['op_message'])){ echo $results['op_message']; } ?></textarea>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="col-md-3 control-label">League</label>
                        <div class="col-md-9">
                            <label class="radio-inline" for="example-inline-radio1">
           <input type="radio" id="league" name="league" <?php if(isset($results['league'])){ if($results['league']=='NCAAB'){ echo "checked='checked'"; }}else{ echo 'checked'; } ?>  value="NCAAB">NCAA Basketball
                            </label>
                            <label class="radio-inline" for="example-inline-radio2">
                                <input type="radio"  name="league" <?php if(isset($results['league'])) if($results['league']=='NCAAF'){ echo "checked='checked'"; }?> value="NCAAF">NCAA Football
                            </label>
                            <label class="radio-inline" for="example-inline-radio3">
                                <input type="radio" name="league" <?php if(isset($results['league'])) if($results['league']=='NFL'){ echo "checked='checked'"; }?> value="NFL"> NFL
                            </label>
							<label class="radio-inline" for="example-inline-radio3">
                                <input type="radio" name="league" <?php if(isset($results['league'])) if($results['league']=='NBA'){ echo "checked='checked'"; }?> value="NBA"> NBA
                            </label>
							<label class="radio-inline" for="example-inline-radio3">
                                <input type="radio" name="league" <?php if(isset($results['league'])) if($results['league']=='MLB'){ echo "checked='checked'"; }?> value="MLB"> MLB
                            </label>
                        </div>
                    </div>
			 
			 
                    <div class="form-group form-actions">
					<div class="row">
                        <div class="col-md-2 col-md-offset-3">
                            <button type="submit" name="submit" class="btn btn-primary btn-modify">OK</button>
                          </div>
						  <div class="col-md-2">
		                  <button type="button" name="reset" class="btn btn-modify btn-grey btn-default resetbetday">RESET</button>
                          </div>
						  <div class="col-md-2">
						  <a href="<?php if(isset($results['id']))
	 { echo base_url('betdays/deleteBetdays/id/').$results['id']; }else{ echo 'javascript:void(0)'; } ?>" class="btn btn-modify btn-danger btn-modify">DELETE</a>
                          </div>
					 </div>	  
                    </div>
                <?php echo form_close(); ?>	


        <div style="width:830px; height:600px;overflow-y: scroll; margin-left: auto; margin-right: auto;">
		<!--<h2>Current Investor List (<?php if(count($countrows)>0){ echo $countrows['0']['COUNT(user_type)'];}else { echo '0';}?>)</h2>-->
			<table  class="table table-vcenter table-condensed table-responsive table_modify">
                <thead>
                    <tr>
                        <td class="text-center">ID</td>
						<td>Bet Year</td>
						<td>Bet Day</td>
                        <td>Date</td>
						<td>Day</td>
						<td>Bankroll</td>
                        <td>League</td>
                      </tr>
                </thead>
                
                    <tbody>
					
					<?php 
						foreach($eresult as $erow)
						{
						?>
						<tr>
						<td><a href="<?php echo base_url('betdays/editBetdays/id/'.$erow['id']); ?>" data-toggle="tooltip" title="Edit" class="btn btn-default big_btn">Edit</a></td>
						   <td><?php echo $erow['year']; ?></td>
						   <td><?php echo $erow['bet_day']; ?></td>
						    <td><?php echo $erow['bet_year']; ?></td>
						   <td><?php echo $erow['day']; ?></td>
							<td><?php echo $erow['bankroll']; ?></td>
							<td><?php echo $erow['league']; ?></td>
                        </tr>
						<?php 
						}
					 ?>
						
					</tbody>
					
					</table>
		</div>
        </div>
    </div>
