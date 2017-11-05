<!DOCTYPE HTML>
<html lang="en-US">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.5, minimum-scale=0.5, width=device-width, user-scalable=yes">
      <title>Sports Admin</title>
      <link href="<?php echo base_url() ?>/Splash_files/vfcstyle.css" rel="stylesheet" type="text/css">
      <link href="http://vegasfootballclub.com/favicon.ico" rel="shortcut icon">
      <link rel="stylesheet" href="<?php echo base_url('adminassets'); ?>/css/responsive.css" />
      <link rel="stylesheet" href="<?php echo base_url('adminassets'); ?>/css/bootstrap.min.css" />
      <!-- library js -->
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url('adminassets/js/customscript.js'); ?>"></script>
      <style>
         body {
         background-image: url("../uploads/Back_004.jpg");
         background-repeat: repeat;
         height: 100%;
         line-height: 150%;
		 font-size:12pt;
		 color:#000;
         overflow: scroll;
         text-rendering: optimizelegibility;
         }
         table.invlog {
         /* width: 1100px; */
         /*border-collapse: collapse;*/
         cellspacing: 0;
         margin-top: 0px;
		 width:100%;
         font-weight: normal;
         line-height: 120%;
         }
         table.invlog td {
         border-bottom: 1px solid #dddddd;
         border-left: 1px solid #dddddd;
         }
         table.invlog th {
         background: #006766 none repeat scroll 0 0;
         border-left: 1px solid #dddddd;
         color: #ffffff;
         font-family: Tahoma,Helvetica,sans-serif;
         font-size: 10pt;
         padding:0;
         }
         table th {
         text-align: center;
         }
         table td {
         white-space: nowrap;
         }
         div.scrollableContainer {
         margin-left: auto;
         margin-right: auto;
         margin-top: 12px;
         position: relative;
         padding-top: 8em;
         width: 1050px;
         }
         table.scrollable thead {
         position: absolute;
         top: 34px;
         width: 100%;
         }
         table { 
		 border-collapse: separate;
		 border-spacing: 2px; 
		 } 
         div.scrollingArea {
         height: 600px;
         overflow: auto;
         }
         .topTitle {
         position: fixed;
         top: 10px;
         }
        .topTitle .title {
		  background-color: #006766;
		  color: #ffffff;
		  font-family: Tahoma,Helvetica,sans-serif;
		  font-size: 16pt;
		  font-weight: bold;
		  padding-bottom: 4px;
		  padding-left: 25px;
		  padding-right: 20px;
		}
		
      </style>
   </head>
   <body>
      <div class="container">
         <div ng-show="showMain" class="scrollableContainer">
            <div class="topTitle heading_tag">
               <span class="title">Investor Accounting Spreadsheet for Account 2017basketball v2.1  
               </span>
            </div>
            <div class="scrollingArea">
               <table class="invlog scrollable">
                  <thead>
                     <tr style="float: left; width: 98%;">
                        <th style="width: 20px; color:white; background-color:#d49608;">
                           <div>&nbsp;Bet YR-<br>&nbsp;Day&nbsp;</div>
                        </th>
                        <th style="width: 67px; color:white; background-color:#d49608;">
                           <div>Cash<br>In/Out<br>$$$</div>
                        </th>
                        <th style="width: 80px; color:black; background-color:#ffff94;">
                           <div>Investor Betting Bankroll <br/> $$$</div>
                        </th>
                        <th style="width: 90px; color:white; background-color:#64a9f0;">
                           <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                        </th>
                        <th style="width: 10px; color:white; background-color:#64a9f0;">
                           <div>Day<br>of<br>Week</div>
                        </th>
                        <th style="width: 68px; color:white; background-color:#64a9f0;">
                           <div>&nbsp;Sport</div>
                        </th>
                        <th style="width: 66px; color:black; background-color:#ffff94;">
                           <div>Gross Profit/Loss (as % of Bankroll)</div>
                        </th>
                        <th style="width: 72px; color: white; background-color:#006766;">
                           <div>Gross Profit<br>$$$</div>
                        </th>
                        <th style="width: 66px; color: white; background-color:#006766;">
                           <div>Investor Loss<br>$$$</div>
                        </th>
                        <th style="width: 78px; color: white; background-color:#006766;">
                           <div>Loss Reimburse<br>-ment<br>$$$</div>
                        </th>
                        <th style="width: 72px; color: white; background-color:#006766;">
                           <div>Loss<br>Carry Forward $$$</div>
                        </th>
                        <th style="width: 60px; color: white; background-color:#006766;">
                           <div>Inves<br>-tor<br>Split%</div>
                        </th>
                        <th style="width: 60px; color: white; background-color:#006766;">
                           <div>Investor Share of Profit $$$</div>
                        </th>
                        <th style="width: 70px; color: white; background-color:#006766;">
                           <div>Investor<br>Cash<br>Flow<br>$$$</div>
                        </th>
                        <th style="width: 36px; color: black; background-color: #ffff94;">
                           <div>
						   <?PHP 
								if(isset($resultx) && count($resultx)>0){
									foreach($resultx as $growx){
										$splitpc	= 	$growx->splitpc;
									}	
								}
					/* echo  "<pre>";print_R($splitpc);echo"</pre>";	 */
							if($splitpc=='100'){
								echo "Target Bankroll $$$";
							}else{
								echo "Investor Ending Bankroll $$$";
							}
						   ?>
						   </div>
                        </th>
                     </tr>
                  </thead>
                  <tbody  class="">
				  <?php
					
				  if(isset($arrayss) && count($arrayss)>0) 
								 {
								 foreach($arrayss as $grow)
								 {
								/* 	echo '<pre>';print_R($grow);echo'</pre>';	 */
								 ?>	
									<tr style="height: 40px;">
                        <td style="width: 36px; text-align: center; background-color: #eeeeee;">
                           <?PHP echo $grow['bet_yr']; ?>
                        </td>
                        <td style="width: 68px; text-align: center; background-color: #eeeeee;">
                          <?PHP echo $grow['cash_in']; ?>
                        </td>
                        <td style="width: 76px; text-align: center; background-color: #ffff94;">
                         <?PHP echo $grow['investor_staring']; ?>
                        </td>
                        <td style="width: 94px; text-align: center; background-color: #ddecfa;">
						<?PHP echo $grow['date'].'<br>'.$grow['date_year']; ?>
                        </td>
                        <td style="width: 40px; text-align: center; background-color: #ddecfa;">
                         <?PHP echo $grow['day_of_week']; ?>
                        </td>
                        <td style="width: 60px; text-align: center; background-color: #ddecfa;">
                         <?PHP echo $grow['sport']; ?>
                        </td>
                        <td style="width: 76px; text-align: center; background-color: #ffff94;">
                        <?PHP echo $grow['gross_profit_percent']; ?>
                        </td>
                        <td style="width: 70px; text-align: center; background-color: #d3f8dd;">
                         <?PHP echo $grow['gross_profit']; ?>
                        </td>
                        <td style="width: 66px; text-align: center; background-color: #d3f8dd;">
                         <?PHP echo $grow['investor_loss']; ?>
                        </td>
                        <td style="width: 76px; text-align: center; background-color: #d3f8dd; color: #078607">
                         <?PHP echo $grow['loss_imbursement']; ?>
                        </td>
                        <td style="width: 70px; text-align: center; background-color: #d3f8dd;">
                         <?PHP echo $grow['loss_carry_forward']; ?>
                        </td>
                        <td style="width: 62px; text-align: center; background-color: #d3f8dd;">
                         <?PHP echo $grow['investor_split']; ?>
                        </td>
                        <td style="width: 62px; text-align: center; background-color: #d3f8dd;">
                      <?PHP echo $grow['investor_split_profit']; ?>
                        </td>
                        <td style="width: 62px; text-align: center; background-color: #d3f8dd;">
                        <?PHP echo $grow['investor_cash_flow']; ?>
                        </td>
                        <td style="width: 66px; text-align: center; background-color: #ffff94;">
                         <?PHP echo $grow['investor_ending_bankroll']; ?>
                        </td>
                     </tr>
								<?php 	
								 } 
								 }
								?>	
                     
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </body>
</html>

