<?php include 'inc/config.php'; ?>
<?php include 'inc/template_start.php'; ?>
<?php include 'inc/page_head.php'; ?>

<!-- Page content -->
<div id="page-content">
    <!-- Statistics Widgets Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="gi gi-charts"></i>Statistics Widgets<br><small>Create awesome and fresh dashboards!</small>
            </h1>
        </div>
    </div>
    <!-- END Statistics Widgets Header -->

    <!-- Simple Stats Widgets Row -->
    <div class="row">
        <div class="col-sm-6 col-lg-3">
            <!-- Widget -->
            <div class="widget">
                <div class="widget-simple">
                    <a href="javascript:void(0)" class="widget-icon pull-left themed-background">
                        <i class="gi gi-package"></i>
                    </a>
                    <h3 class="text-right animation-stretchRight">+ <strong>50%</strong></h3>
                </div>
            </div>
            <!-- END Widget -->
        </div>
        <div class="col-sm-6 col-lg-3">
            <!--  Widget -->
            <div class="widget">
                <div class="widget-simple">
                    <a href="javascript:void(0)" class="widget-icon pull-right themed-background-amethyst">
                        <i class="gi gi-wallet"></i>
                    </a>
                    <h3 class="animation-stretchLeft">$ <strong>3.595</strong></h3>
                </div>
            </div>
            <!-- END Widget -->
        </div>
        <div class="col-sm-6 col-lg-3">
            <!-- Widget -->
            <div class="widget">
                <div class="widget-simple">
                    <a href="javascript:void(0)" class="widget-icon pull-left themed-background-night">
                        <i class="gi gi-bug animation-tossing"></i>
                    </a>
                    <h3 class="text-right animation-stretchRight">3 <strong>Bugs</strong></h3>
                </div>
            </div>
            <!-- END Widget -->
        </div>
        <div class="col-sm-6 col-lg-3">
            <!-- Widget -->
            <div class="widget">
                <div class="widget-simple">
                    <a href="javascript:void(0)" class="widget-icon pull-right themed-background-fire">
                        <i class="gi gi-fire animation-floating"></i>
                    </a>
                    <h3 class="animation-stretchLeft">1 <strong>Crash</strong></h3>
                </div>
            </div>
            <!-- END Widget -->
        </div>
    </div>
    <!-- END Simple Stats Widgets Row -->

    <!-- Advanced Stats Widgets with Flot Charts Row -->
    <div class="row">
        <div class="col-md-6">
            <!-- Large Widget (Active Color Theme Light) -->
            <div class="widget">
                <div class="widget-advanced widget-advanced-alt">
                    <!-- Widget Header -->
                    <div class="widget-header text-center themed-background">
                        <h3 class="widget-content-light text-left pull-left animation-pullDown">
                            <strong>Sales &amp; Earnings</strong><br>
                            <small>2013</small>
                        </h3>
                        <!-- Flot Charts (initialized in js/pages/widgetsStats.js), for more examples you can check out http://www.flotcharts.org/ -->
                        <div id="chart-widget1" class="chart"></div>
                    </div>
                    <!-- END Widget Header -->

                    <!-- Widget Main -->
                    <div class="widget-main">
                        <div class="row text-center">
                            <div class="col-xs-4">
                                <h3 class="animation-hatch"><strong>7.500</strong><br><small>Clients</small></h3>
                            </div>
                            <div class="col-xs-4">
                                <h3 class="animation-hatch"><strong>10.970</strong><br><small>Sales</small></h3>
                            </div>
                            <div class="col-xs-4">
                                <h3 class="animation-hatch"><strong>$ 31.230</strong><br><small>Earnings</small></h3>
                            </div>
                        </div>
                    </div>
                    <!-- END Widget Main -->
                </div>
            </div>
            <!-- END Large Widget (Active Color Theme Light) -->
        </div>
        <div class="col-md-6">
            <!-- Large Widget (Active Color Theme Dark) -->
            <div class="widget">
                <div class="widget-advanced widget-advanced-alt">
                    <!-- Widget Header -->
                    <div class="widget-header text-center themed-background-dark">
                        <h3 class="widget-content-light text-left pull-left animation-pullDown">
                            <strong>Sales &amp; Earnings</strong><br>
                            <small>2013</small>
                        </h3>
                        <!-- Flot Charts (initialized in js/pages/widgetsStats.js), for more examples you can check out http://www.flotcharts.org/ -->
                        <div id="chart-widget2" class="chart"></div>
                    </div>
                    <!-- END Widget Header -->

                    <!-- Widget Main -->
                    <div class="widget-main">
                        <div class="row text-center">
                            <div class="col-xs-4">
                                <h3 class="animation-hatch"><i class="gi gi-group"></i> <br><small><strong>7.500</strong></small></h3>
                            </div>
                            <div class="col-xs-4">
                                <h3 class="animation-hatch"><i class="gi gi-briefcase"></i><br><small><strong>10.970</strong></small></h3>
                            </div>
                            <div class="col-xs-4">
                                <h3 class="animation-hatch"><i class="gi gi-money"></i><br><small><strong>$ 31.230</strong></small></h3>
                            </div>
                        </div>
                    </div>
                    <!-- END Widget Main -->
                </div>
            </div>
            <!-- END Large Widget (Active Color Theme Dark) -->
        </div>
    </div>
    <!-- END Advanced Stats Widgets with Flot Charts Row -->

    <!-- Simple Stats Widgets with Mini Bar Charts Row -->
    <div class="row">
        <div class="col-sm-6 col-lg-3">
            <!-- Widget -->
            <div class="widget">
                <div class="widget-extra themed-background-dark-night text-center">
                    <h3 class="widget-content-light">Weekly <strong>Sales</strong></h3>
                </div>
                <div class="widget-extra-full text-center">
                    <!-- Jquery Sparkline (initialized in js/pages/widgetsStats.js), for more examples you can check out http://omnipotent.net/jquery.sparkline/#s-about -->
                    <span id="mini-chart-bar1">6,10,5,6,7,10,3</span>
                </div>
            </div>
            <!-- END Widget -->
        </div>
        <div class="col-sm-6 col-lg-3">
            <!-- Widget -->
            <div class="widget">
                <div class="widget-extra themed-background-dark-default text-center">
                    <h3 class="widget-content-light">Latest <strong>Projects</strong></h3>
                </div>
                <div class="widget-extra-full text-center">
                    <!-- Jquery Sparkline (initialized in js/pages/widgetsStats.js), for more examples you can check out http://omnipotent.net/jquery.sparkline/#s-about -->
                    <span id="mini-chart-bar2">20,15,35,36,85,14,25,68,74,14,25,65</span>
                </div>
            </div>
            <!-- END Widget -->
        </div>
        <div class="col-sm-6 col-lg-3">
            <!-- Widget -->
            <div class="widget">
                <div class="widget-extra themed-background-dark-fire text-center">
                    <h3 class="widget-content-light">Photo <strong>Uploads</strong></h3>
                </div>
                <div class="widget-extra-full text-center">
                    <!-- Jquery Sparkline (initialized in js/pages/widgetsStats.js), for more examples you can check out http://omnipotent.net/jquery.sparkline/#s-about -->
                    <span id="mini-chart-bar3">68,15,31,79,15,35,45,71,85,32,49,60</span>
                </div>
            </div>
            <!-- END Widget -->
        </div>
        <div class="col-sm-6 col-lg-3">
            <!-- Widget -->
            <div class="widget">
                <div class="widget-extra themed-background-dark-amethyst text-center">
                    <h3 class="widget-content-light">Latest <strong>Tickets</strong></h3>
                </div>
                <div class="widget-extra-full text-center">
                    <!-- Jquery Sparkline (initialized in js/pages/widgetsStats.js), for more examples you can check out http://omnipotent.net/jquery.sparkline/#s-about -->
                    <span id="mini-chart-bar4">5,6,8,7,1,2,3,2,1,4,5,6,3,5</span>
                </div>
            </div>
            <!-- END Widget -->
        </div>
    </div>
    <!-- END Simple Stats Widgets with Mini Bar Charts Row -->

    <!-- Simple Stats Widgets with Users Row -->
    <div class="row">
        <div class="col-sm-6 col-lg-3">
            <!-- Widget -->
            <div class="widget">
                <div class="widget-extra-full">
                    <div class="widget-options">
                        <a href="javascript:void(0)" class="btn btn-xs btn-default" data-toggle="tooltip" title="Settings"><i class="fa fa-cog"></i></a>
                    </div>
                    <!-- Easy Pie Charts (initialized in js/app.js -> uiInit()) -->
                    <div class="pie-chart" data-percent="90" data-line-width="2" data-bar-color="#333333" data-track-color="#eeeeee">
                        <img src="img/placeholders/avatars/avatar<?php echo rand(1, 16); ?>.jpg" alt="avatar" class="pie-avatar img-circle">
                    </div>
                </div>
                <div class="widget-extra themed-background text-center">
                    <h3 class="widget-content-light">
                        <strong>18</strong><br>
                        <small>out of 20GB</small>
                    </h3>
                </div>
            </div>
            <!-- END Widget -->
        </div>
        <div class="col-sm-6 col-lg-3">
            <!-- Widget -->
            <div class="widget">
                <div class="widget-extra-full">
                    <div class="widget-options">
                        <a href="javascript:void(0)" class="btn btn-xs btn-default" data-toggle="tooltip" title="Settings"><i class="fa fa-cog"></i></a>
                    </div>
                    <!-- Easy Pie Charts (initialized in js/app.js -> uiInit()) -->
                    <div class="pie-chart" data-percent="25" data-line-width="2" data-bar-color="#27ae60" data-track-color="#eeeeee">
                        <img src="img/placeholders/avatars/avatar<?php echo rand(1, 16); ?>.jpg" alt="avatar" class="pie-avatar img-circle">
                    </div>
                </div>
                <div class="widget-extra themed-background-spring text-center">
                    <h3 class="widget-content-light">
                        <i class="gi gi-disk_save"></i><br>
                        <small>0.25 of 1TB</small>
                    </h3>
                </div>
            </div>
            <!-- END Widget -->
        </div>
        <div class="col-sm-6 col-lg-3">
            <!-- Widget -->
            <div class="widget">
                <div class="widget-extra-full">
                    <div class="widget-options">
                        <a href="javascript:void(0)" class="btn btn-xs btn-default" data-toggle="tooltip" title="Settings"><i class="fa fa-cog"></i></a>
                    </div>
                    <!-- Easy Pie Charts (initialized in js/app.js -> uiInit()) -->
                    <div class="pie-chart" data-percent="50" data-line-width="2" data-bar-color="#e67e22" data-track-color="#eeeeee">
                        <img src="img/placeholders/avatars/avatar<?php echo rand(1, 16); ?>.jpg" alt="avatar" class="pie-avatar img-circle">
                    </div>
                </div>
                <div class="widget-extra themed-background-autumn text-center">
                    <h3 class="widget-content-light">
                        <i class="fa fa-plane"></i><br>
                        <small>Half way there!</small>
                    </h3>
                </div>
            </div>
            <!-- END Widget -->
        </div>
        <div class="col-sm-6 col-lg-3">
            <!-- Widget -->
            <div class="widget">
                <div class="widget-extra-full">
                    <div class="widget-options">
                        <a href="javascript:void(0)" class="btn btn-xs btn-default" data-toggle="tooltip" title="Settings"><i class="fa fa-cog"></i></a>
                    </div>
                    <!-- Easy Pie Charts (initialized in js/app.js -> uiInit()) -->
                    <div class="pie-chart" data-percent="75" data-line-width="2" data-bar-color="#e74c3c" data-track-color="#eeeeee">
                        <img src="img/placeholders/avatars/avatar<?php echo rand(1, 16); ?>.jpg" alt="avatar" class="pie-avatar img-circle">
                    </div>
                </div>
                <div class="widget-extra themed-background-fire text-center">
                    <h3 class="widget-content-light">
                        <strong>3</strong> /4 Projects<br>
                        <small>Consider upgrading!</small>
                    </h3>
                </div>
            </div>
            <!-- END Widget -->
        </div>
        <div class="col-sm-6">
            <!-- Widget -->
            <div class="widget">
                <div class="widget-extra-full">
                    <div class="widget-options">
                        <a href="javascript:void(0)" class="btn btn-xs btn-default" data-toggle="tooltip" title="Settings"><i class="fa fa-cog"></i></a>
                    </div>
                    <!-- Easy Pie Charts (initialized in js/app.js -> uiInit()) -->
                    <div class="pie-chart" data-percent="50" data-line-width="2" data-bar-color="#9b59b6" data-track-color="#eeeeee">
                        <img src="img/placeholders/avatars/avatar<?php echo rand(1, 16); ?>.jpg" alt="avatar" class="pie-avatar img-circle">
                    </div>
                </div>
                <div class="widget-extra themed-background-dark-amethyst text-center">
                    <div class="row">
                        <div class="col-xs-4">
                            <h3 class="widget-content-light">
                                <strong>4</strong> / 5<br>
                                <small>Projects</small>
                            </h3>
                        </div>
                        <div class="col-xs-4">
                            <h3 class="widget-content-light">
                                <strong>3</strong> / 10<br>
                                <small>GB</small>
                            </h3>
                        </div>
                        <div class="col-xs-4">
                            <h3 class="widget-content-light">
                                <strong>3</strong> / 5<br>
                                <small>Clients</small>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Widget -->
        </div>
        <div class="col-sm-6">
            <!-- Widget -->
            <div class="widget">
                <div class="widget-extra-full">
                    <div class="widget-options">
                        <a href="javascript:void(0)" class="btn btn-xs btn-default" data-toggle="tooltip" title="Settings"><i class="fa fa-cog"></i></a>
                    </div>
                    <!-- Easy Pie Charts (initialized in js/app.js -> uiInit()) -->
                    <div class="pie-chart" data-percent="75" data-line-width="2" data-bar-color="#1ec1b8" data-track-color="#eeeeee">
                        <img src="img/placeholders/avatars/avatar<?php echo rand(1, 16); ?>.jpg" alt="avatar" class="pie-avatar img-circle">
                    </div>
                </div>
                <div class="widget-extra themed-background-dark-flatie text-center">
                    <div class="row">
                        <div class="col-xs-6">
                            <h3 class="widget-content-light">
                                <i class="gi gi-group"></i><br>
                                <small>5 / 10 Clients</small>
                            </h3>
                        </div>
                        <div class="col-xs-6">
                            <h3 class="widget-content-light">
                                <i class="gi gi-briefcase"></i><br>
                                <small>5 / 10 GB</small>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Widget -->
        </div>
    </div>
    <!-- END Simple Stats Widgets with Users Row -->

    <!-- Simple Stats Widgets with Mini Line Charts Row -->
    <div class="row">
        <div class="col-lg-4">
            <!-- Widget -->
            <div class="widget">
                <div class="widget-extra-full text-center themed-background-modern">
                    <!-- Jquery Sparkline (initialized in js/pages/widgetsStats.js), for more examples you can check out http://omnipotent.net/jquery.sparkline/#s-about -->
                    <span id="mini-chart-line1" class="mini-chart-line">150,100,90,120,140,110,170</span>
                </div>
                <div class="widget-extra text-center themed-background-dark-modern">
                    <h3 class="widget-content-light">Weekly <strong>Earnings</strong></h3>
                </div>
            </div>
            <!-- END Widget -->
        </div>
        <div class="col-lg-4">
            <!-- Widget -->
            <div class="widget">
                <div class="widget-extra-full text-center themed-background-night">
                    <!-- Jquery Sparkline (initialized in js/pages/widgetsStats.js), for more examples you can check out http://omnipotent.net/jquery.sparkline/#s-about -->
                    <span id="mini-chart-line2" class="mini-chart-line">20,15,35,36,85,14,25,68,74,14,25,65</span>
                </div>
                <div class="widget-extra text-center themed-background-dark-night">
                    <h3 class="widget-content-light">Weekly <strong>Sales</strong></h3>
                </div>
            </div>
            <!-- END Widget -->
        </div>
        <div class="col-lg-4">
            <!-- Widget -->
            <div class="widget">
                <div class="widget-extra-full text-center themed-background-fire">
                    <!-- Jquery Sparkline (initialized in js/pages/widgetsStats.js), for more examples you can check out http://omnipotent.net/jquery.sparkline/#s-about -->
                    <span id="mini-chart-line3" class="mini-chart-line">68,15,31,79,15,35,45,71,85,32,49,60</span>
                </div>
                <div class="widget-extra text-center themed-background-dark-fire">
                    <h3 class="widget-content-light">File <strong>Downloads</strong></h3>
                </div>
            </div>
            <!-- END Widget -->
        </div>
    </div>
    <!-- END Simple Stats Widgets with Mini Line Charts Row -->
</div>
<!-- END Page Content -->

<?php include 'inc/page_footer.php'; ?>

<!-- Remember to include excanvas for IE8 chart support -->
<!--[if IE 8]><script src="js/helpers/excanvas.min.js"></script><![endif]-->

<?php include 'inc/template_scripts.php'; ?>

<!-- Load and execute javascript code used only in this page -->
<script src="js/pages/widgetsStats.js"></script>
<script>$(function(){ WidgetsStats.init(); });</script>

<?php include 'inc/template_end.php'; ?>