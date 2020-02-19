<?php
	/**
	 * @package WordPress
	 * @subpackage CloudCraze
	 */

	update_option('current_page_template','archive');
	?>

	<?php include ("includes/page.header.php"); ?>

	<!-- Begin Template: page-archive.php  -->
	<?php $postType = get_post_type(get_the_ID());?>
	<div class="content">
		<div class="wrapper small">
			<div class="section full maincontent">
				<div class="subsection full text">
					<h1 class="pagetitle">
						<?php if ( single_cat_title('', false) ) { single_cat_title( '', true ); }?>
						<?php if ( is_post_type_archive() ) { post_type_archive_title(); }?>
						<?php if ( is_year() ) { get_the_date( 'Y' ); } ?>

					</h1>
				</div>  <!-- END .section full maincontent -->
				<div class="postwrap posts full">
					<?php if($postType == 'events'){
						// echo $postType;

						// $args = array(
						// 	// 'post__not_in' => $events,
						// 	'post_type'      => 'events',

						// 	'meta_key' => 'pardot_form_expire_date', 
						// 	'orderby' => 'meta_value',
						// 	// 'orderby' => 'date',
						// 	'order' => 'DEC',
						// 	'posts_per_page' => -1,


						// );


						$today = date("Y-m-d");			
						$args = array( 
							'post_type'      => 'events',
							'orderby'	=>	'meta_value',
							'order'		=> 'ASC',
							'posts_per_page' => -1,
							'post_status'	=>	'publish',
							'meta_query' => array(
								'relation' => 'AND',
								'greater_equal_today' => array(
									'key' => 'pardot_form_expire_date',
									'value' => $today,
									'compare'	=>	'>=',
								),
								'not_empty' => array(
									'key' => 'pardot_form_expire_date',
									'value' => '',
									'compare'	=>	'NOT IN',
								), 
							),
						);


						$i = 1;
						$query = new WP_Query($args);
						$today = date("Y-m-d");
						while( $query->have_posts() ) : $query->the_post();
							$perma = get_permalink($post->ID);
							?>
							<div class="post post<?=$i?>">
								<div class='feat'>
									<?php if ( has_post_thumbnail() ) {
										echo "<a href='".$perma."' >";
										the_post_thumbnail('page-width-narrow');
										echo '</a>';
									}?>

								</div>
								<div class="content">
									<h2><a href="<?=$perma ?>" ><?php the_title(); ?></a></h2>
									<?php if($postType == 'news') {?><p><?php the_date('M d, Y', '', ''); ?></p><?php } ?>
									<?php if($postType == 'post') {?><p>Written by <?php the_author_posts_link(); ?> | <?php the_date('M d, Y', '', ''); ?></p><?php } ?>
									<p><?php echo get_the_excerpt() ?></p>
									<a class="readmore" href="<?=$perma ?>" >Read More</a>
								</div>
							</div> 
						<?php endwhile;
						wp_reset_postdata();




						$args = array( 
							'post_type'      => 'events',
							'orderby'	=>	'meta_value',
							'order'		=> 'DEC',
							'posts_per_page' => -1,
							'post_status'	=>	'publish',
							'meta_query' => array(
								'relation' => 'AND',
								'greater_equal_today' => array(
									'key' => 'pardot_form_expire_date',
									'value' => $today,
									'compare'	=>	'<',
								),
								'not_empty' => array(
									'key' => 'pardot_form_expire_date',
									'value' => '',
									'compare'	=>	'NOT IN',
								), 
							),
						);


						$query = new WP_Query($args);
						$today = date("Y-m-d");
						while( $query->have_posts() ) : $query->the_post();
							$perma = get_permalink($post->ID);
							?>
							<div class="post post<?=$i?>">
								<div class='feat past'>
									<?php if ( has_post_thumbnail() ) {
										echo "<a href='".$perma."' >";
										the_post_thumbnail('page-width-narrow');
										echo '</a>';
									}?>

								</div>
								<div class="content">
									<h2><a href="<?=$perma ?>" ><?php the_title(); ?></a></h2>
									<?php if($postType == 'news') {?><p><?php the_date('M d, Y', '', ''); ?></p><?php } ?>
									<?php if($postType == 'post') {?><p>Written by <?php the_author_posts_link(); ?> | <?php the_date('M d, Y', '', ''); ?></p><?php } ?>
									<p><?php echo get_the_excerpt() ?></p>
									<a class="readmore" href="<?=$perma ?>" >Read More</a>
								</div>
							</div> 
						<?php endwhile;
						wp_reset_postdata();




						$args = array( 
							'post_type'      => 'events',
							'orderby'	=>	'meta_value',
							'order'		=> 'ASC',
							'posts_per_page' => -1,
							'post_status'	=>	'publish',
							'meta_query' => array(
								
								'not_empty' => array(
									'key' => 'pardot_form_expire_date',
									'value' => '',
									'compare'	=>	'IN',
								), 
							),
						);


						$query = new WP_Query($args);
						$today = date("Y-m-d");
						while( $query->have_posts() ) : $query->the_post();
							$perma = get_permalink($post->ID);
							?>
							<div class="post post<?=$i?>">
								<div class='feat past'>
									<?php if ( has_post_thumbnail() ) {
										echo "<a href='".$perma."' >";
										the_post_thumbnail('page-width-narrow');
										echo '</a>';
									}?>

								</div>
								<div class="content">
									<h2><a href="<?=$perma ?>" ><?php the_title(); ?></a></h2>
									<?php if($postType == 'news') {?><p><?php the_date('M d, Y', '', ''); ?></p><?php } ?>
									<?php if($postType == 'post') {?><p>Written by <?php the_author_posts_link(); ?> | <?php the_date('M d, Y', '', ''); ?></p><?php } ?>
									<p><?php echo get_the_excerpt() ?></p>
									<a class="readmore" href="<?=$perma ?>" >Read More</a>
								</div>
							</div> 
						<?php endwhile;
						wp_reset_postdata();

					}


					?>



					<?php if($postType !== 'events'): ?>
						<?php

						$i=1;
						if (have_posts()) : while (have_posts()) : the_post();
							$perma = get_permalink($post->ID);
							?>


							<div class="post post<?=$i?>">
								<div class='feat'>
									<?php if ( has_post_thumbnail() ) {
										echo "<a href='".$perma."' >";
										the_post_thumbnail('page-width-narrow');
										echo '</a>';
									}?>

								</div>
								<div class="content">
									<h2><a href="<?=$perma ?>" ><?php the_title(); ?></a></h2>
									<?php if($postType == 'news') {?><p><?php the_date('M d, Y', '', ''); ?></p><?php } ?>
									<?php if($postType == 'post') {?><p>Written by <?php the_author_posts_link(); ?> | <?php the_date('M d, Y', '', ''); ?></p><?php } ?>
									<p><?php echo get_the_excerpt() ?></p>
									<a class="readmore" href="<?=$perma ?>" >Read More</a>
								</div>
							</div>

							<?php
							$i++;
						endwhile;
					endif;

				endif;
				?>
				<?php
				if($postType !== 'events'){
					global $wp_query;
							$big = 999999999; // need an unlikely integer
							$pagination = paginate_links( array(
								'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
								'format' => '?paged=%#%',
								'current' => max( 1, get_query_var('paged') ),
								'total' => $wp_query->max_num_pages,
								'type' => 'array'
							) );
							if($pagination){
								echo "<div class='section full pagination'>";
								foreach ($pagination as $page) {
									echo $page;
								}
								echo "</div><!-- section full pagination -->";
							}
						}
						?>
					</div>  <!-- END postwrap posts full -->
				</div>  <!-- END .section threequarter -->
				<div class="section onequarter right sidebar">
					<div class="full widgets list">
					</div>  <!-- END .section -->
				</div>  <!-- END .section onequarter -->
			</div>  <!-- END .wrapper -->

		</div>  <!-- END #content -->

		<!-- End Template: page.php  -->

		<?php include ("includes/page.footer.php") ?>
