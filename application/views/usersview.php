<div class="row">
<div class="block full">
				<?php 
				 $message = $this->session->flashdata('email_exists');
				 if(isset($message))
				 {
				?>
					
					<div class="alert alert-danger alert-dismissable">
					  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					  <strong><?php echo $message; ?></strong> 
					</div>
                <?php 				
				 }
			   ?>
			   <?php 
				 $message = $this->session->flashdata('success_email');
				 if(isset($message))
				 {
				?>
				<div class="alert alert-danger alert-dismissable">
					  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					  <strong><?php echo $message; ?></strong> 
					</div>
                <?php 				
				 }
			   ?>
				
			<?php echo form_open(base_url('users/saveUsers'),array('class'=>'form-horizontal form-bordered'));
			?>

				
				
				<input type="hidden"  name="id" value="<?php if(isset($eresult['id'])){ echo $eresult['id']; }?>"  />

					
					<div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-email">First Name</label>
                        <div class="col-md-6">
                            <input type="text"  name="fname" value="<?php if(isset($eresult['fname'])){ echo $eresult['fname']; }?>" class="form-control" placeholder="Enter First Name.." required />
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-email">Last Name</label>
                        <div class="col-md-6">
                            <input type="text"  name="lname" value="<?php if(isset($eresult['lname'])){ echo $eresult['lname']; }?>" class="form-control" placeholder="Enter Last Name.." required />
                        </div>
                    </div>
					
					 <div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-email">Username</label>
                        <div class="col-md-6">
                            <input type="text"  name="username" value="<?php if(isset($eresult['uname'])){ echo $eresult['uname']; }?>" class="form-control" placeholder="Enter User Name.." required />
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-email">User Email</label>
                        <div class="col-md-6">
                            <input type="email"  name="useremail" value="<?php if(isset($eresult['email'])){ echo $eresult['email']; }?>" class="form-control" placeholder="Enter User Name.." required />
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-email">User Password</label>
                        <div class="col-md-6">
                            <input type="password"  name="password" value="<?php if(isset($eresult['password'])){ echo $eresult['password']; }?>" class="form-control" placeholder="Enter User Password.." required />
                        </div>
                    </div>

					<div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-email">User Type</label>
                        <div class="col-md-6">
                          <select name="usertype" id="usertype"  class="form-control accesstype" required>
						    <option value=""  >User Type</option>
                          	<?php 
								foreach($uresult as $row)
								 {
								?>
			<option value="<?php echo $row['userstype']; ?>" <?php if(isset($eresult['user_type']))  if($eresult['user_type']==$row['userstype']){ echo 'selected';}?>><?php  echo ucfirst($row['userstype']);  ?></option>
								<?php 
								 }
							?>
                          </select>
                        </div>
                    </div>
					<input type="hidden" name="userid"  value="<?php echo $id['id']; ?>" />

					<div class="form-group showaccesstype" 
				
					<?php if(isset($eresult) && $eresult['user_type']=='gamers'){  echo 'style=display:block;'; } else{ echo 'style="display:none;"'; } ?> >
                        <label class="col-md-3 control-label">Access Type</label>
                        <div class="col-md-9">
                            <label class="radio-inline" for="example-inline-radio1">
                 <input type="checkbox" name="rights[]" id="new_right" <?php if(isset($getrights['new_game']))  if($getrights['new_game']=='1') { echo "checked='checked'"; } ?> value="new_game"> New Game
                            </label>
                            <label class="radio-inline" for="example-inline-radio2">
                 <input type="checkbox" name="rights[]" id="update_right" <?php if(isset($getrights['update_game'])) if($getrights['update_game']=='1') { echo "checked='checked'"; } ?>  value="update_game"> Update Game
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-email">User Type</label>
                        <div class="col-md-6">
                          <input type="checkbox" name="receive" value="Yes"> Receive Spreadsheet Password Request Notifications
                        </div>
                    </div>
                    <div class="form-group form-actions">
					<div class="row">
                        <div class="col-md-2 col-md-offset-3">
                            <button type="submit" name="submit" class="btn btn-primary btn-modify" onClick="return new_game()">OK</button>
                          </div>
						  <div class="col-md-2">
						  <?php if(isset($eresult) && count($eresult['id']) >0)
						  {
						   ?>
							<button type="button"  class="btn btn-modify btn-grey btn-default redirectgame">CANCEL</button>
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
						  <a href="<?php if(isset($eresult['id']))
	 { echo base_url('users/deleteUsers/id/').$eresult['id']; }else{ echo 'javascript:void(0)'; } ?>" class="btn btn-modify btn-danger btn-modify">DELETE</a>
                          </div>
					 </div>	  
                    </div>
                <?php echo form_close(); ?>
		
        <div style="width:830px; height:600px;overflow-y: scroll; margin-left: auto; margin-right: auto;">
		<!--<h2>Current Users List (<?php if(count($countrows)>0){ echo $countrows['COUNT(user_type)'];}else { echo '0';}?>)</h2>-->
			<table  class="table table-vcenter table-condensed table-responsive table_modify">
                <thead>
                    <tr>
                        <td class="text-center"></td>
                        <td class="text-left">Username</td>
                        <td>User Type</td>
                        <td>User Email</td>
						<td>User Password</td>
                    </tr>
                </thead>
                
                    <tbody>
						<tr>
							<?php
 							foreach($result as $row)
							{
							?>
							 <td class="text-center"><a  href="<?php echo base_url('users/editUsers/id/'.$row['id']); ?>" data-toggle="tooltip" title="" class="btn big_btn btn-default" data-original-title="Edit">Edit </i></a></td>
							 <td class="text-left"><?php echo $row['uname']; ?></td>
							 <td><?php echo $row['user_type']; ?></td>
							 <td><?php echo $row['email']; ?></td>
							 <td><?php echo $row['password']; ?></td>
							</tr>
						<?php 
							}
							?>
					</tbody>
					
					</table>
					
			</div>
        </div>
    </div>
