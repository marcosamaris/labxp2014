<?php
//echo elgg_view_title($vars['entity']->title);
//echo "MY VIEW object<br>";
//echo elgg_view_title("Post Object");
echo elgg_view('output/longtext', array('value' => $vars['entity']->description));
//echo elgg_view('output/tags', array('tags' => $vars['entity']->tags));

