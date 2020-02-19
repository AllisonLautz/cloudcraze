<?php
/**
 * @package WordPress
 * @subpackage CloudCraze
 * Template Name:Dreamforce Template
 */
update_option('current_page_template','page-dreamforce');
include ("includes/page.header.php");
@include locate_template('template-parts/section-title.php');
?>


<!-- Begin Template: page-dreamforce.php  -->


<div class="page_dreamforce-sessions">

	

	<div class="maincontent">

		
		<?php 


		$anchors = array(
			'Manufacturing',
			'CPQ',
			'ChannelSales',
			'B2BCommerce',
		);
		for($i = 1; $i < 7; $i++){
			if (meta('dreamforce_section_'.$i.'_video')){
				$imgs = get_post_meta($post->ID, 'dreamforce_section_'.$i.'_image', true);
				foreach($imgs as $key=>$val){
					$img = wp_get_attachment_image_src($val, 'full', true);
				}


				if($i % 2 == 1){
					echo '
					<div class="section graylt devices" id="'.$anchors[$i-1].'">
					<div class="animate row-2">
					<div class="slidein">
					<a class="youtube alt cboxElement" href="'.meta('dreamforce_section_'.$i.'_video').'">
					<img src="'.$img[0].'">
					'.svg('#play',1,0,'play button').'
					</a>
					</div>
					<div class="content">
					<div class="wrapper right">
					<h2 class="sectiontitle">'.meta('dreamforce_section_'.$i.'_title').'</h2>
					<p>'.meta('dreamforce_section_'.$i.'_intro').'</p>
					<a class="youtube button cboxElement" href="'.meta('dreamforce_section_'.$i.'_video').'">Watch Video</a>
					</div>
					</div>
					</div>
					</div>';
				}
				else{
					echo '
					<div class="section devices reverse" id="'.$anchors[$i-1].'">
					<div class="animate row-2">

					<div class="content">
					<div class="wrapper">
					<h2 class="sectiontitle">'.meta('dreamforce_section_'.$i.'_title').'</h2>
					<p>'.meta('dreamforce_section_'.$i.'_intro').'</p>
					<a class="youtube button cboxElement" href="'.meta('dreamforce_section_'.$i.'_video').'">Watch Video</a>
					</div>
					</div>

					<div class="slidein">
					<a class="youtube alt cboxElement" href="'.meta('dreamforce_section_'.$i.'_video').'">
					<img src="'.$img[0].'">
					'.svg('#play',1,0,'play button').'
					</a>
					</div>
					
					
					</div>
					</div>';
				}
				
			}
		}
		

		?>

		




		<?php 
		$today = date("Y-m-d");
		$expire = meta('pardot_form_expire_date');
		if(meta('pardot_form_url')):?>
			<div class="section centered form <?=strtolower(meta('pardot_form_position'));?>">
				<?php 
				if(meta('pardot_form_heading')){echo '<h3>'.meta('pardot_form_heading').'</h3>';}
				if(meta('pardot_form_blurb')){echo wpautop(meta('pardot_form_blurb'));}
				if(meta('pardot_form_lead_source')){
					$leadsource = '?Content_Download='.meta('pardot_form_lead_source');
				}
				else{
					$leadsource = '?'.basename(get_permalink());
				}

				if(meta('pardot_form_asset')){$download = '&amp;Download_Link='.meta('pardot_form_asset');}

				echo '<iframe src="'.meta('pardot_form_url').$leadsource.$download.'" width="100%" height="836" type="text/html" frameborder="0" allowTransparency="true"></iframe>';?>
			</div>
		<?php endif;?>


	</div>




</div>

<script>
	jQuery(document).ready(function(){
		var hash = window.location.hash.substring(1);
		if(hash){
			var target = jQuery('#'+hash).offset().top;
			var padding = parseInt(jQuery('#'+hash).css('padding-top'));
			var hh = jQuery('.header').outerHeight();
			jQuery('html, body').animate({
				scrollTop: target - padding - hh
			}, 1000);


		}


		jQuery('a[href*="#"]').not('[href="#"]').not('[href="#0"]').click(function(event) {
			event.preventDefault();
			var hash = jQuery(this).attr('href');
			var target = jQuery('.section'+hash).offset().top;
			var padding = parseInt(jQuery('.section'+hash).css('padding-top'));
			var hh = jQuery('.header').outerHeight();
			jQuery('html, body').animate({
				scrollTop: target - padding - hh
			}, 1000);

		});
	})



</script>

<?php include ("includes/page.footer.php") ?>
