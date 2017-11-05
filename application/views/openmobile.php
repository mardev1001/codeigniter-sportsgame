<!DOCTYPE html>
<html lang="en">
   <head>
      <title>underdog KINGS</title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	   <link href="<?php echo base_url('adminassets'); ?>/css/font-awesome.min.css" rel="stylesheet">
      <!-- Bootstrap -->
      <link href="<?php echo base_url('adminassets'); ?>/css/bootstrap.css" rel="stylesheet">
      <link href="<?php echo base_url('adminassets'); ?>/css/style.css" rel="stylesheet">
      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <body>
   <div class="main">
	   <div class="container">
			<div class="row">
				<div class="col-md-6 sol-sm-6 col-md-offset-3">
					<div class="login-img web-app">
						<img src="<?php echo base_url('adminassets'); ?>/img/track300.jpg" class="img-fluid" alt="#">
					</div>
					<div class="content-app">
						<h4>Mobile App and Web App Page</h4>
					</div>
					<div class="inner-content">
					<p class="data-content"> We have developed a sophisticated Application for you to follow our Active Game Picks, Wins/Losses and Financials. We offer that App in Android, iOS and as a Web App.</p>

					<p class="data-content">Note that the current version of the Web and Android App is 3.0.7. The version number is shown at Login and in the heading of the Our Picks section. </p>
					<div class="app-img text-center">
						<img src="<?php echo base_url('adminassets'); ?>/img/vfc_ionic_384x682.png" class="img-fluid" alt="#">
					</div>
					<h3>Android</h3>
					<p class="data-content"> The Android App can be installed on any modern Android phone or tablet. To improve performance, this mobile App shows the last 60 calendar days history.
					<br>Password:<b> <?php echo $networkid; ?></b></p>
					 <button type="button" class="btn btn-default">Click Here To Download</button>
					 <hr>
					 <h3>iOS</h3>
					<p class="data-content"> We now have an iOS App that runs our club app, which can be installed on any modern iPhone or iPad.
					<br>App Password:<b> <?php echo $networkid; ?></b></p>
					<h5>Click Here for iOS Instructions.</h5>
					 <hr>
					<h3>Web App</h3>
					<p class="data-content"> Universally available on any browser on any computer, phone or tablet, the Web App offers the same features as the mobile apps, adding display of the full history of Picks since the start of the season. It runs on any modern browser. 
					</p>
					 <button type="button" class="btn btn-default app-button">Click Here for the Web App</button>
					 <p class="data-content1">Password:<b> <?php echo $networkid; ?></b></p>
					</div>
					
				</div>
			</div>
	   </div>
   </div>
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="<?php echo base_url('adminassets'); ?>/js/bootstrap.min.js"></script>
   </body>
</html>

