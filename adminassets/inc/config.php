<?php
/**
 * config.php
 *
 * Author: pixelcave
 *
 * Configuration file. It contains variables used in the template as well as the primary navigation array from which the navigation is created
 *
 */

   $data = $this->session->userdata('logged_in');
   $user_type = $data['user_type'];
  /*  $fname = $data['fname'];
   $lname = $data['lname']; */
   $new_game = $data['new_game'];
   $update_game = $data['update_game'];
 
/* Template variables */
$template = array(
    'name'          => 'Underdog kINGS',
    'version'       => '1.1',
    'author'        => 'pixelcave',
    'robots'        => 'noindex, nofollow',
    'title'         => 'Underdog kINGS',
    'description'   => 'ProUI is a Responsive Admin Dashboard Template created by pixelcave and published on Themeforest.',
    // 'navbar-default'         for a light header
    // 'navbar-inverse'         for a dark header
    'header_navbar' => 'navbar-default',
    // ''                       empty for a static header
    // 'navbar-fixed-top'       for a top fixed header / fixed sidebars
    // 'navbar-fixed-bottom'    for a bottom fixed header / fixed sidebars
    'header'        => '',
    // ''                                               for a full main and alternative sidebar hidden by default (> 991px)
    // 'sidebar-visible-lg'                             for a full main sidebar visible by default (> 991px)
    // 'sidebar-partial'                                for a partial main sidebar which opens on mouse hover, hidden by default (> 991px)
    // 'sidebar-partial sidebar-visible-lg'             for a partial main sidebar which opens on mouse hover, visible by default (> 991px)
    // 'sidebar-alt-visible-lg'                         for a full alternative sidebar visible by default (> 991px)
    // 'sidebar-alt-partial'                            for a partial alternative sidebar which opens on mouse hover, hidden by default (> 991px)
    // 'sidebar-alt-partial sidebar-alt-visible-lg'     for a partial alternative sidebar which opens on mouse hover, visible by default (> 991px)
    // 'sidebar-partial sidebar-alt-partial'            for both sidebars partial which open on mouse hover, hidden by default (> 991px)
    // 'sidebar-no-animations'                          add this as extra for disabling sidebar animations on large screens (> 991px) - Better performance with heavy pages!
    'sidebar'       => 'sidebar-partial sidebar-visible-lg sidebar-no-animations',
    // ''                       empty for a static footer
    // 'footer-fixed'           for a fixed footer
    'footer'       => '',
    // ''                       empty for default style
    // 'style-alt'              for an alternative main style (affects main page background as well as blocks style)
    'main_style'    => '',
    // 'night', 'amethyst', 'modern', 'autumn', 'flatie', 'spring', 'fancy', 'fire' or '' leave empty for the Default Blue theme
    'theme'         => 'spring',
    // ''                       for default content in header
    // 'horizontal-menu'        for a horizontal menu in header
    // This option is just used for feature demostration and you can remove it if you like. You can keep or alter header's content in page_head.php
    'header_content'=> '',
    'active_page'   => basename($_SERVER['PHP_SELF'])
);

/* Primary navigation array (the primary navigation will be created automatically based on this array, up to 3 levels deep) */
   
   $data = $this->session->userdata('logged_in');
   $user_type = $data['user_type'];
   $new_game = $data['new_game'];
   $update_game = $data['update_game'];
   
   $baseurl = base_url(); 
   if($user_type=='superadmin' || $user_type=='admin')
   { 
   $primary_nav = array(
    array(
        'name'  => 'Dashboard',
        'url'   => $baseurl.'dashboard',
        'icon'  => 'fa fa-home'
       ),
	   array(
        'name'  => 'Managers',
        'url'   => $baseurl.'investment',
        'icon'  => 'gi gi-briefcase'
       ),
	   array(
        'name'  => 'Financials',
        'url'   => $baseurl.'financial',
        'icon'  => 'gi gi-charts'
       ),
	   array(
        'name'  => 'Bet Days',
        'url'   => $baseurl.'betdays',
        'icon'  => 'gi gi-calendar'
       ),
	   array(
        'name'  => 'Spreadsheet',
        'url'   => $baseurl.'spreadsheet',
        'icon'  => 'hi hi-list-alt'
       ),
	   array(
        'name'  => 'New Game',
        'url'   => $baseurl.'gamers',
        'icon'  => 'gi gi-folder_plus'
       ),
	   array(
        'name'  => 'Update Game',
        'url'   => $baseurl.'updategame',
        'icon'  => 'gi gi-folder_open'
       ),
	   array(
        'name'  => 'Users',
        'url'   => $baseurl.'users',
        'icon'  => 'gi gi-parents'
       ),
	   array(
        'name'  => 'Investor Profile Setup',
        'url'   => $baseurl.'investor',
        'icon'  => 'hi hi-list-alt'
       ),
	   array(
        'name'  => 'Logout',
        'url'   => $baseurl.'dashboard/logout',
        'icon'  => 'gi gi-exit'
       )
);
  }
  else if($user_type=='investment')
   {
     $primary_nav = array(
       array(
        'name'  => 'Managers',
        'url'   => $baseurl.'investment',
        'icon'  => 'gi gi-briefcase'
       ),
	   array(
        'name'  => 'Financials',
        'url'   => $baseurl.'financial',
        'icon'  => 'gi gi-charts'
       ),
	   array(
        'name'  => 'Bet Days',
        'url'   => $baseurl.'betdays',
        'icon'  => 'gi gi-calendar'
       ),
	   array(
        'name'  => 'Logout',
        'url'   => $baseurl.'dashboard/logout',
        'icon'  => 'gi gi-exit'
       )
  );
  } 
   
      else if($user_type=='gamers')
       {
	   $primary_nav = array();
	    if($new_game == "1" && $update_game == "1")
	    {
		$primary_nav = array(
	  
		 array(
        'name'  => 'New Game',
        'url'   => $baseurl.'gamers',
        'icon'  => 'gi gi-folder_plus'
	   ),
 
	   array(
        'name'  => 'Update Game',
        'url'   => $baseurl.'updategame',
        'icon'  => 'gi gi-folder_open'
       ),
	   
	   array(
        'name'  => 'Logout',
        'url'   => $baseurl.'dashboard/logout',
        'icon'  => 'gi gi-exit'
       ) ); 
	   }
	  else if($new_game == "1")
	  {
		$primary_nav = array(
	    array(
        'name'  => 'New Game',
        'url'   => $baseurl.'gamers',
        'icon'  => 'gi gi-folder_plus'
	   ),
 
	   array(
        'name'  => 'Logout',
        'url'   => $baseurl.'dashboard/logout',
        'icon'  => 'gi gi-exit'
       )  
		);
	  }
	 else if($update_game == "1")
	 {
		 $primary_nav = array(
			 array(
			'name'  => 'Update Game',
			'url'   => $baseurl.'updategame',
			'icon'  => 'gi gi-folder_open'
		   ),
		   array(
			'name'  => 'Logout',
			'url'   => $baseurl.'dashboard/logout',
			'icon'  => 'gi gi-exit'
		   )  
		  );
		 
	 }	 
  }
?>