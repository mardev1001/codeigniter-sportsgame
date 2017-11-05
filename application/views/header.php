<?php 
	if(!$this->session->has_userdata('logged_in'))
	{
		redirect(base_url('adminlogin'));	
	}
?>
<?php include 'adminassets/inc/config.php'; ?>

<?php include 'adminassets/inc/template_start.php'; ?>
<?php include 'adminassets/inc/page_head.php'; ?>

<!-- Page content -->
<style type="text/css">

	
    .content-header{
    margin: -20px -20px 20px;
    }
	 .content-header{
   /*  background-color: #fff;
    border-bottom: 1px solid #dbe1e8; */
}
	.nav-horizontal
	{
	padding: 10px 7px 1px;
    margin: 0;
    list-style: none;
	}
	.nav-horizontal li
	{
	display: inline-block;
    margin: 0 3px 9px
	}

    .nav-horizontal a {
    text-align: center;
    min-width: 130px;
    padding: 12px 15px;
    }
	/* .nav-horizontal a:hover, .nav-horizontal li.active a {
    background-color: #1bbae1;
    text-decoration: none;
    color: #fff;
    } */
	
	@media screen and (min-width: 992px){
   
	.nav-horizontal a {
    display: block;
    min-width: 132px;
    border-radius: 3px;
    font-weight: 700;
	text-align:center;
    padding: 8px 10px;
   /*  background-color: #f9fafc; */
   }
    .text-primary, .text-primary:hover, a, a.text-primary, a.text-primary:focus, a.text-primary:hover, a:focus, a:hover {
    /* color: #1bbae1; */
	text-decoration:none;
    }
	
   
 }  
   
  .nav-horizontal i {
    display: block;
    height: 55px;
    margin-right: 0;
    margin-bottom: 10px;
    font-size: 42px;
	text-align:center;
    padding: 10px;
  }  
  
  .nav-horizontal li{
    border-radius:4px;
  }  
  .nav-horizontal li.active a,nav-horizontal li a {
   color:#fff;
  } 
  
  .nav-horizontal .active, .nav-horizontal li:hover{
	background-color:#69B899;
  }
  
  .nav-horizontal .active i, .nav-horizontal .active a, .nav-horizontal li:hover i, .nav-horizontal li:hover a{
	color:#C6E0D5;
  }
  
  
  
 
} 
</style>
<div id="page-content">
<div class="content-header">

<?php 

   $data = $this->session->userdata('logged_in');
   $user_type = $data['user_type'];
   $new_game = $data['new_game'];
   $update_game = $data['update_game'];
	
?>

<ul class="nav-horizontal text-left">
<?php 
	$class = $this->uri->segment(1);
	$activeclass = 'active';
	$inactive = '';
	
?>
<?php 
	if($user_type=='superadmin' || $user_type=='admin')
	{
	?>	

<li class="<?php if($class=='dashboard'){
		echo $activeclass;}else{echo $inactive;}?>">
<a href="<?php echo base_url('dashboard/'); ?>"><i class="fa fa-home"></i> Dashboard</a>
</li>
<li class="<?php if($class=='users'){
		echo $activeclass;}else{echo $inactive;}?>">
<a href="<?php echo base_url('users/'); ?>"><i class="gi gi-parents"></i> Users</a>
</li>
<li class="<?php if($class=='investment'){
		echo $activeclass;}else{echo $inactive;}?>">
<a href="<?php echo base_url('investment/'); ?>"><i class="gi gi-briefcase"></i>Managers</a>
</li>
<li class="<?php if($class=='investor'){
		echo $activeclass;}else{echo $inactive;}?>">
<a href="<?php echo base_url('investor/'); ?>"><i class="hi hi-list-alt"></i>Investor Profile Setup</a>
</li>
<li class="<?php if($class=='financial'){
		echo $activeclass;}else{echo $inactive;}?>">
<a href="<?php echo base_url('financial/'); ?>"><i class="gi gi-charts"></i>Financials</a>
</li>
<li class="<?php if($class=='spreadsheet'){
		echo $activeclass;}else{echo $inactive;}?>">
<a href="<?php echo base_url('spreadsheet/investors'); ?>"><i class="hi hi-list-alt"></i>Spreadsheet</a>
</li>
<li class="<?php if($class=='betdays'){
		echo $activeclass;}else{echo $inactive;}?>">
<a href="<?php echo base_url('betdays/'); ?>"><i class="gi gi-calendar"></i>Bet Days</a>
</li>

<li class="<?php if($class=='gamers'){
		echo $activeclass;}else{echo $inactive;}?>">
<a href="<?php echo base_url('gamers/'); ?>"><i class="gi gi-folder_plus"></i>New Game</a>
</li>
<li class="<?php if($class=='updategame'){
		echo $activeclass;}else{echo $inactive;}?>">
<a href="<?php echo base_url('updategame/'); ?>"><i class="gi gi-folder_open"></i>Update Game</a>
</li>




<?php 
}
else if($user_type=='investment')
{
?>
<li class="<?php if($class=='investment'){
		echo $activeclass;}else{echo $inactive;}?>">
<a href="<?php echo base_url('investment/'); ?>"><i class="gi gi-briefcase"></i>Managers</a>
</li>
<li class="<?php if($class=='financial'){
		echo $activeclass;}else{echo $inactive;}?>">
<a href="<?php echo base_url('financial/'); ?>"><i class="gi gi-charts"></i>Financials</a>
</li>
<li class="<?php if($class=='betdays'){
		echo $activeclass;}else{echo $inactive;}?>">
<a href="<?php echo base_url('betdays/'); ?>"><i class="gi gi-calendar"></i>Bet Days</a>
</li>
<?php 	
}
else if($user_type=='gamers')
{
if($new_game=='1')
{
?>	
<li class="<?php if($class=='gamers'){
		echo $activeclass;}else{echo $inactive;}?>">
<a href="<?php echo base_url('gamers/'); ?>"><i class="gi gi-folder_plus"></i>New Game</a>
</li>
<?php
} 
if($update_game=='1')
{
?>
<li class="<?php if($class=='updategmae'){
		echo $activeclass;}else{echo $inactive;}?>">
<a href="<?php echo base_url('updategame/'); ?>"><i class="gi gi-folder_open"></i>Update Game</a>
</li>
<?php
}
}
?>

</ul>
</div>
    <!-- END Dashboard Header -->
