<?php

// ------------------------------------------------------
// Functions for creating post loops
// ------------------------------------------------------

//need to define $args array  outside of tempalte piece
// for args info see
// https://codex.wordpress.org/Class_Reference/WP_Query
// $args = array(
// 	'post_type'   => 'posts',
//  'posts_per_page' => 3
// );

$query = new WP_Query( $args );
if (have_posts()) : while ($query->have_posts()) : $query->the_post();
?>

<div class="post post<?=$i?>">
	<div class="pageImageThumb" >
		<a href="<?php the_permalink() ?>" rel="bookmark">
			<?php
				if ( has_post_thumbnail() ) {
					the_post_thumbnail('thumb');
			 	}else{ ?>
			 		<img src="<?php bloginfo('template_url') ?>/img/thumb.png" class="attachment-thumb wp-post-image" alt="<?php bloginfo('name') ?>">
			 	<?php	}
			?>
		</a>
	</div>
	<div class="content">
		<h2 class="title"><a href="<?php the_permalink() ?>" ><?php the_title(); ?></a></h2>
		<p><?php echo get_the_excerpt(); ?></p>
	</div>
</div> <!--END post post<?=$i?> -->

<?php
	$i++;
	endwhile;
	endif;
	wp_reset_postdata();
?>