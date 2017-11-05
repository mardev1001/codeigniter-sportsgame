</div>
<!-- END Page Content -->
<?php include 'adminassets/inc/page_footer.php'; ?>

<!-- Remember to include excanvas for IE8 chart support -->
<!--[if IE 8]><script src="js/helpers/excanvas.min.js"></script><![endif]-->

<?php include 'adminassets/inc/template_scripts.php'; ?>

<!-- Google Maps API + Gmaps Plugin, must be loaded in the page you would like to use maps (Remove 'http:' if you have SSL) -->
<!--<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script src="<?php echo base_url('adminassets'); ?>/js/helpers/gmaps.min.js"></script>-->

<!-- Load and execute javascript code used only in this page
<script src="<?php echo base_url('adminassets'); ?>/js/pages/index.js"></script>
<script>$(function(){ Index.init(); });</script>--> 



<script src="<?php echo base_url('adminassets')?>/js/timepicki.js"></script>
<script>
$('#timepicker1').timepicki();
$('#timepicker2').timepicki();
</script>
<script>
  $(document).ready(function(){
    $(".time_element").timepicki();
  });
</script>
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$( function() {
$( "#datepicker" ).datepicker().datepicker('setDate','today');
$( "#datepicker2" ).datepicker();
$('#datepicker3').datepicker( {
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'yy',
        onClose: function(dateText, inst) { 
            var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
            $(this).datepicker('setDate', new Date(year, month, 1));
        }
}).datepicker('setDate','today');
$( "#datepicker4" ).datepicker();
$('#datepicker5').datepicker( {
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'yy',
        onClose: function(dateText, inst) { 
            var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
            $(this).datepicker('setDate', new Date(year, month, 1));
        }
}).datepicker('setDate','today');	


});
</script>

<script>
$(document).ready(function() {
    $('#example').DataTable();
	$('#example2').DataTable();
} );
</script>
<script src="<?php echo base_url('adminassets')?>/js/wickedpicker.js"></script>
<script>
passing_time	=	$('#passing_time').val();
if(passing_time==''){
	show_time	=	'16:00';
}else{
	show_time	=	passing_time;
}
var options = {
        now: show_time, //hh:mm 24 hour format only, defaults to current time
        twentyFour: false,  //Display 24 hour format, defaults to false
        upArrow: 'wickedpicker__controls__control-up',  //The up arrow class selector to use, for custom CSS
        downArrow: 'wickedpicker__controls__control-down', //The down arrow class selector to use, for custom CSS
        close: 'wickedpicker__close', //The close class selector to use, for custom CSS
        hoverState: 'hover-state', //The hover state class to use, for custom CSS
        title: 'Timepicker', //The Wickedpicker's title,
        showSeconds: false, //Whether or not to show seconds,
        secondsInterval: 1, //Change interval for seconds, defaults to 1,
        minutesInterval: 5, //Change interval for minutes, defaults to 1
        beforeShow: null, //A function to be called before the Wickedpicker is shown
        show: null, //A function to be called when the Wickedpicker is shown
        clearable: false, //Make the picker's input clearable (has clickable "x")
    };
    $('.timepicker').wickedpicker(options);
</script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
<script src="<?php echo base_url('adminassets')?>/js/customscript.js"></script>

<?php include 'adminassets/inc/template_end.php'; ?>