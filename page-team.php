<?php
/**
 * @package WordPress
 * @subpackage CloudCraze
 * Template Name:Page Team
 */
update_option('current_page_template','page-team');
include ("includes/page.header.php");
@include locate_template('template-parts/section-title.php');
?>

<?php

global $count;
$count[] = '';


$myvals = get_post_meta($post->ID, false);
foreach($myvals as $key=>$val){
	// echo $key . ' - ' . $val[0] . '<br>';
}
?>

<!-- Begin Template: page-wide.php  -->

<div class="content">
	<div class="wrapper">
		<?php if(strlen(get_the_content()) > 0){ ?>
		<div class="section full text">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php the_content(__('')); ?>
			<?php endwhile; else: endif; ?>
		</div>  <!-- END .section full text -->
		<?php } ?>


		
		<?php

		$args = array(
			'titlecount'    => 100,
			'class'         => '',
			'rowcnt'		=> false,
			'image'			=> 'resource-grid',
			'postclass'		=> 'profile',
			'title' 		=> 'h3',
			'termTags' 		=> true,
			'label' 	    => 'resource_types',
			'args' 			=> array(
				'posts_per_page' => '-1',
				'post_type' => 'team',
				'orderby' => 'menu_order',
				'order' => 'ASC',
			)
		);

					// echo buildLoop($args);


		$args = array( 
			'post_type' => 'team',
			'order'          => 'ASC',
			'orderby'        => 'menu_order',
			'posts_per_page' => -1,
			'post_status'	=>	'publish',


		);

		$query = new WP_Query( $args);


		if( $query->have_posts() ):?>
		
		<div class="section teamgallery row-3 alt">
			<?php while( $query->have_posts() ) : $query->the_post();
			$img = get_the_post_thumbnail_url(get_the_ID(), 'banner-large');
			?>
			<div class="team">
				
				<a href="<?=get_the_permalink();?>">
					<div class="nooverflow">
						<div class="bgimg" style="background-image:url(<?=$img;?>);"></div>

						<div class="content">
							<h3 class="large-light"><?=get_post_meta(get_the_ID(),'seometa_banner_description',true);?></h3>
							<p class="readmore">Read His Full Bio</p>
						</div>
					</div>
					<div class="info"><h3 class="label"><?=get_the_title();?><span> // <?=get_post_meta( $id, 'team_options_position', true );?></span></h3></div>
					
				</a>
			</div>

			<div class="contentbox">
				<div class="section wrapper row">
					<div class="flex-1">
						<?=getImage(get_the_ID(),'profile','profile',true);?>
					</div>
					<div class="content flex-1">
						<h3><?=get_the_title();?><span> // <?=get_post_meta( get_the_ID(), 'team_options_position', true );?></span></h3>
						<?=wpautop(get_the_content());?>
					</div>
				</div>
			</div>
			<?php
		endwhile;
	endif;

	?>
</div>
</div>  <!-- END .wrapper -->
</div>  <!-- END #content -->


<!-- End Template: page-wide.php  -->

<?php include ("includes/page.footer.php") ?>
