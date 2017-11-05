<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<title>Access Spreadsheet</title>
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
			<div class="container">
		 <?php echo form_open(base_url('accessspread/verifyLogin') ,array('class'=>'form-inline'))  ?>
			  <div class="form-group">
				<input type="text"  name="login" required class="form-control" />
				<p><?php echo form_error();  ?></p>
			  </div>
			  <button type="submit" class="btn btn-info">Login</button>
		<?php echo form_close(); ?>
			<p>&nbsp;</p>
			<p>Please enter your Account Password, then hit the (Login) button.</p>
			<p>&nbsp;</p>
		<p>If you don't have an Account Password, ask your Investment Manager to setup an online Investor Profile for you.</p>
			<p>&nbsp;</p>
			<p><b>Browser Compatibility:</b>&nbsp;This app does not work in Microsoft Internet Explorer. Please use Google Chrome or Mozilla Firefox browser on Windows or use Google Chrome or Apple Safari on Mac OS X. You are encouraged to do a browser refresh to get the latest version of the software or if the formatting seems off.</p>
			
			</div>
         </body>
</html>
