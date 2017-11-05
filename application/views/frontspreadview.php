<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<title>Login Track View</title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url('adminassets'); ?>/css/bootstrap.min.css" />
	<link rel="stylesheet" href="<?php echo base_url('adminassets'); ?>/css/customstyle.css" />
	 <link rel="stylesheet" href="<?php echo base_url('adminassets'); ?>/css/responsive.css" />
	<link rel="stylesheet" href="<?php echo base_url('adminassets')?>/css/font-awesome.min.css" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('adminassets'); ?>/js/vendor/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('adminassets/js/customscript.js'); ?>"></script>
</head>
<body>
		
			<br />
			<br />
			<br />
			<br />
			<br />
			<div class="container">
			<h1>Investor Accouting Spreadsheet For Account </h1>
			<table  class="table table-bordered table-condensed table-reponsive">
                <thead>
                    <tr>
                        <td class="text-center">Bet<br/> YR-<br/> Day</td>
						<td class="text-center">Cash<br/> In/Out</br> $$$</td>
						<td class="text-center">Investor<br/> Betting <br/> Bankroll <br/> $$$</td>
                        <td class="text-center">Date</td>
                        <td class="text-center">Day Of Week</td>
						<td class="text-center">Sport</td>
						<td class="text-center">Gross<br/> Profit/Loss(as % of <br/>Bankroll)</td>
						<td class="text-center">Gross<br/> Profit <br/> $$$</td>
						<td class="text-center">Investor<br/> Loss <br/> $$$</td>
						<td class="text-center">Loss<br/> Reimburse <br/>-ment<br/> $$$</td>
						<td class="text-center">Loss<br/> Carry <br/>Forward<br/> $$$</td>
						<td class="text-center">Investor<br/> Split%</td>
						<td class="text-center">Investor<br/> Share <br/> of <br/> Profit<br/> $$$</td>
						<td class="text-center">Investor<br/> Cash </br> Flow </br> $$$</td>
						<td class="text-center">Investor<br/> Ending </br> Bankroll </br> $$$</td>
						<td class="text-center">Target <br/> Bankroll </br> $$$</td>
                    </tr>
                </thead>
                      <tbody>
						<?php 
						if(isset($result) && count($result)>0)
						{
						foreach($result as $row)
						{						
						?>
						<tr>
							<td class="text-center"><?php echo date('y',strtotime($row['bet_year'])).'-'.$row['bet_day'] ?></td>
							<td class="text-center">&nbsp;</td>
							<td class="text-center">&nbsp;</td>
							<td class="text-center"><?php echo $row['betting_year']; ?></td>
							<td class="text-center"><?php echo $row['betttin_day']; ?></td>
							<td class="text-center"><?php echo $row['league']; ?></td>
							<td class="text-center">&nbsp;</td>
							<td class="text-center">&nbsp;</td>
							<td class="text-center">&nbsp;</td>
							<td class="text-center">&nbsp;</td>
							<td class="text-center">&nbsp;</td>
							<td class="text-center">&nbsp;</td>
							<td class="text-center">&nbsp;</td>
							<td class="text-center">&nbsp;</td>
							<td class="text-center">&nbsp;</td>
							<td class="text-center">&nbsp;</td>
						</tr>
						<?php
						}}						
						?>
					 </tbody>
			</table>
			</div>
         </body>
</html>
