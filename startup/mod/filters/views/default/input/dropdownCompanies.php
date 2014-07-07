<div class="col-lg-8 col-md-6">
	<form class="select-comp mt0 clearfix">
        <?php
            $vars ['class'] = 'selectpicker show-tick form-control';
            echo elgg_view ( 'input/companies', $vars );
        ?>
                	
    </form>
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
