<script type="text/javascript">
<?php 
wp_enqueue_script('jquery-ui-datepicker'); 
wp_enqueue_style('jquery-style', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css');
?>

jQuery(document).ready(function() {
    jQuery('#startdate').datepicker({
        dateFormat : 'yy-mm-dd',
		altField: '#startDateFormatted',
		altFormat: 'yymmdd'
    });
    jQuery('#enddate').datepicker({
        dateFormat : 'yy-mm-dd',
		altField: '#endDateFormatted',
		altFormat: 'yymmdd'
    });
});
</script>
<form method="get" id="advanced-searchform" role="search" action="<?php echo esc_url( home_url( '/' ) ); ?>">

    <h3><?php _e( 'Search Shifts', 'textdomain' ); ?></h3>

    <!-- PASSING THIS TO TRIGGER THE ADVANCED SEARCH RESULT PAGE FROM functions.php -->
    <input type="hidden" name="search" value="advanced">

    <!--<label for="s" class=""><?php _e( 'Name: ', 'textdomain' ); ?></label><br>-->
    <!--<input type="text" value="" placeholder="<?php _e( 'Type the Car Name', 'textdomain' ); ?>" name="s" id="name" style="visibility: hidden" />-->
	<input type="hidden" name="s" value="">
	
    <label for="shifttype" class=""><?php _e( 'Select a Shift Type: ', 'textdomain' ); ?></label><br>
    <select name="shifttype" id="shifttype">
        <option value=""><?php _e( 'Select one...', 'textdomain' ); ?></option>
        <option value="any"><?php _e( 'Any', 'textdomain' ); ?></option>
        <option value="receiving"><?php _e( 'Receiving', 'textdomain' ); ?></option>
        <option value="shopping"><?php _e( 'Shopping', 'textdomain' ); ?></option>
		
    </select>
    <br>
    <label for="startdate">Start Date: </label><input type="text" id="startdate" name="startdate" class="datepick" value="">	
    <label for="enddate">End Date: </label><input type="text" id="enddate" name="enddate" class="datepick" value="">	
	<input type="hidden" id="startDateFormatted" name="startdateformatted">	
	<input type="hidden" id="endDateFormatted" name="enddateformatted">

    <input type="submit" id="searchsubmit" value="Search" />

</form>