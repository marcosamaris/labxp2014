<?php
$spaces = array ();
$selected_categories = array ();
$spaces = elgg_get_site_entity ()->filters_spaces;

if (! empty ( $spaces )) {
    
    if (! is_array ( $spaces )) {
        $spaces = array (
                $spaces 
        );
    }
    
    $spaces = array_flip ( $spaces );
    array_walk ( $spaces, create_function ( '&$v, $k', '$v = $k;' ) );
    
    ?>

<div class="sidebar-nav">

	<h3 class="nav-title">
	   <?php 
	       $urlAllSpaces =  generateUrlAllFilters(current_page_url (),"spaces_list");
	   ?>
		<span class="nav-title-icon">&nbsp;</span><a href="<?php echo $urlAllSpaces['url'];?>" class="<?php echo $urlAllSpaces['class'];?>"><?php echo elgg_echo('filters:allspaces'); ?></a>
	</h3>

	<ul class="nav-s">
	
	<?php
    
    echo elgg_view ( 'input/links', array (
            'options' => $spaces,
            'name' => 'spaces_list[]',
            'url' => current_page_url (),
            'categories' => $vars ['spaces'],
            'class' => 'filter-active' 
    ) );
    
    ?>

	</ul>
</div>


<?php
}
?>