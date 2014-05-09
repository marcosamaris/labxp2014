<?php
// get the form inputs

$body = get_input('body');


// create a new my_blog object
$blog = new ElggObject();

//$blog->subtype = "my_blog";

$blog->subtype = "home";

$blog->description = $body;

// owner is logged in user
$blog->owner_guid = elgg_get_logged_in_user_guid();

// save to database and get id of the new my_blog
$blog_guid = $blog->save();



// if the my_blog was saved, we want to display the new post
// otherwise, we want to register an error and forward back to the form
if ($blog_guid) {
	add_to_river('river/ElggObject/create', 'create', $blog->owner_guid, $blog->guid);
	
   system_message("Your post was saved");
   forward("home/");
} else {
   register_error("The blog post could not be saved");
   forward(REFERER); // REFERER is a global variable that defines the previous page
}