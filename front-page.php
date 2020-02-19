<?php
/**
 * @package WordPress
 * @subpackage CloudCraze
 * Template Name:Page Home
 */
update_option('current_page_template','front-page');
?>

<?php include ("includes/page.header.php"); ?>

<!-- Begin Template: front-page.php  -->




<div class="content homepage">

	<?php @include locate_template('template-parts/section-title.php');?>


	


	<?php if ($meta['homepage_announcement_title'][0] || $meta['homepage_announcement_intro'][0]  ): ?>

		<div class="announcement">
			<div class="wrapper">

				<img src="/wp-content/uploads/2018/04/cc-sf.svg" class="logo" alt="CloudCraze + Salesforce">


				<div class="content">
					<p class="large-light"><?=$meta['homepage_announcement_title'][0]?></p>
					<?php if ($meta['homepage_announcement_anchor'][0]): ?>
						<a class="readmore" href="<?=$meta['homepage_announcement_anchor'][0]?>"><?=$meta['homepage_announcement_button_text'][0]?></a>
					<?php endif;?>
				</div>
			</div>

		</div>
	<?php endif;?>




	<?php /* customers */
	$args = array( 
		'post_type' => 'customer',
		'order'          => 'ASC',
		'orderby'        => 'menu_order',
		'posts_per_page' => 3,
		'post_status'	=>	'publish',

	);
	$query = new WP_Query( $args );
	if( $query->have_posts() ):

		?>
		<div class="section customers">

			<div class="wrapper animate">


				

				<div class="content">
					<h2 class="sectiontitle"><?=$meta['homepage_clients_title'][0]?></h2>
					<p class="intro"><?=$meta['homepage_clients_intro'][0]?></p>
					<a class="button" href="<?=$meta['homepage_clients_anchor'][0]?>"><?=$meta['homepage_clients_button_text'][0]?></a>
				</div>
				<div class="cards row-4">

					<?php while( $query->have_posts() ) : $query->the_post();?>

						<?php

						if(get_the_post_thumbnail_url(get_the_ID(), 'banner-large')){
							$img = get_the_post_thumbnail_url(get_the_ID(), 'banner-small');
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
						
						<?php 
						echo '<div class="card';					
						if (get_post_meta($id, 'customer_options_disable', true) == 'on'){
							echo ' nolink';
						}
						echo '">';?>


						<div class="logocontainer">
							<img class="customerlogo" src="<?=$logo[0];?>">
						</div>
						<?php if (get_post_meta($id, 'customer_options_disable', true) !== 'on'){
							echo '<a href="'.get_the_permalink(get_the_ID()).'">';
						}?>
						<div class="bgimg" data-src="<?=$img;?>"></div>
						<div class="content">
							<h3 class="large-light"><?=get_the_title();?></h3>
							<p class="readmore">View Customer Story</p>
						</div>
						<?php if (get_post_meta($id, 'customer_options_disable', true) !== 'on'){
							echo '</a>';
						}?>

					</div>

				<?php endwhile;?>

				<div class="card wide">
					<div class="logo"></div>
					<div class="bgimg" style="background-image:url(<?=get_template_directory_uri();?>/img/customers-video.jpg);"></div>
					<div class="content">
						<h3>Hear from Our Customers</h3>
						<a class="play" href="<?=$meta['homepage_clients_video'][0];?>"><?=svg('#play',1,0,'play button')?></a>
						<!-- <iframe src="https://player.vimeo.com/video/223324805?playsinline=0" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe> -->
					</div>
				</div>




			</div>




			<?php 


			if ($meta['solutions_customers_button'][0]){
				echo $meta['solutions_customers_button'][0];
			}?>


		</div>
	</div>

<?php endif;?>

<?php
$args = array( 
	'post_type' => 'resource',
	'order'          => 'ASC',
	'orderby'        => 'menu_order',
	'posts_per_page' => 8,
	'post_status'	=>	'publish',
	'tax_query'	=>	array(
				// 'relation'	=>	'NOT IN',
		array(
			'taxonomy' => 'resource_types',
			'field'    => 'slug',
			'terms'    => 'hide',
			'operator' => 'NOT IN',
		),
	),

);


$query = new WP_Query( $args );

if($query->have_posts()):?>

<div class="section resources">
	<div class="wrapper animate">
		<h2 class="sectiontitle"><?=$meta['homepage_resource_title'][0]?></h2>
		<p class="intro"><?=$meta['homepage_resource_intro'][0]?></p>
	</div>
	<div class="wrap">
		<div class="resources animate">


			<?php while( $query->have_posts() ) : $query->the_post();?>

				<?php

				$img = get_the_post_thumbnail_url(get_the_ID(), 'banner-large');
				$industry = str_replace(' ', '-', getTerms('industry'));
				$resource = str_replace(' ', '-', getTerms('resource_types'));
				$override = get_post_type($id).'_options_override';

				$id = get_post_meta(get_the_ID(),$override,true);
				if(get_post_thumbnail_id()){
					$featimage = wp_get_attachment_image_src(get_post_thumbnail_id($id),'banner-small', true)[0];
				}
				else{
					$featimage = get_template_directory_uri().'/img/resource_texture.png';
				}


				?>
				<div class="card resource type-<?=strtolower($resource);?> <?='type-'.strtolower($industry);?>">
					<a href="<?=get_the_permalink(get_the_ID());?>">
						<div class="bgimg" data-src="<?=$featimage;?>"></div>
						<div class="content">
							<h3 class="large-light"><?=get_the_title();?></h3>
							<?php 

							$terms = get_the_terms(get_the_ID(), 'resource_types');
							foreach ($terms as $term) {
								$output = $term->name;
								if($output == 'Webinar' || $output == 'Video' || $output == 'Video Case Study'){
									$verb = 'View';
								}
								else{
									$verb = 'Read';
								}
							}

							echo '<p class="readmore">'.$verb .' the '.$output.'</p>';								

							?>
						</div>
						<div class="label"><?=getTerms('resource_types');?></div>

					</a>
				</div>

			<?php endwhile;?>

		</div>
	</div>

</div>
<?php 
endif;
wp_reset_postdata();
?>

<?php /* products */ ?>
<div class="section products devices">
	<div class="animate row-2">
		<div class="slidein">
			<?php
			if(meta('homepage_products_image')){
				foreach(meta('homepage_products_image') as $key=>$val):
					$p_img = wp_get_attachment_url($val);
					echo '<a class="youtube alt" href='.meta('homepage_products_anchor').'"><img class="bgimg" src="'.$p_img.'">'.svg('#play',1,0,'play button').'</a>';
				endforeach;
			}
			;?>

		</div>
		<div class="content">
			<div class="wrapper right">
				<h2 class="sectiontitle"><?=$meta['homepage_products_title'][0] ?></h2>
				<p class="intro"><?=$meta['homepage_products_intro'][0] ?></p>
				<a class="youtube button" href="<?=$meta['homepage_products_anchor'][0] ?>">
					<?=$meta['homepage_products_button_text'][0] ?>
				</a>
			</div>
		</div>
	</div>
</div>

<?php /* cta */ ?>
<?php



$desktop_bottom_right     = wp_get_attachment_image_src(meta('homepage_cta_image')[0],'desktop-bottom-right', true)[0];
$tablet_bottom_right     = wp_get_attachment_image_src(meta('homepage_cta_image')[0],'tablet-bottom-right', true)[0];
$mobile_bottom_right     = wp_get_attachment_image_src(meta('homepage_cta_image')[0],'mobile-bottom-right', true)[0];


$largecss  = ".footercta".'{background-image:url('.$desktop_bottom_right.');}';
$tabletcss = ".footercta".'{background-image:url('.$tablet_bottom_right.');}';
$mobilecss = ".footercta".'{background-image:url('.$mobile_bottom_right.');}';


echo '<style>'.$largecss.'@media (max-width: 1024px) {'.$tabletcss.'}@media (max-width: 600px) {'.$mobilecss.'}</style>';

?>
<div class="section footercta">
	<div class="wrapper animate">
		<h2><?=$meta['homepage_cta_title'][0]?></h2>
		<a class="button" href="<?=$meta['homepage_cta_anchor'][0] ?>"><?=$meta['homepage_cta_button_text'][0] ?></a>
	</div>
</div>


<?php /* features */ ?>

<div class="section icons">
	<div class="wrapper animate">
		<h2 class="sectiontitle"><?=htmlspecialchars_decode($meta['homepage_features_title'][0])?></h2>
	</div>
	<div class="wrapper animate row-3 alt">
		<?php


		$icons = meta('homepage_feat_icons');
		if($icons){
			foreach($icons as $key=>$val):
				$title = get_post_meta($post->ID, 'industry_icons_title', true);
				$desc = get_post_meta($post->ID, 'industry_icons_desc', true);
				$img = wp_get_attachment_image_src($val, 'homepage_feat_icons', true)[0];
				echo '<div class="icon wide">
				<img class="svg" src="'.$img.'">
				<div class="content">
				<h3>'.$title[$key].'</h3>
				'.wpautop($desc[$key]).'
				</div>
				</div>';
			endforeach;
		}



		// $i = 1;
		// while ($i <= 3) {
		// 	echo '<div class="icon wide"><div class="svg">'.svg('#'.$meta['homepage_features_feat_'.$i.'_icon'][0],1,0,$meta['homepage_features_feat_'.$i.'_title'][0]).'</div><div class="content"><h3>'.$meta['homepage_features_feat_'.$i.'_title'][0].'</h3><p class="intro">'.$meta['homepage_features_feat_'.$i.'_desc'][0].'</p></div></div>';
		// 	$i++;
		// }
		?>
	</div>
	<div class="wrapper">
		<div class="buttonwrap">
			<a class="button animate" href="<?=$meta['homepage_features_anchor'][0] ?>"><?=$meta['homepage_features_button_text'][0] ?></a>
		</div>
	</div>
</div>



<?php /* news */
$seeall = true;
$share = false;
@include locate_template('template-parts/latest-news.php');

?>






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

<div class="section blog">
	<div class="wrapper animate">
		<h2 class="sectiontitle"><?=$meta['homepage_feeds_resource_title'][0] ?></h2>
		<div class="list row-2 alt">


			<?php while( $query->have_posts() ) : $query->the_post();?>

				<?php

				$img = get_the_post_thumbnail_url(get_the_ID(), 'banner-small');
				$override = get_post_type($id).'_options_override';

				$id = get_post_meta(get_the_ID(),$override,true);
				if(get_post_thumbnail_id()){
					$featimage = wp_get_attachment_image_src(get_post_thumbnail_id($id),'logo', true)[0];
				}
				else{
					$featimage = get_template_directory_uri().'/img/resource_texture.png';
				}


				?>

				<div class="item blog">
					<a href="<?=get_the_permalink(get_the_ID());?>">
						<div class="bgimg" data-src="<?=$featimage;?>"></div>
						<div class="content">
							<p class="label-small"><?=get_the_date();?></p>
							<h3 class="large-light"><?=wp_trim_words(get_the_title(), 6);?></h3>

						</div>
					</a>
				</div>

			<?php endwhile;?>

		</div>
		
		<a class="button" href="<?=$meta['homepage_feeds_resource_anchor'][0] ?>"><?=$meta['homepage_feeds_resource_button_text'][0] ?></a>
		
	</div>
</div>
<?php endif; wp_reset_postdata();?>





</div>  <!-- END #content -->


<?php $meta['sidebar_sidebar_footer'][0] = 'hide' ?>
<?php include ("includes/page.footer.php") ?>
