<?php
	
	$conn = mysqli_connect('localhost','vfootball','vtaurus@123','vegasfootball_new');
	if(!$conn)
	{
		echo 'Error In Connection';
	}
	$network_id = $_GET['networkid'];
	$result = mysqli_query($conn,"SELECT  fname , lname , email , cellphone , inmanager FROM register where network_id = ".$network_id."") or die('Error In Query');

	if(mysqli_num_rows($result)>0)
	  {
		  $row = mysqli_fetch_assoc($result);
		 

?>
<!DOCTYPE html>
<!-- saved from url=(0035)http://vegasfootballclub.com/#/home -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><style type="text/css">@charset "UTF-8";[ng\:cloak],[ng-cloak],[data-ng-cloak],[x-ng-cloak],.ng-cloak,.x-ng-cloak,.ng-hide{display:none !important;}ng\:form{display:block;}.ng-animate-block-transitions{transition:0s all!important;-webkit-transition:0s all!important;}.ng-hide-add-active,.ng-hide-remove{display:block!important;}</style>
	
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.5, minimum-scale=0.5, width=device-width, user-scalable=yes">
	<title>Vegas Football Club</title>

	<link href="..//Splash_files/vfcstyle.css" rel="stylesheet" type="text/css">
	<link href="http://vegasfootballclub.com/favicon.ico" rel="shortcut icon">

	<!-- library js -->
	<script src="..//Splash_files/ionic.bundle.js.download"></script>
	<script src="..//Splash_files/ngStorage.js.download"></script>
	<script src="..//Splash_files/angular-resource.js.download"></script>
	<script src="..//Splash_files/angular-route.js.download"></script>

	<!-- my app's custom js -->
  <script src="..//Splash_files/app.js.download"></script>
  <script src="..//Splash_files/controllers.js.download"></script>

</head>

<body class="grade-a platform-browser platform-win32 platform-ready">
<!-- ngView:  --><div ng-view="" class=""><!--
vfc website app
08-25-16 Alan Gruskoff
-->
<link rel="stylesheet" type="text/css" href="..//Splash_files/vfcstyle.css">
<style type="text/css">
a {
	color: #FFF;
}
</style>

<div style="width: 800px; margin-left: auto; margin-right: auto;
background-color:#12613c;
background-image: url(Splash_files/Diagram2.jpg);
background-repeat:no-repeat; ">

<div style="padding-left: 20px;">
  <img src="..//Splash_files/vfclogo2_450x268.png" width="326" height="194" alt="vfc">
</div>
    
<div ng-show="hasProfile" style="position: relative; top: 0px; margin-left: 140px;" class="">
    <img width="227" height="67" title="Click here to see how your account is doing." ng-click="goVfcil();" onmousedown="this.src=&#39;images/MyAcct227down.png&#39;;" onmouseup="this.src=&#39;images/MyAcct227.png&#39;;" src="..//Splash_files/MyAcct227.png">
</div>
<div ng-hide="hasProfile" style="position: relative; top: 0px; margin-left: 550px;" class="ng-hide">
    <img width="227" height="67" title="Click here to see how your account is doing." ng-click="goVfcil();" onmousedown="this.src=&#39;images/MyAcct227down.png&#39;;" onmouseup="this.src=&#39;images/MyAcct227.png&#39;;" src="..//Splash_files/MyAcct227.png">
</div>

<div class="manager1" style="float: right; margin-top: -270px; text-align: right; padding-right: 10px;">
    <p class="ng-binding"><?php echo $row['fname']." ".$row['lname'];?><br>
     &nbsp; <?php echo $row['inmanager']?><br><br>
     Cell: <?php echo $row['cellphone'] ?><br><br>
     <a href="mailto:montirana@gmail.com" class="ng-binding"><?php echo $row['email']; ?></a>
     <br>
     <br>
     <br>
     
</p></div>  
    

    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tbody><tr>
         <td width="270px" height="340px">

           <div style="position:relative; width:270px; height:340px;  background-image:url(../Splash_files/panel22.png); background-repeat:no-repeat; background-position: top 2px left 10px;" ng-click="watchVimeo()">
             &nbsp;
            </div>
         </td>

         <td width="270px" height="340px" ng-click="showOurPicks()" style="background-image:url(../Splash_files/panel23.png); background-repeat:no-repeat; background-position: top 0px left 0px;">

            <div style="margin-top:286px; margin-left:50px;" class="pword ng-binding">
            montiray99
            </div>
         </td>

         <td width="270px" height="340px" ng-click="goAppInstall()" style="background-image:url(../Splash_files/panel24.png); background-repeat:no-repeat; background-position: top 0px right 10px;">

            <div style="margin-top:186px; margin-left:40px;" class="pword ng-binding">
            montiray99
            </div>
         </td>
      </tr>
    </tbody></table>


<img src="..//Splash_files/OurPicksActive.png" width="240" height="603" alt="ourpicks" style="float: right; margin-right: 12px; margin-top:-40px;">

<img src="..//Splash_files/results1.png" width="304" height="264" style="margin-top:0px;" alt="results">

<div class="rot350" style="position:relative; left:280px; top:-300px;">
<img src="..//Splash_files/parlayLVH.png" width="226" height="339" alt="parlay">
</div>
</div>
</div>

<p>&nbsp;</p>
<p>&nbsp;</p>
				
	 <?php 
	   }else
	{
		echo 'Network Id Does Not Exists';
	}
	?>


</body></html>
