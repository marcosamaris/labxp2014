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
$company_emails = $site->company_emails;

?>


<p>
<?php echo "White List" ?>
<?php echo elgg_view('input/tags', array('value' => $company_emails, 'name' => 'company_email'));?>
</p>


</div>

<script type="text/javascript">
$(function(){
	$(".elgg-button.elgg-button-submit").click(function(){
	
	
		    if (confirm('Are you sure you want to save these informations?')) {
		    	$(".elgg-form").submit();
		    } else {
		    	return false;
		    }
		
		
	});
});
</script>
