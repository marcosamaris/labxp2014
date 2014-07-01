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

$linkstr = $linkstr . "<br>";
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

if (isset($vars['formatted']) && $vars['formatted'] == false) {
    echo $linkstr;
}else{
    echo '<p class="elgg-output-categories">' . $linkstr . "</p>";
}