<div class="row">
<div class="block full">
		<?php echo form_open(base_url('investor/saveInvestor'),array('class'=>'form-horizontal form-bordered')); ?>
				<input type="hidden" name="id" value="<?php if(isset($resultn['id'])){echo $resultn['id']; } ?>" />
				 <div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-email">Username</label>
                        <div class="col-md-6">
                            <input type="text"  name="uname" value="<?php if(isset($resultn['uname'])){echo $resultn['uname']; } ?>" class="form-control" placeholder="Enter Username.." required  />
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-email">Investor Share Pct%</label>
                        <div class="col-md-6">
                            <input type="button"  value="Edit Share Pcts" class="btn btn-primary btn_investor" />
                        </div>
                    </div>

                     <div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-password">Enter Target $</label>
                        <div class="col-md-4">
                            <input type="text"  name="target" value="<?php if(isset($resultn['target'])){echo $resultn['target']; } ?>" class="form-control" placeholder="Enter Last Name.." required />
                        </div>
						<label class="col-md-3 control-label" style="text-align:left;" for="example-hf-password">(For Multi-Fold Contracts)</label>
                    </div>
					
					<div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-password">Notes</label>
                        <div class="col-md-6">
                           <textarea name="notes"  cols="30" rows="6" class="form-control"><?php if(isset($resultn['notes'])){echo $resultn['notes']; } ?></textarea>
                        </div>
                    </div>
                    
		  
					  <div class="form-group">
                        <label class="col-md-3 control-label">Use Financials From</label>
                        <div class="col-md-9">
                            <label class="radio-inline" for="example-inline-radio1">
        <input type="radio"  name="finaform" <?php if(isset($resultn['fina_form'])) if($resultn['fina_form'] == 'all'){echo "checked='checked'";}?>  value="all"> All Sites
                            </label>
                            <label class="radio-inline" for="example-inline-radio2">
           <input type="radio"  name="finaform" <?php if(isset($resultn['fina_form'])) if($resultn['fina_form'] == 'mlb'){echo "checked='checked'";}?> value="mlb"> MLB Only
                            </label>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-password">Cap $ Value</label>
                        <div class="col-md-6">
                            <input type="text"  name="capvalue" value="<?php if(isset($resultn['capvalue'])){echo $resultn['capvalue']; } else { echo '0'; } ?>" class="form-control"  required />
                        </div>
                    </div>
					
					
					<div class="custom_investor" id="div_id" style="display:none;    background-color: #d9dff8;padding-top:20px;width:80%;margin:0px auto;">
					<div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-email">Split Pct%</label>
                        <div class="col-md-6">
                            <input type="text"   value="100"   class="form-control splitpc"  />
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-email">Date</label>
                        <div class="col-md-6">
                            <input type="text"  id="datepicker" class="form-control splitdate"  />
                        </div>
                    </div>
					<div class="form-group">
                        <div class="col-md-3 col-md-offset-3">
                            <input type="button"  class="btn btn-primary add_newrow" value="Post New Split Row" />
                        </div>
						<div class="col-md-3">
                            <input type="button"  class="btn btn-danger hide_btn" value="Close Split Window" />
                        </div>
                    </div>
					
					<div class="form-group">
						<div class="col-md-6 col-md-offset-3">
                        <table class="table table-responsive addnewtable table_modify">
						<thead>
							<tr>
								<th>Row</th>
								<th>Split%</th>
								<th>Date</th>
								<th>(Delete)</th>
							</tr>
							</thead>
							<tbody class="maintbody">
							 <?php if(isset($results) && count($results)>0){  ?>
							
							
							<?php 
							if(isset($results)){
							foreach($results as $rows)
							{
							?>	
								<tr class="removetr">
									<td><?php echo $rows['sid']?></td>
									<td><?php echo $rows['splitpc']?></td>
									<td><?php echo $rows['splitdate']?></td>
									<td><a href="javascript:void(0)" class="removetd" data-id="<?php echo $rows['id']; ?>" >Delete</a>
										<input type="hidden" name="sid[]" value="<?php echo $rows['sid']?>">
										<input type="hidden" name="splitpc[]" value="<?php echo $rows['splitpc']?>">
										<input type="hidden" name="splitdate[]" value="<?php echo $rows['splitdate']?>">
									</td>
								</tr>
								
							<?php 
							} }
							?>						
						  
							 <?php } ?>
							   </tbody>
						</table>
						
						</div>
                    </div>
					</div><!--End Of Custom Investor-->
					
					<div class="form-group">
					  <div class="col-md-12 col-sm-12 col-xs-12">
                        <h4 class="control-label col-md-3" for="example-hf-password">Transactions</h4>
					   </div>
					  <div class="col-md-12 col-sm-12 col-xs-12 thide_div" style="display:none;background-color:#e2e2e2;">					  
							<div class="col-md-12">
								<label class="col-md-3 control-label">Cash Type</label>
							
								<div  class="col-md-6"  >
									<div class="col-md-9">
										<label class="radio-inline" >
											<input type="radio" checked id="checked" name="tmoney" class="tmoney" value="IN"> IN
										</label>
										<label class="radio-inline">
											<input type="radio"  name="tmoney" class="tmoney" value="OUT"> OUT
										</label>
										<label class="radio-inline" >
											<input type="radio"  name="tmoney" class="tmoney" value="TRANSFER"> TRANSFER
										</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" >Amount</label>
								<div class="col-md-6">
									<input type="text"  name="amount" value="0"   class="form-control amount" required />
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="example-hf-email">Betting Year</label>
								<div class="col-md-6">
									<input type="text"  name="betting_year" id="datepicker3" class="form-control betting_year" required />
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="example-hf-email">Betting Day</label>
								<div class="col-md-6">
									<input type="text"  name="betting_day" required class="form-control betting_day invgetbetday" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="example-hf-email">Date</label>
								<div class="col-md-6">
									<input type="text"  name="betting_date" required   id="fbetdate"  class="form-control betting_date" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" >Loss Carry Forward</label>
								<div class="col-md-6">
									<input type="text"  name="lcarry"  required value="0"  class="form-control lcarry" />
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-md-6 col-md-offset-4">
									<input type="button" class="btn btn-primary post_row" value="Post Row" />
									<input type="button" class="btn btn-primary close_row" value="Close Window" />
								</div>
							</div>
							
						</div>
				
						<div  class="col-md-7 col-md-offset-3" >
                          <table class="table table-responsvie"  >
                          	<thead>
                          		<tr>
                          			<td>Cash Type</td>
                          			<td>Amount</td>
                          			<td>Bet Year</td>
                          			<td>Bet Day</td>
                          			<td>Date</td>
									<td>Loss Carry Forward</td>
									<td>(Delete)</td>
								</tr>
                          	</thead>
							<tbody class="secondtbody" >
							<?php if(isset($resultt) && count($resultt)>0){   ?>
							
							
							<?php 
							if(isset($resultt)){
								foreach($resultt as $rowt)
								{
								?>
								<tr class="removetr">
									<td><?php echo $rowt['tmoney'] ?></td>
									<td><?php echo $rowt['amount'] ?></td>
									<td><?php echo $rowt['betting_year'] ?></td>
									<td><?php echo $rowt['betting_day'] ?></td>
									<td><?php echo $rowt['betting_date'] ?></td>
									<td><?php echo $rowt['lcarry'] ?></td>
									<td><a href="javascript:;" class="removetd">Delete</a>
										<input type="hidden" name="tmoney[]" value="<?php echo $rowt['tmoney'] ?>">
										<input type="hidden" name="amount[]" value="<?php echo $rowt['amount'] ?>">
										<input type="hidden" name="betting_year[]" value="<?php echo $rowt['betting_year'] ?>">
										<input type="hidden" name="betting_day[]" value="<?php echo $rowt['betting_day'] ?>">
										<input type="hidden" name="betting_date[]" value="<?php echo $rowt['betting_date'] ?>">
										<input type="hidden" name="lcarry[]" value="<?php echo $rowt['lcarry'] ?>">
									</td>
									
								</tr>
								
								<?php 
								}
							}
							?>		
							
						    
							<?php } ?>
							<tbody>
                          </table>
                        </div>
						<div class="col-md-2 btn_div">
							<table class="table table-responsive no-border-table" >
                          	<tbody>
                          		<tr>
  								<td><input type="button" class="btn btn-primary btn-sm btn_row"  value="Add New Row"/></td>
								</tr>
                          	</tbody>
                          </table>
						</div>
                    </div>

                     <div class="form-group form-actions">
				     <div class="row">
                        <div class="col-md-2 col-md-offset-3">
                            <button type="submit" name="submit" class="btn btn-primary btn-modify">OK</button>
							</div>
							<div class="col-md-2">
							<button type="reset" name="cancel" class="btn btn-primary btn-modify btn-grey">Cancel</button>
							</div>
							<div class="col-md-3">
	          <a href="<?php if(isset($resultn['id']))
	         { echo base_url('investor/deleteInvestor/id/').$resultn['id']; }else{ echo 'javascipt:void(0)'; } ?>" class="btn btn-danger btn-modify">Delete</a>
                          </div>
						  </div>
                    </div>
                <?php echo form_close(); ?>

       <div style="width:830px; height:600px;overflow-y: scroll; margin-left: auto; margin-right: auto;">
	   
		<h2>Current Investor List (<?php if(count($countrows)>0){ echo $countrows['0']['COUNT(user_type)'];}else { echo '0';}?>)</h2>
			<table  class="table table-vcenter table-condensed table-reponsive">
                <thead>
                    <tr>
                        <td class="text-center"></td>
                        <td class="text-center">Username</td>
                        <td>User Type</td>
						<td>Financial Form</td>
						<td>Notes</td>
						<td>Target $</td>
                        <td>Cap $</td>
                    </tr>
                </thead>
                
                    <tbody>
						<?php 
						foreach($result as $row )
						{
						?>
						<tr>
							<td class="text-center"><a  href="<?php echo base_url('investor/editInvestor/id/'.$row['id']); ?>" data-toggle="tooltip" title="" class="btn big_btn btn-default" data-original-title="Edit">Edit</a></td>
							<td class="text-center"><?php echo $row['uname']; ?></td>
							<td><?php echo $row['user_type']; ?></td>
							<td><?php echo $row['fina_form']; ?></td>
							<td><?php echo $row['notes']; ?></td>
							<td><?php echo $row['target']; ?></td>
							<td><?php echo $row['capvalue']; ?></td>

						</tr>
						
						<?php  }?>
					</tbody>
					
					</table>
		</div>
        </div>
    </div>
