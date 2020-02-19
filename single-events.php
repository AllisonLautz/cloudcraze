<?php
	/**
	 * @package WordPress
	 * @subpackage CloudCraze
	 */

	update_option('current_page_template','page-dreamforce');
	include ("includes/page.header.php");
	@include locate_template('template-parts/section-title.php');
	?>


	<!-- Begin Template: single.php  -->
	<?php $postType = get_post_type(get_the_ID());?>

	<?php /* if logos  */ ?>

	<?php if($meta['industry_logos'][0]):?>
		<div class="section carousel events logos">
			<div class="wrapper wide">
				<?php
				$logos = get_post_meta($post->ID, 'industry_logos', true);

				if(count($logos) > 7){
					$n = 7;
				}
				else{
					$n = count($logos);
				}
				
				?>
				<div class="slideshow cycle-slideshow"

				data-cycle-swipe=true
				data-cycle-swipe-fx=scrollHorz
				data-cycle-slides="> div"
				data-cycle-timeout="0"
				data-cycle-prev=".controls.prev"
				data-cycle-next=".controls.next"
				data-cycle-fx="carousel"
				data-cycle-carousel-visible="<?=$n;?>"
				data-cycle-carousel-fluid=true
				data-allow-wrap="true"

				>
				<?php
				foreach($logos as $key=>$val):
					$icon = wp_get_attachment_image_src($val, 'full', true);

					echo '<div><img src="'.$icon[0].'"></div>';
					$metadata =  wp_get_attachment_metadata($val);
				endforeach;
				?>
			</div> 
			<?php if (count($logos) > 7) : ?>
				<!-- <div class="controls"> -->
					<div class="controls prev"><?=svg('#arrow-left',1,0,'previous')?></div>
					<div class="controls next"><?=svg('#arrow-right',1,0,'next')?></div>
					<!-- </div> -->
				<?php endif;?>
			</div> 
		</div>
	<?php endif;?>


	<?php 
	$today = date("Y-m-d");
	$expire = meta('pardot_form_expire_date');
	
	if(meta('section_maincontent') || have_posts()):

		if(meta('pardot_form_url') && meta('pardot_form_position') !== 'Bottom' &&  $today < $expire || !$expire){
			$class = 'row';
		}
		else{
			$class = 'small';
		}


		?>

		<div class="section maincontent">
			<div class="wrapper <?=$class;?>">
				<div class="content flex-2">
					<?php if(!$ban_image_id):?>
						<div class="title animate">
							<?=$title;?>
						</div>
					<?php endif;

					if(meta('section_maincontent')):
						echo wpautop(meta('section_maincontent'));
					elseif (have_posts()) : 
						while (have_posts()) : the_post();
							echo wpautop(get_the_content(__(''))); 
						endwhile; 
					endif; 
					?>
				</div>
				<?php if(meta('pardot_form_url') &&  $today < $expire || !$expire):?>
					<div class="<?=strtolower(meta('pardot_form_position'));?> flex-1">
						<div class="form">
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
					</div>
				<?php endif;?>
			</div>
		</div>

	<?php endif;?>



	<?php include (get_template_directory().'/includes/page.related-content.php'); ?>
	<!-- End Template: single.php  -->


	<?php include ("includes/page.footer.php") ?>
