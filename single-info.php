<?php
/**
 * @package WordPress
 * @subpackage CloudCraze
 */

update_option('current_page_template','single-info');


$disable = array(
	'menu' => true,
	'search' => true,
	'demobtn' => true,
	'footer-widgets' => true,
	'footer-menu' => true,
);

include ("includes/page.header.php");
@include locate_template('template-parts/section-title.php');
?>



<!-- Begin Template: single-info.php  -->

<div class="content">
	<div class="wrapper">
		<?php
		if($meta['landing_sidebar_disable'][0] == 'true'){$mainClass = 'wide';}else{$mainClass = 'twothird';}
		if($meta['landing_sidebar_position'][0] == 'left'){$mainPos = 'right';}
		else{$mainPos = 'left';}
		?>
		<div class="section <?=$mainClass?> <?=$mainPos?> maincontent">
			<div class="subsection full centerd text">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php the_content(__('')); ?>
				<?php endwhile; else: endif; ?>
			</div>  <!-- END .section full maincontent -->
		</div>  <!-- END .section threequarter -->

		<?php

		function formSidebar($meta){
			$args = array();
			if($meta['landing_sidebar_redirect'][0]) $args['redirect'] = $meta['landing_sidebar_redirect'][0];
			if($meta['landing_sidebar_redirect_custom'][0]) $args['redirect'] = $meta['landing_sidebar_redirect_custom'][0];
			if($meta['landing_sidebar_lead_source'][0]) $args['lead_source'] = $meta['landing_sidebar_lead_source'][0];
			if($meta['landing_sidebar_submit'][0]) $args['submit'] = $meta['landing_sidebar_submit'][0];

			$html = "";
			if(isset($meta['landing_sidebar_formheading'][0])) $html .= '<h2 class="title">'.$meta['landing_sidebar_formheading'][0].'</h2>';
			if(isset($meta['landing_sidebar_formblurb'][0])) $html .= '<p>'.$meta['landing_sidebar_formblurb'][0].'</p>';
			$html .= '<div class="formwrap full">'.getForm($meta['landing_sidebar_form'][0],$args).'</div>';

			$html = '<div class="widget widget_form">'.$html.'</div>';
			return $html;

		}

		function downloadSidebar($meta){
			$html = "";
			if(isset($meta['landing_sidebar_downheading'][0])) $html .= '<h2 class="title">'.$meta['landing_sidebar_downheading'][0].'</h2>';
			if(isset($meta['landing_sidebar_downblurb'][0])) $html .= '<p>'.$meta['landing_sidebar_downblurb'][0].'</p>';
			if(isset($meta['landing_sidebar_button'][0])) $html .= '<div class="button">'.$meta['landing_sidebar_button'][0].'</div>';
			if(isset($meta['landing_sidebar_download'][0])) $html = '<a class="ctawrap" target="_blank" href="'.$meta['landing_sidebar_download'][0].'">'.$html.'</a>';
			$html = '<div class="widget widget_cta download_cta">'.$html.'</div>';

			return $html;

		}

		function htmlSidebar($meta){
			$html = "";
			if(isset($meta['landing_sidebar_html'][0])) $html .= '<div class="wrap">'.$meta['landing_sidebar_html'][0].'</div>';
			$html = '<div class="widget widget_cta custom_cta">'.$html.'</div>';

			return $html;

		}

		function getSidebar($meta){
			if($meta['landing_sidebar_type'][0] != false && $meta['landing_sidebar_type'][0] != 'none'){
				$function  = $meta['landing_sidebar_type'][0].'Sidebar';
				$sidebar = $function($meta);
				$color = $meta['landing_sidebar_color'][0];
				if($meta['landing_sidebar_image'][0]) $sidebar .= '<div class="widget widget_image"><img src="'.$meta['landing_sidebar_image'][0].'" /></div>';
				return '<div class="section onethird '.$meta['landing_sidebar_position'][0].' sidebar"><div class="full widgets list '.$color.'">'.$sidebar.'</div></div><!-- END sidebar -->';
			}
		}

		if($meta['landing_sidebar_disable'][0] != 'true') echo getSidebar($meta);
		?>

	</div>  <!-- END .wrapper -->

