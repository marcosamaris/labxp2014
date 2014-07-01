<?php
/**
 * View categories on an entity
 *
 * @uses $vars['entity']
 */
$linkstr = '';

$spaces = $vars ['entity']->spaces;
if (! empty ( $spaces )) {
    if (! is_array ( $spaces )) {
        $spaces = array (
                $spaces 
        );
    }
    
    foreach ( $spaces as $spaces ) {
        
        $linkstr .= $spaces;
    }
}else{
    $linkstr .= elgg_echo("filters:allspaces");
}

echo $linkstr;