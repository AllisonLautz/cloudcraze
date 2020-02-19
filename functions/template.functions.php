<?php

// ------------------------------------------------------
// Global Functions for Templates
// ------------------------------------------------------

function tax_options($type){
	$res_types = get_terms( $type, array('hide_empty'=> false));
	$res_options = array('none' => "- Select Type -");
	foreach ($res_types as $value) {
		$res_options[$value->slug] = $value->name;
	}
	if($type == 'resource_types') $res_options['blog'] = 'Blog Posts';
	if($type == 'resource_types') $res_options['testimonials'] = 'Testimonials';
	return $res_options;
}

//build all fields
function printFields($section,$data){
	// sample array('name' => 'button_1_title', 'type' => 'text', 'label'=>'Button 1 Title' )
	$html = '';
	foreach ($data['fields'] as $field => $value) {
		$html .= printFields($section,$value);
	}
	return $html;
}

function field_html($name,$value,$data){
	return $data['before'].'<'.$data['tag'].' class="'.$data['class'].'">'.$data['text'].'</'.$data['tag'].'>'.$data['after'];
}
function field_checkbox($name,$value,$data){
	$checked = '';
	if($value == 'true') $checked ='checked="checked"';
	return '<p><label>'.$data['label'].'</label><input type="checkbox" name="'.$name.'" id="'.$name.'" value="true" '.$checked.'/><span class="hint after">'.$data['hint'].'</span></p>';
}
function field_file($name,$value,$data){
	if($value) $img = '<img src="'.$value.'">';
	return '<p><label>'.$data['label'].'</label><input type="text" id="'.$name.'" name="'.$name.'" id="'.$name.'" value="'.$value.'" size="'.$data['size'].'"/><input type="button" id="'.$name.'-button" class="button" value="Select File" /><span class="hint">'.$data['hint'].'</span></p><script>jQuery(document).ready(function(e){var t;e("#'.$name.'-button").click(function(a){return a.preventDefault(),t?void t.open():(t=wp.media.frames.meta_image_frame=wp.media({title:"Choose or Upload an File",button:{text:"Use this File"}}),t.on("select",function(){var a=t.state().get("selection").first().toJSON();e("#'.$name.'").val(a.url);}),void t.open())})});</script>';
}
function field_image($name,$value,$data){
	if($value) $img = '<img src="'.$value.'">';
	return '<p><label>'.$data['label'].'</label><input type="text" id="'.$name.'" name="'.$name.'" id="'.$name.'" value="'.$value.'" size="'.$data['size'].'"/><input type="button" id="'.$name.'-button" class="button" value="Select Image" /><span class="hint">'.$data['hint'].'</span></p><div class="'.$name.' imagepreview">'.$img.'</div> <script>jQuery(document).ready(function(e){var t;e("#'.$name.'-button").click(function(a){return a.preventDefault(),t?void t.open():(t=wp.media.frames.meta_image_frame=wp.media({title:"Choose or Upload an Image",button:{text:"Use this Image"}}),t.on("select",function(){var a=t.state().get("selection").first().toJSON();e("#'.$name.'").val(a.url);e(".'.$name.'.imagepreview").html("<img src="+a.url+" />")}),void t.open())})});</script>';
}
function field_imageid($name,$value,$data){
	if($value) $img = wp_get_attachment_image( $value, $data['imagesize']);
	return '<p><label>'.$data['label'].'</label><input type="text" id="'.$name.'" name="'.$name.'" id="'.$name.'" value="'.$value.'" size="'.$data['size'].'"/><input type="button" id="'.$name.'-button" class="button" value="Select Image" /><span class="hint">'.$data['hint'].'</span></p> <div class="'.$name.' imagepreview">'.$img.'</div><script>jQuery(document).ready(function(e){var t;e("#'.$name.'-button").click(function(a){return a.preventDefault(),t?void t.open():(t=wp.media.frames.meta_image_frame=wp.media({title:"Choose or Upload an Image",button:{text:"Use this Image"},library:{type:"image"}}),t.on("select",function(){var a=t.state().get("selection").first().toJSON();e("#'.$name.'").val(a.id);e(".'.$name.'.imagepreview").html("<img src="+a.url+" />")}),void t.open())})});</script>';
}
function field_text($name,$value,$data){
	return '<p><label>'.$data['label'].'</label><input type="text" name="'.$name.'" id="'.$name.'" value="'.$value.'" size="'.$data['size'].'" placeholder="'.$data['placeholder'].'" maxlength="'.$data['max'].'"  /><span class="hint">'.$data['hint'].'</span>'.$data['script'].'</p>';
}
function field_date($name,$value,$data){
	// $value = year,month,day,hour,min

	// if($value == false) $value = current_time('timestamp',0);

	// $months = array( 1 => "Jan", 2 => "Feb", 3 => "Mar", 4 => "Apr", 5 => "May", 6 => "Jun", 7 => "Jul", 8 => "Aug", 9 => "Sep", 10 => "Oct", 11 => "Nov", 12 => "Dec");
	// $options = '';
	// foreach ($months as $key => $mon) {
	// 	if(date('m',$value) == $key){$s = 'selected="selected"';}else{$s='';}
	// 	$options .= '<option value="'.$key.'" data-text="'.$mon.'" '.$s.'>'.$key.'-'.$mon.'</option>';
	// }
	// $html ='<p><label>'.$data['label'].'</label>';
	// $html .='<input type="text" value="'.$value.'">';
	// $html .='<div class="timestamp-wrap">';
	// $html .='<span class="dtwrap"><span class="screen-reader-text">Month</span><select id="'.$name.'_month" name="'.$name.'_month">'.$options.'</select></span>';
	// $html .='<span class="dtwrap"><span class="screen-reader-text">Day</span><input type="text" id="'.$name.'_day" name="'.$name.'_day" value="'.date('d',$value).'" size="2" maxlength="2" autocomplete="off"></span>, ';
	// $html .='<span class="dtwrap"><span class="screen-reader-text">Year</span><input type="text" id="'.$name.'_year" name="'.$name.'_year" value="'.date('Y',$value).'" size="4" maxlength="4" autocomplete="off"></span>';
	// $html .='<span class="dtwrap"><span class="screen-reader-text">Hour</span><input type="text" id="'.$name.'_hour" name="'.$name.'_hour" value="'.date('H',$value).'" size="2" maxlength="2" autocomplete="off"></span>:';
	// $html .='<span class="dtwrap"><span class="screen-reader-text">Minute</span><input type="text" id="'.$name.'_min" name="'.$name.'_min" value="'.date('i',$value).'" size="2" maxlength="2" autocomplete="off"></span>';
	// $html .='</div><span class="hint">Use 24 Hour clock (3 PM = 15:00) or leave empty to disable start time</span></p>';


	$html = '<p><label>'.$data['label'].'</label>';
	$html .= '<input type="date" name="'.$name.'" id="'.$name.'" value="'.$value.'" size="'.$data['size'].'" placeholder="'.$data['placeholder'].'" maxlength="'.$data['max'].'"  />';
	// $html .='<span class="dtwrap"><span class="screen-reader-text">Hour</span><input type="text" id="'.$name.'_hour" name="'.$name.'_hour" value="'.date('H',$value).'" size="2" maxlength="2" autocomplete="off" style="padding:5px"></span> : ';
	// $html .='<span class="dtwrap"><span class="screen-reader-text">Minute</span><input type="text" id="'.$name.'_min" name="'.$name.'_min" value="'.date('i',$value).'" size="2" maxlength="2" autocomplete="off" style="padding:5px"></span>';



	$html .= '<span class="hint">'.$data['hint'].'</span>'.$data['script'].'</p>';
	return $html;


}
function field_time($name,$value,$data){
	$html ='<p><label>'.$data['label'].'</label>';
	$html .='<div class="timestamp-wrap">';
	$html .='<span class="dtwrap"><span class="screen-reader-text">Hour</span><instrtotimeput type="text" id="hh" name="hh" value="14" size="2" maxlength="2" autocomplete="off"></span>:';
	$html .='<span class="dtwrap"><span class="screen-reader-text">Minute</span><input type="text" id="mn" name="mn" value="31" size="2" maxlength="2" autocomplete="off"></span>';
	$html .='</div><span class="hint">'.$data['hint'].'</span></p>';
	return $html;
}
function field_readonly($name,$value,$data){
	return '<p><label>'.$data['label'].'</label><input type="text" name="'.$name.'" id="'.$name.'" value="'.$value.'" size="'.$data['size'].'" placeholder="'.$data['placeholder'].'" readonly /><span class="hint">'.$data['hint'].'</span>'.$data['script'].'</p>';
}
function field_seopreview($name,$value,$data){
	return "<script>
	function serpPreview(){
		console.log('serpPreview');
		title = jQuery('#seometa_metas_title').val();
		if (title.length == 0) {title = jQuery('#seometa_metas_title').attr('placeholder');}
		canonical = jQuery('#seometa_metas_canonical').attr('placeholder')
		description = jQuery('#seometa_metas_description').val();
			// if (description.length == 0) {description = jQuery('#seometa_metas_description').attr('placeholder');}
		console.log(150-description.length);

		char = 150-description.length;
		jQuery('.seometa_metas_char').html(char);

		if(description.length > 150){
			description = description.substring(0,150)+'...';
			jQuery('.seometa_metas_char').addClass('error');
		}else{
			jQuery('.seometa_metas_char').removeClass('error');
		}
		jQuery('.seopreview .title').html(title);
		jQuery('.seopreview .url').html(canonical);
		jQuery('.seopreview .desc').html(description);

			// console.log(title+', '+canonical+', '+description);
	}
	serpPreview();
	jQuery('body').on('keyup', '#seometa_metas input', function(event) {serpPreview()});
	jQuery('body').on('keyup', '#seometa_metas textarea', function(event) {serpPreview()});
	</script>";
}
function field_select($name,$value,$data){

	if($data['options'] == 'tax') $data['options'] = tax_options($data['tax']);

	$html ='<p><label>'.$data['label'].'</label>';
	$html .='<select type="text" name="'.$name.'" id="'.$name.'">';
	foreach ($data['options'] as $key => $val) {
		$select = '';
		if($key == $value) $select = 'selected="selected"';
		$html .= '<option value="'.$key.'" '.$select.'>'.$val.'</option>';
	}
	$html .='</select>';
	$html .=' <span class="hint">'.$data['hint'].'</span>'.$data['script'].'</p>';
	if(isset($data['toggle']))$html .= '<script>
		function changeOptions'.$name.'(){
			console.log("run function: '.$name.'");
			jQuery(".toggleoptions.'.$name.' div.active").hide("fast").removeClass("active");
			jQuery(".toggleoptions.'.$name.' div."+jQuery("#'.$name.'").val()).show("fast").addClass("active");
		}
		jQuery(document).ready(function($) {changeOptions'.$name.'();});
		jQuery(document).on("change", "#'.$name.'", function(event) {changeOptions'.$name.'()});
		</script>';

		return $html;
	}

	function field_advanced($name,$value,$data){
		$html = '<div class="customized"><p><label>Advanced Fields</label> <span class="advancedtoggle '.$name.'">Show/Hide</span></p></div><div class="advancedfields '.$name.'">';
		$html .= '<script>jQuery(document).on("click", ".advancedtoggle.'.$name.'", function(event) {jQuery(".advancedfields.'.$name.'").toggle("fast").toggleClass("active");});</script>';

		return $html;
	}
	function field_textarea($name,$value,$data){
		return '<p><label>'.$data['label'].'</label></p><p><textarea name="'.$name.'" id="'.$name.'" rows="'.$data['rows'].'" cols="'.$data['cols'].'"  maxlength="'.$data['max'].'"  placeholder="'.$data['placeholder'].'"/>'.$value.'</textarea><span class="hint">'.html_entity_decode($data['hint']).'</span>'.$data['script'].'</p>';
	}
	function field_script($name,$value,$data){
		return '<p><label>'.$data['label'].'</label></p><p><textarea  name="'.$name.'" id="'.$name.'" rows="'.$data['rows'].'" cols="'.$data['cols'].'"  maxlength="'.$data['max'].'"/>'.$value.'</textarea><span class="hint">'.$data['hint'].'</span>'.$data['script'].'</p>';
	}

	function field_wysiwyg($name,$value,$data){
		return '<p><label>'.$data['label'].'</label></p><p><textarea  name="'.$name.'" id="'.$name.'" rows="'.$data['rows'].'" cols="'.$data['cols'].'"  maxlength="'.$data['max'].'"/>'.$value.'</textarea><span class="hint">'.$data['hint'].'</span>'.$data['script'].'</p>';
	}



	function get_postsOptions($args,$opt){
		if($opt == false) $opt = array();
		$options = $opt;
		$query = new WP_Query( $args );

		foreach ($query->posts as $post) {
			$options[$post->ID] = $post->post_title;
		}

		wp_reset_postdata();
		return $options;
	}


