<?php
/**
 * Administrator sets the categories for the site
 *
 * @package ElggCategories
 */

// Get site categories
$site = elgg_get_site_entity();
$filters_functions = $site->filters_functions;
$filters_spaces = $site->filters_spaces;

if (empty($filters)) {
	$filters = array();
}

?>
<div>
	<p><?php echo elgg_echo('filters:explanation'); ?></p>
	<p><?php echo elgg_echo('filters:functions'); ?></p>
<?php
	echo elgg_view('input/tags', array('value' => $filters_functions, 'name' => 'filters_functions'));
?>
<p><?php echo elgg_echo('filters:spaces'); ?></p>
<?php
	echo elgg_view('input/tags', array('value' => $filters_spaces, 'name' => 'filters_spaces'));
?>
</div>

<script type="text/javascript">
$(function(){
	$("#filters-settings .elgg-button.elgg-button-submit").click(function(){
	
	
		    if (confirm('Are you sure you want to save these informations?')) {
		    	$("#filters-settings").submit();
		    } else {
		    	return false;
		    }
		
		
	});
});
</script>