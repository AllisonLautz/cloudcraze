<?php
/**
 * @package WordPress
 * @subpackage CloudCraze
 */

update_option('current_page_template','single-customer');
?>

<?php include ("includes/page.header.php") ?>
<?php @include locate_template('template-parts/section-title.php'); ?>


<!-- Begin Template: single-customer.php  -->




<?php if($meta['customer_options_testimonial'][0]):?>
	<div class="section customer testimonial">
		<div class="wrapper animate">
			<?=wpautop($meta['customer_options_testimonial'][0]);?>
		</div>
	</div>
<?php endif;?>




<div class="section">
	<div class="wrapper animate">
		<div class="row">
			<?php 
			
			/*$args = array( 

				'connected_type' => 'customers_resources',
				'connected_items' => $post->ID,
				'posts_per_page' => -1,
				'post_status'	=>	'publish',
			);

			$query = new WP_Query( $args );
			if( $query->have_posts() || getTerms('industry') ) :?>
			<div class="tagged flex-1">
				<ul>
					<?php while( $query->have_posts() ) : $query->the_post();


					

					
					$termlist = wp_get_post_terms(get_the_ID(), 'resource_types', array('fields' => 'all') );
					if (!empty($termlist)){
						foreach($termlist as $term){
							$li = $term->name . ' ';
							$slug = $term->slug;
						}
					}


					if(p2p_get_meta( get_post()->p2p_id, 'override', true )){						
						$li = p2p_get_meta( get_post()->p2p_id, 'override', true );
					}
					
					if(get_post_type(get_the_ID()) == 'post' || get_post_type(get_the_ID()) == 'news'){
						$li = 'News';
						$slug = 'news';
					}

					if($slug == 'case-study' && strtolower($li) !== 'video'){
						$slug = 'search';
					}

					elseif($slug == 'case-study' && strtolower($li) == 'video'){
						$slug = 'video';
					}


					




					if(p2p_get_meta( get_post()->p2p_id, 'link', true )){
						$link = p2p_get_meta( get_post()->p2p_id, 'link', true );
						$target = ' target="_blank"';


						if(p2p_get_meta( get_post()->p2p_id, 'override', true ) && strlen(strtolower('video')) !== -1){

							$class = ' class="play"';
							$link = p2p_get_meta( get_post()->p2p_id, 'link', true ).'?autoplay=1&rel=0';

						}
					}
					else{
						$link = get_the_permalink();
					}



					// echo $li . ' ' . $slug . ' ' .  $link . '<br>';
					echo '<li><a'.$class.' href="'.$link.'"'.$target.'>'.svg('#'.strtolower($slug) ,1,0, $li).'<span>'.$li.'</span></a></li>';


				endwhile;




			endif; 

			wp_reset_postdata();


			$args = array( 

				'connected_type' => 'customers_industries',
				'connected_items' => $post->ID,
				'posts_per_page' => -1,
				'post_status'	=>	'publish',
			);

			$query = new WP_Query( $args );

			if( $query->have_posts()) :?>
		</ul>
		<ul>
			<li class="label">Industry</li>
			<?php while( $query->have_posts() ) : $query->the_post();
			echo '<li><a href="'.get_the_permalink().'">'.get_the_title().'</a></li>';

		endwhile;
	endif;
*/


	?>

	<?php 

	$args = array( 

		'connected_type' => 'customers_resources',
		'connected_items' => $post->ID,
		'posts_per_page' => -1,
		'post_status'	=>	'publish',

				// 'post_type' => array('resource', 'news'),
				// 'order'          => 'DEC',
				// 'orderby'        => 'date',
				// 'posts_per_page' => 4,
				// 'post_status'	=>	'publish',

				// 'tax_query' => array(
				// 	array(
				// 		'taxonomy' => 'customers',
				// 		'field' => 'slug',
				// 		'terms' => get_the_title(),
				// 	),
				// )
	);

	$query = new WP_Query( $args );
	if( $query->have_posts() || getTerms('industry') ) :?>
	<div class="tagged flex-1">
		<ul>
			<?php while( $query->have_posts() ) : $query->the_post();

					// if(p2p_get_meta( get_post()->p2p_id, 'link', true )){
					// 	$tax = 'video';
					// }
			if(get_post_type(get_the_ID()) == 'post' || 'news'){
				$tax = 'News';
			}

			$termlist = wp_get_post_terms(get_the_ID(), 'resource_types', array('fields' => 'all') );
			if (!empty($termlist)){
				foreach($termlist as $term){
					$tax = $term->name . ' ';
				}
			}


			if(p2p_get_meta( get_post()->p2p_id, 'override', true )){
						// $link = '<li><a class="resource '.strtolower(p2p_get_meta( get_post()->p2p_id, 'override', true )).'" href="'.get_the_permalink().'">';
				$slug = str_replace(' ', '-', strtolower(p2p_get_meta( get_post()->p2p_id, 'override', true )));
				$type = p2p_get_meta( get_post()->p2p_id, 'override', true );
			}

			else{
				// $class = taxes('slug'); //strtolower($tax); 
				// $type = taxes('name'); // $tax;


				$termlist = wp_get_post_terms(get_the_ID(), 'resource_types', array('fields' => 'all') );
				if (!empty($termlist)){
					foreach($termlist as $term){
						$type = $term->name . ' ';
						$slug = $term->slug;
					}
				}
			}


			if($slug == 'video-testimonial'){$slug = 'video';}
			elseif($slug == 'fact-sheet'){$slug = 'press-release';}

			if(p2p_get_meta( get_post()->p2p_id, 'link', true )){
				$link = p2p_get_meta( get_post()->p2p_id, 'link', true );
				$target = ' target="_blank"';


				if(p2p_get_meta( get_post()->p2p_id, 'override', true ) && strlen(strtolower('video')) !== -1){
					$class .= ' play ';
					$link = p2p_get_meta( get_post()->p2p_id, 'link', true ).'?autoplay=1&rel=0';

				}
			}
			else{
				$link = get_the_permalink();
			}

			// echo '<li><a class="resource '.$class.'" href="'.$link.'"'.$target.'>'.$type.'</a></li>';

			echo '<li><a class="'.$slug.'" href="'.$link.'"'.$target.'>'.svg('#'.$slug ,1,0, $type).'<span>'.$type.'</span></a></li>';
		endwhile;
	endif; 

	wp_reset_postdata();


	$args = array( 

		'connected_type' => 'customers_industries',
		'connected_items' => $post->ID,
		'posts_per_page' => -1,
		'post_status'	=>	'publish',
	);

	$query = new WP_Query( $args );

	if( $query->have_posts()) :?>
