<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<title>Underdogs KINGS</title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url('adminassets'); ?>/css/bootstrap.min.css" />
	<link rel="stylesheet" href="<?php echo base_url('adminassets'); ?>/css/customstyle.css" />
	<link rel="stylesheet" href="<?php echo base_url('adminassets')?>/css/font-awesome.min.css" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('adminassets'); ?>/js/vendor/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('adminassets/js/customscript.js'); ?>"></script>
</head>
<body>

	<div class="main">
	   <div class="container">
		
	   
			<div class="row">
				<div class="col-md-5 col-sm-6 col-md-push-3 col-sm-push-3 col-xs-12 margin_r">
					<div class="form-img text-center">
						<img src="<?php echo base_url('adminassets'); ?>/img/track300123.jpg" class="img-fluid" alt="#">
					</div>
					<div class="form-login">
						<?php echo form_open(base_url('logintrack/verifyTrack') ,array('class'=>'form-signin')); ?>
						<?php 
		               $message = $this->session->flashdata('idnot_exist');
			           if(isset($message) && !empty($message))
					   {echo '<p class="text-center">'.$message.'</p>';}?>
						<input type="text" name="networklogin"  class="form-control" required >
						<p><?php echo form_error('logintrack') ?></p>
						<!--button class="btn btn-lg btn-primary btn-block" type="submit" name="loginsubmit">
								Login <span class="pull-right"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
						 </button--> 
						 <button type="submit" class="button button-large button-block button-energized icon-right ion-chevron-right" ng-click="imIdSubmit()"> <span class="pull-right"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
							&nbsp;Login&nbsp;</button>
						<?php echo form_close(); ?>
						<div class="content-form splashText form-sign_1">
				   <p class="text-left ">Please enter your Password,<br> then hit the (Login) button.</p>
				    <!--p class="text-left">Application version 3.0.7 developed by<br>
				   <a href="#">Digital Showcase - Las Vegas</a></p--> 
				   <div class="dsIntro">
					<p>&nbsp;</p>
					<p>Application version 3.1.0 developed by<br>
						<a href="http://digitalshowcase.biz" target="_blank">Digital Showcase - Las Vegas</a>.
					</p>
				</div>
				</div>
				</div>
				
				</div>
			</div>
	   </div>
   </div>
	
			
</body>
</html>