<?php
/**
 * @package WordPress
 * @subpackage CloudCraze
 */



update_option('current_page_template','index');
$pageid = get_option( 'page_for_posts');

?>



<?php include ("includes/page.header.php") ?>

<!-- Begin Template: index.php  -->

<div class="content blog">
<div class="wrapper flex">
<div class="section maincontent">
<div class="subsection full text">
<h1 class="pagetitle"><?php  echo get_the_title($pageid); ?></h1>
</div>  <!-- END .section full maincontent -->
<div class="postwrap posts full">
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
				<p>Written by <?php the_author_posts_link(); ?> | <?php the_date('M d, Y', '', ''); ?></p>
				<p><?php echo get_the_excerpt() ?></p>
				<a class="readmore" href="<?=$perma ?>" >Read More</a>
			</div>
		</div> <!--END post post<?=$i?> -->

		<?php
		$i++;
	endwhile;
endif;
wp_reset_postdata();

?>

</div>  <!-- END postwrap posts full -->
</div>  <!-- END .section threequarter -->
<div class="section sidebar">
	<?php



	$args = array( 
		'connected_type' => 'ctas',
		'connected_items' => $pageid,
		'posts_per_page' => -1,
		'post_status'	=>	'publish',
	);

	$query = new WP_Query( $args );


	if( $query->have_posts() ):
		while( $query->have_posts() ) : $query->the_post();

			?>

			<div class="cta">
				<h2><?=get_the_title();?></h2>
				<?=wpautop(meta('call_to_action'));?>
			</div>


			<?php 
		endwhile;
	endif;
	wp_reset_postdata();?>

	<div class="wordcloud">

		<?php 


		

		$tag_args = array(
			'smallest'                  => 8, 
			'largest'                   => 22,
			'unit'                      => 'pt', 
			'number'                    => 45,  
			'format'                    => 'flat',
			'separator'                 => "\n",
			'orderby'                   => 'name', 
			'order'                     => 'ASC',
			'exclude'                   => null, 
			'include'                   => null, 
			'link'                      => 'view', 
			'taxonomy'                  => 'post_tag', 
			'echo'                      => true,
			'child_of'                  => null, 
		);


		wp_tag_cloud($tag_args);

		?>

	</div>



	
</div>  <!-- END .section sidebar -->
</div>  <!-- END .wrapper -->

<div class="wrapper">
	<?php global $wp_query;
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
			?>
		</div>

	</div>  <!-- END #content -->


	<!-- End Template: index.php  -->

	<?php include ("includes/page.footer.php") ?>
