<?php
/**
 * View categories on an entity
 *
 * @uses $vars['entity']
 */
$linkstr = '';

$functions = $vars ['entity']->functions;
if (! empty ( $functions )) {
    if (! is_array ( $functions )) {
        $functions = array (
                $functions 
        );
    }
    
    foreach ( $functions as $functions ) {
        if (! empty ( $linkstr )) {
            $linkstr .= ', ';
        }
        
        $linkstr .= $functions;
    }
}else{
    $linkstr .= elgg_echo("filters:allfunctions");
}

echo $linkstr;
