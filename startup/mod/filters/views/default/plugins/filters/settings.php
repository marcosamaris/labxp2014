<?php
/**
 * Administrator sets the categories for the site
 *
 */

// Get site categories
$site = elgg_get_site_entity();
$filters_functions = $site->filters_functions;
$filters_spaces = $site->filters_spaces;
$filters_companies =  $site->filters_companies;
$filters_roles =  $site->filters_roles;

if (empty($filters)) {
	$filters = array();
}

?>
<div>
<p><?php echo elgg_echo('filters:explanation'); ?></p>

<p>
<?php echo elgg_echo('filters:functions'); ?>
<?php echo elgg_view('input/tags', array('value' => $filters_functions, 'name' => 'filters_functions')); ?>
</p>
<p>
<?php echo elgg_echo('filters:spaces'); ?>
<?php echo elgg_view('input/tags', array('value' => $filters_spaces, 'name' => 'filters_spaces')); ?>
</p>
<p>
<?php echo elgg_echo('filters:companies'); ?>
<?php echo elgg_view('input/tags', array('value' => $filters_companies, 'name' => 'filters_companies')); ?>
</p>
<p>
<?php echo elgg_echo('filters:roles'); ?>
<?php echo elgg_view('input/tags', array('value' => $filters_roles, 'name' => 'filters_roles'));?>
</p>

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