</ul>
<ul>
	<li class="label">Industry</li>
	<?php while( $query->have_posts() ) : $query->the_post();
	echo '<li><a href="'.get_the_permalink().'">'.get_the_title().'</a></li>';

endwhile;
endif;


			// $termlist = wp_get_post_terms(get_the_ID(), 'industry', array('fields' => 'all') );
			// if (!empty($termlist)){
			// 	echo '</ul><ul>';
			// 	echo '<li class="label">Industry</li>';
			// 	foreach($termlist as $term){
			// 		$industry = strtolower($term->name);
			// 		echo '<li><a href="/industry/'.strtolower(str_replace(' ', '-', $industry)).'">'.$industry.'</a></li>';

			// 	}

			// }
?>
</ul>
</div>
<div class="content flex-2">
	<?=wpautop($meta['customer_options_content'][0]);?>
</div>
</div>
</div>
</div>


<?php 
$fn = 'customer_customer';
$color = ' graylt';
include (get_template_directory().'/includes/page.related-customers.php'); ?>



<?php /* cta */ ?>

<?php if($meta['customer_options_cta'][0]) : ?>
	<div class="section footercta white">
		<div class="wrapper small row animate">
			<?=wpautop($meta['customer_options_cta'][0]);?>
		</div>
	</div>

<?php endif;?>


<?php include ("includes/page.footer.php") ?>
