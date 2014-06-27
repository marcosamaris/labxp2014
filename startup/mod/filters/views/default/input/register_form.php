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
	
	<?php
    echo elgg_view ( 'input/dropdown_register', array (
            'value' => '',
            'name' => 'main functions',
            'options_values' => $functions 
    )
     );
    ?>
		
	<?php
}

$spaces = elgg_get_site_entity ()->filters_spaces;
if (empty ( $spaces )) {
    $spaces = array ();
}

if (! empty ( $spaces )) {
    if (! is_array ( $spaces )) {
        $spaces = array (
                $spaces 
        );
    }
    
    $spaces = array_flip ( $spaces );
    array_walk ( $spaces, create_function ( '&$v, $k', '$v = $k;' ) );
    
    ?>

	
	<?php
    
    echo elgg_view ( 'input/dropdown_register', array (
            'value' => '',
            'name' => 'main spaces',
            'options_values' => $spaces 
    )
     );
    
    ?>
	
	
	<?php
    
    echo elgg_view ( 'input/dropdown_register', array (
            'value' => '',
            'name' => 'role' 
    ) );
    
    ?>


<input name="company_email" type="text" class="form-control"
	placeholder="Your Company's Mail"></input>


<?php
}
?>