<?php

/** Setup **/
$options = array ();
$title = 'Advisors'; // title is the title of page

//calling the form to upload an image: this command calls the file located in views/default/forms/advisors/upload
$params = $form = elgg_view_form ( "advisors/upload", array (
        'enctype' => 'multipart/form-data' 
), $vars );

$body = elgg_view_layout ( 'one_column', $params );
echo elgg_view_page ( $title, $body ); 
