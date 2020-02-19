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

		class metas {

			private function overRides($item){
				$meta = array();
				switch ($item) {
					case 'Emily Johnson': $meta = array('seometa_metas_canonical' => array('http://www.cloudcraze.com/author/emilyjohhnson/'),'seometa_metas_title' => array( 'Emily Johnson- Author | CloudCraze'),'seometa_metas_description' => array('Emily Johnson is the Marketing Manager at Saleforce eCommerce company, CloudCraze. Click here to read blog posts and news articles from Emily.'));break;
					case 'Shawn Belling': $meta = array('seometa_metas_canonical' => array('http://www.cloudcraze.com/author/shawnbelling/'),'seometa_metas_title' => array( 'Shawn Belling- Author | CloudCraze'),'seometa_metas_description' => array('Shawn Belling is the Vice President of Product Development at CloudCraze. Read more posts about eCommerce product features from Shawn here.'));break;
					case 'Bill Lloumpouridis': $meta = array('seometa_metas_canonical' => array('http://www.cloudcraze.com/author/billloumpouridis/'),'seometa_metas_title' => array( 'Bill Lloumpouridis- Author | CloudCraze'),'seometa_metas_description' => array('Bill Lloumpouridis is the founder of CloudCraze Enterprise eCommerce on Salesforce and the Chief Strategy Officer. Read more from this eCommerce expert here.'));break;
					case 'Eric Marotta': $meta = array('seometa_metas_canonical' => array('http://www.cloudcraze.com/author/ericmarotta/'),'seometa_metas_title' => array( 'Eric Marotta- Author | CloudCraze'),'seometa_metas_description' => array('Learning about digital commerce platforms? Click to read more saleforce eCommerce product content from CloudCraze&apos;s Diretor of Product Marketing, Eric Marotta.'));break;
					case 'Sarah Traxler': $meta = array('seometa_metas_canonical' => array('http://www.cloudcraze.com/author/sarahtraxler/'),'seometa_metas_title' => array( 'Sarah Traxler- Author | CloudCraze'),'seometa_metas_description' => array('Sarah Traxler is the the Director of Marketing for Saas eCommerce provider CloudCraze. Read more digital commerce content from Sarah here.'));break;
					case 'Ray Grady': $meta = array('seometa_metas_canonical' => array('http://www.cloudcraze.com/author/raygrady/'),'seometa_metas_title' => array( 'Ray Grady- Author | CloudCraze'),'seometa_metas_description' => array('Ray Grady is the Executive Vice President for Salesforce eCommerce company, CloudCraze. Read more eCommerce blog posts and news articles from Ray Grady here.'));break;
					case 'CloudCraze': $meta = array('seometa_metas_canonical' => array('http://www.cloudcraze.com/author/cloudcraze/'),'seometa_metas_title' => array( 'Read Content from CloudCraze | CloudCraze'),'seometa_metas_description' => array('CloudCraze is the only saas eCommerce software solution built natively on Salesforce. Hear from eCommerce experts at CloudCraze here.'));break;
					case 'Phil Weinmeister': $meta = array('seometa_metas_canonical' => array('http://www.cloudcraze.com/author/philweinmeister/'),'seometa_metas_title' => array( 'Phil Weinmeister- Author | CloudCraze'),'seometa_metas_description' => array('Phil Weinmeister is the Product Director of Consumer Engagment at CloudCraze. Read more salesforce eCommerce product content from Phil here.'));break;
					case 'news': $meta = array('seometa_metas_title' => array('News | CloudCraze '),'seometa_metas_description' => array('Want to know more about our enterprise eCommerce company? Find the latest Salesforce eCommerce news from CloudCraze here.'),'seometa_metas_canonical' => array(get_post_type_archive_link($item)));break;
					case 'events': $meta = array('seometa_metas_title' => array('Events | CloudCraze '),'seometa_metas_description' => array('Want to learn more about the value of eCommerce on Salesforce? Visit CloudCraze at these upcoming eCommerce events.'),'seometa_metas_canonical' => array(get_post_type_archive_link($item)));break;
          // default: $meta = array(); break;
					default: $meta = array('seometa_metas_title' => array($item.' | CloudCraze '),'seometa_metas_description' => array(''),'seometa_metas_canonical' => array('')); break;
				}

				return $meta;
			}
			private function html($metas){
		// var_dump($metas);

				$html = "";
				$robots = '';
				if($metas['seometa_metas_noindex'][0] == 'true') $robots .= ' NOINDEX';
				if($metas['seometa_metas_nofollow'][0] == 'true') $robots .= ' NOFOLLOW';
				if($robots != '') $html .= '<meta name="ROBOTS" content="'.$robots.'">'."\n";

				$html .= "\n".'<title>'.$metas['seometa_metas_title'][0].'</title>';
				$html .= "\n".'<meta name="description" content="'.$metas['seometa_metas_description'][0].'" />';
				if($metas['seometa_metas_keywords'][0]) $html .= "\n".'<meta name="keywords" content="'.$metas['seometa_metas_keywords'][0].'" />';
				$html .= "\n".'<link rel="canonical" href="'.$metas['seometa_metas_canonical'][0].'"/>';

				if($metas['seometa_social_title'][0]) $html .= "\n".'<meta itemprop="name" content="'.$metas['seometa_social_title'][0].'">';
				if($metas['seometa_social_description'][0]) $html .= "\n".'<meta itemprop="description" content="'.$metas['seometa_social_description'][0].'">';
				if($metas['opt'][0]) $html .= "\n".'<meta itemprop="image" content="'.$metas['opt'][0].'">';

				$html .= "\n".'<!-- Twitter Card data -->';
				$html .= "\n".'<meta name="twitter:card" content="summary_large_image">';
				if($metas['seometa_social_twitter'][0]) $html .= "\n".'<meta name="twitter:site" content="'.$metas['seometa_social_twitter'][0].'">';
          if($metas['seometa_social_title'][0]) $html .= "\n".'<meta name="twitter:title" content="'.$metas['seometa_social_title'][0].'">';
            if($metas['seometa_social_description'][0]) $html .= "\n".'<meta name="twitter:description" content="'.$metas['seometa_social_description'][0].'">';
              if($metas['seometa_social_socialimage'][0]) $html .= "\n".'<meta name="twitter:image:src" content="'.$metas['seometa_social_socialimage'][0].'">';

                $html .= "\n".'<!-- Open Graph data -->';
                if($metas['seometa_social_title'][0]) $html .= "\n".'<meta property="og:title" content="'.$metas['seometa_social_title'][0].'" />';
                  $html .= "\n".'<meta property="og:type" content="article" />';
                  if($metas['seometa_social_url'][0]) $html .= "\n".'<meta property="og:url" content="'.$metas['seometa_social_url'][0].'" />';
                    if($metas['seometa_social_socialimagelrg'][0]) $html .= "\n".'<meta property="og:image" content="'.$metas['seometa_social_socialimagelrg'][0].'" />';
                      if($metas['seometa_social_description'][0]) $html .= "\n".'<meta property="og:description" content="'.$metas['seometa_social_description'][0].'" />';
                        if($metas['seometa_social_sitename'][0]) $html .= "\n".'<meta property="og:site_name" content="'.$metas['seometa_social_sitename'][0].'" />';

                          return $html;

                        }
                        private function getDesc($id,$char){
                          $desc = get_the_excerpt($id);
                          if(empty($desc) || $desc != false){
                           $content = get_post_field('post_content', $id);
                           $content = apply_filters('the_content', $content);
                           $content = strip_tags($content,'<p>');

                           $start = strpos($content, '<p>')+3;
                           $end = strpos($content, '</p>')-$start;
			// $content = preg_replace('/<[^>]*>/', '', $content);
                           $desc = substr($content, $start, $end);
                         }
                         return trimString($desc,$char);
                       }

                       private function getMetas($id){
		//$id = get_post_meta(get_the_ID());

                        if(get_option('current_page_template') == 'index'){
                         $pageid = get_option( 'page_for_posts');
                         $meta = get_post_meta($pageid);
                       }elseif(get_option('current_page_template') == 'author'){
                         $author = get_the_author();
                         $meta = $this->overRides($author);
                       }elseif(is_archive()){
                         $type = get_post_type(get_the_ID());
                         $meta = $this->overRides($type);
                       }else{
                         $meta = get_post_meta(get_the_ID());
                       }
                       $opt = get_option('theme_settings');

		// var_dump($meta);
                       if($meta['seometa_socialshare_socialimage'] == 'none'){
					//$socialID = false;
                       }elseif($meta['seometa_socialshare_socialimage']){
                         $socialID = $meta['seometa_socialshare_socialimage'];
                       }elseif(has_post_thumbnail()){
                         $socialID  = get_post_thumbnail_id($postId);
                       }else{
                         $socialID = false;
                       }

                       if($socialID != false){
                         $sociallrg = wp_get_attachment_image_src($socialID,'social-lrg', true)[0];
                         $socialImage = wp_get_attachment_image_src($socialID,'social', true)[0];
                       }

		// var_dump(get_the_title($id));
                       if(empty($meta['seometa_metas_title'][0])) $meta['seometa_metas_title'][0] = get_the_title($id);
                       if(empty($meta['seometa_metas_description'][0])) $meta['seometa_metas_description'][0] = $this->getDesc($id,155);
                       if(empty($meta['seometa_metas_canonical'][0])) $meta['seometa_metas_canonical'][0] = str_replace(get_permalink($id),"https:","http:");
                        if(empty($meta['seometa_social_title'][0])) $meta['seometa_social_title'][0] = $meta['seometa_metas_title'][0];
                        if(empty($meta['seometa_social_socialimage'][0])) $meta['seometa_social_socialimage'][0] = $socialImage;
                        if(empty($meta['seometa_social_socialimagelrg'][0])) $meta['seometa_social_socialimagelrg'][0] = $sociallrg;
                        if(empty($meta['seometa_social_description'][0])) $meta['seometa_social_description'][0] = $meta['seometa_metas_description'][0];
                        if(empty($meta['seometa_social_tweet'][0])) $meta['seometa_social_tweet'][0] = $meta['seometa_metas_description'][0];
                        if(empty($meta['seometa_social_url'][0])) $meta['seometa_social_url'][0] = $meta['seometa_metas_canonical'][0];
                        if(empty($meta['seometa_social_twitter'][0])) $meta['seometa_social_twitter'][0] = $opt['twitter-handle'];
                        if(empty($meta['seometa_social_sitename'][0])) $meta['seometa_social_sitename'][0] = get_option('blogname');

		// var_dump($meta);
                        return $meta;

                      }

                      public function construct($id){
                        $metas = $this->getMetas($id);
                        $metas['id'][0]=$id;
                        return $this->html($metas);
                      }

                    }
