
<div>
	<label><?php echo elgg_echo("advisors:nome"); ?></label><br />
    <?php echo elgg_view('input/text',array('name' => 'nome')); ?>
</div>


<div>
	<label><?php echo elgg_echo("advisors:description"); ?></label><br />
    <?php echo elgg_view('input/text',array('name' => 'briefdescription')); ?>
</div>

<div>
	<label><?php echo elgg_echo("advisors:email"); ?></label><br />
    <?php echo elgg_view('input/text',array('name' => 'contactemail')); ?>
</div>

<div>
	<label><?php echo elgg_echo("advisors:skype"); ?></label><br />
    <?php echo elgg_view('input/text',array('name' => 'contactskype')); ?>
</div>

<div>
	<label><?php echo elgg_echo("advisors:linkedin"); ?></label><br />
    <?php echo elgg_view('input/text',array('name' => 'contactlinkedin')); ?>
</div>

<div>
	<label><?php echo elgg_echo("advisors:plus"); ?></label><br />
    <?php echo elgg_view('input/text',array('name' => 'contactplus')); ?>
</div>

<div>
	<label><?php echo elgg_echo("advisors:twitter"); ?></label><br />
    <?php echo elgg_view('input/text',array('name' => 'contacttwitter')); ?>
</div>

<div>
	<label><?php echo elgg_echo("advisors:facebook"); ?></label><br />
    <?php echo elgg_view('input/text',array('name' => 'contactfb')); ?>
</div>

<div>
	<label><?php echo elgg_echo("advisors:photo"); ?></label><br />
	<dd><?php echo elgg_view('input/file', array('internalname' => 'image', 'value' => $image)); ?></dd>
</div>

<div></div>