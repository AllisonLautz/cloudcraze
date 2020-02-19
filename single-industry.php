<?php
/**
 * @package WordPress
 * @subpackage CloudCraze
 */

update_option('current_page_template','single-industry');
include ("includes/page.header.php");
@include locate_template('template-parts/section-title.php');


?>

<?php /* if logos  */ ?>

<?php if($meta['industry_logos'][0]):?>
	<div class="section carousel industry logos">
		<div class="wrapper">
			<?php
			$logos = get_post_meta($post->ID, 'industry_logos', true);

			if(count($logos) > 4){
				$n = 4;
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
		<?php if (count($logos) > 4) : ?>
			<!-- <div class="controls"> -->
				<div class="controls prev"><?=svg('#arrow-left',1,0,'previous')?></div>
				<div class="controls next"><?=svg('#arrow-right',1,0,'next')?></div>
				<!-- </div> -->
			<?php endif;?>
		</div> 
	</div>
<?php endif;?>



<?php if($meta['industry_content'][0]){
	echo '<div class="section">
	<div class="wrapper center small animate">
	' . wpautop($meta['industry_content'][0]) . '
	</div>
	</div>';
}?>


<?php if($meta['industry_icons_desc'][0]):?>
	<div class="section industry icons graylt">
		<?php 

		$icons = get_post_meta($post->ID, 'industry_icons', true);

		if(is_int(count($icons)/3)){
			$n = '3';
		}
		else{
			$n = '4';
		}
		?>
		<div class="wrapper row-<?=$n;?> alt animate">

				<?php // if((count($icons)/3))
				foreach($icons as $key=>$val):
					$i_title = get_post_meta($post->ID, 'industry_icons_title', true);
					$i_desc = get_post_meta($post->ID, 'industry_icons_desc', true);

					$img = wp_get_attachment_image_src($val, 'full', true);
					?>


					<div class="icon">
						<img class="svg" src="<?=$img[0]; ?>">
						<div class="content">
							<h3><?=$i_title[$key];?></h3>
							<p><?=$i_desc[$key];?></p>
						</div>

					</div>

				<?php endforeach;


				?>
			</div>
		</div>
	<?php endif;?>

	<?php /* if testimonials */

	if($meta['industry_testimonial'][0]):?>
		<div class="section industry testimonial">
			<div class="wrapper small animate">
				<?=wpautop($meta['industry_testimonial'][0]);?>
			</div>

		</div>

	<?php endif;?>




	<?php 
	/* p2p featured customers */



// wp_reset_postdata();
// global $count;
// global $fn;
	?>

	<?php 
	$fn = 'customers_industries';
	$intro = '<h2 class="center">Featured customer stories</h2>';
	$color = ' graylt';
// include (get_template_directory().'/includes/page.related-customers.php'); 

	include(locate_template('includes/page.related-customers.php'));

/*
?>


<div class="section industry customers white">
	<div class="wrapper small animate"><h2 class="center">Featured Customer Stories</h2></div>
	<div class="wrapper animate">
		<?php

		$args = array( 
			'connected_type' => 'customers_industries',
			'connected_items' => $post->ID,
			'posts_per_page' => 4,
			'post_status'	=>	'publish',
		);


		$args_fallback = array( 
			'post_type' => 'customer',
			'order'          => 'ASC',
			'orderby'        => 'menu_order',
			'posts_per_page' => 4,
			'post_status'	=>	'publish',

		);
		if((new WP_Query($args))->have_posts()){
			$query = new WP_Query( $args );
		}
		else{
			$query = new WP_Query( $args_fallback );
		}
		if( $query->have_posts() ):?>

		<div class="customers flex">

			<?php while( $query->have_posts() ) : $query->the_post();?>

				<?php

				if(get_the_post_thumbnail_url(get_the_ID(), 'banner-large')){
					$img = get_the_post_thumbnail_url(get_the_ID(), 'banner-large');
				}
				else{
					$img = get_template_directory_uri().'/img/resource_texture.png';
				}

				if(get_post_meta(get_the_ID(), 'customer_options_logo', true)){
					$logos = get_post_meta(get_the_ID(), 'customer_options_logo', true);
					foreach($logos as $key=>$val):
						$logo = wp_get_attachment_image_src($val, 'large', true);
					endforeach;		
				}
				else{
					$logo = '';
				}

				?>
				<div class="card">

					<div class="logo" style="background-image:url(<?=$logo[0];?>);"></div>
					<a href="<?=get_the_permalink(get_the_ID());?>">
						<div class="bgimg" style="background-image:url(<?=$img;?>);"></div>
						<div class="content">
							<h3 class="large-light"><?=get_the_title();?></h3>
							<p class="readmore">View Customer Story</p>
						</div>
					</a>
				</div>

			<?php endwhile;?>
		</div>


		<?php 
		$count = 1; endif;
		wp_reset_postdata();
		?>


	</div>
</div>
*/?>
<?php $Fn = 'resources_industries';

$color = $count == 1 ? ' graylt' : false;



include (get_template_directory().'/includes/page.related-content.php'); ?>


<?php /* cta */ ?>

<?php



?>

<?php if($meta['industry_cta'][0]) : ?>
	<div class="section industry footercta <?=$color;?> cta">
		<div class="wrapper small row animate">
			<?=wpautop($meta['industry_cta'][0]);?>
		</div>
	</div>

<?php endif;?>

<!-- End Template: single-industry.php  -->


<?php include ("includes/page.footer.php") ?>
