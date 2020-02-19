<?php
	/**
	 * @package WordPress
	 * @subpackage CloudCraze
	 */

	update_option('current_page_template','single');
	?>

	<?php include ("includes/page.header.php") ?>
	<?php @include locate_template('template-parts/section-title.php'); ?>

	<!-- Begin Template: single.php  -->
	<?php $postType = get_post_type(get_the_ID());?>
	<div class="content">
		
		<div class="section full maincontent">
			<div class="wrapper small">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php if(!$ban_image_id){ ?>
					<h1 class="pagetitle"><?php the_title(); ?></h1>
					<?php }?>
					<?php if($postType == 'post') {?><p>Written by <?php the_author_posts_link(); ?>, <?=get_the_author_meta('position');?> | <?php the_date('M d, Y', '', ''); ?></p><?php } ?>
					<?php the_content(__('')); ?>

					
				<?php endwhile; else: endif; ?>

				<?=socialshare();?>
			</div>  <!-- END .section full maincontent -->
		</div>  <!-- END .wrapper -->
		<div class="wrapper"></div>

		<?php /* thought leadership (blog posts) */
		$args = array( 
			'post_type' => 'post',
			'order'          => 'DEC',
			'orderby'        => 'date',
			'posts_per_page' => 4,
			'post_status'	=>	'publish',


		);


		$query = new WP_Query( $args );

		if($query->have_posts()):?>

		<div class="section blog graylt">
			<div class="wrapper animate">
				<h2>More Posts</h2>
				<div class="list row-2 alt">


					<?php while( $query->have_posts() ) : $query->the_post();?>

						<?php
						$postType = get_post_type(get_the_ID());

						$name = get_post_type_object($postType);
						$name = $name->labels->name;
						$img = get_the_post_thumbnail_url(get_the_ID(), 'banner-small');
						$override = get_post_type($id).'_options_override';

						$id = get_post_meta(get_the_ID(),$override,true);
						if(get_post_thumbnail_id()){
							$featimage = wp_get_attachment_image_src(get_post_thumbnail_id($id),'banner-large', true)[0];
						}
						else{
							$featimage = get_template_directory_uri().'/img/resource_texture.png';
						}


						?>

						<div class="item blog">
							<a class="flex" href="<?=get_the_permalink(get_the_ID());?>">
								<div class="bgimg" style="background-image:url(<?=$featimage;?>);"></div>
								<div class="content">
									<p class="label-small"><?=get_the_date();?></p>
									<h3 class="large-light"><?=wp_trim_words(get_the_title(), 6);?></h3>

								</div>
							</a>
						</div>

					<?php endwhile;?>

				</div>
				<a class="button" href="<?php echo get_post_type_archive_link($postType); ?>">View All <?=$name?></a>
			</div>
		</div>
	<?php endif; wp_reset_postdata();?>





</div>  <!-- END #content -->


<!-- End Template: single.php  -->


<?php include ("includes/page.footer.php") ?>
