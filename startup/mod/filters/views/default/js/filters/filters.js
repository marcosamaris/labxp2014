elgg.provide('elgg.filters');
 
elgg.filters.init = function() {

	$(".functionsLink").click(function () {
		val = $(this).attr("id");
		alert(val);
	    window.location.href = "http://localhost/labxp2014/startup/home/mod/home/index.php?Functions=" + val;

	    //window.location.href = "index.php?Functions=" + $(this).attr("id"));
	});
}
 
elgg.register_hook_handler('init', 'system', elgg.filters.init);