</div>  <!-- END #content -->

<?php

function buildForm($id,$meta){

	$args = array();
	if($meta['landing_section_'.$id.'_redirect_custom'][0]) $args['redirect'] = $meta['landing_section_'.$id.'_redirect'][0];
	if($meta['landing_section_'.$id.'_redirect_custom'][0]) $args['redirect'] = $meta['landing_section_'.$id.'_redirect_custom'][0];
	if($meta['landing_section_'.$id.'_lead_source'][0]) $args['lead_source'] = $meta['landing_section_'.$id.'_lead_source'][0];
	if($meta['landing_section_'.$id.'_submit'][0]) $args['submit'] = $meta['landing_section_'.$id.'_submit'][0];

	$html = "";
	$html .= '<div class="formwrap">'.getForm($meta['landing_section_'.$id.'_form'][0],$args).'</div>';
	return $html;
}

function buildtestimonials($id,$meta){

	$items = array();

	if($meta['landing_section_'.$id.'_testimonial_1'][0]) $items[] = $meta['landing_section_'.$id.'_testimonial_1'][0];
	if($meta['landing_section_'.$id.'_testimonial_2'][0]) $items[] = $meta['landing_section_'.$id.'_testimonial_2'][0];
	if($meta['landing_section_'.$id.'_testimonial_3'][0]) $items[] = $meta['landing_section_'.$id.'_testimonial_3'][0];
	$cnt = count($items);
		// $widthOpt = array('1' => 'full','2' => 'halves','3' => 'thirds','4' => 'fourths','5' => 'fifths');
	$args = array(
			'class'         => '', //.$widthOpt[$cnt],
			'row'		 	=> $cnt,
			'image'			=> 'resource',
			'postclass'		=> '',
			'title' 		=> 'h3',
			'perma' 		=> false,
			'descLimit'     => 60,
			'function' 		=> 'testimonials',
			'nowrap'		=> true,
		);
	return '<div class="testimonialslider section centered nopadding animate"><div class="controls"><div class="wrapper"><div class="arrow prev">'.svg('#arrow-left',1,'arrw',0).'</div><div class="arrow next">'.svg('#arrow-right',1,'arrw',0).'</div></div></div><div class="slideshow cycle-slideshow"
	data-cycle-fx="scrollHorz" data-cycle-pause-on-hover="true" data-cycle-speed="2000" data-cycle-timeout="0" data-cycle-slides="> div.slide" data-cycle-prev=".arrow.prev" data-cycle-next=".arrow.next" data-cycle-log="false"
	>' . buildItems($items,$args) . '</div></div></div>';
}

function buildresources($id,$meta){

	$items = array();

	if($meta['landing_section_'.$id.'_resources_1'][0]) $items[] = $meta['landing_section_'.$id.'_resources_1'][0];
	if($meta['landing_section_'.$id.'_resources_2'][0]) $items[] = $meta['landing_section_'.$id.'_resources_2'][0];
	if($meta['landing_section_'.$id.'_resources_3'][0]) $items[] = $meta['landing_section_'.$id.'_resources_3'][0];

	if($meta['landing_section_'.$id.'_resources_4'][0]) $items[] = $meta['landing_section_'.$id.'_resources_4'][0];
	if($meta['landing_section_'.$id.'_resources_5'][0]) $items[] = $meta['landing_section_'.$id.'_resources_5'][0];

	$cnt = count($items);
	$widthOpt = array('1' => 'full','2' => 'halves','3' => 'thirds','4' => 'fourths','5' => 'fifths');




	$args = array(
		'titlecount'    => 100,
		'class'         => 'cardwrap '.$widthOpt[$cnt].' resource cards',
		'rowcnt'		=> true,
		'image'			=> 'resource-grid',
		'postclass'		=> 'card',
		'title' 		=> 'h3',
		'termTags' 		=> true,
		'label' 	    => 'resource_types',
		'args' 			=> array(
			'posts_per_page' => '-1',
			'post_type' => 'resource',
			'orderby' => 'menu_order',
			'order' => 'ASC',
		)
	);

		//echo buildLoop($args);

				// var_dump($items);

	return buildItems($items,$args);

}

