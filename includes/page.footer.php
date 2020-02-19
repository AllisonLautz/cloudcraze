
<!-- Begin Template: footer.php  -->

<?php
$cuc = 'active';
if($callus != false){
	date_default_timezone_set('America/Chicago');
	$day_start = '09:00:00';
	$day_end = '16:59:59';
	$current_time = date('H:i:s'); // For 9-5 hours only
	$current_day = date('N'); // For Monday to Friday only
	if (($current_day <= 5) && ($current_time >= $day_start) && ($current_time <= $day_end)) {
		$callus = '<div class="callus"><a href="tel:8662173210">Call Us Now! (866) 217 3210'.svg('#phone',1,0,'').'</a></div>';
		$cuc = 'active';
	}
	else{
		$callus = '<div class="callus"></div>';
		$cuc = '';
	}
}

?>

<div class="footer">
	<div class="wrapper">
		<div class="widgets row-5">
			<?php if($disable['footer-menu'] != true){ ?>

			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Widgets - Top') ) {} ?>

			<?php } ?>
			<?php if($disable['footer-widgets'] != true){ ?>
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Widgets - Bottom') ) {} ?>
			<?php } ?>

		</div>
		<div class="social">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Social') ) {} ?>
		</div> 
		
	</div>  <!-- END .wrapper -->
	<div class="copy <?=$cuc?>">
		<div class="wrapper">
			<?php $copy = str_replace("[[year]]", date('Y'), $opt['copyright']); ?>
			<p><?php echo 'Copyright &copy; '.date('Y').'. All rights reserved. CloudCraze Software LLC, A Salesforce Company.'?></p>
			<?php wp_nav_menu( array( 'theme_location' => "footer-menu" ) ); ?>
		</div>

	</div>  <!-- END .copy -->
</div>  <!-- END .footer -->
<?=$callus?>


<div class="scriptwrapper" style="display:none;">
	<?php if($scrtOpt['rmrkscrpt']) { ?>
	<!-- Google Code for Remarketing Tag -->
	<script type="text/javascript">
		/* <![CDATA[ */
		var google_conversion_id = <?=$scrtOpt['rmrkscrpt']?>;
		var google_custom_params = window.google_tag_params;
		var google_remarketing_only = true;
		/* ]]> */
	</script>
	<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js"></script>
	<noscript>
		<div style="display:inline;">
			<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/<?=$scrtOpt['rmrkscrpt']?>/?value=0&amp;guid=ON&amp;script=0"/>
		</div>
	</noscript>

	<?php } ?>

	<?php if($scrtOpt['footerscripts']){echo $scrtOpt['footerscripts']; }?>


	

</div>
</div>  <!-- END .mainwrapper -->

<?php wp_footer(); ?>
<!-- 	Include Scripts  -->
<?php include 'page.scripts.php';?>

<script>
	

	if(jQuery('#formheight').length){
		r(function(){

			var title = document.getElementsByTagName("title")[0].innerHTML;
			var forms = document.querySelector('#formheight');
		// console.log('title, forms: ', title, forms)
		for (var i = 0; i < forms.length; i++) {

			forms[i].addEventListener('submit', function() {
				ga('send', 'event', 'Form', 'Submissions', title);
			})
		}
	});
		function r(f){/in/.test(document.readyState)?setTimeout('r('+f+')',9):f()}

	}





</script> 

</body>
</html>