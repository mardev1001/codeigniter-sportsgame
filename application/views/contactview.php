<!DOCTYPE HTML>
<html lang="en-US">
<head> 
	<meta charset="UTF-8">
	<title>Underdog KINGS</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?php echo base_url('adminassets'); ?>/css/g_style.css" />
	<style type="text/css">
	.contact {
		margin-top: 10px;
		margin-left: 10px;
	}
	.contact h1,h2,h3,h4 {
		font-family: 'Helvetica Neue', 'Roboto', 'Segoe UI', sans-serif;
		font-weight: 500;
		line-height: 22.4px;
	}
	</style>
</head>
<body>
	<div id="main">
        <div id="top">
            Contact Us
        </div>
		<input type="hidden" name="which_day" id="which_day" value="x">
		<input type="hidden" name="actual_id" id="actual_id" value="<?php if(isset($bet_details['id'])){ echo $bet_details['id']; } ?>">
		<input type="hidden" name="gameids" class="gameidss" value="<?php if(isset($bresult['id'])){ echo $bresult['id']; } ?>" />
		<div id="contentWrapper">
			<div id="content">
				<div class="contact">
					<h2 style="margin-top:0px;margin-bottom:10px;font-size:18pt;"><?php if(isset($result['fname'])){ echo ($result['fname']); }  if(isset($result['lname'])){ echo ' '.($result['lname']);} ?></h2>
					<h4 style="font-size:14pt;margin:0px;"><?php if(isset($result['inmanager'])){ echo ($result['inmanager']); } ?></h4>
					<br/><br/>
					<img src="<?php echo base_url('adminassets'); ?>/img/placeholder0.jpg" class="img-fluid" alt="No Image">
					<h3>Code: <b><?php if(isset($result['network_id'])){ echo $result['network_id']; } ?> </b></h3>
					<h3>Phone: <b><?php if(isset($result['cellphone'])){ echo $result['cellphone']; } ?></b></h3>
					<h3>Email: <br/><b><?php if(isset($result['email'])){ echo $result['email']; } ?></b> </h3>
					<h3>Home City: <br/><b><?php if(isset($result['homecity'])){ echo $result['homecity']; } ?></b></h3>
					<h3>Best Time to call: <b><?php if(isset($result['besttime'])){ echo $result['besttime']; } ?></b></h3>
					<img src="http://www.vegasfootballclub.com.php56-17.dfw3-1.websitetestlink.com/Splash_files/track300.jpg">
				</div>
				<div style="height:600px;display:inline-block">&nbsp;</div>
			</div>
		</div>
		<div id="footer">
            <div id="footer-bottom">
				<ul>
					<li><a href="<?php echo base_url('gamedetails'); ?>"><img src="<?php echo base_url('adminassets') ?>/img/feetball.png" alt="#"/><span>Our Picks</span></a></li>
					<li><a href="<?php echo base_url('grossprofit'); ?>"><img src="<?php echo base_url('adminassets') ?>/img/DoubleDollars.png" alt="#"/><span>Gross Profit</span></a></li>
					<li><a href="<?php echo base_url('averageprofit'); ?>"><img src="<?php echo base_url('adminassets') ?>/img/signal.png" alt="#"/><span>Avg-Profit-Per-Bet</span></a></li>
					<li class="active"><a href="<?php echo base_url('Contact/index/id/'.$sess_data['network_id']); ?>"><img src="<?php echo base_url('adminassets') ?>/img/user.png" alt="#"/><br><span>Contact Us</span></a></li>
				</ul>
			</div>
        </div>
	</div>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('adminassets/js/vendor/iscroll.js'); ?>"></script>
	<script>
		//target the entire page, and listen for touch events
		$('html, body').on('touchmove', function(e){ 
			 //prevent native touch activity like scrolling
			 e.preventDefault(); 
		});
		$(document).ready(function () {
			scroll = new IScroll('#contentWrapper', {
				preventDefault: false,
				scrollbars: true,
				mouseWheel: true,
				interactiveScrollbars: true,
				shrinkScrollbars: 'scale',
				fadeScrollbars: true
			});
		});
	</script>
</body>
</html>