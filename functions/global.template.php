<?php

// ------------------------------------------------------
// Functions for HTML Sections
// ------------------------------------------------------


	function buildSection($class,$content,$wrapper){
		$html = '<div class="section '.$class.'>';
			if(!$wrapper) $html .= '<div class="wrapper">';
			$html .= $content;
			if(!$wrapper) $html .= '</div> <!-- wrapper -->';
		$html .= '</div> <!-- END section '.$class.' -->';
		return $html;
	}

	function postType($id,$type, $data){
		switch ($type) {
			case 'html':
				if(!$data['element']) $data['element'] = 'div';
				$con = '<'.$data['element'].' class="'.$data['class'].'">'.$data['content'].'</'.$data['element'].'>';
			break;

			case 'image':
				$con = '<div class="'.$data['class'].'" >';
				if($data['link']){ $con .= '<a href="'.$data['link'].'">';}
				$con .= get_the_post_thumbnail( $id, $data['size']);
				if($data['link']){ $con .= '</a>';}
				$con .= '</div>';
			break;
		}

		return $con;
	}

	function buildPost($id,$cnt,$class,$opts){
		$html = '<div class="post post"'.$cnt.' '.$class.'"">';
			foreach ($opts as $opt) {
				$html .= posttype($id,$opt['type'],$opt['data']);
			}
		$html .= '</div> END post post"'.$cnt.' '.$class.' -->';

		return $html;
	}