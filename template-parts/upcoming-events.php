<?php /* events */
$today = date("Y-m-d");
$end = date('Y-m-d', strtotime('-1 years'));
$args = array( 
	'post_type'      => 'events',
	'orderby'	=>	'meta_value',
	'order'		=> 'ASC',
	'posts_per_page' =>	-1,
	'paged'	=>	false,
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


$query = new WP_Query( $args );

if($query->have_posts()):

	$postType = get_post_type(get_the_ID());

	$name = get_post_type_object($postType);
	$name = $name->labels->name;
	if($query->found_posts % 3 == 2){$odd = ' odd';}
	?>



	<div class="section graylt">
		<div class="wrapper animate">
			<h2 class="sectiontitle">Upcoming events</h2>
			<div class="posts featured events row-3 alt<?=$odd;?>">


				<?php while( $query->have_posts() ) : $query->the_post();?>

					<?php




					$crop = meta('main_disable') ? ' crop' : false;
					$img = get_the_post_thumbnail_url(get_the_ID(), 'resource');
					$override = get_post_type($id).'_options_override';

					$id = get_post_meta(get_the_ID(),$override,true);
					if(get_post_thumbnail_id()){
						$featimage = wp_get_attachment_image_src(get_post_thumbnail_id($id),'resource', true)[0];
					}
					else{
						$featimage = get_template_directory_uri().'/img/resource_texture.png';
					}


					?>

					<div class="post events<?=$crop;?>">
						<a href="<?=get_the_permalink(get_the_ID());?>">
							<div class="bgimg" style="background-image:url(<?=$featimage;?>);"></div>
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