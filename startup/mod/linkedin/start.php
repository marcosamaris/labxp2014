<?php

function linkedin_init()
{
    elgg_register_action('linkedin/login', elgg_get_plugins_path() . 'linkedin/actions/login.php', 'public');
    elgg_register_action('linkedin/callback', elgg_get_plugins_path() . 'linkedin/actions/callback.php', 'public');
    elgg_extend_view('login/extend', 'linkedin/login');
    elgg_register_plugin_hook_handler('usersettings:save','user', 'linkedin_usersettings_save', 1);
}

function linkedin_usersettings_save($hook, $type, $returnvalue, $params)
{
    get_loggedin_user()->linkedin_sync = isset($_POST['linkedin_sync']);
}

elgg_register_event_handler('init', 'system', 'linkedin_init');
