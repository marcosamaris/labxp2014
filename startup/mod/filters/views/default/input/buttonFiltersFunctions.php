<?php
$functions = array ();
$selected_categories = array ();
$functions = elgg_get_site_entity ()->filters_functions;

if (! empty ( $functions )) {
    
    if (! is_array ( $functions )) {
        $functions = array (
                $functions 
        );
    }
    
    $functions = array_flip ( $functions );
    array_walk ( $functions, create_function ( '&$v, $k', '$v = $k;' ) );
    
    ?>
<div class="sidebar-nav">

	<h3 class="nav-title">
	   <?php 
	       $urlAllFunctions =  generateUrlAllFilters(current_page_url (),'functions_list');
	   ?>
		<span class="nav-title-icon">&nbsp;</span><a href="<?php echo $urlAllFunctions['url'];?>" class="<?php echo $urlAllFunctions['class'];?>"><?php echo elgg_echo('filters:allfunctions'); ?></a>
	</h3>

	<ul class="nav-s">

	<?php
    
    echo elgg_view ( 'input/links', array (
            'options' => $functions,
            'name' => 'functions_list[]',
            'url' => current_page_url (),
            'categories' => $vars ['functions'],
            'class' => 'filter-active' 
    ) );
    
    ?>

	</ul>
</div>

<?php
}
?>

