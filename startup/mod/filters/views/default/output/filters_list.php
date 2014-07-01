<?php
/**
 * View categories on an entity
 *
 * @uses $vars['entity']
 */
$linkstr = '';


$linkstr .= elgg_view("output/functions_list", $vars);
$linkstr .= "<br>";
$linkstr .= elgg_view("output/spaces_list", $vars);



if (isset($vars['formatted']) && $vars['formatted'] == false) {
    echo $linkstr;
}else{
    echo '<p class="elgg-output-categories">' . $linkstr . "</p>";
}