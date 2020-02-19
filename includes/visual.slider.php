<?php

// ------------------------------------------------------
// Template Parts to build Main Slider
// ------------------------------------------------------



	array( 'cycle2', get_template_directory_uri().'/libs/jquery.cycle2.min.js', array( 'jquery'), null, true),
	array( 'cycle_carousel', get_template_directory_uri().'/libs/jquery.cycle2.carousel.min.js', array( 'cycle2'), null, true),

	function siteScriptLoad(){
		foreach (themeSettings('scripts') as $script) {
			wp_register_script( $script[0], $script[1],$script[2],$script[3],$script[4]);
		}

		foreach (themeSettings('iniScript') as $script) {
			wp_enqueue_script($script);
		}
		if(is_front_page()){
			foreach (themeSettings('iniScriptHome') as $script) {
				wp_enqueue_script($script);
			}
		}
	}
	add_action('wp_enqueue_scripts', 'siteScriptLoad');
?>


<!-- Begin Template: inc/visual.slider.php  -->

<div class="slider">

		<?php
			$i=1;
			$query = new WP_Query( array(
				'post_type' => 'banner',
				'posts_per_page' => '-1',
				'orderby' => 'menu_order',
				'order' => 'ASC'
			));
			$posthtml = "";
			$largecss = "";
			$tabletcss = "";
			$mobilecss = "";


			if ( $query->have_posts() ) { ?>
					<?php while ( $query->have_posts() ) : $query->the_post();
						$banner = "";
						if ( has_post_thumbnail($post->ID) ) {
							$image_id   = get_post_thumbnail_id($post->ID);
							$ban_main     = wp_get_attachment_image_src($image_id,'banner', true)[0];
							$ban_tablet     = wp_get_attachment_image_src($image_id,'banner-medium', true)[0];
							$ban_mobile     = wp_get_attachment_image_src($image_id,'banner-small', true)[0];
							$ban_title      = get_post_meta(get_the_ID(), 'banner_title', true);
							$ban_subtitle   = get_post_meta(get_the_ID(), 'banner_subtitle', true);
							$ban_buttontext = get_post_meta(get_the_ID(), 'banner_buttontext', true);
							$ban_url        = get_post_meta(get_the_ID(), 'banner_url', true);
							$ban_class      = get_post_meta(get_the_ID(), 'banner_class', true);
						}
						$h="h2";
						if ($i == 1){$h="h1";}

						$largecss  .= ".slide".$i.'{background-image:url('.$ban_main.');}';
						$tabletcss .= ".slide".$i.'{background-image:url('.$ban_tablet.');}';
						$mobilecss .= ".slide".$i.'{background-image:url('.$ban_mobile.');}';

						$posthtml  .= '<div class="slide slide'.$i.' '.$ban_class.'">';
						$posthtml  .= '<a href="'.$ban_url.'" class="ovelay"></a>';
						$posthtml  .= '<div class="wrapper"><div class="content" >';
						$posthtml  .= '<'.$h.' class="title">'.$ban_title.'</'.$h.'>';
						$posthtml  .= '<p class="subtitle">'.$ban_subtitle.'</p>';
						$posthtml  .= '<a href="'.$ban_url.'" class="button">'.$ban_buttontext.'</a>';
						$posthtml  .= '</div></div></div>';

						$i++;
					endwhile;
					echo '<style>'.$largecss.'@media (max-width: 1024px) {'.$tabletcss.'}@media (max-width: 600px) {'.$mobilecss.'}</style>';
				 ?>
			<?php } wp_reset_postdata(); ?>

	<div class="controls <?php if($i == 2){ echo "disabled";}?>">
		<div class="arrows cycle-prev"></div>   <!-- END .cycle cycle-prev -->
		<div class="cycle-pager"></div>
		<div class="arrows cycle-next"></div>   <!-- END .cycle cycle-next -->
	</div>  <!-- END .controls -->

	<div class="slideshow cycle-slideshow main-slider"
		data-cycle-fx="scrollHorz"
		data-cycle-pause-on-hover="true"
		data-cycle-speed="2000"
		data-cycle-timeout="0"
		data-cycle-slides="> div.slide"
		data-cycle-prev=".controls .cycle-prev"
		data-cycle-next=".controls .cycle-next"
		data-cycle-log="false"
		data-cycle-pager=".controls .cycle-pager"
	>
		<?=$posthtml ?>
	</div> <!-- END .slideshow -->

</div>  <!-- END #mainvisual .slider -->
