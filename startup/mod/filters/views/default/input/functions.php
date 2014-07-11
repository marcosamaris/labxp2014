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


	$allfunctions = array("" => elgg_echo("filters:addfunctions"));
	$functionsAll = array_merge($allfunctions, $functions);


	echo elgg_view ( 'input/dropdown', array (
                    'value' => '',
                    'name' => '',
                    'id' => 'functions',
                    'class'=>$vars['class'],
                    'options_values' => $functionsAll 
	) );

}

?>