function buildcta($id,$meta){
	$html = "";
	if(isset($meta['landing_section_'.$id.'_heading'][0])) $html .= '<h2 class="title">'.$meta['landing_section_'.$id.'_heading'][0].'</h2>';
	if(isset($meta['landing_section_'.$id.'_text'][0])) $html .= '<p class="text">'.$meta['landing_section_'.$id.'_text'][0].'</p>';
	if(isset($meta['landing_section_'.$id.'_button'][0])) $html .= '<div class="button" >'.$meta['landing_section_'.$id.'_button'][0].'</div>';

	$cta  = '<div class="section footercta widget_cta cta_'.$id.' ">';
	if(isset($meta['landing_section_'.$id.'_download'][0])) $cta .= '<a class="ctawrap" href="'.$meta['landing_section_'.$id.'_download'][0].'" >';
	$cta .='<div class="wrapper">'.$html.'</div>';
	if(isset($meta['landing_section_'.$id.'_download'][0])) $cta .= '</a>';
	$cta .='</div>';
	return $cta;
}

function buildSection($id,$meta,$color){
	$class = "";

	if($meta['landing_section_'.$id.'_none'][0] == 'true') return false;
	if($meta['landing_section_'.$id.'_type'][0] == false) return false;
	if($meta['landing_section_'.$id.'_type'][0] == 'none') return false;
	if($meta['landing_section_'.$id.'_type'][0] == 'cta') return buildcta($id,$meta);


	$html .= '<div class="headings"><h2 class="sectiontitle small">'.$meta['landing_section_'.$id.'_heading'][0].'</h2>';
	$html .= '<p class="intro small">'.$meta['landing_section_'.$id.'_text'][0].'</p></div>';

	if($meta['landing_section_'.$id.'_type'][0] == 'form'){$html .= buildForm($id,$meta); $color = 'graylt';}
	elseif($meta['landing_section_'.$id.'_type'][0] == 'html') {$html .= htmlspecialchars_decode($meta['landing_section_'.$id.'_html'][0]);}
	elseif($meta['landing_section_'.$id.'_type'][0] == 'image') {$html .= '<img class="aligncenter" src="'.$meta['landing_section_'.$id.'_image'][0].'"/>';}
	else{
		$function = 'build'.$meta['landing_section_'.$id.'_type'][0];
		$html .= $function($id,$meta);
	}

	$color = $meta['landing_section_'.$id.'_color'][0];

	if($meta['landing_section_'.$id.'_type'][0] == 'testimonials'){return '<div class="testimonials full section_'.$id.' '.$color.' '.$class.' centered">'.$html.'</div>';}
		// if($meta['landing_section_'.$id.'_type'][0] == 'testimonials'){return $html;}
	else return '<div class="section full section_'.$id.' '.$color.' '.$class.' centered"><div class="wrapper">'.$html.'</div></div>';
}
?>

<?php // var_dump($meta); ?>

<?=buildSection(1,$meta, $color)?>
<?=buildSection(2,$meta, $color)?>
<?=buildSection(3,$meta, $color)?>
<?=buildSection(4,$meta, $color)?>
<?=buildSection(5,$meta, $color)?>
<?=buildSection(6,$meta, $color)?>
<?=buildSection(7,$meta, $color)?>

<!-- End Template: single-info.php  -->
<?php $callus =false;?>
<?php include (get_template_directory().'/includes/landing-page.related-content.php'); ?>


<?php include ("includes/page.footer.php") ?>
