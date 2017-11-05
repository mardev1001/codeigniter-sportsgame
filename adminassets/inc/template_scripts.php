<?php
/**
 * template_scripts.php
 *
 * Author: pixelcave
 *
 * All vital JS scripts are included here
 *
 */
?>

<!-- Include Jquery library from Google's CDN but if something goes wrong get Jquery from local file (Remove 'http:' if you have SSL) -->


<!-- Bootstrap.js, Jquery plugins and Custom JS code -->
<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url('adminassets')?>/js/vendor/bootstrap.min.js"></script>
<script src="<?php echo base_url('tinymce')?>/js/tinymce/tinymce.min.js"></script>
 <script>tinymce.init({  
      mode : "textareas",
      force_br_newlines : false,
      force_p_newlines : false,
      });</script>

<!--Comment both file error are coming <script src="<?php //echo base_url('adminassets')?>/js/plugins.js"></script>
<script src="<?php //echo base_url('adminassets')?>/js/app.js"></script>-->
