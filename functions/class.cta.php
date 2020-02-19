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

		class cta {

			private function html($data){

				$html = "";

				if(isset($data['title'])) $html .= '<h2 class="title">'.$data['title'].'</h2>';
				if(isset($data['subtitle'])) $html .= '<p class="subtitle">'.$data['subtitle'].'</p>';
				if(isset($data['text'])) $html .= '<p class="text">'.$data['text'].'</p>';
				if(isset($data['button_text'])) $html .= '<a href="'.$data['anchor'].'">'.$data['button_text'].'</a>';

				if(is_user_logged_in() && is_int($id)) {$edit .= '<a class="editcta" href="/wp-admin/post.php?post='.$id.'&action=edit">Edit</a>';}else{$edit="";}

				if(!isset($data['class'])) $data['class'] = '';
				if(isset($data['target']) && $data['target'] != 'default') {$data['target'] = 'target="'.$data['target'].'"';}else{$data['target'] = '';}


				if(!isset($data['type'])) {$data['type'] = 'default';}

				

				if($data['type'] == 'footer'){
					$footer  = '<div class="section footercta">';
					// if(isset($data['anchor'])) $footer .= '<a class="ctawrap" href="'.$data['anchor'].'" '.$data['target'].' >';
					$footer .='<div class="wrapper animate">'.$html.'</div>';
					// if(isset($data['anchor'])) $footer .= '</a>';
					$footer .='</div>';
					$html = $footer;
				}
				elseif(!empty($html)){
					// if(isset($data['anchor'])) $html = '<a class="ctawrap" href="'.$data['anchor'].'" '.$data['target'].' >'.$html.'</a>';
					$html = '<div class="widget widget_cta">'.$html.'</div>';
				}

				return $html;
			}

			private function getbyId($id){
				$data = array();
				$meta = get_post_meta($id);
				if(isset($meta['ctas_options_heading'][0])) $data['title'] = $meta['ctas_options_heading'][0];
				if(isset($meta['ctas_options_subheading'][0])) $data['subtitle'] = $meta['ctas_options_subheading'][0];
				if(isset($meta['ctas_options_content'][0])) $data['text'] = $meta['ctas_options_content'][0];
				if(isset($meta['ctas_options_button'][0])) $data['button_text'] = $meta['ctas_options_button'][0];
				if(isset($meta['ctas_options_anchor'][0])) $data['anchor'] = $meta['ctas_options_anchor'][0];
				if(isset($meta['ctas_options_class'][0])) $data['class'] = $meta['ctas_options_class'][0];
				return $data;
			}
			private function getCustom($id){
				$meta = get_post_meta(get_the_ID());
				$data = array();
				if(isset($meta['ctaOptions_options_'.$id.'_heading'][0])) $data['title'] = $meta['ctaOptions_options_'.$id.'_heading'][0];
				if(isset($meta['ctaOptions_options_'.$id.'_subheading'][0])) $data['subtitle'] = $meta['ctaOptions_options_'.$id.'_subheading'][0];
				if(isset($meta['ctaOptions_options_'.$id.'_content'][0])) $data['text'] = $meta['ctaOptions_options_'.$id.'_content'][0];
				if(isset($meta['ctaOptions_options_'.$id.'_button'][0])) $data['button_text'] = $meta['ctaOptions_options_'.$id.'_button'][0];
				if(isset($meta['ctaOptions_options_'.$id.'_anchor'][0])) $data['anchor'] = $meta['ctaOptions_options_'.$id.'_anchor'][0];
				if(isset($meta['ctaOptions_options_'.$id.'_class'][0])) $data['class'] = $meta['ctaOptions_options_'.$id.'_class'][0];
				return $data;
			}
			public function getDefault($int,$type){
				$ctas = array();
				$ctaTags = array(
					array('content_tags',false),
					array('page_categories',false),
					array('ctaType_tags',array('default')),
				);
				foreach ($ctaTags as $key => $value) {
					$new = taggedCTAS(get_the_ID(),$value[0],$value[1],$ctas);
					$ctas = array_merge($ctas,$new);
				}

		 // add info

				$list = array();
				foreach ($ctas as $cta) {
					$list[] = $cta;
				}

				$grouped = array();
				foreach ($list as $cta => $value) {
					$groups = getTaxonomies($value, 'ctaType_tags','slug');

					foreach ($groups as $term) {
						if($term != 'default') $grouped[$term][] = $value;
					}
				}

		// print_r($grouped['sidebar'][$int]);
				if($type && $int !== false) return $grouped[$type][$int];
				if($type) return $grouped[$type];
				return $grouped;
			}

			private function getType($id,$cta){
				$type = get_post_meta($id, 'ctaOptions_options_'.$cta.'_type', true);
			}

			public function getCTA($int){
				global $pageOpt;

				if(isset($pageOpt['cta'][$int])){$opts = $pageOpt['cta'][$int];}
				else{return false;}

				$instance = get_post_meta(get_the_ID(), 'ctaOptions_options_'.$int.'_type', true);
			// instance should return false|int (cta id)|custom

			// var_dump($instance);

				if($instance == 'default' || $instance == false) {
					if($opts[2] == 'footer'){$int = 0;}
					$id = $this->getDefault($int,$opts[2]);
					$cta = $this->getbyId($id);
				}elseif($instance == 'custom'){
					$cta = $this->getCustom($int);
				}elseif($instance == 'none'){
					return false;
				}else{
					$cta = $this->getbyId($instance);
				}

				$cta['type'] = $opts[2];
				return $this->html($cta);
			}

			public function construct(){
				global $pageOpt;
				return $pageOpt['cta'];
			}

		}