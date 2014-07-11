<?php
/**
 * The standard HTML head
 *
 * @uses $vars['title'] The page title
 */

// Set title
if (empty($vars['title'])) {
	$title = elgg_get_config('sitename');
} else {
	$title = elgg_get_config('sitename') . ": " . $vars['title'];
}

global $autofeed;
if (isset($autofeed) && $autofeed == true) {
	$url = full_url();
	if (substr_count($url,'?')) {
		$url .= "&view=rss";
	} else {
		$url .= "?view=rss";
	}
	$url = elgg_format_url($url);
	$feedref = <<<END

	<link rel="alternate" type="application/rss+xml" title="RSS" href="{$url}" />

END;
} else {
	$feedref = "";
}

$js = elgg_get_loaded_js('head');
$css = elgg_get_loaded_css();

$version = get_version();
$release = get_version(true);
?>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="ElggRelease" content="<?php echo $release; ?>" />
	<meta name="ElggVersion" content="<?php echo $version; ?>" />
	
	<title><?php echo $title; ?></title>
	<?php echo elgg_view('page/elements/shortcut_icon', $vars); ?>

	
	
<?php foreach ($css as $link) { ?>
	<link rel="stylesheet" href="<?php echo $link; ?>" type="text/css" />
<?php } ?>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<?php
	$ie_url = elgg_get_simplecache_url('css', 'ie');
	$ie7_url = elgg_get_simplecache_url('css', 'ie7');
	$ie6_url = elgg_get_simplecache_url('css', 'ie6');
?>
	<!--[if gt IE 7]>
		<link rel="stylesheet" type="text/css" href="<?php echo $ie_url; ?>" />
	<![endif]-->
	<!--[if IE 7]>
		<link rel="stylesheet" type="text/css" href="<?php echo $ie7_url; ?>" />
	<![endif]-->
	<!--[if IE 6]>
		<link rel="stylesheet" type="text/css" href="<?php echo $ie6_url; ?>" />
	<![endif]-->


<?php foreach ($js as $script) { ?>
	<script type="text/javascript" src="<?php echo $script; ?>"></script>
<?php } ?>


<script type="text/javascript">
        $(window).on('load', function () {
            $('.selectpicker').selectpicker({
                'selectedText': 'test1',
				liveSearch:false
            });
             //$('.selectpicker').selectpicker('hide');
        });
		
</script>
<script type="text/javascript">       
		$(document).ready(function(){
			$('.checkbox').checkbox();			
		});


$(document).ready(function(){
	
	ww = $(document).width();
	if (ww < 992) {			
	$(".sidebar-nav").addClass("on");
	}	
	$(".nav-title-icon").click(function() {				
		if (ww < 992) {					

			$(".sidebar-nav").find(".nav-s").toggle( "slow" );	
			$(this).toggleClass("minus");	
		}
	});

	$(".list-view").click(function() {
		$("#grid-view").hide();
		$("#list-view").show();
		$(this).addClass("active");
		$(".grid-view").removeClass("active");
	});
	$(".grid-view").click(function() {
		$("#grid-view").show();
		$("#list-view").hide();
		$(this).addClass("active");
		$(".list-view").removeClass("active");
	});

	$('.reply-link').click (function(){
		$('.reply-link').fadeOut("slow", function(){
		   var div = $("<div class='reply'><input type='text' value='Reply here...'><input type='submit' value=''></div>").hide();
		   $(this).replaceWith(div);
		   $('.reply').fadeIn("slow");
		});
	});
	

	$('.link-popover').popover({
	    html: true,
	    trigger: 'manual'
	}).click(function(e) {
	    $('.link-popover').not(this).popover('hide');
	    $(this).popover('toggle');
	});
	$(document).click(function(e) {
	    if (!$(e.target).is('.link-popover, .popover-title, .popover-content')) {
	        $('.link-popover').popover('hide');
	    }
	});
	

	dropdownFilter(".functions-dropdown", "#functions-list", "functions[]");
	dropdownFilter(".spaces-dropdown", "#spaces-list","spaces[]");
		
	

	
});

function dropdownFilter(classDropdown, idList, nameInputHidden){
$(classDropdown).change(function(){
	
		var dropdownValue = $(this).val();
		var dropdownName = $(this).attr("name");
		
		if(dropdownValue.length > 1){
			
			

			$(idList).append("<div class=\"add-tags ui-button ui-button-text-only\" role=\"button\"><span class=\"ui-button-text\">"+dropdownValue+"</span><span class=\"remove\"></span><input type=\"hidden\" name=\""+nameInputHidden+"\" value=\""+dropdownValue+"\"></div>");
			
			$(idList).attr("class","border padtb8");
			
			
			$(".remove").click(function(){
				
				var elementText = $(this).parent().children(".ui-button-text").text();
				
				
				$(classDropdown+' option[value="' + elementText + '"]').removeAttr('disabled');
				$('.selectpicker').selectpicker('render');
				$(this).parent().remove();
				
				if($(idList).children().length == 0){
					$(idList).attr("class","");
			
					
				}
			});
		
			
			$(this).children("option:selected").attr('disabled','disabled');
			$(this).children("option:selected").removeAttr("selected");
			$('.selectpicker').selectpicker('deselectAll');
			$('.selectpicker').selectpicker('render');
			
			
			
			
		}
	});
}
</script>


<script type="text/javascript">
// <![CDATA[
	<?php echo elgg_view('js/initialize_elgg'); ?>
// ]]>
</script>

<?php
echo $feedref;

$metatags = elgg_view('metatags', $vars);
if ($metatags) {
	elgg_deprecated_notice("The metatags view has been deprecated. Extend page/elements/head instead", 1.8);
	echo $metatags;
}
