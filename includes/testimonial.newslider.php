<?php


$args = array(

	'posts_per_page' => '-1',
	'post_type' => 'testimonials',
	'orderby' => 'title',
	'order' => 'ASC',

);

$query = new WP_Query( $args );
if( $query->have_posts()):?>
<div class="section testimonials">
	
	<div class="slideshow  cycle-slideshow" data-cycle-fx="scrollHorz" data-cycle-pause-on-hover="true" data-cycle-speed="2000" data-cycle-timeout="0" data-cycle-slides="> div.slide" data-cycle-prev=".arrow.prev" data-cycle-next=".arrow.next" data-cycle-log="false">
		<?php while( $query->have_posts() ) : 
		$query->the_post();
		$name = get_post_meta($post->ID, 'testimonials_options_name', true);
		$position = get_post_meta($post->ID, 'testimonials_options_position', true);
		$company = get_post_meta($post->ID, 'testimonials_options_company', true);
		$anchor = get_post_meta($post->ID, 'testimonials_options_anchor', true);
		$quote = get_post_meta($post->ID, 'testimonials_options_quote', true);

		if(get_post_thumbnail_id(get_the_ID())){
			$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'banner-large', true)[0];
		}


		echo '<div class="slide '.$company.'" ><div class="wrapper animate"><div class="text"><h3>'.$quote.'</h3><p>'.$name .', '.$position.'</p><a class="readmore" href="'.$anchor.'">View the Customer Story</a></div></div></div>';
		endwhile;?>

	</div>
	<div class="controls">
		<div class="wrapper">
			<div class="arrow prev"><?=svg('#arrow-left',1,'arrw',0);?></div>
			<div class="arrow next"><?=svg('#arrow-right',1,'arrw',0);?></div>
		</div>
	</div>
</div>
<?php endif;

?>

