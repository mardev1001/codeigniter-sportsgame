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
		  text-align:center;
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
		}
		.custom_f {
			padding: 0 45px;
			text-align: left;
		}
		.custom_f input {
		  border-radius: 2px;
		  height: 43px;
		  margin: 0 0 18px;
		  width: 100%;
		}
		label.set_f {
		  font-size: 16px;
		  font-weight: 500;
		}
		.button_s {
		  padding: 0 45px;
		}
		.button_s .btn {
		  width: 100%;
		}
	</style>
	</head>
<body>

<div class="log_in">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-7 center-block float_none">
					<div class="logcon_bg">
						<h5>Set Up Tracking Account </h5>
						
						<p class="custom_f"> <br/>To request Password access for a new account,<br/>
								Please fill out the information below: </p>
								<p class="custom_f"><?php if(isset($_SESSION['invalid'])) { ?>
							
						<?php echo $_SESSION['invalid'];
							unset($_SESSION['invalid']);
						} ?></p>
						<?php echo form_open(base_url('spreadlogin/newregister') ,array('class'=>'form-signin')); ?>
						 <div class="row login_field custom_f">
							<div class="col-xs-6 col-md-6">
							 <label class="set_f">First Name</label>
								<input class="form-control" name="firstname"  type="text"
									required autofocus />
							</div>
							<div class="col-xs-6 col-md-6">
							<label class="set_f">Last Name</label>
								<input class="form-control" name="lastname"  type="text" required />
							</div>
							<div class="col-xs-12 col-md-12">
							<label class="set_f">Phone Number</label>
								<input class="form-control" name="phone"  type="text" required />
							</div>
							<div class="col-xs-12 col-md-12">
							<label class="set_f">Email Address</label>
								<input class="form-control" name="email"  type="email" required />
							</div>
							<div class="col-xs-12 col-md-12">
							<label class="set_f">Confirm Email Address</label>
								<input class="form-control" name="cemail"  type="email" required />
								
								<input  name="networklogin"  type="hidden" value="<?php echo $resu; ?>" />
							</div>
						</div>
<div class="button_s">
							<!--a href="<?php echo base_url() ?>spreadlogin/jtracking"--><button type="submit" class="btn btn-secondary btn-lg">Submit</button><!--/a-->
						</div>
						<?php echo form_close(); ?>
						
					</div> 
				</div>
			</div>
		</div>
	</div>
</div>

</body>
</html>	