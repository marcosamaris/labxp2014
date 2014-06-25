<?php
elgg_register_event_handler ( 'init', 'system', 'extend_elgg_social_login_init' );

function extend_elgg_social_login_init() {
    elgg_unextend_view ( 'forms/login', 'elgg_social_login/login' );
    elgg_unextend_view ( 'forms/register', 'elgg_social_login/login' );
}

?>