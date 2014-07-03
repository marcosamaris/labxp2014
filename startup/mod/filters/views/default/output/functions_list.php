<?php
/**
 * View categories on an entity
 *
 * @uses $vars['entity']
 */
$linkstr = '';

$functions = $vars ['entity']->functions;
if (! empty ( $functions ) && $functions != " ") {
    if (! is_array ( $functions )) {
        $functions = array (
                $functions 
        );
    }
    
    foreach ( $functions as $functions ) {
        if (! empty ( $linkstr ) && !empty($functions)) {
            $linkstr .= ', ';
        }
        
        $linkstr .= $functions;
    }
}else{
    $linkstr .= elgg_echo("filters:allfunctions");
}

echo $linkstr;
