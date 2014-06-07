<?php
// get the form inputs


$user = elgg_get_logged_in_user_entity();
$user_guid = $user->save();



// if the home post was saved, we want to display the new post
// otherwise, we want to register an error and forward back to the form
if ($user_guid) {
   system_message(elgg_echo('home:registered'));
   forward("home/");
} else {
   register_error(elgg_echo('home:noregistered'));
   forward(REFERER); // REFERER is a global variable that defines the previous page
}