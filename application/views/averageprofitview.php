<!DOCTYPE HTML>
<html lang="en-US">
<head> 
	<meta charset="UTF-8">
	<title>Underdog KINGS</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?php echo base_url('adminassets'); ?>/css/g_style.css" />
	<style type="text/css">
	#contentWrapper {
		margin-top:8px;
	}
	</style>
</head>
<body>
	<div id="main">
        <div id="top">
            Average Profit Per Bet
        </div>
		<input type="hidden" name="which_day" id="which_day" value="x">
		<input type="hidden" name="actual_id" id="actual_id" value="<?php if(isset($bet_details['id'])){ echo $bet_details['id']; } ?>">
		<input type="hidden" name="gameids" class="gameidss" value="<?php if(isset($bresult['id'])){ echo $bresult['id']; } ?>" />
		<div id="contentWrapper">
			<div id="content">
			    <div id="primary">
				<div class="table-data">
					<table class="gross">
						<thead>
						  <tr>
							<td style="text-align: right; width: 3%;">Year</td>
							<td style="width: 5%;">Bet Day</td>
							<td style="width: 12%;">Date</td>
							<td style="width: 12%;">Daily Gross<br>Profit%</td>
							<td style="width: 5%;">League</td>
						  </tr>
						</thead>
						<tbody>
						  <?php 
							if(isset($result) && count($result)>0)
							{
								foreach($result as $row)
								{
									$bet_day = $row['fbet_date'];
									$year = date('y', strtotime($bet_day));
									$month = date('m', strtotime($bet_day));
									$bet_year = ($month >= 9) ? $year+1 : $year;
								?>
							  <tr>
								<td><?php echo $bet_year ?></td>
								 <td><?php echo $row['fbet_day']; ?></td>
								 <td><?php echo date('m-d',strtotime($row['fbet_date'])); ?></td>
								<td><?php echo $row['avg_profit_bet']>0?'+'.$row['avg_profit_bet'].'%':$row['avg_profit_bet'].'%'; ?></td>
								<td><?php echo $row['fleague']; ?></td>
							  </tr>
							   <?php
								}
							}
						  ?>
					   </tbody>
					</table>
				 </div>
				 <div class="summary">
					 <h3 style="margin-top:20px;">Summary</h3>
					 <h3 style="text-align:center;">Average-Profit-Per-Bet<br/>(as % of Bet Amount)</h3>
				 </div>
				 <div class="offer">					
					<div class="left">
					   <div class="profit">
							<p>Average Profit</p>
							<p>Bet Day <?php if(isset($singleresult)) { echo $singleresult['fbet_day']; } ?></p>
							<p>Blue/Green Strategy</p>
							<?php
							$print = '';
							if(isset($singleresult)) {
								if ($singleresult['avg_profit_bet']>=0)
									$print = '+'.$singleresult['avg_profit_bet'].'%';
								else
									$print = $singleresult['avg_profit_bet'].'%';
							}
							?>
							<p style="font-size:26.6px;"><?php echo $print; ?></p>
					   </div>
					</div>
					<div class="right">
						<div class="profit">
							<p>(From <br/><?php echo date('m/d/Y',strtotime($row['fbet_date'])); ?> To<br/>Date)</p>
							<p>Blue/Green Strategy</p>
							<?php
							$print = '';
							if(isset($singleresult)) {
								if ($singleresult['avg_profit_bet']>=0)
									$print = '+'.$singleresult['avg_profit_bet'].'%';
								else
									$print = $singleresult['avg_profit_bet'].'%';
							}
							?>
							<p style="font-size:26.6px;"><?php echo $print; ?></p>
						</div>
					</div>
				 </div>
				 <div style="margin:0 auto;padding-bottom:46px;text-align:center;">
					<button type="button" class="moregrossprofit">Explanation of Betting Strategies</button>	
				 </div>
				 <img src="http://www.vegasfootballclub.com.php56-17.dfw3-1.websitetestlink.com/Splash_files/track300.jpg">
				 </div>
				 <div id="grossprofit" style="display:none;">			 
					<h3>Explanation of Betting Strategies</h3>
					<p>We divide our NCAA Football picks into 4 color categories depending on the betting odds:</p>

					<p><span class="BlueGames">BLUE picks</span> are Moneyline Favorites with betting odds between -1000 and -10000.  Our win/loss record for these games is near perfect.</p>

					<p><span class="GreenGames">GREEN picks</span> are Moneyline Favorites with betting odds between -360 and -990.  Our win/loss record for these games is also exceptionally good.</p>

					<p><span class="OrangeGames">ORANGE picks</span> are Moneyline Favorites with betting odds between -120 and -350. </p>

					<p><span class="RedGames">RED picks</span> are Moneyline Underdogs and -110 Spread Bets.  </p>

					<p>Depending on the sport, we use 2 different betting strategies with different levels of risk and rewards:</p>

					<p><span class="BlueGames">BLUE/GREEN STRATEGY</span> uses only BLUE and GREEN picks in a variety of parlay combinations. </p>

					<p><span class="OrangeGames">ORANGE/RED STRATEGY</span> creates parlay combinations using 1 or 2 ORANGE/RED picks along with 2 GREEN picks and 2-4 BLUE picks.</p>

					<p>For 2016-2017 NCAA football and NCAA Basketball, we are only using the Blue/Green Strategy.</p>

					<button class="closegrossprofit">&nbsp;Done&nbsp;</button>
				  </div>
				 <div style="height:600px;display:inline-block">&nbsp;</div>
			</div>
		</div>
		<div id="footer">
            <div id="controls">
				 <ul class="buttons">
					<li><a href="javascript:void(0)" id="upbtn"><img src="<?php echo base_url('adminassets') ?>/img/Button_Up.png" alt="#"/></a></li>			
					<li><a href="javascript:void(0)" id="downbtn"><img src="<?php echo base_url('adminassets') ?>/img/Button_Down.png" alt="#"/></a></li>		
				 </ul>
            </div>
            <div id="footer-bottom">
				<ul>
					<li><a href="<?php echo base_url('gamedetails'); ?>"><img src="<?php echo base_url('adminassets') ?>/img/feetball.png" alt="#"/><span>Our Picks</span></a></li>
					<li><a href="<?php echo base_url('grossprofit'); ?>"><img src="<?php echo base_url('adminassets') ?>/img/DoubleDollars.png" alt="#"/><span>Gross Profit</span></a></li>
					<li class="active"><a href="<?php echo base_url('averageprofit'); ?>"><img src="<?php echo base_url('adminassets') ?>/img/signal.png" alt="#"/><span>Avg-Profit-Per-Bet</span></a></li>
					<li><a href="<?php echo base_url('Contact/index/id/'.$sess_data['network_id']); ?>"><img src="<?php echo base_url('adminassets') ?>/img/user.png" alt="#"/><br><span>Contact Us</span></a></li>
				</ul>
			</div>
        </div>		 
    </div>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('adminassets/js/vendor/iscroll.js'); ?>"></script>
	<script>
		window.mobilecheck = function() {
		  var check = false;
		  (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
		  return check;
		};
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
			$('a#upbtn').click(function() {
				if(scroll.y<0)
					scroll.scrollBy(0, 300, 1500);
			});
			$('a#downbtn').click(function() {
				scroll.scrollBy(0, -300, 1500);
			});
			
			$('button.moregrossprofit').click(function() {
				$('#primary').hide();
				$('#grossprofit').show();
			});
			$('button.closegrossprofit').click(function() {
				$('#primary').show();
				$('#grossprofit').hide();
			});
			
			if(mobilecheck()) {
				$('#controls').css('backgroundColor', '#ddd');
			}
		});
	</script>	
</body>
</html>