//build individual field
	function fieldBuilder($id,$section,$data){
		// $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];
		$field_name = $id.$section.'_'.$data['name'];
		$value = get_post_meta( $post_id, $field_name, true );
		if(empty($value) && $data['type'] != 'checkbox' ) $value = $data['value'];
		if(!($data['class'])) $data['class'] = "";
		if($data['valueExc'] == true){$value = $data['value'];}
		if($data['hint']){$data['hint'] = htmlspecialchars($data['hint']);}

		$function = "field_".$data['type'];
		$exceptions = array('html','advanced');
		$wysiwyg = array('wysiwyg');
		if(in_array($data['type'], $exceptions)){
			return; $function($field_name, $value, $data);
		}

		// if(in_array($data['wysiwyg'], $exceptions)){
		// 	wp_editor( html_entity_decode($value), $name)
		// }
		
		else{return '<div class="customized '.$data['class'].'">'.$function($field_name, $value, $data).'</div>';}
	}

// Validation Functions
// ----

	function validateData($name,$type){
		if($type == 'checkbox'){
			if(isset($_POST[$name])) {return 'true';}
			else{return 'false';}
		}
		if(!isset($_POST[$name])) return false;

	// if($type == 'date'){
	// 	return strtotime($_POST[$name.'_year'].'-'.$_POST[$name.'_month'].'-'.$_POST[$name.'_day'].' '.$_POST[$name.'_hour'].':'.$_POST[$name.'_min'].':00');
	// }

	// if($type == 'date'){
	// 	return strtotime($_POST[$name] . ' | ' .  $_POST[$name.'_hour'].':'.$_POST[$name.'_min'].':00');
	// }

	// if($type == 'date'){
	// 	return strtotime($_POST[$name.'_hour']);
	// }


		elseif($type == 'script'){
			return esc_js($_POST[$name]);
		}else{
			return esc_html($_POST[$name]);
		}
	}
