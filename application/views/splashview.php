<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.5, minimum-scale=0.5, width=device-width, user-scalable=yes">
	<title>Underdog KINGS</title>

	<link href="<?php echo base_url() ?>/Splash_files/vfcstyle.css" rel="stylesheet" type="text/css">
	<link href="http://vegasfootballclub.com/favicon.ico" rel="shortcut icon">
    <link rel="stylesheet" href="<?php echo base_url('adminassets'); ?>/css/responsive.css" />
	<!-- library js -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('adminassets/js/customscript.js'); ?>"></script>
</head>
<body style="margin:0;">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/Splash_files/vfcstyle.css">
<style type="text/css">
a {
	color: #FFF;
}
</style>
<?php 
		if(isset($result))
		{
			$site = $result['site'];
		if($site=='basketball')
		{
		 $logo = base_url().'Splash_files/UnderdogKings.jpg';			 
		}
		else if($site=='football')
		{
		 $logo = base_url().'Splash_files/UnderdogKings.jpg';			 
		}
		else if($site=='baseball')
		{
		 $logo = base_url().'Splash_files/UnderdogKings.jpg';			 
		}
		else if($site=='einstien')
		{
		 $logo = base_url().'Splash_files/Einstein.jpg';			 
		}
		else if($site=='welligton')
		{
		 $logo = base_url().'Splash_files/Wellington.jpg';			 
		}
		else if($site=='wizards')
		{
		 $logo = base_url().'Splash_files/Wizards.jpg';			 
		}
		else if($site=='quantam')
		{
		 $logo = base_url().'Splash_files/Quantum.jpg';			 
		}else if($site=='Underdog Kings')
		{
		 $logo = base_url().'Splash_files/UnderdogKings.jpg';			 
		}else{
			$logo = base_url().'Splash_files/UnderdogKings.jpg';		
		}
		}
    ?>	
<div class="main-img" style="width: 800px; height: 1183px; margin-left: auto; margin-right: auto;
background-color:#12613c;
background-image: url(<?php echo $logo; ?>);
background-repeat:no-repeat; background-size: 100% 100%;">

<div style="padding-left: 20px;">

    
  <!--  <img src="<?php //if(isset($logo)){echo $logo; } ?>" width="326" height="194" alt="vfc" />-->
    <div style="height: 200px;"> </div>
</div>
    
<div  style="position: relative; top: 0px; margin-left: 140px;height:67px;" class="">
    <!--a href="<?php echo base_url('spreadlogin/index/'.$result['network_id'].'');?>" target="_blank"><img width="227" height="67"  src="<?php echo base_url() ?>Splash_files/MyAcct227.png"><a/-->
</div>

<!--<div ng-hide="hasProfile" style="position: relative; top: 0px; margin-left: 550px;" class="ng-hide">
    <img width="227" height="67" title="Click here to see how your account is doing." ng-click="goVfcil();" onmousedown="this.src=&#39;images/MyAcct227down.png&#39;;" onmouseup="this.src=&#39;images/MyAcct227.png&#39;;" src="<?php echo base_url() ?>Splash_files/MyAcct227.png">
</div>-->

<div class="manager1" style="float: right; margin-top: -280px; text-align: right; padding-right: 10px;">
    
    <!--p class="ng-binding"-->
	<!--span class="investor_name"--><p style="margin-bottom:10px;"><span style="margin-top: 10px; margin-bottom: 10px; float: left; width: 100%;"><?php if(isset($result)){ echo ucfirst($result['fname']); } ?> <?php if(isset($result)){  echo ucfirst($result['lname']); } ?></span>
     <span style="margin-bottom: 10px; float: left; width: 100%;"><?php if(isset($result)) { if($result['inmanager']=='Investment Manager') { echo 'Investment Manager';} else if($result['inmanager']=='Sports Advisor') { echo 'Sports Advisor';} else if($result['inmanager']=='Sports Investment Advisor') { echo 'Sports Investment Advisor';} else if($result['inmanager']=='Sports Investment Broker') { echo 'Sports Investment Broker';} else if($result['inmanager']=='Senior Investment Manager') { echo 'Senior Investment Manager';}if($result['inmanager']=='Managing  Director') { echo 'Managing  Director';} if($result['inmanager']=='CEO') { echo 'CEO';} if($result['inmanager']=='No Title') { echo 'No Title';}if($result['inmanager']=='Guest') { echo 'Guest';} if($result['inmanager']=='Guest W/Spreadsheet') { echo 'Guest W/Spreadsheet';} } ?></span> <span style="margin-bottom: 10px; float: left; width: 100%;">
    <?php  if(isset($result)){  echo ' Cell: '.$result['cellphone']; } ?></span><span style="margin-bottom: 10px; float: left; width: 100%;"><a href="mailto:<?php if(isset($result)) echo $result['email']; ?>" class="ng-binding"><?php if(isset($result)){ echo $result['email'];} ?></a></span></p>
     <?php 
		if(isset($nourl_defined)){
			echo $nourl_defined;
		  }
	 ?>
     
<!--/p--></div>  
    

    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tbody><tr>
         <td width="270px" height="340px">

           <div style="position:relative; width:270px; height:340px;  background-image:url(<?php echo base_url() ?>Splash_files/panel22.png); background-repeat:no-repeat; background-position: top 2px left 10px; " onclick="window.open('<?php echo base_url() ?>splashnew/popup','_blank','toolbar=yes,scrollbars=yes,resizable=yes,top=200,left=200,width=800,height=800');">
             &nbsp;
            </div>
         </td>

		
         
		 <td width="270px" height="340px" class="loginredirect"  onClick="send_login()" style="background-image:url(<?php echo base_url() ?>Splash_files/14.png); background-repeat:no-repeat; background-position: top 0px left 0px;" > 		
        <div style="margin-top:286px; text-align:center;" class="pword ng-binding">
           <?php if(isset($result)){ echo $result['network_id']; }  ?>
            </div>
         </td>
       
         <td width="270px" height="340px" ng-click="goAppInstall()" style="background-image:url(<?php echo base_url() ?>Splash_files/panel24_.png); background-repeat:no-repeat; background-position: top 0px right 10px;" onclick="window.open(' <?php echo base_url('spreadlogin/index/'.$result['network_id'].'');?>');">

            <!--div style="margin-top:229px; text-align:center;" class="pword ng-binding">
            <?php //if(isset($result)){ echo $result['network_id']; }  ?>
            </div-->
         </td>
      </tr>
    </tbody></table>


<img src="<?php echo base_url() ?>/Splash_files/OurPicksActive.png" width="240" height="603" alt="ourpicks" style="float: right; margin-right: 12px; margin-top:-40px;">

<img src="<?php echo base_url() ?>/Splash_files/results1.png" width="304" height="264" style="margin-top:0px; float:left;" alt="results">
<img src="<?php echo base_url() ?>/Splash_files/parlayLVH.png" width="226" height="339" alt="parlay" style="margin-left: -31px; transform: matrix(0.9, -0.2, 0.2, 1, 2, 25);">

<!--
<div class="rot350" style="position:relative; left:280px; top:-300px;">

</div> -->
</div>
</div>

<p>&nbsp;</p>
<p>&nbsp;</p>
				

</body>
</html>
