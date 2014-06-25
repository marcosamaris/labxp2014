<?php
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

if (! empty ( $functions )) {
    if (! is_array ( $functions )) {
        $functions = array (
                $functions 
        );
    }
    
    $functions = array_flip ( $functions );
    array_walk ( $functions, create_function ( '&$v, $k', '$v = $k;' ) );
    
    ?>
<table>
	<tr>
		<td><label><?php echo elgg_echo('filters:functions'); ?></label><br />
	<?php
    echo elgg_view ( 'input/dropdown', array (
            'value' => '',
            'name' => 'functions',
            'options_values' => $functions 
    )
     );
    
    echo elgg_view ( 'input/dropdown', array (
            'value' => '',
            'name' => 'functions1',
            'options_values' => $functions 
    )
     );
    ?>
	</td>
	</tr>
	<?php
}
echo elgg_view ( 'input/spaces' );
?>