<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<title>page2</title>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="css/grid.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/bootstrap-select.min.js" type="text/javascript"></script>

<script type="text/javascript">
        $(window).on('load', function () {
            $('.selectpicker').selectpicker({
                'selectedText': 'test1',
				liveSearch:false
            });
            // $('.selectpicker').selectpicker('hide');
        });
		
</script>
</head>

<body>

<section class="col-lg-4 col-sm-6 login clearfix">
<div class="after-login-block col-lg-12">
	<p class="login-title">Select the best options below</p>
    <p class="login-title2">(and don't worry much about this)</p>
    <form method="post" action="<?php echo elgg_get_site_url()."home";?>">
       <?php echo elgg_view("input/register_form",$vars); ?>
    <input type="submit" value="Finish" name="" class="submit-btn"/>
   
    
    </form>           
</div>
</section>
</body>
</html>