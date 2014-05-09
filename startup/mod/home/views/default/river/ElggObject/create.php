<?php

$object = $vars['item']->getObjectEntity();
$excerpt = elgg_get_excerpt($object->description);

$summary = elgg_echo("river:create:object:home", array($subject_link, $object_link));

echo elgg_view('river/elements/layout', array(
	'item' => $vars['item'],
	'message' => $excerpt,
));
