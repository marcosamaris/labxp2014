<?php

/** Setup **/	

$title = 'Register'; //title is the title of page

$content = elgg_view("forms/home/register");

$params = array(
	'content' => $content,	
		
);


$body = elgg_view_layout('one_column', $params);
echo elgg_view_page($title, $body); 
