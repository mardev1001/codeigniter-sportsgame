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
      <link rel="stylesheet" href="<?php echo base_url('adminassets'); ?>/css/bootstrap.min.css" />
      <!-- library js -->
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url('adminassets/js/customscript.js'); ?>"></script>
	<style> 
		.float_none{
			float:none;
		}
		
		.log_in{
			background:url("../uploads/Back_004.jpg") repeat scroll left top;
			padding:20px;
		}
		.logcon_bg h5{margin-top:0px;}
		.logcon_bg{
		/* 	background: rgba(0, 0, 0, 0) linear-gradient(to bottom, #e3ffe2 0%, #ffffff 100%) repeat scroll 0 0; */
			height: 700px;
			font-family: Tahoma,Helvetica,sans-serif;
			background:#f4f4f4;
border:1px solid #ccc;			
		}
		
		.login_field input {
		  border: 1px solid #006766;
		  color: #ccc;
		  font-family: monospace;
		  font-size: 24px;
		  height: 46px;
		  margin-left: 0;
		  padding: 0 0 0 12px;
		  width: 300px;
		}
		
		.login_field button {
		  font-size: 22px;
		  grid-template-rows: 35px;
		  line-height: 25px;
		  margin-left: 0;
		  padding: 7px 20px 10px;
		  background: linear-gradient(#f9f9f9, #e5e5e5); 
		  border:1px solid #aeaeae;
		}
		
		.logcon_bg p{
			color: #000;
			font-size: 19px;
			margin-left:8px;
			line-height: 27px;
		}
		
		.login_field {
			margin-top: 20px;
		}
		
		.logcon_bg h5 {
		  background-color: #006766;
		  color: #fff;
		  font-size: 22px;
		  font-weight: bold;
		  padding: 3px 13px;
		  width: auto;
		}
		
		.logcon_bg h3 {
		  color: #222;
		  font-weight: bold;
		  margin: 79px 0 11px;
		}
		.logcon_bg .login_c {
		  line-height: 27px;
		  padding: 0 12px;
		}
		.logcon_bg .btn {
		  background: #ccc none repeat scroll 0 0;
		  height: 56px;
		  margin: 26px 0 0;
		  width: 70%;
		  background: linear-gradient(#64a1a1, #044040); 
		  color:#fff;
		  border:none;
		  font-size:20px;
		  white-space:initial;
		}
		.btn-lg{padding:6px 15px;}
	</style>
	</head>
<body>

<div class="log_in">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<div class="col-md-7 center-block float_none">
					<div class="logcon_bg">
						<h5>Access to your Accounting Spreadsheet</h5>
						<p> <br/>Please enter your Account Password, then hit the (Login) button. </p>
						<?php echo form_open(base_url('spreadlogin/verifyTrack') ,array('class'=>'form-signin')); ?>
						<div class="login_field">
							<input type="text" name="spreaduser"placeholder="Enter Password"/>		  
							<button class="button" type="submit"> Login </button>
						</div>
						<?php echo form_close(); ?>
						
						<!--p>If you don't have an Account Password, ask your Investment Manager to setup an online Investor Profile for you.
						<br/><br/><br>
						<b> Browser Compatibility:</b> This app does not work in Microsoft Internet Explorer. Please use Google Chrome or Mozilla Firefox browser on Windows or use Google Chrome or Apple Safari on Mac OS X. You are encouraged to do a browser refresh to get the latest version of the software or if the formatting seems off.	
						</p-->
						<h3>Don't have a password?</h3>
						<p class="login_c">If you would like to be a part of the action and track your own
							(simulated) results with a $100,000 Spreadsheet, simply ask
							your Investment Manager by clicking the button below:
						</p>
						<div class="button">
						<?php if(isset($resu)){ ?>
							<a href="<?php echo base_url() ?>spreadlogin/jlogin/<?php echo $resu; ?>"><button type="button" class="btn btn-secondary btn-lg">Yes, I Want to track my own results!</button></a>
						<?php }else{ ?>
							<a href="<?php echo base_url() ?>spreadlogin/jlogin"><button type="button" class="btn btn-secondary btn-lg">Yes, I Want to track my own results!</button></a>
						<?php } ?>
						</div>
					</div> 
				</div>
			</div>
		</div>
	</div>
</div>

</body>
</html>	