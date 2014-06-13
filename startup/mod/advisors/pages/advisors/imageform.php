<?php

/** Setup **/	
$options = array();
$title = 'Advisors'; //title is the title of page

$params = $form = elgg_view_form("advisors/upload", $vars);

$body = elgg_view_layout('one_column', $params);
echo elgg_view_page($title, $body); 
