<?php
elgg_load_js ( 'elgg.filters' );

/**
 * Categories input view
 *
 * @package ElggCategories
 *         
 * @uses $vars['entity'] The entity being edited or created
 */

$functions = elgg_get_site_entity ()->filters_functions;
if (empty ( $functions )) {
    $functions = array ();
}

$spaces = elgg_get_site_entity ()->filters_spaces;
if (empty ( $spaces )) {
    $spaces = array ();
}

if (! empty ( $functions ) && ! empty ( $spaces )) {
    if (! is_array ( $functions )) {
        $functions = array (
                $functions 
        );
    }
    
    $functions = array_flip ( $functions );
    array_walk ( $functions, create_function ( '&$v, $k', '$v = $k;' ) );
    
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
		<span class="nav-title-icon">&nbsp;</span><a href="#"><?php echo elgg_echo('Functions'); ?></a>
	</h3>

	<ul class="nav-s">


		<form id="myform">
	<?php
    echo elgg_view ( 'input/checkboxes', array (
            'options' => $functions,
            'value' => $selected_categories,
            'name' => 'functions_list',
            'align' => 'vertical',
            'onclick' => 'teste()',
            'categories' => $vars ['functions'] 
    ) );
    
    ?>
	<input type="hidden" name="universal_category_marker" value="on" />
	
	</ul>
</div>

<div class="sidebar-nav">

	<h3 class="nav-title">
		<span class="nav-title-icon">&nbsp;</span><a class="active" href="#"><?php echo elgg_echo('Spaces'); ?></a>
	</h3>

	<ul class="nav-s">
	
	<?php
    echo elgg_view ( 'input/checkboxes', array (
            'options' => $spaces,
            'value' => $selected_categories,
            'name' => 'spaces_list',
            'align' => 'vertical',
            'onclick' => 'teste()',
            'categories' => $vars ['spaces'] 
    ) );
    
    ?>
	<input type="hidden" name="universal_space_marker" value="on" />
		</form>
	</ul>
</div>


<script type="text/javascript">
	function teste(){
		document.forms["myform"].submit();
	}
</script>
<?php
} else {
    echo '<input type="hidden" name="universal_category_marker" value="on" />';
}

