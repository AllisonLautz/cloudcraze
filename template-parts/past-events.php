<?php /* events */

$args = array(

	'post_type'      => 'events',
	'orderby'	=>	'meta_value',
	'order'		=> 'DEC',
	'posts_per_page' => 8,
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

		'under_year_old' => array(
			'key' => 'pardot_form_expire_date',
			'value' => $end,
			'compare'	=>	'>=',
		), 

	),

);



$query = new WP_Query( $args );

if($query->have_posts()):

	$postType = get_post_type(get_the_ID());

	$name = get_post_type_object($postType);
	$name = $name->labels->name;

	?>



	<div class="section white">
		<div class="wrapper animate">
			<h2 class="sectiontitle">Past events</h2>
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

		</div>
	</div>
<?php endif; wp_reset_postdata();?>