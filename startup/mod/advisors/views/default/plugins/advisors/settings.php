
<div>
<label><?php echo elgg_echo("advisors:name"); ?></label><br />
    <?php echo elgg_view('input/text',array('name' => 'advisorname')); ?>
</div>


<div><label><?php echo elgg_echo("advisors:description"); ?></label><br />
    <?php echo elgg_view('input/text',array('name' => 'advisordescr')); ?>
</div>

<div><label><?php echo elgg_echo("advisors:email"); ?></label><br />
    <?php echo elgg_view('input/text',array('name' => 'advisoremail')); ?>
</div>

<div><label><?php echo elgg_echo("advisors:skype"); ?></label><br />
    <?php echo elgg_view('input/text',array('name' => 'advisorskype')); ?>
</div>

<div><label><?php echo elgg_echo("advisors:linkedin"); ?></label><br />
    <?php echo elgg_view('input/text',array('name' => 'advisorlinkedin')); ?>
</div>

<div><label><?php echo elgg_echo("advisors:plus"); ?></label><br />
    <?php echo elgg_view('input/text',array('name' => 'advisorplus')); ?>
</div>

<div><label><?php echo elgg_echo("advisors:twitter"); ?></label><br />
    <?php echo elgg_view('input/text',array('name' => 'advisortwitter')); ?>
</div>

<div><label><?php echo elgg_echo("advisors:facebook"); ?></label><br />
    <?php echo elgg_view('input/text',array('name' => 'advisorfb')); ?>
</div>

<div><label><?php echo elgg_echo("advisors:photo"); ?></label><br />
<dd><?php echo elgg_view('input/file', array('name' => 'advisorimage', 'value' => $image)); ?></dd> 
</div>
