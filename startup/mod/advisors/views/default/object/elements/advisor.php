<?php
/**
 * Object summary
 *
 * Sample output
 * <ul class="elgg-menu elgg-menu-entity"><li>Public</li><li>Like this</li></ul>
 * <h3><a href="">Title</a></h3>
 * <p class="elgg-subtext">Posted 3 hours ago by George</p>
 * <p class="elgg-tags"><a href="">one</a>, <a href="">two</a></p>
 * <div class="elgg-content">Excerpt text</div>
 *
 * @uses $vars['entity']    ElggEntity
 * @uses $vars['title']     Title link (optional) false = no title, '' = default
 * @uses $vars['metadata']  HTML for entity menu and metadata (optional)
 * @uses $vars['subtitle']  HTML for the subtitle (optional)
 * @uses $vars['tags']      HTML for the tags (default is tags on entity, pass false for no tags)
 * @uses $vars['content']   HTML for the entity content (optional)
 */


$message_book = elgg_echo('advisors:bookofficehours');
$functions_and_spaces = elgg_view('output/filters_list', $vars);

echo <<<HTML

<div class="detail clearfix">
	<div class="col-lg-8 description">
		<div class="avatar col-lg-2">
			<img src="{$vars['avatar']}" alt="#" width="50" height="49">
		</div>
    	<div class="avatar-detail  col-lg-6">
    		<h3>{$vars['title']}</h3>
    		<p>{$vars['description']}</p>
    		{$functions_and_spaces}
    	</div>
    </div>
<div class="col-lg-4 detail-bt">
	<a href="{$vars['bookofficehours']}" class="book-hours-bt">
		$message_book
	</a>
	
	<div class="social-icon">

		<a href="#" class="mailto link-popover" data-toggle="popover" data-placement="top" data-content="{$vars['email']}" title="E-mail" >mail</a>
		<a href="#" class="skype link-popover" data-toggle="popover" data-placement="top" title="Skype" data-content="{$vars['skype']}">skype</a>
		<a href="{$vars['linkedin']}" class="linkedin  link-popover" data-toggle="popover" data-placement="top">linkedin</a>
		<a href="{$vars['googleplus']}" class="googleplus  link-popover" data-toggle="popover" data-placement="top">googleplus</a>
		<a href="#" class="twitter  link-popover" data-toggle="popover" data-placement="top" title="Twitter" data-content="{$vars['twitter']}">twitter</a>
		<a href="{$vars['facebook']}" class="facebook  link-popover" data-toggle="popover" data-placement="top">facebook</a>

	</div>
</div>

</div>
HTML;
