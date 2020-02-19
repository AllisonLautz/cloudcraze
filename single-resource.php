<?php
/**
 * @package WordPress
 * @subpackage CloudCraze
 */

update_option('current_page_template','single-resource');
?>

<?php include ("includes/page.header.php") ?>

<?php @include locate_template('template-parts/section-title.php');



if(meta('section_maincontent')):


	if(meta('pardot_form_url') && meta('pardot_form_position') !== 'Bottom'){
		$class = 'row';
	}
	else{
		$class = 'small';
	}


	?>

	<div class="section maincontent">
		<div class="wrapper animate <?=$class;?>">
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
						the_content(__('')); 
					endwhile; 
				endif; 
				?>
			</div>
			<?php if(meta('pardot_form_url')):?>
				<div class="<?=strtolower(meta('pardot_form_position'));?> flex-1">
					<div class="sticky">
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
				</div>
			<?php endif;?>
		</div>
	</div>

<?php endif;?>




<?php $resource_types = get_the_terms(get_the_ID(),'resource_types'); ?>
<?php $resType =  $resource_types[0]->slug; ?>

<?php
$content_tags = get_the_terms(get_the_ID(),'content_tags');
?>



<?php if ($meta['featured_announcement_title'][0] || $meta['featured_announcement_intro'][0]  ): ?>

	<div class="announcement greendk">
		<div class="wrapper animate">

			<img src="/wp-content/uploads/2018/04/cc-sf.svg" class="logo" alt="CloudCraze + Salesforce">


			<div class="content">
				<p class="large-light"><?=$meta['featured_announcement_title'][0]?></p>
				<?php if ($meta['featured_announcement_anchor'][0]): ?>
					<a class="readmore" href="<?=$meta['featured_announcement_anchor'][0]?>"><?=$meta['featured_announcement_button_text'][0]?></a>
				<?php endif;?>
			</div>
		</div>

	</div>
<?php endif;?>



<?php 
$fn = 'customers_resources';
$color = ' graylt';
include (get_template_directory().'/includes/page.related-customers.php'); ?>





<?php include ("includes/page.footer.php") ?>