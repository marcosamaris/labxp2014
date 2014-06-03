<?php
/**
 * Administrator sets the advisors for the site
 *
 * @package ElggAdvisors
 */
/*
// Get site categories
$site = elgg_get_site_entity();
$guid = $site->guid;
$name = $site->name;
$email = $site->email;
$photo = $site->photo;
$skype = $site->skype;
$linkedin = $site->linkedin;
$plus = $site->plus;
$twitter = $site->twitter;
$facebook = $site->facebook;

?>
<div>
	<p><?php echo elgg_echo('advisors:explanation'); ?></p>
	<p><?php echo elgg_echo('advisors:name'); ?></p>
<?php
echo elgg_view ( 'input/text', array ('value' => $name,'name' => 'name' 
) );
?>
<p><?php echo elgg_echo('advisors:email'); ?></p>
<?php
echo elgg_view ( 'input/text', array ('value' => $email,'name' => 'email'));
?>

<p><?php echo elgg_echo('advisors:photo'); ?></p>
<?php
echo elgg_view ( 'input/text', array ('value' => $email,'name' => 'email'));
?>


<p><?php echo elgg_echo('advisors:skype'); ?></p>
<?php
echo elgg_view ( 'input/text', array ('value' => $skype,'name' => 'skype'));
?>


<p><?php echo elgg_echo('advisors:linkedin'); ?></p>
<?php
echo elgg_view ( 'input/text', array ('value' => $linkedin,'name' => 'linkedin'));
?>



<p><?php echo elgg_echo('advisors:plus'); ?></p>
<?php
echo elgg_view ( 'input/text', array ('value' => $plus,'name' => 'plus'));
?>



<p><?php echo elgg_echo('advisors:twitter'); ?></p>
<?php
echo elgg_view ( 'input/text', array ('value' => $twitter,'name' => 'twitter'));
?>


<p><?php echo elgg_echo('advisors:facebook'); ?></p>
<?php
echo elgg_view ( 'input/text', array ('value' => $facebook,'name' => 'facebook'));
?>
</div>

*/
 
echo elgg_view_form('advisors/add', array(), array('entity' => $user));