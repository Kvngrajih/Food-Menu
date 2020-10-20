<?php require_once("./config.php");

$pgname = explode(".php", basename($_SERVER['PHP_SELF']));
if($pgname[0] == "index") {
    $pagename="home";
} else {
    $pagename= $pgname[0];
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Food Directorate</title>
    <link rel="stylesheet" type="text/css" href="<?=base_url('');?>css/style.css?<?php echo time(); ?>" />
    <link rel="stylesheet" type="text/css" href="<?=base_url('');?>rs-plugin/css/style.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?=base_url('');?>rs-plugin/css/settings.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?=base_url('');?>fontawesome/css/font-awesome.css"/>
    <link rel="stylesheet" type="text/css" href="<?=base_url('');?>css/jquery.timepicker.css" />
	<link rel="shortcut icon" href="<?=base_url('');?>img/fav.png">	
	
    <script src="<?=base_url('');?>js/jquery-1.12.4.js"></script>
    <script src="<?=base_url('');?>js/jquery-ui.js"></script>
	<script src="<?=base_url('');?>rs-plugin/js/jquery.themepunch.tools.min.js"></script>
	<script src="<?=base_url('');?>rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	<script src="<?=base_url('');?>js/jquery.validate.min.js"></script>
	<script src="<?=base_url('');?>js/jquery.inputmask.bundle.js"></script>
	<script src="<?=base_url('');?>js/inputmask.numeric.extensions.js"></script>
	<script src="<?=base_url('');?>js/phone.js"></script>
	<script src="<?=base_url('');?>js/jquery.timepicker.js"></script>
	<script src="<?=base_url('');?>js/pagination.js"></script>
	<script src="<?=base_url('');?>js/custom.js?<?php echo time(); ?>"></script>
	

	<script src="https://maps.google.com/maps/api/js?key=AIzaSyAEDq8M6WsXVmo_08lPapjlqYCFVRBt6ro&libraries=places"></script>
	<script src="js/locationpicker.jquery.js"></script>

	<link rel="stylesheet" type="text/css" href="slick/slick.css">
	<link rel="stylesheet" type="text/css" href="slick/slick-theme.css"> 
	<script src="slick/slick.js" type="text/javascript" charset="utf-8"></script>
	<script>
	jQuery(document).ready(function(){

		jQuery(".quote ul").slick({
		    dots: true,
			arrows: false,
		    infinite: true,
		    centerMode: false,
		    autoplay: true,
			autoplaySpeed: 5000,
		    slidesToShow: 1,
		    slidesToScroll: 1
		});

	});

	//toggle menu
	function openNav() {
		jQuery('#opensidemenu').toggleClass('change');
		jQuery('#mySidenav').toggleClass('toggle');
	}
	</script>

</head>
<body class="<?php echo $pagename; ?>">

<script>
   $(window).load(function() {
     $('#status').fadeOut();
     $('#preloader').delay(350).fadeOut('slow');
     $('body').delay(350).css({'overflow':'visible'});
   })
  </script>

<div id="preloader" align="center">
	<div id="loading">
		<img src="img/loader.gif" alt="Loading.." height="140" />
	</div>
</div>


<header class="siteheader"><div class="wdth">
	<div class="logo left">
		<a href="<?=base_url('');?>"><img src="img/3.png" alt="" /></a>
	</div>
	<div class="right navbar">
		
	</div>
	<div class="clear"></div>
</div>
</header>