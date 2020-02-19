<?php
$single_cat = get_post_type($post->ID);
$single_cat = get_post_type_object($single_cat);
$single_cat = $single_cat->labels->name;
switch ($meta['single_cta_type'][0]) {
	case 'category':
	if (!function_exists('dynamic_sidebar') || !dynamic_sidebar($single_cat) ) {}
		break;
	case 'custom':
	$i = 1;
	while ( $i < 4) {
		if($meta['single_cta_'.$i.'_title'][0]){
			echo ctaBuilder(array(
				'title' => $meta['single_cta_'.$i.'_title'][0],
				'button_text' => $meta['single_cta_'.$i.'_button_text'][0],
				'url' => $meta['single_cta_'.$i.'_url'][0],
				'class' => 'widget widget_cta '.$meta['single_cta_'.$i.'_class'][0],
				'id' => $i
				)
			);
			$i++;
		}
	}
	break;
	case 'default':
	if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Page Default Sidebar') ) {}
		break;
}
	// add widget widget_nav_menu
switch ($meta['single_catnav_type'][0]) {
	case 'category':
	$single_cat = get_the_terms($post->ID,'single_categories')[0]->slug;
	if(has_nav_menu($single_cat)){wp_nav_menu(array('menu' => $single_cat));}
	break;
	case 'default':
	if(has_nav_menu('page-sidebar')){wp_nav_menu( array('theme_location' => 'page-sidebar') ); }
	break;
}

