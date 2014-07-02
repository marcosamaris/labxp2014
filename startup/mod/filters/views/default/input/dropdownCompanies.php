<div class="row">
	<div class="col-lg-4">
		<div class="form-group">
            <?php echo elgg_view('input/companies',$vars);?>
        </div>
	</div>
</div>
<script>
$( "select#companies" ).change(function () {

	var str = "";
	var urlWithParameters = window.location.href;
	var newUrlWithParameters = "";



	urlWithParameters = urlWithParameters.replace(/companies=[A-Za-z \/\-0-9]+/g, '');
	
	
    $( "select#companies option:selected" ).each(function() {
    	if(str.length != 0){
        	str +="&";
        }
        if($( this ).val().length != 0) {
    	
            str += "companies"+"="+$( this ).val();
        }
    });

    if (urlWithParameters.indexOf("?") >= 0 && urlWithParameters.substr(urlWithParameters.length) != "?"){
    	newUrlWithParameters = urlWithParameters+"&"+str;
    }else{
    	if(urlWithParameters.indexOf("?") < 0)
    	{
    		newUrlWithParameters = urlWithParameters+"?"+str;
    		
    	}else{
    		newUrlWithParameters = urlWithParameters+str;
    	}    	
   
    	
    }

    
    //newUrlWithParameters = newUrlWithParameters.replace(/\&{2}/g, '&');
    newUrlWithParameters = newUrlWithParameters.replace(/(\&)+/g, '&');  
    window.location = newUrlWithParameters;
});
</script>
