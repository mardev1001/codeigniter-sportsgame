<div class="row">
<div class="block full">
		

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
							<td class="text-center"><a  href="<?php echo base_url('spreadsheet/showspreadsheet/'.$row['id']); ?>" target="_blank" title="" class="btn big_btn btn-default" data-original-title="Edit">Spreadsheet</a></td>
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
