<?php

/** Setup **/	

$title = 'Register'; //title is the title of page

$form_vars = array("role"=>"form");

$form = elgg_view_form("home/register",$form_vars);

$params = array(
	'content' => $form,			
);


$body = elgg_view_layout('one_column', $params);
echo elgg_view_page($title, $body); 
