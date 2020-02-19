<?php
/**
 * @package WordPress
 * @subpackage CloudCraze
 
 */

update_option('current_page_template','page');
?>

<?php include ("includes/page.header.php");

@include locate_template('template-parts/section-title.php');
?>

<!-- Begin Template: page.php  -->

<?php




$args = array( 
	'connected_type' => 'ctas',
	'connected_items' => $post->ID,
	'posts_per_page' => -1,
	'post_status'	=>	'publish',
);

$query = new WP_Query( $args );





if(meta('section_maincontent') || have_posts()):

	if(meta('pardot_form_url') && meta('pardot_form_position') !== 'Bottom' || meta('footer_cta') && meta('cta_position') !== 'Bottom'|| $query->have_posts()){
		$class = 'flex';
	}
	else{
		$class = 'small';
	}


	
	?>

	<div class="section maincontent graylt">
		<div class="wrapper row animate <?=$class;?>">
			<?php 
			if ( ! post_password_required() ) {
				if(meta('section_maincontent')):
					echo '<div class="content flex-2">';
					echo wpautop(meta('section_maincontent'));
					echo '</div>';
				elseif (have_posts()) : 
					while (have_posts()) : the_post();
						echo '<div class="content flex-2">';
						echo wpautop(get_the_content(__(''))); 
						echo '</div>'; 
					endwhile;

				endif; 
			}
			elseif ( have_posts() ) {
				while ( have_posts() ) {
					the_post(); 
					echo '<div class="content flex-2">';
					echo get_the_content();
					echo '</div>';
					
				}
			}




			?>
			<!-- </div> -->


			<?php if(meta('pardot_form_url') && meta('pardot_form_position') !== 'Bottom' || meta('footer_cta') && meta('cta_position') !== 'Bottom' || $query->have_posts()):?>
			<div class="sidebar flex-1">
				<div class="sticky">
					<?php if(meta('pardot_form_url')):?>
						<div class="form">
							<?php 
							if(meta('pardot_form_heading')){echo '<h3>'.meta('pardot_form_heading').'</h3>';}
							if(meta('pardot_form_blurb')){echo wpautop(meta('pardot_form_blurb'));}
							if(meta('pardot_form_lead_source')){
								$leadsource = '?Content_Download='.meta('pardot_form_lead_source');
							}
							else{
								$leadsource = '';
							}

							if(meta('pardot_form_asset')){$download = '&amp;Download_Link='.meta('pardot_form_asset');}

							echo '<iframe src="'.meta('pardot_form_url').$leadsource.$download.'" width="100%" height="836" type="text/html" frameborder="0" allowTransparency="true"></iframe>';?>
						</div>


					<?php endif;

					if (meta('footer_cta') && meta('cta_position') !== 'Bottom'): ?>

						<!-- <div class="cta"> -->
							<?=meta('footer_cta');?>
							<!-- </div> -->

						<?php endif;
						if($query->have_posts() ):
							while( $query->have_posts() ) : $query->the_post();?>

								<div class="cta">
									<?=wpautop(meta('call_to_action'));?>
								</div>

							<?php endwhile;
						endif;?>

					</div>
				</div>
			<?php endif;?>

			<?php if(meta('pardot_form_url') && meta('pardot_form_position') == 'Bottom'):?>
			<div class="form bottom">
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

				echo '<iframe src="'.meta('pardot_form_url').$leadsource.$download.'" width="100%" type="text/html" frameborder="0" allowTransparency="true"></iframe>';?>
			</div>
		<?php endif;?>
	</div>
</div>



<?php endif;?>





<?php if(meta('footer_cta')	&& meta('cta_position') !== 'Sidebar'):?>

<div class="section footercta">
	<div class="wrapper">
		<?=meta('footer_cta');?>
	</div>
</div>
<?php endif;?>


<?php include (get_template_directory().'/includes/page.related-content.php'); ?>

<!-- End Template: page.php  -->
<?php include ("includes/page.footer.php") ?>