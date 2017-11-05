<div class="row">
<div class="block full">

		<?php  
		$message = $this->session->flashdata('netid_exists');
		if(isset($message) && !empty($message))
		 {
		 echo '<p>'.$message.'</p>';
		 }
		?>
		<?php echo form_open_multipart(base_url('investment/saveInvestment'),array('class'=>'form-horizontal form-bordered')); ?>
				<input type="hidden"  name="id" value="<?php if(isset($eresult['id'])) { echo $eresult['id']; } ?>"  />
				
					<div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-email">First Name</label>
                        <div class="col-md-6">
                            <input type="text"  name="fname" value="<?php if(isset($eresult['fname'])) { echo $eresult['fname']; } ?>" class="form-control" placeholder="Enter First Name.." required />
                        </div>
                    </div>
                     <div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-password">Last name</label>
                        <div class="col-md-6">
                            <input type="text"  name="lname" value="<?php if(isset($eresult['lname'])) { echo $eresult['lname']; } ?>" class="form-control" placeholder="Enter Last Name.." required />
                        </div>
                    </div>
					
					 <div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-email">Username</label>
                        <div class="col-md-6">
            <input type="text"  name="uname" value="<?php if(isset($eresult['uname'])) { echo $eresult['uname']; } ?>" class="form-control" placeholder="Enter Username.." required  />
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-password">Password</label>
                        <div class="col-md-6">
     <input type="password"  name="password" value="<?php if(isset($eresult['password'])) { echo $eresult['password']; } ?>" class="form-control" placeholder="Enter Password.." required />
                        </div>
                    </div>
					
					  <div class="form-group">
                        <label class="col-md-3 control-label">Title</label>
                        <div class="col-md-9">
					     <label class="radio-inline">

                <input type="radio"   name="inmanager" <?php if(isset($eresult['inmanager'])){if($eresult['inmanager'] == 'Investment Manager'){echo "checked='checked'";}}else { echo "checked='checked'";}?> value="Investment Manager">Investment Manager
                                </label>
                            
                                <label class="radio-inline">
 <input type="radio"  name="inmanager" <?php if(isset($eresult['inmanager'])){if($eresult['inmanager'] == 'Sports Advisor'){echo "checked='checked'";}}?> value="Sports Advisor"> Sports Advisor
                                </label>
								
								<label class="radio-inline">
   <input type="radio"  name="inmanager" <?php if(isset($eresult['inmanager'])){if($eresult['inmanager'] == 'Sports Investment Advisor'){echo "checked='checked'";}}?> value="Sports Investment Advisor"> Sports Investment Advisor
                                </label>
  						</div>
						
                        <div class="col-md-9">
					      <label class="radio-inline">
  <input type="radio"  name="inmanager" <?php if(isset($eresult['inmanager'])){if($eresult['inmanager'] == 'Sports Investment Broker'){echo "checked='checked'";}}?> value=" Sports Investment Broker"> Sports Investment Broker
                                </label>

								<label class="radio-inline">
 <input type="radio"  name="inmanager" <?php if(isset($eresult['inmanager'])){if($eresult['inmanager'] == 'Senior Investment Manager'){echo "checked='checked'";}}?> value="Senior Investment Manager"> Senior Investment Manager
                                </label>
							<label class="radio-inline">
<input type="radio"  name="inmanager" <?php if(isset($eresult['inmanager'])){if($eresult['inmanager'] == 'Managing  Director'){echo "checked='checked'";}}?> value="Managing  Director"> Managing  Director
                                </label>
							</div>
							</div>
						<div class="form-group">
						
                        <div class="col-md-9 col-md-offset-3">
                         <label class="radio-inline">
                         <input type="radio"  name="inmanager" <?php if(isset($eresult['inmanager'])){if($eresult['inmanager'] == 'CEO'){echo "checked='checked'";}}?> value="CEO"> CEO
                                </label>
								
						<label class="radio-inline">
                            <input type="radio"  name="inmanager" <?php if(isset($eresult['inmanager'])) {if($eresult['inmanager'] == 'No Title'){echo "checked='checked'";}}?> value="No Title"> No Title
                          </label>
                            
							</div>
                               </div>
					 <div class="form-group">
                        <label class="col-md-3 control-label">Site</label>
                        <div class="col-md-9">
                            <label class="radio-inline" for="example-inline-radio2">
 <input type="radio"  name="site" <?php if(isset($eresult['site'])) { if($eresult['site'] == 'basketball'){echo "checked='checked'";} } ?> value="basketball"> Basketball
                            </label>
							<label class="radio-inline" for="example-inline-radio1">
  <input type="radio"   name="site" <?php if(isset($eresult['site'])) { if($eresult['site'] == 'football'){echo "checked='checked'";} } else { echo 'checked'; } ?> value="football"> Football
                            </label>
                            <label class="radio-inline" for="example-inline-radio3">
<input type="radio"  name="site" <?php if(isset($eresult['site'])){ if($eresult['site'] == 'baseball'){echo "checked='checked'";}}?> value="baseball"> Baseball
</label>
                            <label class="radio-inline" for="example-inline-radio3">
