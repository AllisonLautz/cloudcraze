<?php
/*

	Calls to Action Post Type
	====
		- CTA Functions
		-Get Post ID
		-Meta Boxes Options
		-Init & Save

*/
	// CTA Functions
	// ----


namespace theme;

class page {

	private function getTemplate($id){

		if ( is_front_page() && is_home() ) {
			// Default homepage
			$template = 'font-page';
		} elseif ( is_front_page() ) {
			// static homepage
			$template = 'font-page';
		} elseif ( is_home() ) {
			// blog page
			$template = 'blog';
		} else {
			//everything else
			$template_base = basename(get_page_template());
			$template = substr($template_base, 0, -4);
		}
		return $template;
	}
	private function getOptions($id){
		$template = $this->getTemplate($id);
		$settings = templateSettings($template);

		$page = array(
			// 'template_meta' => get_post_meta( $id, '_wp_page_template', true ),
			// 'get_page_template' => get_page_template(),
			// 'get_page_template_slug' => get_page_template_slug($id),
			'template' => get_option('current_page_template'),
			'pageid' => $id,
			// 'template' => $template,
			'post-type' => get_post_type(),
			'cta' => $settings['ctas'],
			'settings' => $settings
		);

		unset($page['settings']['ctas']);

		return $page;

	}

	public function construct(){
		return $this->getOptions(get_the_ID());
	}

}