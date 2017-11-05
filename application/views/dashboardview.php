<div class="row">
<div class="block full">
<!--<div style="width:830px; height:200px;overflow-y: scroll; margin-left: auto; margin-right: auto;"> -->
			 
			 <h2>Top Network ID Logins</h2>
			<div class="table-responsive">
			<table id="example"  class="table table-vcenter table-condensed table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
						<th class="text-left">Investment Manager Name</th>
                        <th class="text-left">Network Id</th>
                        <th>Logins</th>
                    </tr>
                </thead>
                <tbody>
				
				<?php 
				$i=1;
				if(isset($results) && !empty($results))
				{	
			    foreach($results as $row)
				{
				?>
						<tr>
                        <td class="text-center"><?php echo $i; ?></td>
						<td class="text-left"><?php echo $row['investor_name']; ?></td>
                        <td class="text-left"><?php echo $row['network_id']; ?></td>
                        <td><?php echo $row['COUNT(login)']; ?></td>
						</tr>
				<?php $i++; }} ?>	
                </tbody>
            </table>			
        <!--</div>
         <div style="width:830px; height:200px;overflow-y: scroll; margin-left: auto; margin-right: auto;">-->
		 
		 <h2>Current Admin List (<?php if(count($countrows)>0){ echo $countrows['0']['COUNT(user_type)'];}else { echo '0';}?>)</h2>
		 <div class="table-responsive">
			<table  id="example2"  class="table table-vcenter table-condensed table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-left">User name</th>
                        <th>User Type</th>
                        <th>Email</th>
                        <th class="text-left">Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
					$i=1;
					 foreach($result as $row)
					 {
                    ?>
                    <tr>
					 <td class="text-center"><?php echo $i; ?></td>
                   <!--<td class="text-center"><a href="<?php if(isset($row['id'])) { echo $row['id']; } else { echo 'javascript:void(0)'; }  ?>" data-toggle="tooltip" title="Edit" class="btn big_btn btn-default">Edit</a></td>-->
                   <td><?php echo $row['uname']; ?></td>
				   <td><?php echo $row['user_type']; ?></td>
				   <td><?php echo $row['email']; ?></td>
                   <td class="text-left"><a class="btn big_btn btn-default" href="<?php echo base_url('users/editUsers/id/').$row['id']  ?>" >Edit</a></td>
                    </tr>
                    <?php $i++; } ?>
                </tbody>
            </table>			
        <!--</div>-->
</div>
</div>