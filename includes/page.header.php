<!doctype html>
<html>
<head>

	<?php
		// retrieve meta array for page

	$meta = get_post_meta(get_the_ID());
	$opt = get_option('theme_settings');
	$scrtOpt = get_option('script_settings');
	$callus = true;
	?>

	<?php
	$page = new theme\page();
	$pageOpt = $page->construct();
	$cta = new theme\cta();
	?>

	<?php
		// default enabled for none lading pages
	if($pageOpt['template'] == 'single-info'){
		echo "<meta name='robots' content='noindex,follow' />";
		if($meta['landing_header_menu'][0] == 'true') $disable['menu'] = false;
		if($meta['landing_header_search'][0] == 'true') $disable['search'] = false;
		if($meta['landing_header_demobtn'][0] == 'true') $disable['demobtn'] = false;
		if($meta['landing_footer_footer-widgets'][0] == 'true') $disable['footer-widgets'] = false;
		if($meta['landing_footer_footer-menu'][0] == 'true') $disable['footer-menu'] = false;

	}
	elseif($pageOpt['template'] != 'single-info'){
		$disable = array(
			'menu' => false,
			'search' => false,
			'footer-widgets' => false,
			'footer-menu' => false,
		);
	}
	if($pageOpt['template'] == 'single-thank-you'){
		echo "<meta name='robots' content='noindex,follow' />";
	}
	?>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Language" content="en" >
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico">


	<?php
	echo "<script src='https://use.typekit.net/jad3ter.js'></script>
	<script>try{Typekit.load({ async: true });}catch(e){}</script>";

	// echo "

	// <!-- tracking script 1: -->
	// <script>
	// (function(d) {
	// 	var config = {
	// 		kitId: 'uec4zun',
	// 		scriptTimeout: 3000,
	// 		async: true
	// 	},
	// 	h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,'')+' wf-inactive';},config.scriptTimeout),tk=d.createElement('script'),f=false,s=d.getElementsByTagName('script')[0],a;h.className+=' wf-loading';tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!='complete'&&a!='loaded')return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
	// })(document);
	// </script>";



	echo "
	<!-- tracking script 2: -->
	<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	ga('create', 'UA-46913305-1', 'auto', {'allowLinker': true});
	ga('require', 'linker');
	ga('linker:autoLink', ['www.go.pardot.com'] );
	ga('send', 'pageview');


	</script>
	";





	$seo = new theme\metas();
	$seoMeta = $seo->construct(get_the_ID());
	echo $seoMeta;
	?>

	<?php wp_head(); ?>


	<?php 
// 	echo "
// 	<script>
// 	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
// 		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
// 		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
// 	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

// 	ga('create', 'UA-46913305-1', 'auto');
// 	ga('require', 'displayfeatures'); 
// 	ga('send', 'pageview');
// </script>";

	?>




</head>



<?php 
//echo '<h1 style="position:fixed;top:50px; left:0; width:100%; z-index:2000; background-color:rebeccapurple; color:white;">'.$_SERVER['HTTP_USER_AGENT'].'</h1>';
// if(strpos($_SERVER['HTTP_USER_AGENT'], 'Trident/6') !== -1): $ie = ' ie'; else: $ie = false; endif;?>




<?php
$bodyClass = get_body_class();


array_push($bodyClass, 'template_'.$pageOpt['template']);
array_push($bodyClass, $meta['tmp_custom_options_class'][0]);


if(strpos($_SERVER['HTTP_USER_AGENT'], 'Trident/6') !== -1){
	// array_push($bodyClass, 'ie');
}

$body_class = '';
foreach($bodyClass as $key=>$val){
	$body_class .= $val . ' ';
}

?>
<body class="<?=$body_class;?>">




	<?php // print_r($pageOpt); ?>

	<div class="mainwrapper">

		<div class="header <?php if ( is_user_logged_in() ) { ?>logedin<?php } ?>">
			<div class="wrapper relative">


				<a class="logo" href="/">
					<?php if(is_front_page()) {
						echo '<img src="'.get_template_directory_uri().'/svg/cloudcraze-a-salesforce-company_logo_white.svg" alt="cloudcraze logo" class="logo_alt">';
					}
					echo '<img src="'.get_template_directory_uri().'/svg/cloudcraze-a-salesforce-company_logo.svg" alt="cloudcraze logo" class="logo_main">';
					?>
				</a>


				
				<?php if($disable['menu'] != true){ ?>
				<div class="bttnmenu"><?=svg('#hamburger',1,'burger','')?><?=svg('#x',1,'x','')?></div>
				<?php };?>
				<div class="row">
					<?php if($disable['menu'] != true){ ?>
					<nav>
						<?php wp_nav_menu( array( 'theme_location' => "MiniNav" , 'menu_class' => 'mininav menu') );?>
						
						<?php

						wp_nav_menu(
							array (
								'theme_location' => 'main-menu',
								'walker'         => new menu_update
							)
						);
						?>
					</nav>
					<?php } ?>

					<?php if($disable['demobtn'] == true){ ?>
					<div class="menu-main-menu-container demobtn">
						<ul id="menu-main-menu" class="menu">
							<li id="menu-item-47" class="button menu-item menu-item-type-post_type menu-item-object-page menu-item-47"><a href="https://www.cloudcraze.com/products/request-a-demo/">Request a Demo</a></li>
						</ul>
					</div>
					<?php } ?>
					<?php if($disable['search'] != true){ ?>
					<div class="widget widget_search">
						<?=svg('#search',1,'search','search icon')?>
						<?php get_search_form(); ?>
					</div>
					<?php } ?>
				</div> 
			</div> 
		</div> 
