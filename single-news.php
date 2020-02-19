<?php
	/**
	 * @package WordPress
	 * @subpackage CloudCraze
	 */

	update_option('current_page_template','single');
	include ("includes/page.header.php");
	@include locate_template('template-parts/section-title.php');
	?>

	<?php $postType = get_post_type(get_the_ID());?>



	
	<div class="section maincontent">
		<div class="wrapper">
			<div class="row">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php if(!$ban_image_id){ ?>
						<h1 class="pagetitle"><?php the_title(); ?></h1>
						<?php }?>
						<?php /*if($postType == 'news') {?><p><?php the_date('M d, Y', '', ''); ?></p><?php } */?>
						<div class="content flex-2">
							<?php the_content(__('')); ?>

							<?php
							$summary = get_the_excerpt();
							$summary = urlencode ( $summary );
							$title = get_the_title();
							$title = urlencode ( $title );
							$source = get_bloginfo('name');
							$source = urlencode ( $source );
							$permalink = get_permalink();
							?>
							<div class="socialshare">
								<div class="label">Share this Article: </div><!-- end label -->
								<a class='facebook' href='https://www.facebook.com/sharer/sharer.php?u=<?=$permalink ?>' target='_blank' alt="Share on Facebook"><?=svg('#'.'Facebook',1,0,0);?></a>
								<a class='twitter' href='https://twitter.com/intent/tweet?source=webclient&amp;text=<?php the_title(); ?> <?php the_permalink() ?>' target='_blank'><?=svg('#'.'Twitter',1,0,0);?></a>
								<a class='linkedin' href='http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink() ?>&amp;title=<?=$title?>&amp;summary=<?=$summary?>&amp;source=<?=$source?>' target='_blank'><?=svg('#'.'LinkedIn',1,0,0);?></a>
							</div>
							
						<?php endwhile; else: endif; ?>
					</div> 
					<!-- <div class="sidebar flex-1">
						<div class="form">
							<h3>Stay Informed</h3>

							
							<iframe src="https://go.pardot.com/l/66552/2018-05-06/bgd87t" width="100%" height="836" type="text/html" frameborder="0" allowTransparency="true"></iframe>
						</div>
					</div> -->

				</div>  <!-- END .wrapper -->


			</div>  <!-- END .section full maincontent -->

			<?php if($meta['events_options_form'][0] && $meta['events_options_form'][0] != 'none'){ ?>
				<div class="section full centered">
					<div class="wrapper">
						<?php if($meta['events_options_formheading'][0]){ ?><h2 class="sectiontitle"><?=$meta['events_options_formheading'][0]?></h2><?php } ?>
						<?php if($meta['events_options_formblurb'][0]){ ?><p class="intro"><?php echo htmlspecialchars_decode($meta['events_options_formblurb'][0]);?></p><?php } ?>
						<div class="formwrap">
							<?php
							$args = array();
							if($meta['events_options_redirect'][0]) $args['redirect'] = $meta['events_options_redirect'][0];
							if($meta['events_options_source'][0]) $args['lead_source'] = $meta['events_options_source'][0];
							?>
							<?=getForm($meta['events_options_form'][0],$args)?>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<?php } ?>
			</div>




			





			<!-- End Template: single.php  -->


			<?php 

			$seeall = true;
			$share = true;
			@include locate_template('template-parts/latest-news.php');
			include ("includes/page.footer.php") ?>
