<!DOCTYPE HTML>
<html lang="en-US">
   <head>
      <title>Underdogs KINGS</title>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!--link rel="stylesheet" href="<?php echo base_url('adminassets'); ?>/css/bootstrap.min.css" /-->
      <!--link rel="stylesheet" href="<?php echo base_url('adminassets'); ?>/css/customstyle.css" /--> 
      <link rel="stylesheet" href="<?php echo base_url('adminassets')?>/css/font-awesome.min.css" />
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
      <!--link rel="stylesheet" href="<?php echo base_url('adminassets'); ?>/css/vfcstyle.css" /"-->
      <script type="text/javascript" src="<?php echo base_url('adminassets'); ?>/js/vendor/bootstrap.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url('adminassets/js/customscript.js'); ?>"></script>
      <link href="http://underdogkings.com/favicon.ico" rel="shortcut icon">
      <link rel="stylesheet" href="<?php echo base_url('adminassets'); ?>/css/vfcstyle.css">
   </head>
   <body class="grade-a platform-browser platform-win32 platform-ready">
      <div ng-view="" class="">
         <div class="intro" style="width: 450px; margin-left: auto; margin-right: auto; padding: 0px 30px;">
            <img src="<?php echo base_url('adminassets'); ?>/img/track300.jpg" width="450" height="250" alt="vfc" border="0">
            <p class="intro" style="text-align:center;"></p>
            <div class="LightGreenPanel" style="padding-top:0px; padding-bottom:2px;">
			<?php echo form_open(base_url('underdoglogin/verifyTrack') ,array('class'=>'ng-pristine ng-valid')); ?>
						<?php 
		               $message = $this->session->flashdata('idnot_exist');
			           if(isset($message) && !empty($message))
					   {echo '<p class="text-center">'.$message.'</p>';}?>
                  <p class="intro" style="color:#666;"><span style="padding-left:9px;">Enter&nbsp;Member ID:</span></br>
                     <input id="password"  name = "networklogin" type="text" class="intext ng-pristine ng-valid" ng-model="password_entry" size="14" border="1" style="border-radius:6px; font-size:20px; font-family:Arial, Helvetica, sans-serif; height:32px; width:250px; padding-left:10px;" required>
                     &nbsp;
                     <button type="submit" class="btn" ng-click="pwordSubmit()" style="border-radius:6px; padding: 0px 15px;"><strong>Submit</strong></button>
                  </p>
						<?php echo form_close(); ?>
            </div>
         </div>
      </div>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
   </body>
</html>

