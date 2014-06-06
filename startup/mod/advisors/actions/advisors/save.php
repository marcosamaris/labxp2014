<?php
// get the form inputs

$body = get_input('body');


// create a new home object
$home = new ElggObject();

//$home->subtype = "home";

$home->subtype = "";

$home->description = $body;

$home->access_id = "1";
$home->comments_on = "On";
// owner is logged in user
$home->owner_guid = elgg_get_logged_in_user_guid();

// save to database and get id of the new home post
$home_guid = $home->save();



// if the home post was saved, we want to display the new post
// otherwise, we want to register an error and forward back to the form
if ($home_guid) {
	add_to_river('river/object/home/create', 'create', $home->owner_guid, $home->guid);
	
   system_message(elgg_echo('home:saved'));
   forward("home/");
} else {
   register_error(elgg_echo('home:nosaved'));
   forward(REFERER); // REFERER is a global variable that defines the previous page
}