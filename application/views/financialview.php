<div class="row">
<div class="block full">
       		
		<?php 
			$message = $this->session->flashdata('trans_exists');
			if(isset($message) && !empty($message))
			{
			?>
			<p class="text-center"><?php echo $message; ?></p>
           <?php 			
			} 
			
			$message = $this->session->flashdata('utransid_exists');
			if(isset($message) && !empty($message))
			{
			?>
			<p class="text-center"><?php echo $message; ?></p>
           <?php 			
			}
		?>	
			
		<?php echo form_open(base_url('financial/saveFinancial'),array('class'=>'form-horizontal form-bordered')); ?>
				<input type="hidden" name="id" value="<?php if(isset($eresult['id'])) {echo $eresult['id']; } ?>" />
					<div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-password">Trans ID </label>
                        <div class="col-md-6">
		<input type="hidden" name="oldtransid" value="<?php if(isset($eresult['trans_id'])) {echo $eresult['trans_id']; } ?>" />
		 
        <input type="text"  name="transid"  value="<?php if(isset($eresult['trans_id'])) {echo $eresult['trans_id']; } else { echo 'New'; } ?>" class="form-control " placeholder="Enter TransID.." required />
                        </div>
                    </div>
                     <div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-password">Bet Day</label>
                        <div class="col-md-6">
						<input type="text"  name="fbetday"  value="<?php if(isset($betdata)){ echo $betdata['bet_day']; } else { if(isset($eresult)) { echo $eresult['fbet_day']; } }  ?>" class="form-control fgetbetday"  />
                        </div>
						</div>
					
					<div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-password">Bet Year</label>
                        <div class="col-md-6">
						  <span><?php echo date('Y'); ?></span>
                          <input type="hidden"  name="fbetyear"  value="<?php if(isset($eresult['fbet_year'])) {echo $eresult['fbet_year']; } else { echo date('Y'); } ?>" class="form-control " placeholder="Enter Bet Year.." required />
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-password">Date</label>
                        <div class="col-md-6">
                          <input type="text"  name="fbetdate" id='fbetdate' value="<?php if(isset($betdata['bet_year'])) { echo $betdata['bet_year']; } else { if(isset($eresult['fbet_date'])) {echo $eresult['fbet_date']; }} ?>" class="form-control" placeholder="Get Date.." required />
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-password">Day</label>
                        <div class="col-md-6">
                          <input type="text"  name="fday" id='fday'  value="<?php if(isset($betdata['day'])) { echo $betdata['day']; } else { if(isset($eresult['fday'])) {echo $eresult['fday']; }} ?>" class="form-control" placeholder="Get Day.." required />
                        </div>
                    </div>
					
					<div class="form-group">
					 <div class="row">
					 	<div class="col-md-4 col-md-offset-1">
                        <label class="col-md-6 control-label" for="example-hf-password">Avg-Profit-Per-Bet Pct% </label>
                        <div class="col-md-6">
                          <input type="text"  name="avgprofitbet" value="<?php if(isset($eresult['avg_profit_bet'])) {echo $eresult['avg_profit_bet']; } ?>" class="form-control setavg"  placeholder="Enter Avg-Profit-Per-Bet Pct.."  required id="avgprofitbetx" />
                        </div>
						</div>
						<div class="col-md-4">
						<label class="col-md-6 control-label" for="example-hf-password">Avg Year To Date Pct% </label>
                        <div class="col-md-6">
                          <input type="text"  name="avgprofitdate" value="<?php if(isset($eresult['avg_profit_date'])) {echo $eresult['avg_profit_date']; } ?>" class="form-control setavg avgprofitdate" placeholder="Enter Avg Year To Date Pct.." required />
                        </div>
						</div>
					 </div>
                    </div>
					
                    <div class="form-group">
					 <div class="row">
					 	<div class="col-md-4 col-md-offset-1">
                        <label class="col-md-6 control-label" for="example-hf-password">Gross Profit Pct% </label>
                        <div class="col-md-6">
                          <input type="text"  name="gpprofitbet" value="<?php if(isset($eresult['gp_profit_bet'])) {echo $eresult['gp_profit_bet']; } ?>" class="form-control setavg gpprofitbet" placeholder="Enter Gross Profit Pct%.." required />
                        </div>
						</div>
						<div class="col-md-4">
						<label class="col-md-6 control-label" for="example-hf-password">GP Year To Date%</label>
                        <div class="col-md-6">
                          <input type="text"  name="gpprofitdate" value="<?php if(isset($eresult['gp_profit_date'])) {echo $eresult['gp_profit_date']; } ?>" class="form-control setavg gpprofitdate" placeholder="Enter GP Year To Date%.." required />
                        </div>
						</div>
					 </div>
                    </div>
 					
					<div class="form-group">
                        <label class="col-md-3 control-label">League</label>
                        <div class="col-md-9">
						
						
                            <label class="radio-inline" for="example-inline-radio1">
							<input type="radio"  name="fleague" <?php if(isset($eresult['fleague'])){ if($eresult['fleague']=='NCAAB'){ echo "checked='checked'"; }}else{  echo "checked='checked'"; } ?> value="NCAAB"> NCCA Basketball
                            </label>
                            <label class="radio-inline" for="example-inline-radio2">
                                <input type="radio"  name="fleague"  <?php if(isset($eresult['fleague'])) if($eresult['fleague']=='NCAAF'){ echo "checked='checked'"; }?> value="NCAAF"> NCCA Football
                            </label>
                            <label class="radio-inline" for="example-inline-radio3">
                                <input type="radio" name="fleague"  <?php if(isset($eresult['fleague'])) if($eresult['fleague']=='NFL'){ echo "checked='checked'"; }?> value="NFL"> NFL
                            </label>
							<label class="radio-inline" for="example-inline-radio3">
                                <input type="radio" name="fleague" <?php if(isset($eresult['fleague'])) if($eresult['fleague']=='NBA'){ echo "checked='checked'"; }?> value="NBA"> NBA
                            </label>
							<label class="radio-inline" for="example-inline-radio3">
                                <input type="radio" name="fleague" <?php if(isset($eresult['fleague'])) if($eresult['fleague']=='MLB'){ echo "checked='checked'"; }?>  value="MLB"> MLB
                            </label>
                        </div>
                    </div>
			
                    <div class="form-group form-actions">
					<div class="row">
                        <div class="col-md-2 col-md-offset-3">
                            <button type="submit" name="submit" class="btn btn-primary btn-modify">OK</button>
                          </div>
						  <div class="col-md-2">
						  <?php 
								if(isset($eresult) && count($eresult)>0)
								{
								?>
								 <button type="button" name="reset" class="btn btn-modify btn-grey btn-default redirectfinancial">CANCEL</button>
                                <?php 								
								}
								else{
								?>
							<button type="reset" name="reset" class="btn btn-modify btn-grey btn-default">CANCEL</button>
								<?php 
								}
							?>
                          </div>
						  <div class="col-md-2">
						  <a href="<?php if(isset($eresult['id'])){ echo base_url('financial/deleteFinancial/id/'.$eresult['id']); } else { echo 'javascript:void(0)'; } ?>" class="btn btn-modify btn-danger btn-modify">DELETE</a>
                          </div>
					 </div>	  
                    </div>
                <?php echo form_close(); ?>		
			
			
			
        <div style="width:830px; height:200px;overflow-y: scroll; margin-left: auto; margin-right: auto;">
		<h2>Current Financial List (<?php if(count($countrows)>0){ echo $countrows['0']['COUNT(user_type)'];}else { echo '0';}?>)</h2>
			<table class="table table-vcenter table-condensed table-reponsive table_modify">
                <thead>
                    <tr>
					    <td class="text-center">&nbsp;</td>
                        <td class="text-center">TransID</td>
                        <td class="text-center">Bet Year</td>
                        <td>Bet Day</td>
                        <td>Date</td>
						<td>Avg Profit</td>
                        <td>Gross Profit</td>
                    </tr>
                </thead>
                
                    <tbody>
					  <?php if(isset($result) && count($result>0))
					  {
						  foreach($result as $row)
						  {
					  ?>
						<tr>
					
						 <td><a  href="<?php echo base_url('financial/editFinancial/id/'.$row['id']); ?>" data-toggle="tooltip" title="" class="btn btn-default big_btn" data-original-title="Edit">Edit</td>
							<td class="text-center"><?php echo $row['trans_id']; ?></td>
							<td class="text-center"><?php echo $row['fbet_year']; ?></td>
							<td><?php echo $row['fbet_day']; ?></td>
							<td><?php echo $row['fbet_date']; ?></td>
							<td><?php echo $row['avg_profit_bet']; ?></td>
							<td><?php echo $row['gp_profit_bet']; ?></td>
					   </tr>
					   <?php 
					  } }
					   ?>
					</tbody>
					
					</table>
			</div>
        </div>
    </div>