<input type="radio"  name="site" <?php if(isset($eresult['site'])){ if($eresult['site'] == 'Underdog Kings'){echo "checked='checked'";}}?> value="Underdog Kings"> Underdog Kings 
                            </label>
                        </div>
						<div class="col-md-9">
                          <label class="radio-inline" for="example-inline-radio1">
    <input type="radio" name="site" <?php if(isset($eresult['site'])) {if($eresult['site'] == 'einstien'){echo "checked='checked'";}}?> value="einstien"> Einstein
                            </label>
                            <label class="radio-inline" for="example-inline-radio2">
   <input type="radio"  name="site" <?php if(isset($eresult['site'])) { if($eresult['site'] == 'welligton'){echo "checked='checked'";}}?> value="welligton"> Wellington
                            </label>
                            <label class="radio-inline" for="example-inline-radio3">
  <input type="radio"  name="site" <?php if(isset($eresult['site'])){if($eresult['site'] == 'wizards'){echo "checked='checked'";}}?> value="wizards"> Wizards
                            </label>
							<label class="radio-inline" for="example-inline-radio3">
    <input type="radio"  name="site" <?php if(isset($eresult['site'])){if($eresult['site'] == 'quantam'){echo "checked='checked'";}}?> value="quantam"> Quantum
                            </label>
                        </div>

                      </div>
					  
					  <div class="form-group">
                        <label class="col-md-3 control-label">Show 2015 MLB Bet Days?</label>
                        <div class="col-md-9">
                            <label class="radio-inline" for="example-inline-radio1">
              <input type="radio"  name="mlbet" <?php if(isset($eresult['mlbet'])) {  if($eresult['mlbet']=='yes'){echo "checked='checked'"; } }?> value="yes"> Yes
                            </label>
                            <label class="radio-inline" for="example-inline-radio2">
           <input type="radio" name="mlbet" <?php if(isset($eresult['mlbet'])) {  if($eresult['mlbet']=='no'){echo "checked='checked'"; } } else { echo "checked";} ?>  value="no"> No
                            </label>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-email">Network ID</label>
                        <div class="col-md-6">
						<input type="hidden" name="old_network_id" value="<?php if(isset($eresult['network_id'])) { echo $eresult['network_id']; } ?>" />
            <input type="text"  name="network_id" value="<?php if(isset($eresult['network_id'])) { echo $eresult['network_id']; } ?>" class="form-control"  placeholder="Enter Network ID.." required  />
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-email">Splash Page URL</label>
						<div class="col-md-4">
							<div style="margin-top:10px;"><?php echo base_url(); ?>splash/index/</div>
                        </div>
                        <div class="col-md-2">
            <input type="text"  name="splash_url" value="<?php if(isset($eresult['splash_url'])) { echo $eresult['splash_url']; } ?>" class="form-control splashurl" placeholder="Enter Splash Url.." required  />
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-password">Email</label>
                        <div class="col-md-6">
                            <input type="email"  name="email" value="<?php if(isset($eresult['email'])) { echo $eresult['email']; } ?>" class="form-control" placeholder="Enter Email.." required />
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-password">Cell Phone</label>
                        <div class="col-md-6">
                            <input type="text" name="cellphone" value="<?php if(isset($eresult['cellphone'])) { echo $eresult['cellphone']; } ?>" class="form-control cellphone" placeholder="Enter Cellphone.." required />
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-password">Home City</label>
                        <div class="col-md-6">
                            <input type="text"  name="homecity" value="<?php if(isset($eresult['homecity'])) { echo $eresult['homecity']; } ?>" class="form-control" placeholder="Enter Home City.." required />
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-password">Best Time to Call</label>
                        <div class="col-md-6">
                            <input type="text"  id="timepicker1" name="besttime" value="<?php if(isset($eresult['besttime'])) { echo $eresult['besttime']; } ?>" class="form-control" placeholder="Enter Best Time.." />
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-password">Profile Line 1</label>
                        <div class="col-md-6">
                            <input type="text"  name="profile1" value="<?php if(isset($eresult['profile1'])) { echo $eresult['profile1']; } ?>" class="form-control" placeholder="Enter Profile1.." required />
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-password">Profile Line 2</label>
                        <div class="col-md-6">
                            <input type="text"  name="profile2" value="<?php if(isset($eresult['profile2'])) { echo $eresult['profile2']; } ?>" class="form-control" placeholder="Enter Profile2.." required />
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
								<button type="button"  class="btn btn-primary btn-modify btn-grey redirectinvestment">Cancel</button>
                               <?php 								
								}
								else{
									?>
							<button type="reset" name="cancel" class="btn btn-primary btn-modify btn-grey">Cancel</button>
									<?php 
								 }
							 ?>
							
							</div>
							<div class="col-md-3">
	          <a href="<?php if(isset($eresult['id']))
	 { echo base_url('investment/deleteInvestment/id/').$eresult['id']; }else{ echo 'javascipt:void(0)'; } ?>" class="btn btn-danger btn-modify">Delete</a>
                          </div>
						  </div>
                    </div>
                <?php echo form_close(); ?>
	

     <div style="width:830px; height:600px;overflow-y: scroll; margin-left: auto; margin-right: auto;">
	 <h2>Current Investment Managers List (<?php if(count($countrows)>0){ echo $countrows['0']['COUNT(user_type)'];}else { echo '0';}?>)</h2>
			<table  class="table table-vcenter table-condensed table-responsive table_modify">
                <thead>
                    <tr>
                        <td class="text-center"></td>
                        <td class="text-left">Username</td>
                        <td >User Type</td>
                        <td>Email</td>

                    </tr>
                </thead>
                    <tbody>
						<?php 
							foreach($result as $row)
							{
						    ?>
							 <tr>
							   <td> <a  href="<?php echo base_url('investment/editInvestment/id/'.$row['id']); ?>" data-toggle="tooltip" data-id="<?php echo $row['id']; ?>" title="" class="btn  btn-default btn-inedit big_btn" data-original-title="Edit">Edit</a></td>
							 	<td class="text-left"><?php echo $row['fname']; ?></td>
							 	<td><?php echo $row['user_type']; ?></td>
								<td><?php echo $row['email']; ?></td>
							 </tr>
							<?php 
							}
							?>
				     </tbody>
					</table>
		</div>
        </div>
	</div>
