<?php
// get the form inputs
$body = get_input ( 'body' );

// create a new home object
$advisor = new ElggObject ();

$advisor->subtype = "";

$advisor->description = $body;

$advisor->access_id = "1";
$advisor->comments_on = "On";
// owner is logged in user
$advisor->owner_guid = elgg_get_logged_in_user_guid ();

// save to database and get id of the new home post
$advisor_guid = $advisor->save ();

// if the home post was saved, we want to display the new post
// otherwise, we want to register an error and forward back to the form
if ($advisor_guid) {
    add_to_river ( 'river/object/home/create', 'create', $advisor->owner_guid, $advisor->guid );
    
    system_message ( elgg_echo ( 'home:saved' ) );
    forward ( "home/" );
} else {
    register_error ( elgg_echo ( 'home:nosaved' ) );
    forward ( REFERER ); // REFERER is a global variable that defines the previous page
}